<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;
use DB;
use App\Student;
use Illuminate\Support\Facades\Input;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = DB::table('students')->paginate(7);
//        $values = App\Student::paginate(5);


//        $values = ['ddd', 'ff', 'ggg'];
        return view('students/index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "okay from store";
        print_r($request->all());exit;
//        $student = new Student;
//        $student->name        =       $request->get('name');
//        $student->student_id  =       $request->get('student_id');
//        $student->department  =       $request->get('department');
//
//        $student->save();
//        return redirect('students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
//        return redirect()->route('students');
        return redirect('students');

    }

    public function deleteStu(Request $request){
//        return 'Data Deleted';
        $student = Student::find($request->input('id'));
        $student->delete();
        echo 'Data Deleted';
    }

    public function editStu(Request $request)
    {
        $student = Student::find($request->input('id'));
        $output = array(
            'name'         => $student->name,
            'student_id'   => $student->student_id,
            'department'   => $student->department,
            'batch'        => $student->batch
        );

        echo json_encode($output);

    }

    public function viewStu(Request $request)
    {
//        return "I am okay";

        $student = Student::find($request->input('id'));
        $output = array(
            'name'         => $student->name,
            'student_id'   => $student->student_id,
            'department'   => $student->department,
            'batch'        => $student->batch
        );

        echo json_encode($output);

    }

    public function updateStu(Request $request)
    {
//        return 'very good';
//       echo "<pre>";print_r($request->get('id'));exit;
        return "okay from update";
        return print_r($request->all());

//        $student = Student::find($request->id);
//////        echo "<pre>";print_r($student); exit;
//        $student->name        =       $request->name;
//        $student->student_id  =       $request->student_id;
//        $student->department  =       $request->department;
////
//        $student->save();
//        echo 'Edit successfully';
    }

    public function  postStu(Request $request)
    {
//        return "thik ase";
        if($request->get('button_action') == 'insert')
        {
            $student = new Student([
                'name'          => $request->get('name'),
                'student_id'    => $request->get('student_id'),
                'department'    => $request->get('department'),
                'batch'         => $request->get('batch')
            ]);
            $student->save();

            $success_output = 'Data Inserted';

            echo json_encode($success_output);
        }

        if($request->get('button_action') == 'update')
        {
            $student = Student::find($request->get('stu_id'));
            $student ->name          =    $request->get('name');
            $student ->student_id    =    $request->get('student_id');
            $student ->department    =    $request->get('department');
            $student ->batch         =    $request->get('batch');
            $student->save();

            $success_output = '<div class="alert alert-success"> Data Updated</div>>';

            $output = array(
                'success'  => $success_output
            );

            echo json_encode($output);
        }
    }

    public function views()
    {
        $values = DB::table('students')->paginate(7);
//        echo json_encode($values);
        return view('post', compact('values'));
    }

    public function something()
    {

        return "Check you'r email ";
    }

    public function category()
    {
        $cat = Input::get('cat');
//        return $cat;
        $output = Student::where('gender', '=', $cat)->get();
//        return view('students/index', compact('output'));
//        return "I am okay";
//        echo $output;

       return view('post', compact('output'));
    }
}

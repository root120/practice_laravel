<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use PDF;
use DB;
use App\Student;

class pdfController extends Controller
{
    public function index($id){
        $student = Student::find($id);
//        return "Hello";
        $output = array(
            'department'   => $student->department,
            'name'         => $student->name,
            'student_id'   => $student->student_id,
            'batch'        => $student->batch,
            'gender'        => $student->gender
        );
//        print_r($output['name']);
//            exit;
//        return $output;
//        $data = ['Shuvo', 'Foysol'];
        $data = $output['name'];
        $pdf = PDF::loadView('pdf.withstyle',  compact('output'));
        return $pdf->stream($data.'.pdf');
//        echo json_encode($output);
    }

    public function pdfAll(){
        $outputs = DB::table('students')->get();
//        return view('post', compact('outputs'));
//        print_r($outputs);
//        return $outputs;
//        return $outputs;
        $data = "document";
        $pdf = PDF::loadView('pdf.withstyle',  compact('outputs'));
        return $pdf->stream($data.'.pdf');
//        return $outputs;
    }
}

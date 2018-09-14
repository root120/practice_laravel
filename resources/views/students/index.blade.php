
@extends('layout.app')

@section('title', 'index')

@section('body')
    {{--<button id="myBtn">Insert</button>--}}
    <div class="container">
    <button type="button" name="add" id="add_data" class="glyphicon glyphicon-plus btn btn-success btn-lg">Add</button>


    <div class="modal fade" id="studentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                    <form id="student_form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Insert Data</h4>
                        </div>

                        {{csrf_field()}}
                     <div class="modal-body">
                        <span id="form_output"></span>
                        <div class="content">
                            <label for="name"><b>Full name: </b></label>
                            <br>
                            <input type="text" placeholder="Name" name="name" id="name" class="form-control" required>
                            <br><br>

                            <label for="student_id"><b>Student ID: </b></label><br>
                            <input type="text" placeholder="151-115-100" name="student_id" id="student_id" class="form-control" required>
                            <br><br>

                            <label for="department"><b>department: </b></label><br>
                            <input type="text" placeholder="CSE" name="department" id="department" class="form-control" required>
                            <br><br>

                            <label for="department"><b>Batch: </b></label><br>
                            <input type="text" placeholder="35" name="batch" id="batch" class="form-control" required>
                            <br><br>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="stu_id" id="stu_id" value="" />
                            <input type="hidden" name="button_action" id="button_action" value="insert" />
                            <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>

                    </form>


            </div>

        </div>
    </div>

        <div class="modal fade" id="pdfModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <form id="student_form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">view information </h4>
                        </div>

                        {{csrf_field()}}
                        <div class="modal-body">
                            <sapn id="form_output"></sapn>
                            <div class="content">
                                <br>
                                <p id="name"></p>
                                <br>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" name="stu_id" id="stu_id" value="" />
                                <input type="hidden" name="button_action" id="button_action" value="insert" />
                                <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </form>


                </div>

            </div>
        </div>

<div class="row">
    <div class="col-sm-8"><h2>A student information table</h2></div>
        <div class="col-sm-4">
            <select id="category">
                <option value="all" selected> All</option>
                <option value="male"> Male</option>
                <option value="female"> Female</option>
            </select>
        </div>
</div>
        <div class="row">
            <a href="{{url('pdf_all')}}">Export</a>
        </div>

        <br><br>

        <div id="result"></div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Student ID</th>
            <th scope="col">Department</th>
            <th scope="col">Batch</th>
            <th scope="col">Time</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <th scope="col">make pdf</th>
        </tr>
        </thead>

        <tbody>
        <div class="result_pag" id="result_cat">
        @foreach($values as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->student_id}}</td>
                <td>{{$value->department}}</td>
                <td>{{$value->batch}}</td>
                <td>{{$value->created_at}}</td>
                <td><button class = "edit glyphicon glyphicon-edit btn btn-primary a-btn-slide-text" token="{{csrf_token()}}" id="{{$value->id}}">Edit</button></td>
                <td><button class = "delete glyphicon glyphicon-remove btn btn-primary a-btn-slide-text" token="{{csrf_token()}}" id="{{$value->id}}">Delete</button></td>
                {{--<td><button class = "view glyphicon glyphicon-remove btn btn-primary a-btn-slide-text" token="{{csrf_token()}}" id="{{$value->id}}">View</button></td>--}}
                <td><a href="{{url('pdf/'.$value->id)}}">make pdf </a></td>
            </tr>
        @endforeach
        </div>

        </tbody>


    </table>
        {{$values->links()}}


    </div>
@endsection
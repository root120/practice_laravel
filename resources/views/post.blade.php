{{--@foreach($values as $value)--}}
        {{--{{$value->name}}--}}
        {{--{{$value->student_id}}--}}
        {{--{{$value->department}}--}}
        {{--{{$value->batch}}--}}
        {{--{{$value->created_at}}--}}
{{--@endforeach--}}

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
        <th scope="col">View</th>
        <th scope="col">pdf</th>
    </tr>
    </thead>

    <tbody>

        @foreach($outputs as $value)
        <tr>
        <td>{{$value->name}}</td>
        <td>{{$value->gender}}</td>
        <td>{{$value->student_id}}</td>
        <td>{{$value->department}}</td>
        <td>{{$value->batch}}</td>
        <td>{{$value->created_at}}</td>
        <td><button class = "edit glyphicon glyphicon-edit btn btn-primary a-btn-slide-text" token="{{csrf_token()}}" id="{{$value->id}}">Edit</button></td>
        <td><button class = "delete glyphicon glyphicon-remove btn btn-primary a-btn-slide-text" token="{{csrf_token()}}" id="{{$value->id}}">Delete</button></td><td><a href="{{url('pdf/'.$value->id)}}">make pdf </a></td>
        </tr>
        @endforeach



    </tbody>

</table>
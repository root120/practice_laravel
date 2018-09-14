<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Laravel @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        input[type="text"]{
            opacity: 1;
            font-size: 20px;
            font-weight: 700;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }




    </style>


</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div >
            @section('body')
            @show
        </div>

    </div>
</div>

<script>
    $('#add_data').click(function () {
        $('#studentModal').modal('show');
        $('#student_form')[0].reset();
        $('#form_output').html('Yes');
        $('#button_action').val('insert');
        $('#action').val('Add');
    });

    $('#student_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:'{{route('post.stu')}}',
            type:"post",
            data:form_data,
            dataType:"json",

            success:function(data)
            {
                $('#student_form')[0].reset();
                $('#action').val('Add');
                $('.modal-tittle').text('Add Data');
                $('#button_action').val('insert');
                $('#result').html(data);
                // $('#form_output').html(data);
                $('#result').addClass('alert alert-success');
                // $('#form_output').addClass('alert alert-success');
                location.reload();

            }
        })
    });

    $(document).on('click', '.edit', function(){
       var id = $(this).attr('id');
           $.ajax({
               type: 'POST',
               url: '{{route('edit.stu')}}',
               data: {
                   "_token" : '{{csrf_token()}}',
                   id:id
               },
               dataType: 'json',

               success:function(data){
                   // console.log(id);

                   $('#name').val(data.name);
                   $('#student_id').val(data.student_id);
                   $('#department').val(data.department);
                   $('#batch').val(data.batch);
                   $('#stu_id').val(id);
                   $('#studentModal').modal('show');
                   $('#action').val('Edit');
                   $('.modal-title').text('Edit Data');
                   $('#button_action').val('update');
               }
           });

    });

    {{--$(document).on('click', '.view', function(){--}}
        {{--var id = $(this).attr('id');--}}
        {{--$.ajax({--}}
            {{--type: 'POST',--}}
            {{--url: '{{route('pdf')}}',--}}
            {{--data: {--}}
                {{--"_token" : '{{csrf_token()}}',--}}
                {{--id:id--}}
            {{--},--}}
            {{--dataType: 'json',--}}

            {{--success:function(data){--}}
                {{--// $('#form_output').html("pppps");--}}
                {{--// console.log(id);--}}
                {{--console.log(data);--}}
                {{--// console.log("boss");--}}
                {{--// $('#name').val(data.name);--}}
                {{--// $('#form_output').html(data);--}}
                {{--// $('#student_id').val(data.student_id);--}}
                {{--// $('#department').val(data.department);--}}
                {{--// $('#batch').val(data.batch);--}}
                {{--// $('#stu_id').val(id);--}}
                {{--// $('#pdfModal').modal('show');--}}
                {{--// $('#action').val('make pdf');--}}
                {{--// $('.modal-title').text('View Data');--}}
                {{--alert('its okay');--}}
            {{--}--}}
        {{--});--}}

    {{--});--}}


    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure?"))
        {
            console.log(id);
            $.ajax({
                beforeSend: function(){

                },

                type: 'POST',
                url:'{{ route('delete.stu') }}',
                data: {
                    "_token": "{{csrf_token()}}",
                    id:id
                },
                cache: false,
                dataType: 'HTML',

                success: function(data){
                    console.log(data);
                    $('#result').html(data);
                    $('#result').addClass('alert alert-info alert-dismissible fade in');

                    // remove tr after successfully deleted data and the should be a successful or error message
                    location.reload();
                }
            });

        }
        else
        {
            return false;
        }
    });

    $('#category').on('change',function(e){
        var cat = e.target.value;
        console.log(cat);

        $.ajax({
            type:'get',
            url:'{{url('category?cat=')}}'+cat,
            dataType:'HTML',

            success:function(data){
                console.log("data");
                // var people = data;
                // console.log(people);
                $('.table').html(data);
                // location.reload();
            }
        });

        // $.get('/category?cat='+cat, function(data){
        //     console.log(data);
        //     $('#result_pag').html(data);
        //
        // });
    });

    {{--$(document).on('click','.pagination a', function(e){--}}
        {{--e.preventDefault();--}}
        {{--// console.log('Ok');--}}

        {{--var url = $(this).attr('href').split('page=')[1];--}}
        {{--// console.log(url);--}}
        {{--$.ajax({--}}
            {{--type: 'get',--}}
            {{--url:'{{url('post_view?page=')}}'+url,--}}
            {{--dataType: 'HTML',--}}

            {{--success:function (data) {--}}
                {{--console.log(data);--}}
                {{--$('.table').html(data);--}}
            {{--}--}}

        {{--});--}}

    {{--});--}}

</script>
</body>
</html>

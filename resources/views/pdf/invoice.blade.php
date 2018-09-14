
{{--<h1 align="center">{{$output['name']}}'s information's </h1>--}}
{{--<br><br>--}}

{{--<img src="E:\Downloads\logo.png" width="700" height="200" alt="Responsive image">--}}
{{--{{$output->nsame}}--}}
{{--<p>Name: {{$output['name']}}</p>--}}
{{--<p>Student Id: {{$output['student_id']}}</p>--}}
{{--<p>Department: {{$output['department']}}</p>--}}
{{--<p>Batch: {{$output['batch']}}</p>--}}


        <!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Create two columns/boxes that floats next to each other */
        nav {
            float: left;
            width: 30%;
            height: 300px; /* only for demonstration, should be removed */
            background: #ccc;
            padding: 20px;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            float: left;
            padding: 10px;
            width: 100%;
            background-color: #f1f1f1;
            height: 500px; /* only for demonstration, should be removed */
        }

        /* Clear floats after the columns */
        section:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, article {
                width: 100%;
                height: auto;
            }
        }
        table, th, td {
            border: 1px solid black;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

@foreach($outputs as $output)
    <body>

    <header>
        <h2>{{$output['name']}}'s information's</h2>

    </header>

    <section>

        <article>
            <img src="E:\Downloads\logo.png" width="600" height="100" alt="Responsive image" align="center">
            <br>
            <br>
            <table class="table" style="width:100%">
                <tbody class="thead-dark">
                <tr>
                    <th scope="row">1</th>
                    <td>name:</td>
                    <td>{{$output['name']}}</td>
                </tr>

                <tr>
                    <th scope="row">2</th>
                    <td>Student ID:</td>
                    <td>{{$output['student_id']}}</td>
                </tr>

                <tr>
                    <th scope="row">3</th>
                    <td>Gender:</td>
                    <td>{{$output['gender']}}</td>
                </tr>

                <tr>
                    <th scope="row">4</th>
                    <td>Department:</td>
                    <td> {{$output['department']}}</td>
                </tr>

                <tr>
                    <th scope="row">5</th>
                    <td>Batch:</td>
                    <td>{{$output['batch']}}</td>
                </tr>

                </tbody>

            </table>
        </article>
    </section>

    <footer>
        <div align="right"> page:1</div>

        <div align="left">  {{date('Y-m-d H:i:s')}}</div>
    </footer>

    </body>
    <div class="page-break"></div>

@endforeach
</html>


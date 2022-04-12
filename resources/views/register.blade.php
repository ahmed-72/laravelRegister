<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @include('includes.pageStyle')
</head>

<body>
    <center>
        <form action="{{URL('coursesDetails')}}" method="GET">
            <label for="courseName">course name</label><br>
            <select name="courseName" id="courseName" required>
                <option value="" disabled selected hidden>choose course name</option>
                @foreach($courses as $course)
                <option value="{{$course->CourseName}}">{{$course->CourseName}}</option>
                @endforeach
            </select> <br>
            <input type="submit" value="show details"><br>
        </form>
        <p>
            <a id="aStyle" href="{{URL('login')}}" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
        </p> <br><br>

        <hr>
        <H3>Courses that have been registed successfully:</H3>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Register Status</th>
            </tr>

            @foreach($Rcourses as $Rcourses)
            <tr>
                <th>{{$Rcourses->CourseID}}</th>
                <th>{{$Rcourses->CourseName}}</th>
                <th>{{$Rcourses->RegisterStatus}}</th>
                <th><a href="{{URL('delete/'.$Rcourses->CourseID)}}">DELETE</a></th>

                @endforeach
        </table>

    </center>



</body>

</html>
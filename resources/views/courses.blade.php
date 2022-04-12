<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coursesDetails</title>
    @include('includes.pageStyle')
</head>
<center>
    <table>
        <tr>
            <th>course id</th>
            <th>course name</th>
            <th>course class</th>
            <th>course dates</th>
        </tr>
        @foreach($courses as $course)
        <tr>
            <th>{{$course->CourseID}}</th>
            <th>{{$course->CourseName}}</th>
            <th>{{$course->CourseClass}}</th>
            <th>{{$course->CourseDates}}</th>
            <th><a href="{{URL('register/'.$course->CourseID.'/'.$course->CourseName)}}">register</a></th>

            @endforeach
    </table>
</center>
</body>

</html>
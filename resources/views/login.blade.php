<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    @include('includes.pageStyle')
</head>

<body>
    <center>
        <form action="{{URL('loginCheck')}}" method="get">
            <label for="id">enter id</label><br>
            <input type="text" name="id" id="id" required><br>
            <label for="password">enter password</label><br>
            <input type="text" name="password" id="password" required><br>
            <input type="submit" value="login">
        </form>
        <h1>{{$result}}</h1>
    </center>
</body>

</html>
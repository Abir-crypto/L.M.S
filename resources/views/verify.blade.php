<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>L.M.S</title>
</head>
<body>
    <div class="container">
        <div class="container center-align">
            <a href="{{route('verify', ['student'=>$student->id, 'verification'=>$student->verification])}}" class="btn btn-large blue lighten-2">Verify Email</a>
        </div>
    </div>
</body>
</html>

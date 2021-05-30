<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Register</title>
</head>
<body>

<div class="container content-center w-1/4 center-align border-2 p-8 mt-24 shadow-lg">
    <p class="flow-text ">
        Registration Form
    </p>
    <form action="{{route('sign.up')}}" method="post">
        @csrf
        <input type="text" name="full_name" placeholder="Full Name" class="input-field">
        <input type="email" name="email" placeholder="Email" class="input-field">
        <input type="password" name="password" placeholder="Password" class="input-field">

        <p class="flow-text">
            <label>
                <input name="group" type="radio" value="0"/>
                <span>Student</span>
            </label>
        </p>
        <p class="flow-text">
            <label>
                <input name="group" type="radio" value="1"/>
                <span>Librarian</span>
            </label>
        </p>
        <button type="submit" class="btn btn-large orange darken-2 m-8">Sign up</button>
    </form>
</div>

</body>
</html>

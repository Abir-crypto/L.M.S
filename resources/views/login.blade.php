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
    <div class="container content-center w-1/3 center-align border-2 p-8 mt-24 shadow-lg">

        <x-alert/>
        <div class="container mb-8 mt-8">
            <p class="flow-text">Give username and password</p>
        </div>

        <div class="container">
            <form action="{{route('login.user')}}" method="post">
                @csrf
                <input type="text" name="email" placeholder="Email" class="input-field validate placeholder-red-300" />
                <input type="password" name="password" placeholder="Password" class="input-field validate placeholder-red-300" />

                <p class="flow-text">
                    <label>
                        <input name="group" type="radio" value="1" />
                        <span>Student</span>
                    </label>
                </p>
                <p class="flow-text">
                    <label>
                        <input name="group" type="radio" value="0"/>
                        <span>Librarian</span>
                    </label>
                </p>

                <button type="submit" class="btn btn-large  light-blue darken-2 mt-12 rounded">Login</button>
            </form>
        </div>
        <div class="container mt-12 underline">
            <a href="#" class="red-text">Forgot Password</a> <br>
            <a href="{{route('register.page')}}" class="blue-text">Register here</a>
        </div>
    </div>


</body>
</html>

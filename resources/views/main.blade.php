<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>L.M.S</title>
</head>
<body class="green accent-1">

    <form action="{{route('logout')}}" method="get" style="display: none" id="logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <nav>
        <div class="nav-wrapper blue lighten-3">
            <a href="#!" class="brand-logo">L.M.S</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('home')}}" class="hoverable hover:text-black">Home</a></li>
                <li><a href="{{route('show.all.books')}}" class="hoverable hover:text-black">All Books</a></li>
                @if(session()->has('student_id'))
                    <li><a href="{{route('show.all.orders')}}" class="hoverable hover:text-black">All Orders</a></li>
                @elseif(session()->has('librarian_id'))
                    <li><a href="{{route('show.all.books')}}" class="hoverable hover:text-black">All Requests</a></li>
                @endif
                <li><a onclick="document.getElementById('logout').submit();" class="hoverable hover:text-black">Logout</a></li>

            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('show.all.books')}}">All Books</a></li>
        <li><a onclick="document.getElementById('logout').submit();">Logout</a></li>
    </ul>

    @yield('content')

    <!-- Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>

</body>
</html>

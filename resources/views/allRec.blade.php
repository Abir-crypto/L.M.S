@extends('main')
@section('content')
    <div class="container">
        <div class="container z-depth-3  light-blue lighten-5">
            <x-alert/>
            <div class="container row shadow-lg p-4 light-blue lighten-4">
                <form action="">
                    <input type="text" placeholder="Search.." name="search" class="input-field col s9">
                    <button type="submit" class="col s3 btn-large btn-flat waves-effect waves-light hover:bg-blue-200"><i class="material-icons">search</i></button>
                </form>
            </div>
            <ul class="collection">
                @foreach($recommendation as $book)

                    <li class="collection-item avatar hover:bg-gray-200">
                            {{--                    <img src="images/yuna.jpg" alt="" class="circle">--}}
                        <span class="title font-bold text-2xl blue-text">{{$book->book_name}}</span>
                        <p class="orange-text">Genre: <span class="purple-text">{{$book->genre}}</span> <br>
                            Author: <span class="purple-text">{{$book->author}}</span>
                        </p>

                        <form action="{{route('delete.recommend', $book->id)}}" method="post" style="display: none" id="{{'recommend-delete-'.$book->id}}">
                            @csrf
                            @method('patch')
                        </form>
                        <a onclick="document.getElementById('recommend-delete-{{$book->id}}').submit();" class="hoverable secondary-content btn-floating btn-large waves-effect waves-light white"><i class="material-icons red-text">close</i></a>

                    </li>

                @endforeach
            </ul>
        </div>
    </div>
@endsection

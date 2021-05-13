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

            @if(session()->has('librarian_id'))
                <div class="container">
                    <span class="mr-4">Add Book Here</span><a href="{{route('add.book.page')}}" class="z-depth-5 btn-floating btn-large waves-effect waves-light white"><i class="material-icons blue-text">add</i></a>
                </div>
            @else
                <div class="container">
                    <span class="mr-4">Add Book Recommendation</span><a href="{{route('add.book.page')}}" class="z-depth-5 btn-floating btn-large waves-effect waves-light white"><i class="material-icons blue-text">add</i></a>
                </div>
            @endif

            <ul class="collection">
                @foreach($books as $book)
                <li class="collection-item avatar hover:bg-gray-200">
{{--                    <img src="images/yuna.jpg" alt="" class="circle">--}}
                    <span class="title font-bold text-2xl blue-text">{{$book->book_name}}</span>
                    <p class="orange-text">Genre: <span class="purple-text">{{$book->genre}}</span> <br>
                        Author: <span class="purple-text">{{$book->author}}</span> <br>
                        Available: <span class="green-text">{{$book->count}}</span>
                    </p>
                    @if(session()->has('student_id'))
                        <a href="{{route('add.to.cart', ['book'=>$book->id])}}" class="secondary-content btn-floating btn-large waves-effect waves-light red"><i class="material-icons">shopping_cart</i></a>
                    @elseif(session()->has('librarian_id'))
                        <form action="{{route('delete.book', $book->id)}}" method="post" style="display: none" id="{{'book-delete-'.$book->id}}">
                            @csrf
                            @method('patch')
                        </form>
                        <a onclick="document.getElementById('book-delete-{{$book->id}}').submit();" class="hoverable secondary-content btn-floating btn-large waves-effect waves-light white"><i class="material-icons red-text">delete</i></a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

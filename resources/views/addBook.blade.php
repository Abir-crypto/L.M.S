@extends('main')
@section('content')
    <x-alert/>
    <div class="container content-center w-1/4 center-align border-2 p-8 mt-24 z-depth-5 blue lighten-5">
        <p class="flow-text ">
            Give Book Details
        </p>
        @if(session()->has('librarian_id'))
        <form action="{{route('add.book')}}" method="post">
            @csrf
            <input type="text" name="book_name" placeholder="Book Name" class="input-field">
            <input type="text" name="genre" placeholder="Genre" class="input-field">
            <input type="text" name="author" placeholder="Author" class="input-field">
            <input type="number" name="count" placeholder="Count" class="input-field">


            <button type="submit" class="btn btn-large orange darken-2 m-8">Add Book</button>
        </form>
        @elseif(session()->has('student_id'))
            <form action="{{route('recommend.book')}}" method="post">
                @csrf
                <input type="text" name="book_name" placeholder="Book Name" class="input-field">
                <input type="text" name="genre" placeholder="Genre" class="input-field">
                <input type="text" name="author" placeholder="Author" class="input-field">

                <button type="submit" class="btn btn-large orange darken-2 m-8">Add Recommendation</button>
            </form>
        @endif
    </div>
@endsection

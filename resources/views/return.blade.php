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
                @foreach($books_taken as $book)
                    @if($book->permission == true)
                        <li class="collection-item avatar hover:bg-gray-200">
                            {{--                    <img src="images/yuna.jpg" alt="" class="circle">--}}
                            <span class="title font-bold text-2xl blue-text">{{$book->book_name}}</span>
                            <p class="black-text">
                                Return Date: <span>{{$book->return_date}}</span> <br>
                            </p>

                            <form action="{{route('return.book', $book->id)}}" method="post" style="display: none" id="{{'order-accept-'.$book->id}}">
                                @csrf
                                @method('patch')
                            </form>
                            <a onclick="document.getElementById('order-accept-{{$book->id}}').submit();" class="hoverable secondary-content btn-floating btn-large waves-effect waves-light green"><i class="material-icons">check</i></a>

                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection

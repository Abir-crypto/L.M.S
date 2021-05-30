@extends('main')
@section('content')
    <style>
        .row div{
            padding: 2rem;
            margin: 2rem;
        }
        .collection li:nth-of-type(1n+7) {
            display: none;
        }

    </style>

    <div class="row container">
        <div class="col s6 left-align">
            <p class="text-2xl font-bold">Welcome</p><br>
            @if(session()->has('student_id'))

                <p class="text-2xl font-bold">{{$student->full_name}}</p>
            @elseif(session()->has('librarian_id'))
                <p class="text-2xl font-bold">{{$librarian->full_name}}</p>
            @endif
        </div>

    </div>



    <div class="container">
        <div class="row">
            <div class="col s6 border-2 border-black hover:border-green-700 hoverable z-depth-5 grey darken-4">
                <ul class="collection with-header">
                    <li class="collection-header"><h4 class="font-bold text-2xl">Book List</h4></li>
                    @foreach($books as $book)
                    <li class="collection-item hover:bg-gray-500 hover:text-white">{{$book->book_name}}</li>
                    @endforeach

                </ul>
                <a href="{{route('show.all.books')}}" class="btn m-4 ml-0 waves-effect waves-light white black-text shadow-lg">Show All Books</a>
            </div>
            @if(session()->has('student_id'))
                <div class="col s5 border-2 border-black hover:border-green-700 hoverable z-depth-5 grey darken-42">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4 class="font-bold text-2xl">Book Ordered</h4></li>
                        @foreach($book_taken as $book)
                            <li class="collection-item hover:bg-gray-500 hover:text-white">{{$book->book_name}}</li>
                        @endforeach
                    </ul>
                    <a href="{{route('show.all.orders')}}" class="btn m-4 ml-0 waves-effect waves-light white black-text shadow-lg">Show All Orders</a>
                </div>
            @elseif(session()->has('librarian_id'))
                <div class="col s5 border-2 border-black hover:border-green-700 hoverable z-depth-5 grey darken-4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4 class="font-bold text-2xl">Book Requests</h4></li>
                        @foreach($book_taken as $book)
                            @if($book->permission == false)
                                <li class="collection-item hover:bg-gray-500 hover:text-white">{{$book->book_name}} is ordered</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{route('show.all.requests')}}" class="btn m-4 ml-0 waves-effect waves-light white black-text shadow-lg">Show All Requests</a>
                </div>
            @endif
        </div>
        @if(session()->has('librarian_id'))
            <div class="row">
                <div class="col s6 border-2 border-black hover:border-green-700 hoverable z-depth-5 grey darken-4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4 class="font-bold text-2xl">Recommendation List</h4></li>
                        @foreach($recommendation as $recommend)
                            <li class="collection-item hover:bg-gray-500 hover:text-white">{{$recommend->book_name}}</li>
                        @endforeach

                    </ul>
                    <a href="{{route('show.all.recommend')}}" class="btn m-4 ml-0 waves-effect waves-light white black-text shadow-lg">Show All Recommendation</a>
                </div>
                <div class="col s5 border-2 border-black hover:border-green-700 hoverable z-depth-5 grey darken-4">
                    <ul class="collection with-header">
                        <li class="collection-header"><h4 class="font-bold text-2xl">Return List</h4></li>
                        @foreach($return as $rtn)
                            <li class="collection-item hover:bg-gray-500 hover:text-white">{{$rtn->book_name}}</li>
                        @endforeach

                    </ul>
                    <a href="{{route('return.all.book')}}" class="btn m-4 ml-0 waves-effect waves-light white black-text shadow-lg">Show All Taken Books</a>
                </div>
            </div>
        @endif
    </div>
@endsection

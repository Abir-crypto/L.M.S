<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_taken;
use App\Models\Librarian;
use App\Models\Recommendation;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('login');
    }

    public function home(Request $request){

        if(session()->has('student_id')) {
            $sid = $request->session()->get('student_id');

            $student_array = Student::where('id', $sid)->get();
            $student = $student_array[0];

            $books = Book::all();
            $book_taken = Book_taken::where('student_id', $sid)->get();
            $recommendation = Recommendation::all();
//        dd($books);
            return view('home', compact('student', 'books', 'book_taken' , 'recommendation'));
        }
        else{

            $lid = $request->session()->get('librarian_id');

            $librarian_array = Librarian::where('id', $lid)->get();
            $librarian = $librarian_array[0];

            $books = Book::all();
            $book_taken = Book_taken::all();
            $recommendation = Recommendation::all();
//        dd($books);
            return view('home', compact('librarian', 'books', 'book_taken', 'recommendation'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Book_taken;
use App\Models\Recommendation;
use App\Models\Student;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('login');
    }

    public function viewAllBooks(){
        $books = Book::all();
        return view('allBooks', compact('books'));
    }

    public function addToCart(Book $book){
        $sid = session()->get('student_id');
//        $student = Student::find($sid);
        $allbooks = Book_taken::where('student_id', $sid)->get('book_id');
        foreach ($allbooks as $bk){
            if($bk->book_id == $book->id){
                return redirect()->back()->with('msg', 'Book Already Added');
            }
        }
        if($book->count>0) {
            $data = [
                'student_id' => $sid,
                'book_id' => $book->id,
                'book_name' => $book->book_name,
                'return_date' => now(),
            ];
            Book_taken::create($data);
            $count = $book->count;
            $count--;
            $book->count = $count;
            $book->save();
            return redirect()->back()->with('msg', 'Book Added Successfully');
        }
        else{
            return redirect()->back()->with('msg', 'No copy Available');
        }
    }

    public function viewAllOrders(){
        $sid =  session()->get('student_id');
        $books_taken = Book_taken::where('student_id', $sid)->get();

        return view('allOrders', compact('books_taken'));
    }

    public function viewAllRequests(){
        $books_taken = Book_taken::all();

        return view('allRequest', compact('books_taken'));
    }

    public function deleteBook(Book $book){
        $book->delete();
        return redirect()->back()->with('msg', 'Book Deleted');
    }

    public function gotoBookAddPage(){
        return view('addBook');
    }

    public function addBook(BookRequest $request){
        Book::create($request->all());
        return redirect()->back()->with('msg', 'Book Added');
    }

    public function recommendBook(BookRequest $request){
        Recommendation::create($request->all());
        return redirect()->back()->with('msg', 'Book Recommended');
    }

    public function viewAllRecommends(){
        $recommendation = Recommendation::all();
        return view('allRec', compact('recommendation'));
    }

    public function deleteRec(Recommendation $rec){
        $rec->delete();
        return redirect()->back()->with('msg', 'Book Recommendation Deleted');
    }


    public function deleteFromCart(Book_taken $book_taken){
        $book = Book::find($book_taken->book_id);
        $book->count++;
        $book->save();
        $book_taken->delete();
        return redirect()->back()->with('msg', 'Order Deleted');
    }
    public function acceptRequest(Book_taken $book_taken){
        $book_taken->permission = true;
        $book_taken->save();
        return redirect()->back()->with('msg', 'Request Accepted');
    }
}

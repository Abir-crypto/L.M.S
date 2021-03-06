<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Librarian;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class LoginController extends Controller
{

    public function gotoLoginPage(){
        return view('login');
    }

    public function login(LoginRequest $request){

        if($request->group == '1'){
            $student = Student::where('email', $request->email)->first();
            if($student == null)
                return redirect()->back()->with('msg','No user found');
            if(Hash::check($request->password, $student->password)){
                $request->session()->put('student_id', $student->id);
                return redirect()->route('home');
            }
            else{
                return redirect()->back()->with('msg','Credential not matching');
            }
        }
        else if($request->group == '0'){
            $librarian = Librarian::where('email', $request->email)->first();

            if($librarian == null)
                return redirect()->back()->with('msg','No user found');
            if(Hash::check($request->password, $librarian->password)){
                $request->session()->put('librarian_id', $librarian->id);
                return redirect()->route('home');
            }
            else{
                return redirect()->back()->with('msg','Credential not matching');
            }

        }
        return redirect()->back()->with('msg', 'Something is wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

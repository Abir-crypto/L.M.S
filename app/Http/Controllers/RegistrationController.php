<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Librarian;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class RegistrationController extends Controller
{
    //

//    event(new Registered($user));

    public function gotoRegisterPage(){
        return view('register');
    }

    public function signUp(Request $request){
        if($request->group == 0) {
            $student = new Student();
            $student->full_name = $request->full_name;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->save();
        }

        else if($request->group == 1){
            $librarian = new Librarian();
            $librarian->full_name = $request->full_name;
            $librarian->email = $request->email;
            $librarian->password = Hash::make($request->password);

            $librarian->save();
        }
        return redirect()->route('login.page')->with('msg', 'please Verify email');
    }

    public function verificationCode(Student $student){
        $student->isVerified = true;
        return redirect()->route('login.page');
    }

    public function verifyMail(Student $student){
        return view('verify', compact('student'));
    }
}

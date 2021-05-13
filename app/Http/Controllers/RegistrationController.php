<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    //

//    event(new Registered($user));

    public function gotoRegisterPage(){
        return view('register');
    }

    public function RegisterUser(){
        dd(session()->get('student_id'));
    }
}

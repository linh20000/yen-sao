<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginUser(){
        if (Auth::check()) {
            return redirect(route('home'));
        } 
        return view('frontend.login.login');
    }


    public function userRegister(){
        return view('frontend.login.register');
    }

    
}

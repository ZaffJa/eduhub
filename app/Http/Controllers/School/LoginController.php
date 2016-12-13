<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('school.auth.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))) {

            return redirect('school/')->with('status','Welcome eduhub!');

        } else {

            return redirect()->back()
                             ->withErrors('These credentials does not exist in our database.')
                             ->withInput();

        }
    }
}

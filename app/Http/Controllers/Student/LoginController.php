<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('student.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){

            $user = Auth::user();
            
            if($user->hasRole('student') != null){
                return redirect()->action('DashboardController@view');
            }

        }

        Auth::logout();

        return redirect()
                ->back()
                ->withErrors('These credentials does not exist in our database.');

    }
}

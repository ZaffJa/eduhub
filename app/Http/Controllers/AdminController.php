<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        if($user = Auth::attempt($request->only('email','password')))
        {
            if(Auth::user()->hasRole('admin')){
                return redirect()->action('InstitutionController@viewAllInstitution');
            }else{
                return redirect()
                        ->back()
                        ->withErrors('These credentials do not match our database');
            }
        }
        return redirect()
            ->back()
            ->withErrors('These credentials do not match our database');
    }
}

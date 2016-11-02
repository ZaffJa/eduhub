<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('student.auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:75',
            'email' => 'required|unique:users|max:45|email',
            'password' => 'required|alpha_num|max:20|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $request['password'] = bcrypt($request->password);

        $user = User::create($request->except(['password_confirmation','_token']));

        return redirect()->action('Student\DashboardController@view');
    }
}

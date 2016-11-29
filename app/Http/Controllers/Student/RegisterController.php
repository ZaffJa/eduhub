<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

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

        Role::create([
           'user_id'=>$user->id,
            'role_id'=>4
        ]);

        //Login the user
        Auth::login($user);

        return redirect()->action('Student\DashboardController@view');
    }
}

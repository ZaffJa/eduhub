<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Auth;


class DashboardController extends Controller
{

  public function view()
  {
        $user = Auth::user();
  		return View::make('student.home.dashboard')->with(compact('user'));
  }


}

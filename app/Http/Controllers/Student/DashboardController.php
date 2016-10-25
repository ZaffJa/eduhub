<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;


class DashboardController extends Controller
{

  public function view()
  {
  		return View::make('student.home.dashboard');
  }


}

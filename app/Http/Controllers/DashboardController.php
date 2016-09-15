<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Institution;
use App\Models\Faculty;
use App\Models\Course;
use Auth;




class DashboardController extends Controller
{
  public function dashboard()
  {
      return view('client.dashboard');
  }
  public function profile()
  {
      return view('client.edit-profile');
  }

  public function getCourses()
  {
    $v = Institution::whereClientId(Auth::user()->id)->firstOrFail();
    return $v->courses;
  }
}

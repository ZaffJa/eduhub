<?php

namespace App\Http\Controllers\Student;

use App\Models\Student\SpmResult;
use App\Models\Student\PersonalityResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Auth;


class DashboardController extends Controller
{

  public function view()
  {
        $user = Auth::user();
        $spm_results = SpmResult::whereUserId(Auth::user()->id)->get();
        $personality = PersonalityResult::whereUserId(Auth::user()->id)->first();

    	return View::make('student.home.dashboard')->with(compact('user','spm_results','personality'));
  }


}

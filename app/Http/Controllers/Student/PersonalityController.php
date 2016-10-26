<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;


class PersonalityController extends Controller
{

  public function view()
  {
  	return View::make('student.personality.view');
  }

  public function result()
  {
  	return View::make('student.personality.result');
  }

  public function set1()
  {
    session(['r' => 0]);
    session(['a' => 0]);
    session(['e' => 0]);
    session(['i' => 0]);
    session(['s' => 0]);
    session(['c' => 0]);


  	return View::make('student.personality.set1');
  }

  public function set2(Request $r)
  {
    
    
    return $r;
  }

}

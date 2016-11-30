<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class SchoolController extends Controller
{
  public function view()
  {
    return View::make('school.main.dashboard');
  }

  public function map()
  {
  	return View::make('school.map.map');
  }

}

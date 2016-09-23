<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ShortController extends Controller
{

  public function dashboard()
  {


    return view('short.dashboard');
  }


}

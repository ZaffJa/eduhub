<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScholarshipController extends Controller
{
  public function add()
  {
      return view('client.scholarship.add-scholar');
  }
  
}

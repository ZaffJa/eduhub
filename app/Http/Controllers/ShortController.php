<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortCourse\Provider;
use View;
use Auth;

class ShortController extends Controller
{

  public function dashboard()
  {
    return view('short.dashboard');
  }

  public function editprofile()
  {
    

    return view('short.profile.edit');
  }

  public function viewProfile()
  {
  	$provider = Auth::user()->short_provider;
  	$providerType = Auth::user()->short_provider->type;

  	return View::make('short.profile.view', compact('provider','providerType'));
  }

  public function viewCourse()
  {
    return view('short.course.view');
  }

  public function addCourse()
  {
    return view('short.course.add');
  }


}

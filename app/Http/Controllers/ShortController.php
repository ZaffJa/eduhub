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

  public function viewProfile()
  {
  	$provider = Auth::user()->short_provider;
  	$providerType = Auth::user()->short_provider->type;
  	// return Auth::user()->short_provider->type;
  	return View::make('short.profile.view', compact('provider','providerType'));
  }


}

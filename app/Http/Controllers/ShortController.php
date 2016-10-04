<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortCourse\Provider;
use App\Models\ShortCourse\ProviderType;
use App\Models\BankType;
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
    $providerType = ProviderType::pluck('name','id');
    $bankType = BankType::pluck('name','id');
    $provider = Auth::user()->short_provider;

    return View::make('short.profile.edit',compact('providerType','bankType','provider'));
  }

  public function updateProfile()
  {
    
  }

  public function viewProfile()
  {
  	$provider = Auth::user()->short_provider;
  	$providerType = Auth::user()->short_provider->type;

    // return $provider->bank;
  	return View::make('short.profile.view', compact('provider'));
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

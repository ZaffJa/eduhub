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

  public function updateProfile(Request $r)
  {

    try{
    
        $provider =  Provider::whereId(Auth::user()->short_provider->id)->firstOrFail();

        $provider->name =  $r->name;
        $provider->headline = $r->headline;
        $provider->abbreviation = $r->abbreviation;
        $provider->established = $r->established;
        $provider->location =  $r->location;
        $provider->type_id = $r->type_id;
        $provider->website = $r->website;
        $provider->facebook = $r->facebook;
        $provider->instagram = $r->instagram;
        $provider->phone = $r->phone;
        $provider->description = $r->description;
        $provider->bank_type = $r->bank_type;
        $provider->bank_account = $r->bank_account;
        $provider->save();

        return  redirect()->back()->with(['status'=>'The provider name '.$provider->name.' has been updated.']);


    }catch(\Illuminate\Database\QueryException $ex){
                return redirect()
                            ->back()
                            ->withErrors($ex->errorInfo[2])
                            ->withInput();
        }

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

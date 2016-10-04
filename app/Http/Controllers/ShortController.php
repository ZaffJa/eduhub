<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortCourse\Provider;
use App\Models\ShortCourse\ProviderType;
use App\Models\ShortCourse\Course;
use App\Models\BankType;
use Validator;
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

  	return View::make('short.profile.view', compact('provider'));
  }

  public function viewCourse()
  {
    $course = Course::whereProviderId(Auth::user()->short_provider->id)->get();

    return View::make('short.course.view',compact('course'));
  }

  public function addCourse()
  {
    return view('short.course.add');
  }

  public function storeCourse(Request $r)
  {

         $validator = Validator::make($r->all(), [
             'name_en' => 'required|max:255',
             'name_ms' => 'required|max:255',
             'location' => 'required',
             'price' => 'required',
         ]);

     if ($validator->fails()) {
           return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
       }

      try{
        $course = new Course;
        
        $course->provider_id = Auth::user()->short_provider->id;
        $course->name_en = $r->name_en;
        $course->name_ms = $r->name_ms;
       
        if($r->description)
          $course->description = $r->description;
       
        if($r->period_value_min)
          $course->period_value_min = $r->period_value_min;
       
        if($r->period_value_max)
          $course->period_value_max = $r->period_value_max;
       
        if($r->credit_hours)
          $course->credit_hours = $r->credit_hours;
       
        if($r->accredited)
          $course->accredited = $r->accredited;
       
        if($r->commencement)
          $course->commencement = $r->commencement;
       
        if($r->qualification)
          $course->qualification = $r->qualification;
       
        if($r->mqa_reference_no)
          $course->mqa_reference_no = $r->mqa_reference_no;
       
        if($r->code)
          $course->code = $r->code;
       
        if($r->start_date)
          $course->start_date = $r->start_date;
       
        if($r->length)
          $course->length = $r->length;
       
        if($r->attendance)
          $course->attendance = $r->attendance;
       
        if($r->class_size)
          $course->class_size = $r->class_size;
       
        $course->price = $r->price;
       
        if($r->exam_fee)
          $course->exam_fee = $r->exam_fee;
       
        if($r->note)
          $course->note = $r->note;
       
        if($r->language)
          $course->language = $r->language;
       
        if($r->hrdf_scheme)
          $course->language = $r->hrdf_scheme;
       
        if($r->learning_outcome)
          $course->learning_outcome = $r->learning_outcome;
       
        $course->location = $r->location;

        $course->save();

      }catch(\Illuminate\Database\QueryException $e){
        return $e->errorInfo;
      }

      return redirect()
              ->route('short.course.view')
              ->with(['status'=>'Course '.$course->name_en.' successfully added']);
  }

}

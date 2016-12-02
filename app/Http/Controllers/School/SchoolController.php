<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School\School;
use App\Models\School\SchoolLocation;
use Illuminate\Http\Request;
use View;
class SchoolController extends Controller
{
  public function view()
  {
    $schoolLocation  =  SchoolLocation::all();

    return View::make('school.main.dashboard',compact('schoolLocation'));
  }

  public function map()
  {
      $schoolLocation  =  SchoolLocation::all();
      return View::make('school.map.map',compact('schoolLocation'));
  }

  public function register()
  {
      return View::make('school.main.register-school');
  }
  public function edit($id)
  {
    $school = School::whereId($id)->first();
      return View::make('school.main.edit')->with('school',$school);
  }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | string | between:10,85',
            'type' => 'required | string | between:5,25',
            'ppd'  => 'required | string | between:5,25',
            'code' => 'required | integer | digits_between:4,15',
            'address' => 'required | string | between:15,85',
            'city' => 'required | string | between:3,65',
            'state' => 'required | string | between:3,30',
            'telephone' => 'required | string | between:8,15',
            'fax' => 'required | string | between:8,15',
        ],[

        ]);

        $school = School::create($request->except(['_token','lat','lng']));

        SchoolLocation::create([
          'school_id'=>$school->id,
          'latitude'=>$request->lat,
          'longtitude'=>$request->lng
          ]);

        return redirect()->back()->with('status','Successfully added new school');
    }

}

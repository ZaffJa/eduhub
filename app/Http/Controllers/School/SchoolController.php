<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School\School;
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

  public function register()
  {
      return View::make('school.main.register-school');
  }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | string | between:15,85',
            'type' => 'required | string | between:5,25',
            'ppd'  => 'required | string | between:5,25',
            'code' => 'required | integer | digits_between:4,15',
            'address' => 'required | string | between:15,85',
            'postcode' => 'required | integer | digits_between:4,10',
            'city' => 'required | string | between:8,65',
            'state' => 'required | string | between:5,30',
            'telephone' => 'required | string | between:8,15',
            'fax' => 'required | string | between:8,15',
        ],[

        ]);

        School::create($request->except(['_token']));

        return redirect()->back()->with('status','Successfully added new school');
    }

}

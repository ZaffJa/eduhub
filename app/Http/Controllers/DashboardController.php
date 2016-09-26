<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Institution;
use App\Models\InstitutionCourse;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Facility;
use Auth;
use View;

class DashboardController extends Controller
{
  public function dashboard()
  {
    if(Auth::user()->client != null){
      $institution_id = Auth::user()->client->institution->id;
      $institution = Institution::whereId($institution_id)->firstOrFail();
      $faculties =  Faculty::whereInstitutionId($institution_id)->get();
      $faculty_count =  count($faculties);
      $facility_count = Facility::whereInstitutionId($institution_id)->count();
      $course_count = InstitutionCourse::whereInstitutionId($institution_id)->count();
      return View::make('client.dashboard', compact('institution','faculty_count','facility_count','course_count'));
    }
    else{
      return redirect()->action('InstitutionController@requestInstitution');
    }


  }
  public function profile()
  {

      return View::make('client.edit-profile');
  }

  public function getCourses()
  {
    $v = Institution::whereClientId(Auth::user()->client->user->id)->firstOrFail();
    return $v->courses;
  }
}

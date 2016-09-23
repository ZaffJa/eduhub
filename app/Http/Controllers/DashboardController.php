<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\Institution;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Facility;
use Auth;
use View;

class DashboardController extends Controller
{
  public function dashboard()
  {
      $institution = Institution::whereId(Auth::user()->client->institution->id)->firstOrFail();

      $faculties =  Faculty::whereInstitutionId(Auth::user()->client->institution->id)->get();
      $faculty_count =  count($faculties);

      $facility_count = Facility::whereInstitutionId(Auth::user()->client->institution->id)->count();

      $course_count = Course::where('faculty_id','<=',$faculties->last()->id)->count();

      return View::make('client.dashboard', compact('institution','faculty_count','facility_count','course_count'));
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

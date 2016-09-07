<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Faculty;
use App\Models\StudyLevel;
use App\Models\StudyMode;
use App\Models\Course;
use App\Models\Institution;
use App\Models\Nec;
use App\Models\PeriodType;
use Validator;
use Auth;
use View;

class CourseNameController extends Controller
{
    public function getDetails()
    {
      $institution = Institution::whereClientId(Auth::user()->id)->firstOrFail();

      $faculties = Faculty::whereInstitutionId($institution->id)->pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');
      $nec = Nec::pluck('field','code');
      $period_type = PeriodType::pluck('name','id');

      return View::make('client.new-course',compact('faculties','levels','modes','nec','period_type'));
    }

    public function postCreateDetails(Request $r)
    {
      $validator = Validator::make($r->all(), [
             'course-name-eng' => 'required|max:255',
             'course-name-ms' => 'required|max:255',
             'faculty' => 'required',
             'level' => 'required',
             'mode' => 'required',
             'period' => 'required',
             'credit-hour' => 'required',
             'qualification-entry' => 'required',
             'approved' => 'required',
             'accredited' => 'required',
             'mqa' => 'required',
             'video-link' => 'required',
             'nec' => 'required',
         ]);

         if ($validator->fails()) {
             return redirect()
                         ->back()
                         ->withErrors($validator)
                         ->withInput();
         }

         try{
           $course = new Course;

           $course->faculty_id = $r->faculty;
           $course->nec_code = $r->nec;
           $course->nec_code = $r->nec;

         }catch(\Illuminate\Database\QueryException $e){
           return $r->all();
         }

    }
}

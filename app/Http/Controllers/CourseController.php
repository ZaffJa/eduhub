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

class CourseController extends Controller
{


    public function add()
    {
      $institution = Institution::whereClientId(Auth::user()->id)->firstOrFail();

      $faculties = Faculty::whereInstitutionId($institution->id)->pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');
      $nec = Nec::pluck('field','code');
      $period_type = PeriodType::pluck('name','id');

      return View::make('client.course.add',compact('faculties','levels','modes','nec','period_type'));
    }

    public function store(Request $r)
    {
      $validator = Validator::make($r->all(), [
             'name_eng' => 'required|max:255',
             'name_ms' => 'required|max:255',
             'faculty' => 'required',
             'level' => 'required',
             'mode' => 'required',
             'period' => 'required',
             'credit_hour' => 'required',
             'qualification-entry' => 'required',
             'approved' => 'required',
             'accredited' => 'required',
             'mqa' => 'required',
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
           $course->level_id = $r->level;
           $course->period_type_id = $r->period_type;
           $course->mode_id = $r->mode_id;
           $course->name_en = $r->name_en;
           $course->name_ms = $r->name_ms;
           $course->period_value_min = $r->period_value_min;
           $course->period_value_max = $r->period_value_max;
           $course->credit_hours = $r->credit_hours;
           $course->accredited = $r->accredited;

           $course->save();

         }catch(\Illuminate\Database\QueryException $e){
                return redirect()
                            ->back()
                            ->withErrors($ex)
                            ->withInput();
            }

        return  redirect()->back();

     }

     public function view()
     {
      $faculty = Faculty::whereInstitution_id(Auth::user()->institution->id)->pluck('id','name');
      $max_faculty_id = Faculty::whereInstitution_id(Auth::user()->institution->id)->max('id');

      $courses = Course::where('faculty_id','<=', $max_faculty_id)->get();
      $periodTypes = PeriodType::all();

      return View::make('client.course.view',compact('courses','periodTypes'));
     }

     public function edit($id)
     {
      $faculties = Faculty::pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');
      $nec = Nec::pluck('field','code');
      $period_type = PeriodType::pluck('name','id');

      $institution = Institution::whereClientId(Auth::user()->id)->firstOrFail();

      $course = Course::whereId($id)->firstOrFail();

      // return $course->faculty;
      return View::make('client.course.edit',compact('course','faculties','levels','modes','period_type')); 
     }
}

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
             // 'period' => 'required',
             'credit_hours' => 'required',
             'qualification' => 'required',
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
            $course->mode_id = $r->mode;
            $course->name_en = $r->name_en;
            $course->name_ms = $r->name_ms;
            $course->period_value_min = $r->period_value_min;
            $course->period_value_max = $r->period_value_max;
            $course->credit_hours = $r->credit_hours;
            $course->accredited = $r->accredited;
            $course->qualification = $r->qualification;
            $course->mqa_reference_no = $r->mqa;

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
      $faculty = Faculty::whereInstitutionId(Auth::user()->institution->id)->paginate(2);
      // return $faculty;
      // foreach ($faculty as $key) {
      //   return $key->courses;
      // }

      $periodTypes = PeriodType::all();

      return View::make('client.course.view',compact('faculty','periodTypes'));
     }
     public function viewCourse()
     {

      return View::make('client.course.course-info');
     }
     public function edit($id)
     {
      $faculties = Faculty::pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');
      $nec = Nec::pluck('field','code');
      $period_type = PeriodType::pluck('name','id');

      $institution = Institution::whereClientId(Auth::user()->id)->firstOrFail();

      $courses = Course::whereId($id)->firstOrFail();


      // return $course;
      return View::make('client.course.edit',compact('course','faculties','levels','modes','period_type','nec'));
     }

     public function update(Request $r,$id)
     {
        $course = Course::whereId($id)->firstOrFail();

        $course->faculty_id = $r->faculty_id;
        $course->nec_code = $r->nec_code;
        $course->level_id = $r->level_id;
        $course->period_type_id = $r->period_type_id;
        $course->mode_id = $r->mode_id;
        $course->name_en = $r->name_en;
        $course->name_ms = $r->name_ms;
        $course->period_value_min = $r->period_value_min;
        $course->period_value_max = $r->period_value_max;
        $course->credit_hours = $r->credit_hours;
        $course->accredited = $r->accredited;
        $course->qualification = $r->qualification;
        $course->approved = $r->approved;
        $course->mqa_reference_no = $r->mqa_reference_no;

        try{
          $course->save();
        }catch(\Illuminate\Database\QueryException $e){

        }

        return  redirect()->back()->with(['status'=>'The course name '.$course->name_en.' has been updated.']);
     }

    public function delete($id)
    {
      $course = Course::whereId($id)->firstOrFail();

      try {
        $course->delete();
      }catch(\Illuminate\Database\QueryException $ex){

      }

      return redirect()->back()->with(['status'=>'The course name '.$course->name_en.' has been deleted.']);
    }
}

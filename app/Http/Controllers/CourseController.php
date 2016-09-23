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
use App\Models\InstitutionCourse;
use App\Models\CourseFee;
use Validator;
use Auth;
use View;

class CourseController extends Controller
{


    public function add()
    {
      $institution = Institution::whereClientId(Auth::user()->id)->firstOrFail();
      $institution = Institution::whereClientId(Auth::user()->client->user->id)->firstOrFail();

      $faculties = Faculty::whereInstitutionId($institution->id)->pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');
      $nec = Nec::pluck('field','code');
      $period_type = PeriodType::pluck('name','id');

      try{
        return view('client.course.add')
                              ->with(compact('faculties','levels','modes','nec','period_type','fee_types'))
                              ->with(['status'=>'hahaha']);
      }catch(Error $x){
        return view('client.course.add')
                              ->with(compact('faculties','levels','modes','nec','period_type','fee_types'))
                              ->withError(['status'=>'hahaha']);
      }
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
             'alumni' => 'required',
             'coq' => 'required',
             'residential' => 'required',
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
            $course->name_en = $r->name_eng;
            $course->name_ms = $r->name_ms;
            $course->period_value_min = $r->period_value_min;
            $course->period_value_max = $r->period_value_max;
            $course->credit_hours = $r->credit_hours;
            $course->accredited = $r->accredited;
            $course->qualification = $r->qualification;
            $course->mqa_reference_no = $r->mqa;

            $course->save();

            //Add to institution course
            $is = new InstitutionCourse;
            $is->institution_id = Auth::user()->client->institution->id;
            $is->course_id = $course->id;

            $is->save();

            //Course Fee
            $alumni = new CourseFee;
            $alumni->course_id = $course->id;
            $alumni->fee_id = 1;
            $alumni->amount = $r->alumni;

            $alumni->save();

            $coq =  new CourseFee;
            $coq->course_id = $course->id;
            $coq->fee_id = 2;
            $coq->amount =  $r->coq;
            
            $coq->save();

            $residential = new CourseFee;
            $residential->course_id = $course->id;
            $residential->fee_id = 3;
            $residential->amount = $r->residential;

            $residential->save();

            $service = new CourseFee;
            $service->course_id = $course->id;
            $service->fee_id = 4;
            $service->amount = $r->service;

            $service->save();

            $tuition = new CourseFee;
            $tuition->course_id = $course->id;
            $tuition->fee_id = 5;
            $tuition->amount = $r->tuition;

            $tuition->save();

          return  redirect()
                    ->route('client.course.view')
                    ->with(['status'=>'The course '. $course->name_en .' has been added.']);

         }catch(\Illuminate\Database\QueryException $ex){
                return redirect()
                            ->back()
                            ->withErrors($ex->errorInfo[2])
                            ->withInput();
          }

     }

     public function view()
     {

      $faculty = Faculty::whereInstitutionId(Auth::user()->client->institution->id)->paginate(2);

      $periodTypes = PeriodType::all();

      return View::make('client.course.view',compact('faculty','periodTypes'));
     }

     public function viewCourse($id)
     {
      $course = Course::whereId($id)->firstOrFail();

      $courseFee = CourseFee::whereCourse_id($id)->get();

      return View::make('client.course.course-info',compact('course','courseFee'));
     }

     public function edit($id)
     {
      $faculties = Faculty::pluck('name','id');

      $levels = StudyLevel::pluck('name','id');

      $modes = StudyMode::pluck('name','id');

      $nec = Nec::pluck('field','code');

      $period_type = PeriodType::pluck('name','id');

      $institution = Institution::whereClientId(Auth::user()->client->user->id)->firstOrFail();

      $course = Course::whereId($id)->firstOrFail();

      $courseFee = CourseFee::whereCourseId($id)->get();


      return View::make('client.course.edit',compact('course','faculties','levels','modes','period_type','nec','courseFee'));

     }

     public function update(Request $r,$id)
     {



      try{
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
        $course->save();

        $alumni = CourseFee::whereCourseIdAndFeeId($id,1)->first();

        if($alumni == null)
        {
        $alumni = new CourseFee;
        $alumni->course_id = $id;
        $alumni->fee_id = 1;
        }

        $alumni->amount = $r->alumni;
        $alumni->save();

        $coq = CourseFee::whereCourseIdAndFeeId($id,2)->first();
        if($coq == null)
        {
          $coq = new CourseFee;
          $coq->course_id = $id;
          $coq->fee_id = 2;
        }

        $coq->amount =  $r->coq;
        $coq->save();

        $residential = CourseFee::whereCourseIdAndFeeId($id,3)->first();
        if($residential == null)
        {
          $residential = new CourseFee;
          $residential->course_id = $id;
          $residential->fee_id = 3;
        }

        $residential->amount = $r->residential;
        $residential->save();

        $service = CourseFee::whereCourseIdAndFeeId($id,4)->first();
        if($service == null)
        {
          $service = new CourseFee;
          $service->course_id = $id;
          $service->fee_id = 4;
        }

        $service->amount = $r->service;
        $service->save();

        $tuition = CourseFee::whereCourseIdAndFeeId($id,5)->first();
        if($tuition == null)
        {
          $tuition = new CourseFee;
          $tuition->course_id = $id;
          $tuition->fee_id = 4;
        }

        $tuition->amount = $r->tuition;
        $tuition->save();

        return  redirect()->back()->with(['status'=>'The course name '.$course->name_en.' has been updated.']);

        }catch(\Illuminate\Database\QueryException $ex){
                return redirect()
                            ->back()
                            ->withErrors($ex->errorInfo[2])
                            ->withInput();
        }

     }

    public function delete($id)
    {
      $course = Course::whereId($id)->firstOrFail();

      try {
        $course->delete();
      }catch(\Illuminate\Database\QueryException $ex){
        return redirect()
                    ->back()
                    ->withErrors($ex->errorInfo[2])
                    ->withInput();
      }
      return redirect()
              ->action('CourseController@view')
              ->with(['status'=>'The course has been deleted.']);

    }


    public function postSearchCourse(Request $r)
    {
      if($r->term == null){
        return redirect()
                ->back()
                ->with(['status'=>'The search bar cannot be empty.']);
      }

      $ic = InstitutionCourse::whereInstitutionId(Auth::user()->client->institution->id)->get();
      $data = null;
      foreach ($ic as $c) {
        if (strpos(strtolower($c->course != null ? $c->course->name_en : 'null'), strtolower($r->term)) !== false) {
          // $data[] = $c->course->name_en;
          $data[] = $c->course != null ? $c->course->name_en : '';
        }
      }
      return response()->json($data);
    }

    public function postSearchCourseResult(Request $r)
    {
      $validator = Validator::make($r->all(), [
             'search_course' => 'required|max:255|min:10',
         ]);

         if ($validator->fails()) {
             return redirect()
                         ->back()
                         ->withErrors($validator)
                         ->withInput();
         }
      $ic = InstitutionCourse::whereInstitutionId(Auth::user()->client->institution->id)->get();
        foreach($ic as $c){ //Courses based on institution
          $course = $c->course->where('name_en','LIKE','%'.$r->search_course.'%')->first();
          if($course != null){
            break;
          }
        }
      if($course == null){
        return redirect()->back()->with('status','No result found for query '.$r->search_faculty);
      }else{
        return redirect()->route('client.course.edit',$course->id);
      }
    }
}

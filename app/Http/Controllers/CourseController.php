<?php

namespace App\Http\Controllers;

use App\Models\Student\SpmRequirementCourse;
use Illuminate\Database\QueryException;
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
use App\Models\PersonalityType;
use App\Models\Student\SpmSubject;
use App\Models\Student\SpmResult;
use Validator;
use Auth;
use View;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->core_spm_subjects = ['1', '2', '5', '6', '7'];
        $this->grades = [
            'A+' => 'A+',
            'A' => 'A',
            'A-' => 'A-',
            'B+' => 'B+',
            'B' => 'B',
            'C+' => 'C+',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E',
            'G' => 'G'
        ];

    }


    public function add()
    {
        $institutionId = Auth::user()->client->institution->id;

        $faculties = Faculty::whereInstitutionId($institutionId)->pluck('name', 'id');
        $levels = StudyLevel::pluck('name', 'id');
        $modes = StudyMode::pluck('name', 'id');
        $nec = Nec::pluck('field', 'code');
        $period_type = PeriodType::pluck('name', 'id');
        $personality_type = PersonalityType::pluck('type', 'id')->toArray();
        $personality_description = PersonalityType::pluck('description', 'id');
        $spm_subjects = SpmSubject::pluck('name', 'id');
        $grades = $this->grades;

        try {
            return view('client.course.add')
                ->with(compact('personality_type', 'personality_description', 'faculties', 'levels', 'modes', 'nec', 'period_type', 'fee_types', 'spm_subjects', 'grades'))
                ->with(['status' => 'hahaha']);
        } catch (Error $x) {
            return view('client.course.add')
                ->with(compact('personality_description', 'personality_type', 'faculties', 'levels', 'modes', 'nec', 'period_type', 'fee_types', 'spm_subjects', 'grades'))
                ->withError(['status' => 'hahaha']);
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
            'commencement' => 'required',
            'mqa' => 'required',
            'nec' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        try {
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
            $course->approved = $r->approved;
            $course->accredited = $r->accredited;
            $course->commencement = $r->commencement;
            $course->qualification = $r->qualification;
            $course->mqa_reference_no = $r->mqa;
            $course->personality_type_id = $r->personality_type_id;

            $course->save();

            //Add to spm requirement courses


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

            $coq = new CourseFee;
            $coq->course_id = $course->id;
            $coq->fee_id = 2;
            $coq->amount = $r->coq;

            $coq->save();

            //Spm requirements (optional)

            if ($r->name != null) {

                SpmRequirementCourse::create([
                    'course_id' => $course->id,
                    'requirement' => $this->spmRequirement($r->name, $r->grade)
                ]);

            }

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

            return redirect()
                ->route('client.course.view')
                ->with('status','The course ' . $course->name_en . ' has been added.');

        } catch (QueryException $ex) {
            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

    }

    public function view()
    {
        $institutionCourses = InstitutionCourse::whereInstitutionId(Auth::user()->client->institution->id)->paginate(40);
        $courses = Course::all();
        $facCourses = Faculty::all();

        return View::make('client.course.view', compact('faculty', 'institutionCourses', 'courses', 'facCourses'));
    }

    public function viewCourse($id)
    {
        $course = Course::whereId($id)->firstOrFail();

        $courseFee = CourseFee::whereCourse_id($id)->get();
        (float)$totalFee = 0.0;
        foreach ($courseFee as $cf) {
            $totalFee += (float)$cf->amount;
        }

        return View::make('client.course.course-info', compact('course', 'courseFee', 'totalFee'));
    }

    public function edit($id)
    {
        $faculties = Faculty::whereInstitutionId(Auth::user()->client->institution->id)->pluck('name', 'id');

        $levels = StudyLevel::pluck('name', 'id');

        $modes = StudyMode::pluck('name', 'id');

        $nec = Nec::pluck('field', 'code');

        $period_type = PeriodType::pluck('name', 'id');

        $institution = Institution::find(Auth::user()->client->institution->id);

        $course = Course::whereId($id)->firstOrFail();

        $courseFee = CourseFee::whereCourseId($id)->get();

        $personality_type = PersonalityType::pluck('type', 'id')->toArray();

        $personality_description = PersonalityType::pluck('description', 'id');

        $spmCourseRequirement = SpmRequirementCourse::whereCourseId($id)->first();

        $spm_subjects = SpmSubject::pluck('name', 'id');

        $grades = $this->grades;

        // return $faculties;

        if ($faculties == null) {
            $faculties = Faculty::whereInstitution_id(Auth::user()->client->institution->id)->paginate(10);
            return View::make('client.faculty.view', compact('faculties'));
        } else {
            return View::make('client.course.edit', compact(
                'personality_type', 'personality_description', 'course',
                'faculties', 'levels', 'modes', 'period_type', 'nec',
                'courseFee', 'spm_subjects', 'grades', 'spmCourseRequirement'));

        }

    }

    public function update(Request $r, $id)
    {


        try {
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
            $course->commencement = $r->commencement;
            $course->mqa_reference_no = $r->mqa_reference_no;
            $course->personality_type_id = $r->personality_type_id;
            $course->save();

            $alumni = CourseFee::whereCourseIdAndFeeId($id, 1)->first();

            if ($alumni == null) {
                $alumni = new CourseFee;
                $alumni->course_id = $id;
                $alumni->fee_id = 1;
            }

            $alumni->amount = $r->alumni;
            $alumni->save();

            $coq = CourseFee::whereCourseIdAndFeeId($id, 2)->first();
            if ($coq == null) {
                $coq = new CourseFee;
                $coq->course_id = $id;
                $coq->fee_id = 2;
            }

            $coq->amount = $r->coq;
            $coq->save();

            $residential = CourseFee::whereCourseIdAndFeeId($id, 3)->first();
            if ($residential == null) {
                $residential = new CourseFee;
                $residential->course_id = $id;
                $residential->fee_id = 3;
            }

            $residential->amount = $r->residential;
            $residential->save();

            $service = CourseFee::whereCourseIdAndFeeId($id, 4)->first();
            if ($service == null) {
                $service = new CourseFee;
                $service->course_id = $id;
                $service->fee_id = 4;
            }


            //Spm requirements (optional)

            if ($r->name != null) {

                $spmSubject = SpmRequirementCourse::whereCourseId($id)->first();
                $requirement = $this->spmRequirement($r->name, $r->grade);


                if ($spmSubject == null) {


                    SpmRequirementCourse::create([
                        'course_id' => $id,
                        'requirement' => $requirement
                    ]);

                } else {

                    $spmRequirementCourse = SpmRequirementCourse::whereCourseId($id)->first();
                    $spmRequirementCourse->requirement = array_combine($r->name, $r->grade);
                    $spmRequirementCourse->update();

                }


            }

            $service->amount = $r->service;
            $service->save();

            $tuition = CourseFee::whereCourseIdAndFeeId($id, 5)->first();
            if ($tuition == null) {
                $tuition = new CourseFee;
                $tuition->course_id = $id;
                $tuition->fee_id = 4;
            }

            $tuition->amount = $r->tuition;
            $tuition->save();

            return redirect()->action('CourseController@viewCourse',$course->id)->with(['status' => 'The course name ' . $course->name_en . ' has been updated.']);

        } catch (QueryException $ex) {
            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

    }

    public function delete($id)
    {
        $course = Course::whereId($id)->firstOrFail();
        $institutionCourse = InstitutionCourse::whereCourseId($id)->firstOrFail();

        try {
            $institutionCourse->delete();
            $course->delete();
        } catch (QueryException $ex) {
            return redirect()
                ->action('CourseController@view')
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }
        return redirect()
            ->action('CourseController@view')
            ->with(['status' => 'The course has been deleted.']);

    }


    public function postSearchCourse(Request $r)
    {
        if ($r->term == null) {
            return redirect()
                ->back()
                ->with(['status' => 'The search bar cannot be empty.']);
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
        foreach ($ic as $c) { //Courses based on institution
            $course = $c->course->where('name_en', 'LIKE', '%' . $r->search_course . '%')->first();
            if ($course != null) {
                break;
            }
        }
        if ($course == null) {
            return redirect()->back()->with('status', 'No result found for query ' . $r->search_faculty);
        } else {
            return redirect()->route('client.course.edit', $course->id);
        }
    }


    public function spmRequirement($spmSubject, $spmGrade)
    {
        $value = new \stdClass();

        $value->name = $spmSubject;
        $value->grade = $spmGrade;

        return response()->json($value);
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;
use App\Models\Institution;
use App\Models\Student\SpmRequirementCourse;
use App\Models\Student\SpmResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class InstitutionController extends Controller
{
    public function index()
    {

//        $spmCourseRequirement = SpmRequirementCourse::all('course_id','requirement');
//        $userSpmSubject = SpmResult::whereUserId(Auth::user()->id)->get(['spm_subject_id','grade']);
//        $courses =  $this->recommendedCourse($spmCourseRequirement,$userSpmSubject);

        $institutions = Institution::all();


        return view('student.institution.view')->with(compact('institutions'));
    }



    public function recommendedCourse($courseRequirement,$userSubject)
    {

        $courseId = [];

        foreach ($courseRequirement as $key => $value){

            if(is_array($value)) {

                foreach ($value->requirement as $key2 => $value2){

                    foreach ($userSubject as $key3 => $value3){

                        if($key2 == $value3->spm_subject_id && $this->gradePoint($value2) <= $this->gradePoint($value3->grade)){

                            $courseId[] = $value->course_id;
                        }
                    }
                }
            }



        }

        $courseName = [];

        foreach ($courseId as $id){

            $course = Course::find($id);

            $courseName[] = $course;

        }

        return $courseName;

    }

    public function gradePoint($grade)
    {
        $point = 0;
        switch ($grade){

            case 'A+': $point = 4;
                break;
            case 'A': $point = 4;
                break;
            case 'A-': $point = 3.67;
                break;
            case 'B+': $point = 3.33;
                break;
            case 'B': $point = 3;
                break;
            case 'C+': $point = 2.67;
                break;
            case 'C': $point = 2.33;
                break;
            case 'D': $point = 2;
                break;
            case 'E': $point = 1.67;
                break;
            case 'G': $point = 1.33;
                break;
            default:
                $point = 0;
        }

        return $point;


    }

}

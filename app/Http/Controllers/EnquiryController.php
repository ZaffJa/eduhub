<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\InstitutionUser;
use App\Models\InstitutionCourse;
use App\Models\Institution;
use App\Models\Course;
use App\Models\Enquiry;
use App\User;

class EnquiryController extends Controller
{
    public function store($slug,$course,Request $request)
    {
        $institution = Institution::whereSlug($slug)->first();
        $institution_user = InstitutionUser::whereInstitutionId($institution->id)->first();
        $institution_courses = InstitutionCourse::whereInstitutionId($institution->id)->get();

        foreach($institution_courses as $ic){

            if($ic->course->name_en == $course || $ic->course->name_en){
                $input =  $ic;
                break;
            }

        }
        $request['institution_course_id'] = $input->id;

        $enquiry = Enquiry::create($request->all());

        $institution_user->user->notify(new \App\Notifications\CustomerEnquiry(
            $user->name,
            $enquiry->name,
            $enquiry->email,
            $course
        ));

        return 'dok';

    }
}

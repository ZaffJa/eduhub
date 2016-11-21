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
use Auth;

class EnquiryController extends Controller
{
    public function store($slug,$course,Request $request)
    {
        $institution = Institution::whereSlug($slug)->first();
        $institution_user = InstitutionUser::whereInstitutionId($institution->id)->first();
        $institution_courses = InstitutionCourse::whereInstitutionId($institution->id)->get();

        $request['institution_id'] = $institution->id;
        $request['course_name'] = $course;

        $enquiry = Enquiry::create($request->all());

        $institution_user->user->notify(new \App\Notifications\CustomerEnquiry(
            $institution_user->user->name,
            $enquiry->name,
            $enquiry->email,
            $course
        ));

        return 'dok';
    }

    public function getNotifications()
    {
        $institution = Auth::user()->client->institution;
        $count = Enquiry::whereInstitutionCourseIdAndNotificationStatus($institution->id,0)->count();
        $enquiry = Enquiry::whereInstitutionCourseId($institution->id)->get();

        return response()->json([
            'count' => $count,
            'notifications' => $enquiry->sortByDesc('id')
        ]); ;
    }

    public function view(Request $request)
    {
        $enquiry = Enquiry::find($request->id);
        $enquiry->user_click = 1;
        $enquiry->save();


        return view('client.enquiries')->with(compact('enquiry'));
    }

    public function reset(Request $request)
    {
        $enquiry = Enquiry::whereInstitutionIdAndNotificationStatus(Auth::user()->client->institution->id,0)->get();

        foreach ($enquiry as $e) {
            $e->notification_status = 1;
            $e->save();
        }

        return 'ok';
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Faculty;
use App\Models\StudyLevel;
use App\Models\StudyMode;
use Validator;
use View;

class CourseNameController extends Controller
{
    public function getDetails()
    {
      $faculties = Faculty::pluck('name','id');
      $levels = StudyLevel::pluck('name','id');
      $modes = StudyMode::pluck('name','id');

      return View::make('client.new-course',compact('faculties','levels','modes'));
    }

    public function postCreateDetails(Request $r)
    {
      $validator = Validator::make($r->all(), [
             'course-name-eng' => 'required|unique:posts|max:255',
             'course-name-ms' => 'required|unique:posts|max:255',
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
         ]);

         if ($validator->fails()) {
             return redirect()
                         ->back()
                         ->withErrors($validator)
                         ->withInput();
         }
    }
}

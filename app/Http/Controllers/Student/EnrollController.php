<?php

namespace App\Http\Controllers\Student;

use App\Models\Student\SpmResult;
use App\Models\Student\PersonalityResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EnrollController extends Controller
{

    public function view()
    {

        return View('student.institution.enroll');
    }


}

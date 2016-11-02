<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Student\SpmSubject;
use App\Models\Student\SpmResult;
use App\User;

use Auth;


class SpmController extends Controller
{
    private $core_spm_subjects = [];
    private $grades = [];

    public function __construct()
    {
        $this->core_spm_subjects = ['1','2','5','6','7'];
        $this->grades = [
                           'A+'=>'A+',
                           'A'=>'A',
                           'A-'=>'A-',
                           'B+'=>'B+',
                           'B'=>'B',
                           'C+'=>'C+',
                           'C'=>'C',
                           'D'=>'D',
                           'E'=>'E',
                           'G'=>'G'
                       ];

    }

    public function index()
    {
        $core_spm_subjects = SpmResult::whereUserId(Auth::user()->id)->get();
        $spm_subjects = SpmSubject::pluck('name','id');
        $grades = $this->grades;

        return view('student.spm.view',compact('grades','core_spm_subjects','spm_subjects'));
    }

    public function create()
    {
        $spm_subjects = SpmSubject::pluck('name','id');
        $core_spm_subjects = $this->core_spm_subjects;
        $grades = $this->grades;

        return view('student.spm.create',compact('spm_subjects','counts','grades','core_spm_subjects'));
    }

    public function store(Request $request)
    {

        for($i = 0; $i < count($request->name) ; $i++){

            $spm_subject_id = $request->name[$i];
            $grade = $request->grade[$i];

            SpmResult::create([
                'user_id'=>Auth::user()->id,
                'spm_subject_id'=>$spm_subject_id,
                'grade'=>$grade
            ]);
        }

        return redirect()->action('Student\SpmController@index');
    }

    public function update(Request $request)
    {
        for($i = 0; $i < count($request->name) ; $i++){

            $spm_subject_id = $request->name[$i];
            $grade = $request->grade[$i];

            //If does not exist in table,then create a new record
            if(SpmResult::whereUserIdAndSpmSubjectId(Auth::user()->id,$spm_subject_id)->get()->isEmpty()){

                SpmResult::create([
                    'user_id'=>Auth::user()->id,
                    'spm_subject_id'=>$spm_subject_id,
                    'grade'=>$grade
                ]);
            }
        }

        return redirect()->back();
    }
}

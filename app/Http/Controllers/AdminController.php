<?php

namespace App\Http\Controllers;

use App\Models\StudentEnrollment;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        if($user = Auth::attempt($request->only('email','password')))
        {
            if(Auth::user()->hasRole('admin')){
                return redirect()->action('InstitutionController@viewAllInstitution');
            }else{
                return redirect()
                        ->back()
                        ->withErrors('These credentials do not match our database');
            }
        }
        return redirect()
            ->back()
            ->withErrors('These credentials do not match our database');
    }

    public function viewEnrollment(Request $request)
    {
        // Check if filter is applied and that filter is not equal to institution
        if($request->has('filter') && $request->filter != 'institution') {

            $filter = $request->filter;

            if($filter == 'pending') $filter = 0;
            else if ($filter == 'accepted') $filter = 1;
            else if ($filter == 'rejected') $filter = 2;
            else if ($filter == 'enrolled') $filter = 3;
            else if ($filter == 'confirmed') $filter = 4;

            $studentEnrollments = StudentEnrollment::where('status',$filter)->paginate(16);
        } else {
            $studentEnrollments = StudentEnrollment::paginate(16);
        }
        return view('admin.enrollment')->with(compact('studentEnrollments'));
    }
}

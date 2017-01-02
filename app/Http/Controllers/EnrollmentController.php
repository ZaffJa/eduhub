<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Storage;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('client.enrollment.view');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('enrollment_form') && $request->file('enrollment_form')->isValid()){

            $institution =Auth::user()->client->institution;
            $file = $request->file('enrollment_form');
            $filePath = time().'_'.$institution->name.'_'.$file->getClientOriginalName();

            $storage = Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            if($storage) {
                $institution->enrollment_file_path = $filePath;
                $institution->save();

                return redirect()->action('EnrollmentController@index')->with('status','Added form');
            }
        }
        return redirect()->action('EnrollmentController@index')->with('status','Error!! Cannot upload file');
    }
}

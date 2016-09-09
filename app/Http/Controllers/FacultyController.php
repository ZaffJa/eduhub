<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FacultyFormRequest;
use App\Models\Faculty;
use Auth;

class FacultyController extends Controller
{

    public function add()
    {
    	return view('client.faculty.add');
    }

    public function store(Request $request)
    {
    	$faculty = new Faculty;

        $faculty->institution_id = Auth::user()->institution->id;
    	$faculty->name = $request->fac_name;


     	try{
			 $faculty->save();
     	}catch(\Illuminate\Database\QueryException $ex) {
            return $ex->errorInfo;
        }

        return redirect(action('FacultyController@add'))->with('status','The faculty name '. $faculty->name.' has been added.');
    }

    public function view()
    {
    	$faculties = Faculty::whereInstitution_id(Auth::user()->institution->id)->get();
    	return view('client.faculty.view')->with('faculties',$faculties);
    }

    public function edit($id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        return view('client.faculty.edit', compact('faculty'));
    }

    public function update( Request $request,$id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        $faculty->name = $request->get('fac_name');


        try {
            $faculty->save();
                    
        } catch (\Illuminate\Database\QueryException $ex) {
            return $ex->errorInfo;
        } 

        return redirect(action('FacultyController@edit',$faculty->id))->with('status','The faculty name '. $faculty->name.' has been updated.');
    }

    public function delete($id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        
        try {
            $faculty->delete();
        } catch(\Illuminate\Database\QueryException $ex) {

        }

        return view('client.faculty.view')->with('status','The faculty '. $faculty->name .' has been deleted');
    }
}

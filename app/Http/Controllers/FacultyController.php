<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FacultyFormRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
	public function store(FacultyFormRequest $request)
	{
		return $request->all();
	}

    public function create()
    {
    	return view('client.new-facultyCreate');
    }

    public function example(Request $r)
    {
    	$faculty = new Faculty;

    	$faculty->name = $r->test;


   //  	try{
			// $faculty->save();
   //  	}catch(\Illuminate\Database\QueryException $ex)
    	
    }

    public function view()
    {
    	$faculties = Faculty::all();
    	return view('client.new-faculty')->with('faculties',$faculties);
    }

    public function edit($id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        return view('client.edit-faculty', compact('faculty'));
    }
}

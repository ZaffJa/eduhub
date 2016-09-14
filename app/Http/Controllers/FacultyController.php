<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FacultyFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Faculty;
use Auth;
use Validator;
use View;


class FacultyController extends Controller
{

    public function add()
    {
    	return View::make('client.faculty.add');
    }

    public function store(Request $r)
    {
      $validator = Validator::make($r->all(), [
             'fac_name' => 'required|max:255',
             'fac_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
         ]);



      if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
      }



      if($r->hasFile('fac_file') && $r->file('fac_file')->isValid())
      {
        $imageName = time().'.'.$r->fac_file->getClientOriginalExtension();

        $faculty = new Faculty;
        $faculty->institution_id = Auth::user()->institution->id;
        $faculty->name = $r->fac_name;
        $faculty->img_url = $imageName;

        $r->fac_file->move(public_path('img/faculty'),$imageName);

        try{
         $faculty->save();
        }catch(\Illuminate\Database\QueryException $ex) {
              return $ex->errorInfo;
          }
      }

        return redirect()->back()->with(['status'=>'The faculty name '. $faculty->name.' has been added.']);
    }

    public function postSearchFaculty(Request $r)
    {
      $faculty = Faculty::where('name','LIKE','%'.$r->term.'%')->whereInstitution_id(Auth::user()->institution->id)->get();

      foreach($faculty as $f){
        $data[] = $f->name;
      }

      return response()->json($data);
    }


    public function view()
    {
    	$faculties = Faculty::whereInstitution_id(Auth::user()->institution->id)->paginate(5);
    	return view('client.faculty.view')->with(compact('faculties','dataTables'));
    }

    public function edit($id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        $courses = $faculty->courses;
        return view('client.faculty.edit', compact('faculty','courses'));
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

        return redirect()->back()->with(['status'=>'The '. $faculty->name .' has been deleted']);
    }
}

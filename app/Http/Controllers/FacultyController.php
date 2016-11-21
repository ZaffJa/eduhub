<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FacultyFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Faculty;
use App\Models\File;
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
             'fac_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
         ]);

      if ($validator->fails()) {
          return redirect()
                      ->back()
                      ->withErrors($validator)
                      ->withInput();
      }

      if($r->hasFile('fac_file') && $r->file('fac_file')->isValid())
      {
        try{
        $imageName = time().'___'.$r->fac_file->getClientOriginalName();
        $faculty = new Faculty;
        $faculty->institution_id = Auth::user()->client->institution->id;
        $faculty->name = $r->fac_name;
        $faculty->save();


        $facultyImg = new File;
        $file = $r->file('fac_file');
        $facultyImg->user_id = Auth::user()->client->id;
        $facultyImg->institution_id = Auth::user()->client->institution->id;
        $facultyImg->faculty_id = $faculty->id;
        $facultyImg->type_id = 1;
        $facultyImg->category_id = 5;
        $facultyImg->filename = $imageName;
        $facultyImg->path = 'faculty/'.$imageName;
        $facultyImg->mime = $r->fac_file->extension();
        $facultyImg->size = $r->fac_file->getSize();
        $facultyImg->save();

        Storage::disk('s3')->put('faculty/'.$imageName,file_get_contents($file),'public');


        }catch(\Illuminate\Database\QueryException $ex) {
          return redirect()
                      ->back()
                      ->withErrors($ex->errorInfo[2])
                      ->withInput();
          }
      }

        return redirect()->back()->with(['status'=>'The faculty name '. $faculty->name.' has been added.']);
    }

    public function postSearchFaculty(Request $r)
    {
      $faculty = Faculty::where('name','LIKE','%'.$r->term.'%')->whereInstitution_id(Auth::user()->client->institution->id)->get();

      foreach($faculty as $f){
        $data[] = $f->name;
      }

      return response()->json($data);
    }
    public function postSearchResult(Request $r)
    {

      $faculty = Faculty::where('name','LIKE','%'.$r->search_faculty.'%')->first();

      if($faculty == null){
        return redirect()->back()->with('status','No result found for query '.$r->search_faculty);
      }else{
        return redirect()->route('client.faculty.edit',$faculty->id);
      }
    }


    public function view()
    {
    	$faculties = Faculty::whereInstitution_id(Auth::user()->client->institution->id)->paginate(10);

    	return view('client.faculty.view')->with(compact('faculties'));
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
            return redirect()
                      ->back()
                      ->withErrors($ex->errorInfo[2])
                      ->withInput();
        }

        return redirect(action('FacultyController@edit',$faculty->id))->with('status','The faculty name '. $faculty->name.' has been updated.');
    }

    public function delete($id)
    {
        $faculty = Faculty::whereId($id)->firstOrFail();
        try {
            $fileName = $faculty->img_url;

            $faculty->delete();

        } catch(\Illuminate\Database\QueryException $ex) {
            return redirect()
                        ->back()
                        ->withErrors($ex->errorInfo[2])
                        ->withInput();
        }

        return redirect()
               ->action('FacultyController@view')
               ->with(['status'=>'The '. $faculty->name .' has been deleted']);
    }
}

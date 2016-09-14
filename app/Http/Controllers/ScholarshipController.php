<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use App\Models\FileType;
use App\Models\InstitutionScholarship;
use View;
use Validator;
use File;
use Auth;

class ScholarshipController extends Controller
{
  public function add()
  {
      $filetypes = FileType::pluck('name','id');
      return view('client.scholarship.add-scholar')->with(compact('filetypes'));
  }


  public function postAdd(Request $r)
  {
    $mime = $r->file_type;
    // return $mime;
    $validator = Validator::make($r->all(), [
           'scholarship_name' => 'required|max:255',
           'scholarship_address' => 'required|max:255',
           'type_id' => 'required',
           'scholarship_contact' => 'required',
           'website' => 'required',
           'file_form' => 'required|max:20048|mimes:'.$mime,
       ]);
    if ($validator->fails()) {
       return redirect()
                   ->back()
                   ->withErrors($validator)
                   ->withInput();
    }

    try{
      $institutionScholarship = new institutionScholarship;
      $institutionScholarship->fileable_type = 'file';
      $institutionScholarship->fileable_id = Auth::user()->institution->id;
      $institutionScholarship->type_id = $r->type_id;
      $institutionScholarship->category_id = 1;
      $institutionScholarship->filename = time().'.'.$r->file_form->getClientOriginalExtension();
      $institutionScholarship->path = 'file/';
      $institutionScholarship->mime = $r->file_form->extension();
      $institutionScholarship->size = $r->file_form->getSize();
      $institutionScholarship->description = 'description';
      $institutionScholarship->contact = $r->scholarship_contact;
      $institutionScholarship->website = $r->website;

      $institutionScholarship->save();

       return redirect()
                   ->back()
                   ->with(['status'=>'Succesfully added into database']);
    }catch(\Illuminate\Database\QueryException $ex){
           return redirect()
                       ->back()
                       ->withErrors($ex);
       }
     }

     public function view()
     {
       $institution = Institution::whereClientId(Auth::user->id)->first();

       return $institution;

     }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use App\Models\FileType;
use App\Models\InstitutionScholarship;
use Illuminate\Support\Facades\Storage;
use View;
use Validator;
use File;
use Auth;

class ScholarshipController extends Controller
{
  public function add()
  {
      $filetypes = FileType::whereIn('id',[1,3])->pluck('name','id');
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
           'scholarship_contact' => 'required|numeric',
           'website' => 'required',
           'file_form' => 'required|max:2048|mimes:'.$mime,
       ]);
    if ($validator->fails()) {
       return redirect()
                   ->back()
                   ->withErrors($validator)
                   ->withInput();
    }

    try{
      $file = $r->file('file_form');

      $institutionScholarship = new InstitutionScholarship;
      $institutionScholarship->name = $r->scholarship_name;
      $institutionScholarship->fileable_type = 'file';
      $institutionScholarship->fileable_id = Auth::user()->client->institution->id;
      $institutionScholarship->type_id = $r->type_id;
      $institutionScholarship->category_id = 1;
      $institutionScholarship->filename = $file->getClientOriginalName();
      $institutionScholarship->path = 'file/';
      $institutionScholarship->mime = $file->extension();
      $institutionScholarship->size = $file->getSize();
      $institutionScholarship->description = 'description';
      $institutionScholarship->contact = $r->scholarship_contact;
      $institutionScholarship->website = $r->website;
      $filePath = public_path('uploads/scholarship');
      $file->move($filePath,$file->getClientOriginalName());

      // return $filePath;
      $s3 = Storage::disk('s3');
      $s3->put($file->getClientOriginalName(),$filePath);

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
       $scholarship = InstitutionScholarship::whereFileableId(Auth::user()->client->institution->id)->get();

       return view('client.scholarship.view')
                  ->with(compact('scholarship'));
     }

     public function delete($id)
     {
       $s = InstitutionScholarship::find($id);

       try{
         $s->delete();
         return redirect()
                     ->back()
                     ->with(['status'=>'Succesfully deleted record']);
       }catch(\Illuminate\Database\QueryException $ex){
              return redirect()
                          ->action('ScholarshipController@view')
                          ->withErrors($ex);
        }
   }


   public function edit($id)
   {
     $s = InstitutionScholarship::find($id);

     try{
       return redirect()
                   ->back()
                   ->with(['status'=>'Succesfully deleted record',
                           'scholarship'=>$s]);
     }catch(\Illuminate\Database\QueryException $ex){
            return redirect()
                        ->back()
                        ->withErrors($ex);
      }
   }


   public function clientDownload($id)
   {
     $s = InstitutionScholarship::find($id);
     return response()->download(public_path('uploads/scholarship/'.$s->filename),$s->filename);
   }

}

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
    $path = 'scholarship/'.time().'_'.$file->getClientOriginalName();

    $institutionScholarship = new InstitutionScholarship;
    $institutionScholarship->name = $r->scholarship_name;
    $institutionScholarship->fileable_type = 2;
    $institutionScholarship->fileable_id = Auth::user()->client->institution->id;
    $institutionScholarship->type_id = $r->type_id;
    $institutionScholarship->category_id = 1;
    $institutionScholarship->filename = $file->getClientOriginalName();
    $institutionScholarship->path = $path;
    $institutionScholarship->mime = $file->extension();
    $institutionScholarship->size = $file->getSize();
    $institutionScholarship->description = $r->description;
    $institutionScholarship->contact = $r->scholarship_contact;
    $institutionScholarship->website = $r->website;
    $institutionScholarship->opening = $r->opening;
    $institutionScholarship->closing = $r->closing;

    Storage::disk('s3')->put($path,file_get_contents($file),'public');

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
    $scholarship = InstitutionScholarship::find($id);

    return view('client.scholarship.edit',compact('scholarship'));

}

public function clientUpdate($id,Request $request)
{
    $scholarship = InstitutionScholarship::find($id);

    if($request->hasFile('file_form') && $request->file('file_form')->isValid())
    {
        $file = $request->file('file_form');
        $path = 'scholarship/'.time().'_'.$file->getClientOriginalName();

        $scholarship->filename = $file->getClientOriginalName();
        $scholarship->path = $path;
        $scholarship->mime = $file->extension();
        $scholarship->size = $file->getSize();

        Storage::disk('s3')->put($path,file_get_contents($file),'public');

    }
    $scholarship->name = $request->name;
    $scholarship->contact = $request->contact;
    $scholarship->website = $request->website;
    $scholarship->status = $request->status;
    $scholarship->opening = $request->opening;
    $scholarship->closing = $request->closing;

    try{
        $scholarship->save();

        return redirect()
               ->back()
               ->with(['status'=>'Succesfully updated record']);
    }catch(Illuminate\Database\QueryException $ex){
        return redirect()
                    ->back()
                    ->withErrors($ex);
    }

    return view('client.scholarship.edit',compact('scholarship'));

}


public function clientDownload($id)
{
 $s = InstitutionScholarship::find($id);
 return response()->download(public_path('uploads/scholarship/'.$s->filename),$s->filename);
}

}

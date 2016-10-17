<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Models\InstitutionType;
use App\Models\Institution;
use App\Models\ContactType;
use App\Models\InstitutionContact;
use App\Models\InstitutionUser;
use App\Models\RegisterInstitution;
use App\Models\Role;
use App\Models\File;
use Auth;
use Validator;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    public function index()
    {
      $i = InstitutionType::pluck('name','id');
      return View::make('client.institution.create',compact('i'));
    }

    public function view()
    {
      $institution_id = Auth::user()->client->institution->id ;
      $institutions = Institution::whereId($institution_id)->paginate(5);

      return View::make('client.institution.view',compact('institutions'));
    }

    public function viewInstitution($id)
    {
      if($id != Auth::user()->client->institution->id){

        $institutions = Institution::whereClient_id(Auth::user()->client->user->id)->paginate(5);

        return redirect()->route('client.institution.view',compact('institutions'));

      }else{

        $institution = Institution::whereId($id)->firstOrFail();

        return View::make('client.institution.institution-info',compact('institution'));
      }
    }

    public function edit($id)
    {

      if($id != Auth::user()->client->institution->id){

        $institutions = Institution::whereClient_id(Auth::user()->client->user->id)->paginate(5);

        return redirect()->route('client.institution.view',compact('institutions'));

      }else{

        $institution = Institution::whereId($id)->firstOrFail();
        $institution_types = InstitutionType::pluck('name','id');
        $parent_institution = Institution::pluck('name','id')->toArray();

        return View::make('client.institution.edit',compact('institution','institution_types','parent_institution'));
      }

    }

    public function update(Request $r, $id)
    {
      $institution = Institution::whereId($id)->firstOrFail();

      $institution->name = $r->name;
      $institution->type_id = $r->type_id;
      $institution->abbreviation = $r->abbreviation;
      $institution->established = $r->established;
      $institution->location = $r->location;
      $institution->address = $r->address;
      $institution->website = $r->website;
      if($r->parent_id != 0)
      {
      $institution->parent_id = $r->parent_id;
      }
      elseif($r->parent_id == 0)
      {
        $r->parent_id = null;
        $institution->parent_id = $r->parent_id;
      }
      $institution->description = $r->description;

      try {
        $institution->save();
      }catch(\Illuminate\Database\QueryException $ex) {

      }

      return redirect()->back()->with(['status'=>'The '.$institution->name.' has been updated.']);

    }

    public function create(Request $r)
    {
      $validator = Validator::make($r->all(), [
            'name' => 'required|max:255',
            'abbreviation' => 'required|max:255',
            'description' => 'required',
            'established' => 'required',
            'type_id' => 'required',
            'contact_no' => 'required',
            'fax_no' => 'required',
            'email' => 'required',
            'public_relations_department_email' => 'required',
            'student_enrollment_department_email' => 'required',
            'corporate_communications_department_email' => 'required',
            'marketing_department_email' => 'required',
            'location' => 'required',
            'examination_board' => 'required',
            'remarks' => 'required',
            'file_image' => 'image|max:2048|required',
         ]);

       if ($validator->fails()) {
           return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
       }
      try{

        $r['slug'] = str_replace(' ', '-', strtolower($r->institution_name));

        $institution = Institution::create($r->except('file_image'));   //mass assign

        $image = $r->file('file_image');
        $file = new File;
        $file->institution_id = $institution->id;
        $file->type_id = 1;
        $file->category_id = 1;
        $file->filename = $image->getClientOriginalName();
        $file->path = 'logo/'.$image->getClientOriginalName();
        $file->mime = $image->getMimeType();
        $file->size = $image->getSize();
        $file->save();

        $institution->file_id = $file->id;
        $institution->save();

        Storage::disk('s3')->put('logo/'.$image->getClientOriginalName(),file_get_contents($image),'public');

        return redirect()->back()->with('status','Succesfully added a new institution');

    }catch(\Illuminate\Database\QueryException $ex){

          return  redirect()->back()
                               ->withErrors($ex->errorInfo[2])
                               ->withInput();
      }
      return redirect()->back()->with('status','Succesfully added a new institution');

    }


    public function requestInstitution()
    {
      $i = InstitutionUser::whereUserId(Auth::user()->id)->first();

      if($i == null){
          $all_ri = RegisterInstitution::whereUserId(Auth::user()->id)->get();
          $i = Institution::all()->pluck('name','id');

          return view('client.request-institution')
                  ->with(compact('i','all_ri'));

      }else{ //if user already associated with an institution
          return redirect()->route('client.dashboard');
      }

    }


    public function requestAddInstitution(Request $r)
    {
      if($r->institution_id == null){
        return redirect()->back()->withErrors('Please select an institution from the list');
      }
      try{
          $ri = new RegisterInstitution;
          $ri->user_id = Auth::user()->id;
          $ri->institution_id = $r->institution_id;
          $ri->status = 1;
          $ri->save();
          return redirect()->back()
                          ->with('status','Successfully request an institution. Please wait for the admin to approve your request.');
        }catch (\Illuminate\Database\QueryException $ex) {
          return  redirect()->back()
                               ->with('status','Error - '.$ex->errorInfo[2])
                               ->withInput();
        }
    }


    public function viewInstitutionRequest()
    {
      $ri = RegisterInstitution::whereStatus(1)->get();

      return view('admin.request-institution')
                  ->with(compact('ri'));
    }


    public function approveInstitutionRequest($id)
    {
        $ri = RegisterInstitution::find($id);
        $ri->status = 3;
        try{
            $iu = InstitutionUser::create([
              'user_id' => $ri->user_id,
              'institution_id' => $ri->institution_id
            ]);

            $ri->save();

            Role::create([
                'user_id'=>$ri->user_id,
                'role_id'=>2
            ]);

            return  redirect()
                        ->back()
                        ->with('status','Succesfully approve client request');

        }catch (\Illuminate\Database\QueryException $ex) {

          return  redirect()
                        ->back()
                        ->with('status','Error - '.$ex->errorInfo[2]);
        }
    }

    public function rejectInstitutionRequest($id)
    {
      $ri = RegisterInstitution::find($id);
      $ri->status = 2;

      try{
          $ri->save();
          return  redirect()
                        ->back()
                        ->with('status','Succesfully reject client request');

      }catch (\Illuminate\Database\QueryException $ex) {

        return  redirect()
                        ->back()
                        ->with('status','Error - '.$ex->errorInfo[2]);
      }
    }


    public function viewAllInstitution()
    {
      $i = Institution::paginate(30);
      return view('admin.all-institution')
                              ->with(compact('i'));
    }


    public function editInstitution($id)
    {
      $i = Institution::find($id);

      return view('admin.edit-institution')
              ->with(compact(('i')));
    }

    public function requestHistory()
    {
        $i = \App\Models\RegisterInstitution::paginate(20);

        return view('admin.request-history')->with(compact('i'));
    }

    public function getNotifications()
    {
        $an  = \App\Models\AdminNotification::paginate(20);

        return view('admin.notifications')->with(compact('an'));
    }

    public function postNotifications(Request $request)
    {
        try{
            $notifications = \App\Models\AdminNotification::find($request->id);
            $notifications->action = $request->action;
            $notifications->save();

            return 'Succesfully updated action';

        }catch(Illuminate\Database\QueryException $ex){

            return 'Error'.$ex->errorInfo[2];

        }



    }
}

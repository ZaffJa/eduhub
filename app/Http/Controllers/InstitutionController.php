<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Models\InstitutionType;
use App\Models\Institution;
use App\Models\ContactType;
use App\Models\InstitutionContact;
use App\Models\RegisterInstitution;
use Auth;
use Validator;


class InstitutionController extends Controller
{
    public function index()
    {
      $i = InstitutionType::pluck('name','id');
      return View::make('client.institution.create',compact('i'));
    }

    public function view()
    {
      $institutions = Institution::whereClient_id(Auth::user()->id)->paginate(5);

      return View::make('client.institution.view',compact('institutions'));
    }

    public function viewInstitution($id)
    {
      if($id != Auth::user()->institution->id){
        
        $institutions = Institution::whereClient_id(Auth::user()->id)->paginate(5);

        return redirect()->route('client.institution.view',compact('institutions'));
      
      }else{

        $institution = Institution::whereId($id)->firstOrFail();

        return View::make('client.institution.institution-info',compact('institution'));
      }
    }

    public function edit($id)
    {
    
      if($id != Auth::user()->institution->id){
        
        $institutions = Institution::whereClient_id(Auth::user()->id)->paginate(5);

        return redirect()->route('client.institution.view',compact('institutions'));

      }else{

        $institution = Institution::whereId($id)->firstOrFail();
        $institution_types = InstitutionType::pluck('name','id');
        $parent_institution = Institution::pluck('name','id');
        $parent_institution[''] = 'Please select'; 

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
      if($r->parent_id == '' || $r->parent_id == null){
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
             'institution_name' => 'required|max:255',
             'institution_abbreviation' => 'required|max:255',
             'institution_description' => 'required',
             'institution_established_date' => 'required',
             'country' => 'required',
             'state' => 'required',
             'city' => 'required',
             'institution_type' => 'required',
             'contact_no' => 'required',
             'fax_no' => 'required',
             'emails' => 'required',
             'public_relations_department_emails' => 'required',
             'student_enrollment_department_emails' => 'required',
             'corporate_communications_department_emails' => 'required',
             'marketing_department_emails' => 'required',
             'campus_location' => 'required',
             'examination_board' => 'required',
             'campus_location' => 'required',
             'remarks' => 'required',
         ]);

       if ($validator->fails()) {
           return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
       }
      try{

        $institution = new Institution;
        $slug = str_replace(' ', '-', strtolower($r->institution_name));
        $institution->name = $r->institution_name;
        $institution->abbreviation = $r->institution_abbreviation;
        $institution->slug = $slug;
        $institution->type_id = $r->institution_type;
        $institution->description = $r->institution_description;
        $institution->established = $r->institution_established_date;
        $institution->location = $r->city.'/'.$r->state;
        $institution->address = $r->campus_location;
        $institution->website = $r->website;

        $contact_type = new ContactType;
        $contact_type->public_relations_department_email= $this->customMergeArray($r->public_relations_department_emails);
        $contact_type->student_enrollment_department_email= $this->customMergeArray($r->student_enrollment_department_emails);
        $contact_type->corporate_communications_department_email= $this->customMergeArray($r->corporate_communications_department_emails);
        $contact_type->marketing_department_email= $this->customMergeArray($r->marketing_department_emails);
        $contact_type->email= $this->customMergeArray($r->emails);
        $contact_type->remarks = $r->remarks;
        $contact_type->examination_board = $r->examination_board;

        $contact_type->save();
        $institution->save();


        $institution_contact = new InstitutionContact;
        $institution_contact->institution_id = $institution->id;
        $institution_contact->contact_type_id = $contact_type->id;

        $institution_contact->save();
      }catch(\Illuminate\Database\QueryException $e){
        return $e->errorInfo;
      }
      return redirect()->back()->with('status','Succesfully added a new institution');

    }


    public function requestInstitution()
    {
      $i = Institution::whereClientId(Auth::user()->id)->first();


      if($i == null){
          $ri = RegisterInstitution::whereUserId(Auth::user()->id)->first();
          $i = Institution::whereClientId(null)->pluck('name','id');

          if($ri != null){
            return view('client.request-institution')
                    ->with(compact('i','ri'));
          }else{
            return view('client.request-institution')
                    ->with(compact('i'));
          }

      }else{


      }
    }


    public function requestAddInstitution(Request $r)
    {
      if($r->institution_id == null){
        return redirect()->back()->with(['status'=>'Please select an institution from the list']);
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
                               ->with('status','Error - '.$ex->errorInfo[2]);
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
            $i = Institution::find($ri->institution_id);
            $i->client_id = $ri->user_id;
            $i->save();
            $ri->save();
            return  redirect()->back()
                                 ->with('status','Succesfully approve client request');
        }catch (\Illuminate\Database\QueryException $ex) {
          return  redirect()->back()
                               ->with('status','Error - '.$ex->errorInfo[2]);
        }
    }

    public function rejectInstitutionRequest($id)
    {
      $ri = RegisterInstitution::find($id);
      $ri->status = 2;

      try{
          $ri->save();
          return  redirect()->back()
                               ->with('status','Succesfully reject client request');
      }catch (\Illuminate\Database\QueryException $ex) {
        return  redirect()->back()
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

    public function customMergeArray($data){
      if($data != null){
          $str = "";
        foreach($data as $d){
          $str = $str.'---'.$d;
        }
        return $str;
      }else{
        return 'You supplied a null value';
      }
    }
}

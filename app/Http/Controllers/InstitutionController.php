<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Models\InstitutionType;
use App\Models\Institution;
use App\Models\InstitutionContact;
use App\Models\ContactType;
use DB;
use Validator;

class InstitutionController extends Controller
{
    public function index()
    {
      $i = InstitutionType::pluck('name','id');
      return View::make('client.institution.create',compact('i'));
    }


    public function create(Request $r)
    {

      // return $r->all();

      $validator = Validator::make($r->all(), [
             'institution_name' => 'required|max:255',
             'institution_type' => 'required|max:255',
             'contact_no' => 'required',
             'fax_no' => 'required',
             'get_email' => 'required',
             'public_relations_department_email' => 'required',
             'student_enrollment_department_email' => 'required',
             'corporate_communications_department_email' => 'required',
             'marketing_department_email' => 'required',
             'campus_location' => 'required',
             'examination_board' => 'required',
             'remarks' => 'required',
         ]);

         if ($validator->fails()) {
             return redirect()
                         ->back()
                         ->withErrors($validator)
                         ->withInput();
         }

      $institution = new Institution;
      $contact_types = new ContactType;
      $institution_contacts = new InstitutionContact;
      $slug = (string)str_replace(' ', '-', strtolower($r->institution_name));


      $contact_types->public_relations_department_email = join(',',$r->public_relations_department_email);
      $contact_types->student_enrollment_department_email = join(',',$r->student_enrollment_department_email);
      $contact_types->corporate_communications_department_email = join(',',$r->corporate_communications_department_email);
      $contact_types->marketing_department_email = join(',',$r->marketing_department_email);
      $contact_types->email = join(',',$r->get_email);
      $contact_types->examination_board = $r->examination_board;
      $contact_types->remarks = $r->remarks;

      $institution->name = $r->institution_name;
      $institution->slug = $slug;
      $institution->type_id = $r->institution_type;

      try{
          $contact_types->save();
          $institution->save();

          $institution_contacts->institution_id = $institution->id;
          $institution_contacts->contact_type_id = $contact_types->id;

          $institution_contacts->save();

      }catch(\Illuminate\Database\QueryException $e){
        return $e->errorInfo;
      }



      return redirect()->route('client.dashboard');




    }
}

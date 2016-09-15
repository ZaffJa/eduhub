<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Models\InstitutionType;
use App\Models\Institution;
use App\Models\ContactType;
use DB;
use Auth;

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
      $institution = Institution::whereId($id)->firstOrFail();

      // return $institution;
      return View::make('client.institution.institution-info',compact('institution','parent_id'));
    }

    public function create(Request $r)
    {
      $institution = new Institution;
      $slug = str_replace(' ', '-', strtolower($r->institution_name));

      $institution->name = $r->institution_name;
      $institution->slug = $slug;
      $institution->type_id = $r->institution_type;


      try{
        // DB::table('contact_types')->insert($r->public_relations_department_emails);
        // DB::table('contact_types')->insert($r->student_enrollment_department_emails);
        // DB::table('contact_types')->insert($r->corporate_communications_department_emails);
        // DB::table('contact_types')->insert($r->emails);
        // DB::table('contact_types')->insert($r->marketing_department_emails);
        //
        // $institution->save();

      }catch(\Illuminate\Database\QueryException $e){
        return $e->errorInfo;
      }



      return redirect()->route('client.dashboard');
    }
}

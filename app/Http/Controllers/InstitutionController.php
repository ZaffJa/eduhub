<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
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
        $i = InstitutionType::pluck('name', 'id');
        return View::make('client.institution.create', compact('i'));
    }

    public function view()
    {
        $institution_id = Auth::user()->client->institution->id;
        $institutions = Institution::whereId($institution_id)->paginate(5);

        return View::make('client.institution.view', compact('institutions'));
    }

    public function viewInstitution($id)
    {
        if ($id != Auth::user()->client->institution->id) {

            $institutions = Institution::whereClient_id(Auth::user()->client->user->id)->paginate(5);

            return redirect()->route('client.institution.view', compact('institutions'));

        } else {

            $institution = Institution::whereId($id)->firstOrFail();

            return View::make('client.institution.institution-info', compact('institution'));
        }
    }

    public function edit($id)
    {

        if ($id != Auth::user()->client->institution->id) {

            $institutions = Institution::whereClient_id(Auth::user()->client->user->id)->paginate(5);

            return redirect()->route('client.institution.view', compact('institutions'));

        } else {

            $institution = Institution::whereId($id)->firstOrFail();
            $institution_types = InstitutionType::pluck('name', 'id');
            $parent_institution = Institution::pluck('name', 'id')->toArray();

            return View::make('client.institution.edit', compact('institution', 'institution_types', 'parent_institution'));
        }

    }

    public function update(Request $r, $id)
    {
        $institution = Institution::whereId($id)->firstOrFail();


        if ($r->slug != null) {
            $institution->slug = str_replace(' ', '-', strtolower($r->slug));
        } else {
            $institution->slug = str_replace(' ', '-', strtolower($institution->name));
        }
        $institution->name = $r->name;
        $institution->type_id = $r->type_id;
        $institution->abbreviation = $r->abbreviation;
        $institution->established = $r->established;
        $institution->location = $r->location;
        $institution->address = $r->address;
        $institution->fax_no = $r->fax_no;
        $institution->contact_no = $r->contact_no;
        $institution->website= $r->website;
        $institution->email = $r->email;
        $institution->public_relations_department_email = $r->public_relations_department_email;
        $institution->corporate_communications_department_email = $r->corporate_communications_department_email;
        $institution->marketing_department_email = $r->marketing_department_email;
        $institution->student_enrollment_department_email = $r->student_enrollment_department_email;



        if($r->hasFile('file_image')) {

            $image = $r->file('file_image');

            $institutionImage = File::whereInstitutionId($institution->id)
                                    ->whereTypeId(1)
                                    ->wherecategoryId(1)
                                    ->orderBy('created_at')->first();

            if($institutionImage == null) {

                $file = new File;
                $file->institution_id = $institution->id;
                $file->type_id = 1;
                $file->category_id = 1;
                $file->filename = $image->getClientOriginalName();
                $file->path = 'logo/' . $image->getClientOriginalName();
                $file->mime = $image->getMimeType();
                $file->size = $image->getSize();

                $institution->file_id = $file->id;

                $file->save();


            } else {

                $institutionImage->filename = $image->getClientOriginalName();
                $institutionImage->path = 'logo/' .$image->getClientOriginalName();

                $institutionImage->update();

            }

            Storage::disk('s3')->put('logo/' . $image->getClientOriginalName(), file_get_contents($image), 'public');

        }



        if ($r->parent_id != 0) {

            $institution->parent_id = $r->parent_id;

        } else if ($r->parent_id == 0) {

            $r->parent_id = null;
            $institution->parent_id = $r->parent_id;

        }

        $institution->description = $r->description;

        try {

            $institution->save();

        } catch (QueryException $ex) {

            return redirect()->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();

        }

        if (auth()->user()->hasRole('admin')) {

            return redirect()->back()->with(['status' => 'The ' . $institution->name . ' has been updated.']);

        }

        return redirect()->action('InstitutionController@viewInstitution', $institution->id)->with(['status' => 'The ' . $institution->name . ' has been updated.']);

    }

    public function create(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'type_id' => 'required',
            'contact_no' => 'required',
            'fax_no' => 'required',
            'email' => 'required',
            'location' => 'required',
            'file_image' => 'image|max:2048|required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $r['slug'] = str_replace(' ', '-', strtolower($r->name));

            $institution = Institution::create($r->except('file_image'));   //mass assign

            $image = $r->file('file_image');
            $file = new File;
            $file->institution_id = $institution->id;
            $file->type_id = 1;
            $file->category_id = 1;
            $file->filename = $image->getClientOriginalName();
            $file->path = 'logo/' . $image->getClientOriginalName();
            $file->mime = $image->getMimeType();
            $file->size = $image->getSize();
            $file->save();

            $institution->file_id = $file->id;
            $institution->save();

            Storage::disk('s3')->put('logo/' . $image->getClientOriginalName(), file_get_contents($image), 'public');

            return redirect()->action('InstitutionController@viewAllInstitution')->with('status', 'Succesfully added a new institution');

        } catch (QueryException $ex) {

            return redirect()->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

    }


    public function requestInstitution()
    {
        $i = InstitutionUser::whereUserId(Auth::user()->id)->first();

        if ($i == null) {
            $all_ri = RegisterInstitution::whereUserId(Auth::user()->id)->get();
            $i = Institution::all()->pluck('name', 'id');

            return view('client.request-institution')
                ->with(compact('i', 'all_ri'));

        } else { //if user already associated with an institution
            return redirect()->route('client.dashboard');
        }

    }


    public function requestAddInstitution(Request $r)
    {
        if ($r->institution_id == null) {
            return redirect()->back()->withErrors('Please select an institution from the list');
        }
        try {
            $ri = new RegisterInstitution;
            $ri->user_id = Auth::user()->id;
            $ri->institution_id = $r->institution_id;
            $ri->status = 1;
            $ri->save();
            return redirect()->back()
                ->with('status', 'Successfully request an institution. Please wait for the admin to approve your request.');
        } catch (QueryException $ex) {
            return redirect()->back()
                ->withErrors($ex->errorInfo[2])
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
        try {
            $iu = InstitutionUser::create([
                'user_id' => $ri->user_id,
                'institution_id' => $ri->institution_id
            ]);

            $ri->save();

            Role::create([
                'user_id' => $ri->user_id,
                'role_id' => 2
            ]);

            return redirect()
                ->back()
                ->with('status', 'Succesfully approve client request');

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2]);
        }
    }

    public function rejectInstitutionRequest($id)
    {
        $ri = RegisterInstitution::find($id);
        $ri->status = 2;

        try {
            $ri->save();
            return redirect()
                ->back()
                ->with('status', 'Succesfully reject client request');

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2]);
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
        $institution = Institution::find($id);
        $institution_types = InstitutionType::pluck('name', 'id');
        $parent_institution = Institution::pluck('name', 'id')->toArray();

        return view('admin.edit-institution')
            ->with(compact('i', 'institution', 'institution_types', 'parent_institution'));
    }

    public function requestHistory()
    {
        $i = \App\Models\RegisterInstitution::paginate(20);

        return view('admin.request-history')->with(compact('i'));
    }

    public function delete($id)
    {
        $institution = Institution::find($id);

        try {

            $institution->delete();

            return redirect()
                ->back()
                ->with('status', 'Succesfully deleted the record');

        } catch (QueryException $ex) {
            return redirect()
                ->back()
                ->withErrors('Error in deleting the record');
        }

        return $institution;
    }
}

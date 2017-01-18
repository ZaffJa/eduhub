<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewInstitutionRequest;

use App\Models\File;
use App\Notifications\NewInstitutionNotification;
use App\Notifications\RequestNewInstitution;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Models\RegisterInstitution;
use App\Models\InstitutionType;
use App\Models\InstitutionUser;
use App\Models\NewInstitution;
use App\Models\Institution;
use App\Models\Role;

use View;
use Auth;
use Validator;
use Storage;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutionTypes = InstitutionType::pluck('name', 'id');
        return View::make('client.institution.create', compact('institutionTypes'));
    }

    public function view()
    {
        $institution_id = Auth::user()->client->institution->id;
        $institutions = Institution::where('id', $institution_id)->paginate(5);

        return View::make('client.institution.view', compact('institutions'));
    }

    public function viewInstitution($id)
    {
        if ($id != Auth::user()->client->institution->id) {
            $institutions = Institution::where('client_id', Auth::user()->client->user->id)->paginate(5);
            return redirect()->route('client.institution.view', compact('institutions'));
        } else {
            $institution = Institution::find($id);
            return View::make('client.institution.institution-info', compact('institution'));
        }
    }

    public function edit($id)
    {

        if ($id != Auth::user()->client->institution->id) {

            $institutions = Institution::where('client_id', Auth::user()->client->user->id)->paginate(5);

            return redirect()->route('client.institution.view', compact('institutions'));

        } else {

            $institution = Institution::find($id);
            $institution_types = InstitutionType::pluck('name', 'id');
            $parent_institution = Institution::pluck('name', 'id')->toArray();

            return View::make('client.institution.edit', compact('institution', 'institution_types', 'parent_institution'));
        }

    }

    public function update(Request $request, $id)
    {
        $institution = Institution::whereId($id)->firstOrFail();


        if ($request->slug != null) {
            $institution->slug = str_replace(' ', '-', strtolower($request->slug));
        } else {
            $institution->slug = str_replace(' ', '-', strtolower($institution->name));
        }
        $institution->name = $request->name;
        $institution->type_id = $request->type_id;
        $institution->abbreviation = $request->abbreviation;
        $institution->established = $request->established;
        $institution->location = $request->location;
        $institution->address = $request->address;
        $institution->fax_no = $request->fax_no;
        $institution->contact_no = $request->contact_no;
        $institution->website = $request->website;
        $institution->email = $request->email;
        $institution->public_relations_department_email = $request->public_relations_department_email;
        $institution->corporate_communications_department_email = $request->corporate_communications_department_email;
        $institution->marketing_department_email = $request->marketing_department_email;
        $institution->student_enrollment_department_email = $request->student_enrollment_department_email;


        if ($request->hasFile('file_image')) {

            $image = $request->file('file_image');

            $institutionImage = File::whereInstitutionId($institution->id)
                ->whereTypeId(1)
                ->wherecategoryId(1)
                ->orderBy('created_at')->first();

            if ($institutionImage == null) {
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
                $institutionImage->path = 'logo/' . $image->getClientOriginalName();
                $institutionImage->update();
            }
            Storage::disk('s3')->put('logo/' . $image->getClientOriginalName(), file_get_contents($image), 'public');
        }


        if ($request->parent_id != 0) {
            $institution->parent_id = $request->parent_id;

        } else if ($request->parent_id == 0) {
            $request->parent_id = null;
            $institution->parent_id = $request->parent_id;
        }
        $institution->description = $request->description;
        try {
            $institution->save();
        } catch (QueryException $ex) {
            return redirect()->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }
        if (auth()->user()->hasRole('admin')) return redirect()->back()->with(['status' => 'The ' . $institution->name . ' has been updated.']);
        return redirect()->action('InstitutionController@viewInstitution', $institution->id)->with(['status' => 'The ' . $institution->name . ' has been updated.']);

    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

            $request['slug'] = str_replace(' ', '-', strtolower($request->name));

            $institution = Institution::create($request->except('file_image'));   //mass assign

            $image = $request->file('file_image');
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
        $institutionUser = InstitutionUser::where('user_id', auth()->user()->id)->first();

        if ($institutionUser == null) {
            $registerInstitutions = RegisterInstitution::where('user_id', auth()->user()->id)->get();
            $institutions = Institution::all()->pluck('name', 'id');
            $newInstitution = NewInstitution::where('user_id', auth()->user()->id)->first();

            return view('client.request-institution')
                ->with(compact('institutions', 'registerInstitutions', 'newInstitution'));
        } else { //if user already associated with an institution
            return redirect()->route('client.dashboard');
        }

    }


    public function requestAddInstitution(Request $request)
    {
        if ($request->institution_id == null) {
            return redirect()->back()->withErrors('Please select an institution from the list');
        }
        try {
            $registerInstitution = new RegisterInstitution;
            $registerInstitution->user_id = Auth::user()->id;
            $registerInstitution->institution_id = $request->institution_id;
            $registerInstitution->status = 1;
            $registerInstitution->save();
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
        $registerInstitution = RegisterInstitution::find($id);
        $registerInstitution->status = 3;
        try {
            $iu = InstitutionUser::create([
                'user_id' => $registerInstitution->user_id,
                'institution_id' => $registerInstitution->institution_id
            ]);
            $registerInstitution->save();
            Role::create([
                'user_id' => $registerInstitution->user_id,
                'role_id' => 2
            ]);
            return redirect()
                ->back()
                ->with('status', 'Successfully approve client request');
        } catch (QueryException $ex) {
            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2]);
        }
    }

    public function rejectInstitutionRequest($id)
    {
        $registerInstitution = RegisterInstitution::find($id);
        $registerInstitution->status = 2;

        try {
            $registerInstitution->save();
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
        $i = RegisterInstitution::paginate(20);

        return view('admin.request-history')->with(compact('i'));
    }

    public function delete($id)
    {
        $institution = Institution::find($id);

        try {

            $institution->delete();

            return redirect()
                ->back()
                ->with('status', 'Successfully deleted the record');

        } catch (QueryException $ex) {
            return redirect()
                ->back()
                ->withErrors('Error in deleting the record');
        }
    }

    public function getNewInstitution()
    {
        return view('client.institution.new-institution');
    }

    public function postNewInstitution(NewInstitutionRequest $request)
    {
        $filePath = 'logos/' . time() . $request->file('file')->hashName();
        $request['image'] = $filePath;
        $request['user_id'] = auth()->user()->id;

        // Notify admin about the new institution
        $this->admin()->notify(new RequestNewInstitution(auth()->user()));

        NewInstitution::create($request->all());
        Storage::disk('s3')->put($filePath, file_get_contents($request->file('file')), 'public');

        return back()->with('status', 'Your request has been submitted to the admin.');

    }

    public function newInstitutionRequest()
    {
        $newInstitutions = NewInstitution::where('status', 0)->get();
        return view('admin.new-institution-request')->with(compact('newInstitutions'));
    }

    public function viewNewInstitutionRequest(NewInstitution $newInstitution)
    {
        return view('admin.view-institution-request')->with(compact('newInstitution'));
    }

    public function newInstitutionRequestAction(NewInstitution $newInstitution, $action)
    {
        $newInstitution->status = $action;
        $newInstitution->save();

        // Copy data from new_institutions to institutions table
        $newInstitution->type_id = 8;   // hard code type_id
        $newInstitution->slug = str_slug($newInstitution->name); // add slug to institutions table
        $institution = Institution::create($newInstitution->toArray());

        // New file
        $file = new File;
        $file->institution_id = $institution->id;
        $file->type_id = 1;
        $file->category_id = 1;
        $file->filename = $newInstitution->image;
        $file->path = $newInstitution->image;
        $file->mime = 'image/jpeg'; //hard code for now
        $file->size = 1136087;  // hard code now
        $file->save();

        $institution->file_id = $file->id;
        $institution->save();

        if ($action == 1) {
            $message = 'Congratulations!! Your institution request has been approved. You may now proceed to choose the institution.';
        } else {
            $message = 'Your institution request has been rejected. You can send an email to ask@eduhub.my for further help.';
        }
        $newInstitution->user->notify(new NewInstitutionNotification($newInstitution->user, $message));

        return redirect()->action('InstitutionController@newInstitutionRequest')->with('status','Successfully perform your action.');
    }


    public function admin()
    {
        $users = User::all();
        // Get the first admin instance
        foreach ($users as $user) {
            if ($user->hasRole('admin')) {
                return $user;
            }
        }
    }
}

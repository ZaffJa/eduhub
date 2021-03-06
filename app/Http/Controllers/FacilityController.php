<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\File;
use Storage;
use Validator;
use Auth;
use View;

class FacilityController extends Controller
{
    public function viewType()
    {
        $facility_types = FacilityType::all();
        return view('client.facility.viewType')->with('facility_types', $facility_types);
    }

    public function addAllType()
    {
        return view('client.facility.addAllType');
    }

    public function storeAllType(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'faci_name' => 'required|max:255',
            'faci_cap' => 'required|max:255',
            'faci_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $facility = new Facility;

        $facility->institution_id = Auth::user()->client->institution->id;
        $facility->type_id = $r->typeid;
        $facility->name = $r->faci_name;
        $facility->capacity = $r->faci_cap;

        try {

            $facility->save();

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

        $path = 'facility/' . Auth::user()->client->institution->id . '/';
        $faci_img = new File;
        $file = $r->file('faci_img');
        $faci_img->institution_id = Auth::user()->client->institution->id;
        $faci_img->facility_id = $facility->id;
        $faci_img->facility_type = $facility->type_id;
        $faci_img->type_id = 1;
        $faci_img->category_id = 2;
        $faci_img->filename = $r->faci_img->getClientOriginalName();
        $faci_img->path = $path . time() . $r->faci_img->getClientOriginalName();
        $faci_img->mime = $r->faci_img->extension();
        $faci_img->size = $r->faci_img->getSize();

        Storage::disk('s3')->put($faci_img->path, file_get_contents($file), 'public');

        try {

            $faci_img->save();

            return redirect()->action('FacilityController@viewType')->with('status', 'The facility name ' . $facility->name . ' has been added.');

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

    }

    public function view($typeid)
    {
        $facilities = Facility::whereType_id($typeid)->whereInstitution_id(Auth::user()->client->institution->id)->get();


        $facility_img = File::whereInstitution_id(Auth::user()->client->institution->id)->whereFacility_type($typeid)->get();

        return view('client.facility.view')
                    ->with(['typeid'=> $typeid,
                            'facilities'=> $facilities,
                            'facility_img'=> $facility_img]);

    }

    public function add($typeid)
    {
        return view('client.facility.add')->with('typeid', $typeid);
    }


    public function store(Request $r, $typeid)
    {
        $validator = Validator::make($r->all(), [
            'faci_name' => 'required|max:255',
            'faci_cap' => 'required|max:255',
            'faci_img' => 'required|image|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $facility = new Facility;

        $facility->institution_id = Auth::user()->client->institution->id;
        $facility->type_id = $typeid;
        $facility->name = $r->faci_name;
        $facility->capacity = $r->faci_cap;

        try {

            $facility->save();

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

        $file = $r->file('faci_img');
        $path = 'facility/' . Auth::user()->client->institution->id . '/';

        $faci_img = new File;
        $faci_img->institution_id = Auth::user()->client->institution->id;
        $faci_img->facility_id = $facility->id;
        $faci_img->facility_type = $typeid;
        $faci_img->type_id = 1;
        $faci_img->category_id = 2;
        $faci_img->filename = $r->faci_img->getClientOriginalName();
        $faci_img->path = $path . time() . $r->faci_img->getClientOriginalName();
        $faci_img->mime = $r->faci_img->extension();
        $faci_img->size = $r->faci_img->getSize();

        Storage::disk('s3')->put($faci_img->path, file_get_contents($file), 'public');

        try {

            $faci_img->save();
            $facility->save();

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

        return redirect()
                    ->action('FacilityController@viewType')
                    ->with(['typeid' => $typeid,
                        'status' => 'The facility name ' . $facility->name . ' has been added.']);
    }

    public function edit($typeid, $fid)
    {
        $facility = Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

        return View::make('client.facility.edit', compact('facility', 'typeid', 'fid'));
    }

    public function update(Request $r, $typeid, $fid)
    {
        $validator = Validator::make($r->all(), [
            'faci_name' => 'required|max:255',
            'faci_capacity' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $facility = Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

        $facility->name = $r->faci_name;
        $facility->capacity = $r->faci_capacity;

        try {

            $facility->save();

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

        if ($r->faci_img != '' || $r->faci_img != null) {

            $faci_img = File::whereFacilityIdAndFacilityType($fid, $typeid)->first();

            if ($faci_img == null) {

                $faci_img = new File;
            }

            $file = $r->file('faci_img');
            $path = 'facility/' . Auth::user()->client->institution->id . '/';

            $faci_img->institution_id = Auth::user()->client->institution->id;
            $faci_img->facility_id = $fid;
            $faci_img->facility_type = $typeid;
            $faci_img->type_id = 1;
            $faci_img->category_id = 2;
            $faci_img->filename = $file->getClientOriginalName();
            $faci_img->path = $path . time() . $file->getClientOriginalName();
            $faci_img->mime = $file->extension();
            $faci_img->size = $file->getSize();

            Storage::disk('s3')->put($faci_img->path, file_get_contents($file), 'public');

            try {

                $faci_img->save();

            } catch (QueryException $ex) {

                return redirect()
                    ->back()
                    ->withErrors($ex->errorInfo[2])
                    ->withInput();
            }
        }

        return redirect()
            ->action('FacilityController@viewType')
            ->with('facility', $facility)
            ->with('typeid', $typeid)
            ->with('fid', $fid)
            ->with(['status' => 'The facility name ' . $facility->name . ' has been updated.']);

    }

    public function delete($typeid, $fid)
    {
        $facility = Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

        try {

            $facility->delete();

            return redirect()
                ->back()
                ->with(['typeid'=> $typeid,
                    'status' => 'The ' . $facility->name . ' has been deleted', 'facilities']);

        } catch (QueryException $ex) {

            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\File;
use Auth;
use View;

class FacilityController extends Controller
{
    public function viewType()
    {
    	$facility_types = FacilityType::all();
    	return view('client.facility.viewType')->with('facility_types',$facility_types);
    }
    public function addAllType()
    {
    	return view('client.facility.addAllType');
    }
    public function storeAllType(Request $r)
    {
        $facility = new Facility;

        $facility->institution_id = Auth::user()->client->institution->id;
        $facility->type_id = $r->typeid;
        $facility->name = $r->faci_name;
        $facility->capacity = $r->faci_cap;

        try {
            $facility->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

        $faci_img = new File;
        $faci_img->institution_id = Auth::user()->client->institution->id;
        $faci_img->facility_id = $facility->id;
        $faci_img->facility_type = $facility->type_id;
        $faci_img->type_id = 1;
        $faci_img->category_id = 2;
        $faci_img->filename = $r->faci_img->getClientOriginalName();
        $faci_img->path = 'facility/'.$r->faci_img->getClientOriginalName();
        $faci_img->mime = $r->faci_img->extension();
        $faci_img->size = $r->faci_img->getSize();

      $facility->institution_id = Auth::user()->client->institution->id;
      $facility->type_id = $r->typeid;
      $facility->name = $r->faci_name;
      $facility->capacity = $r->faci_cap;

        $r->faci_img->move(public_path()."/img/facility",$r->faci_img->getClientOriginalName());


        try {
            $faci_img->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

      return redirect()->back()->with(['status'=>'The facility name '. $facility->name .' has been added.']);
    }
    public function view($typeid)
    {
    	$facilities = Facility::whereType_id($typeid)->whereInstitution_id(Auth::user()->client->institution->id)->get();


        $facility_img = File::whereInstitution_id(Auth::user()->client->institution->id)
                                ->whereFacility_type($typeid)->get();

        // return $facility_img;
        // return $facilities;
    	return view('client.facility.view')
                    ->with('typeid',$typeid)
                    ->with('facilities',$facilities)
                    ->with('facility_img',$facility_img);
    }

    public function add($typeid)
    {
    	return view('client.facility.add')->with('typeid',$typeid);
    }


    public function store(Request $r, $typeid)
    {
    	$facility = new Facility;

    	$facility->institution_id = Auth::user()->client->institution->id;
    	$facility->type_id = $typeid;
    	$facility->name = $r->faci_name;
    	$facility->capacity = $r->faci_cap;

        try {
            $facility->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

        $faci_img = new File;
        $faci_img->institution_id = Auth::user()->client->institution->id;
        $faci_img->facility_id = $facility->id;
        $faci_img->facility_type = $typeid;
        $faci_img->type_id = 1;
        $faci_img->category_id = 2;
        $faci_img->filename = $r->faci_img->getClientOriginalName();
        $faci_img->path = 'facility/'.$r->faci_img->getClientOriginalName();
        $faci_img->mime = $r->faci_img->extension();
        $faci_img->size = $r->faci_img->getSize();

        $r->faci_img->move(public_path()."/img/facility",$r->faci_img->getClientOriginalName());

        try {
            $facility->save();
            $faci_img->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

    	return redirect()
                ->back()
                ->with('typeid',$typeid)
                ->with(['status'=>'The facility name '. $facility->name .' has been added.']);
    }

    public function edit($typeid, $fid)
    {
    	$facility =  Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

    	return View::make('client.facility.edit',compact('facility','typeid','fid'));
    }

    public function update(Request $r,$typeid,$fid)
    {
    	$facility = Facility::whereId($fid)
                                ->whereType_id($typeid)
                                ->firstOrFail();

        $facility->name = $r->faci_name;
    	$facility->capacity = $r->faci_capacity;

        try {
            $facility->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
        }

        if($r->faci_img != '' || $r->faci_img != null)
        {
            $faci_img = File::whereFacilityIdAndFacilityType($fid,$typeid)->first();
            if( $faci_img == null)
            {
                $faci_img = new File;
            }
            $faci_img->institution_id = Auth::user()->client->institution->id;
            $faci_img->facility_id = $fid;
            $faci_img->facility_type = $typeid;
            $faci_img->type_id = 1;
            $faci_img->category_id = 2;
            $faci_img->filename = $r->faci_img->getClientOriginalName();
            $faci_img->path = 'facility/'.$r->faci_img->getClientOriginalName();
            $faci_img->mime = $r->faci_img->extension();
            $faci_img->size = $r->faci_img->getSize();

            $r->faci_img->move(public_path()."/img/facility",$r->faci_img->getClientOriginalName());    

            try {
                $faci_img->save();
            }catch(\Illuminate\Database\QueryException $ex){
                return $ex->errorInfo;
            }
        }
        



    	return redirect()
                ->back()
                ->with('facility',$facility)
                ->with('typeid',$typeid)
                ->with('fid',$fid)
                ->with(['status'=>'The facility name '. $facility->name .' has been updated.']);

    }

     public function delete($typeid,$fid)
    {
        $facility = Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

        try{
            $facility->delete();
        }catch(\Illuminate\Database\QueryException $ex) {

        }

        $facilities = Facility::whereType_id($typeid)->whereInstitution_id(Auth::user()->client->institution->id)->get();

        return redirect()
                    ->action('FacilityController@view')
                    ->with(['status'=>'The '. $facility->name .' has been deleted','typeid','facilities']);

    }
}

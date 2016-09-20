<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Facility;
use App\Models\FacilityType;
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

      $facility->institution_id = Auth::user()->institution->id;
      $facility->type_id = $r->typeid;
      $facility->name = $r->faci_name;
      $facility->capacity = $r->faci_cap;


      try{
        $facility->save();
      }catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
      }

      return redirect()->back()->with(['status'=>'The facility name '. $facility->name .' has been added.']);
    }
    public function view($typeid)
    {
    	$facilities = Facility::whereType_id($typeid)->whereInstitution_id(Auth::user()->institution->id)->get();

    	return view('client.facility.view')->with('typeid',$typeid)->with('facilities',$facilities);
    }

    public function add($typeid)
    {
    	return view('client.facility.add')->with('typeid',$typeid);
    }


    public function store(Request $r, $typeid)
    {
    	$facility = new Facility;

    	$facility->institution_id = Auth::user()->institution->id;
    	$facility->type_id = $typeid;
    	$facility->name = $r->faci_name;
    	$facility->capacity = $r->faci_cap;

    	try{
    		$facility->save();
    	}catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
    	}

    	return redirect()->back()->with('typeid',$typeid)->with(['status'=>'The facility name '. $facility->name .' has been added.']);
    }

    public function edit($typeid, $fid)
    {
    	$facility =  Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();

    	return View::make('client.facility.edit',compact('facility','typeid','fid'));
    }

    public function update(Request $r,$typeid,$fid)
    {
    	$facility = Facility::whereId($fid)->whereType_id($typeid)->firstOrFail();
    	$facility->name = $r->faci_name;
    	$facility->capacity = $r->faci_capacity;

    	try {
    		$facility->save();
    	}catch(\Illuminate\Database\QueryException $ex){
    		return $ex->errorInfo;
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

        $facilities = Facility::whereType_id($typeid)->whereInstitution_id(Auth::user()->institution->id)->get();

        return redirect()->back()->with(['status'=>'The '. $facility->name .' has been deleted','typeid','facilities']);

    }
}

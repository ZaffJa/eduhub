<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Facility;
use App\Models\FacilityType;
use Auth;

class FacilityController extends Controller
{
    public function viewType()
    {
    	$facility_types = FacilityType::all();
    	return view('client.facility.viewType')->with('facility_types',$facility_types);
    }

    public function view($id)
    {
    	$facilities = Facility::whereType_id($id)->whereInstitution_id(Auth::user()->institution->id)->get();

    	return view('client.facility.view')->with('typeid',$id)->with('facilities',$facilities);
    }

    public function add($id)
    {
    	return view('client.facility.add')->with('id',$id);
    }

    public function store(Request $r, $id)
    {
    	$facility = new Facility;

    	$facility->institution_id = Auth::user()->institution->id;
    	$facility->type_id = $id;
    	$facility->name = $r->faci_name;
    	$facility->capacity = $r->faci_cap;

    	try{
    		$facility->save();
    	}catch(\Illuminate\Database\QueryException $ex){
            return $ex->errorInfo;
    	}

    	return view('client.facility.add')->with('id',$id)->with('status','The facility name '. $facility->name .' has been updated.');
    }

    public function edit($id, $fid)
    {
    	$facility =  Facility::whereId($fid)->whereType_id($id)->firstOrFail();

    	return view('client.facility.edit', compact('facility'));
    }
}

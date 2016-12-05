<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School\School;
use App\Models\School\SchoolLocation;
use App\Models\School\SchoolType;
use Illuminate\Http\Request;
use View;

class SchoolController extends Controller
{
    private $type, $states, $school_type, $form_validations;

    public function __construct()
    {
        $this->states =
            ['Johor' => 'Johor',
                'Kedah' => 'Kedah',
                'Kelantan' => 'Kelantan',
                'Melaka' => 'Melaka',
                'Negeri Sembilan' => 'Negeri Sembilan',
                'Pahang' => 'Pahang',
                'Perak' => 'Perak',
                'Pulau Pinang' => 'Pulau Pinang',
                'Perlis' => 'Perlis',
                'Sabah' => 'Sabah',
                'Sarawak' => 'Sarawak',
                'Selangor' => 'Selangor',
                'Terengganu' => 'Terengganu',
            ];

        $this->type = ['rendah' => 'Peringkat Rendah', 'menengah' => 'Peringkat Menengah'];

        $this->school_type = SchoolType::pluck('name', 'id');

        $this->school = School::pluck('name','id');

        $this->form_validations = [
            'name' => 'required | string | between:10,85',
            'type' => 'required | string | between:5,25',
            'ppd' => 'required | string | between:5,25',
            'code' => 'required | integer | digits_between:4,15',
            'address' => 'required | string | between:15,85',
            'city' => 'required | string | between:3,65',
            'state' => 'required | string | between:3,30',
            'telephone' => 'required | string | between:8,15',
            'fax' => 'required | string | between:8,15',
        ];


    }

    public function view()
    {
        $schoolLocation = SchoolLocation::all();

        return View::make('school.main.dashboard', compact('schoolLocation'));
    }

    public function lists()
    {
        $schools = School::all();

        $school_type = $this->school_type;


        return View::make('school.main.list')->with(compact('schools', 'school_type'));
    }

    public function map()
    {
        $schoolLocation =  SchoolLocation::all();

        return View::make('school.map.map')->with(compact('schoolLocation'));
    }

    public function register()
    {
        $states = $this->states;

        $type = $this->type;

        $school_type = $this->school_type;


        return View::make('school.main.register-school')->with(compact('states', 'school_type', 'type'));
    }

    public function edit($id)
    {
        $school = School::whereId($id)->first();

        $states = $this->states;

        $type = $this->type;

        $school_type = $this->school_type;
        $location = SchoolLocation::whereSchoolId($id)->first();

        return View::make('school.main.edit')->with(compact('location','school', 'states', 'type', 'school_type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->form_validations);


        $school = School::create($request->except(['_token', 'lat', 'lng']));

        SchoolLocation::create([
            'school_id' => $school->id,
            'latitude' => $request->lat,
            'longtitude' => $request->lng
        ]);

        return redirect()->back()->with('status', 'Successfully added new school');
    }

    public function update(Request $request)
    {

        // Update the chosen school record
        $school = School::find($request->id);
        $school->update($request->except(['_token','lat','lng']));

        // Update the chosen school location record
        $schoolLocation = SchoolLocation::whereSchoolId($school->id)->first();
        $schoolLocation->update([
            'latitude' => $request->lat,
            'longtitude' => $request->lng
        ]);

        return redirect()->back()->with('status','Updated the school');

    }

}

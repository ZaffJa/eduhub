<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School\School;
use App\Models\School\SchoolLocation;
use App\Models\School\SchoolType;
use App\Models\School\SchoolStream;
use Illuminate\Http\Request;
use View;

class SchoolController extends Controller
{
    private $type, $states, $school_type, $form_validations,$schoolStream;

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

        $this->school = School::pluck('name', 'id');

        $this->schoolRank = School::select('name', 'rank')
            ->whereNotNull('rank')
            ->where('rank', '<=', 10)
            ->orderBy('rank', 'asc')->get();

        $this->schoolLocation = SchoolLocation::all();

        $this->schoolStream = SchoolStream::pluck('stream', 'id');

        $this->form_validations = [
            'name' => 'required | string | between:10,85',
            'type' => 'required | string | between:5,25',
            'ppd' => 'required | string | between:5,25',
            'code' => 'required | integer | digits_between:4,15',
            'address' => 'required | string',
            'city' => 'required | string | between:3,65',
            'state' => 'required | string | between:3,30',
            'telephone' => 'required | string | between:8,15',
            'fax' => 'required | string | between:8,15',
            'rank' => 'integer | unique:schools'
        ];


    }

    public function application()
    {
        return View::make('school.application.application');
    }

    public function view()
    {
        $schoolLocation = $this->schoolLocation;
        $schoolRank = $this->schoolRank;

        return View::make('school.main.dashboard', compact('schoolLocation', 'schoolRank'));
    }

    public function viewSchool($id)
    {
        $school = School::whereSlug($id)->first();

        $schoolLocation = $this->schoolLocation;
        $schoolRank = $this->schoolRank;


        if (empty($school)) {

            return redirect()->action('School\SchoolController@view');

        } else {

            return view('school.main.dashboard', compact('school', 'schoolLocation', 'schoolRank'));

        }

    }

    public function lists()
    {
        $schools = School::paginate(9);
        $school_type = $this->school_type;
        $states = $this->states;
        $streams = $this->schoolStream;

        return View::make('school.main.list')->with(compact('schools', 'school_type', 'states','streams'));
    }

    public function filter(Request $request)
    {

        if (!empty($request->type)) {
            $schools = School::whereSchoolTypeId($request->type)->paginate(9);

        } else {
            $schools = School::paginate(9);

        }

        $school_type = $this->school_type;
        $type = $request->type;
        $states = $this->states;
        $streams = $this->schoolStream;

        return View::make('school.main.list')->with(compact('schools', 'school_type', 'type', 'states','streams'));
    }

    public function filterState(Request $request)
    {

        if (!empty($request->school_state)) {
            $schools = School::whereState($request->school_state)->paginate(9);

        } else {
            $schools = School::paginate(9);

        }

        $school_type = $this->school_type;
        $school_state = $request->school_state;
        $states = $this->states;
        $streams = $this->schoolStream;


        return View::make('school.main.list')->with(compact('schools', 'school_type', 'school_state', 'states','streams'));
    }

    public function filterStream(Request $request)
    {

        if (!empty($request->school_stream)) {
            $schools = School::whereStreamTypeId($request->school_stream)->paginate(9);

        } else {
            $schools = School::paginate(9);

        }

        $school_type = $this->school_type;
        $school_state = $request->school_state;
        $states = $this->states;
        $streams = $this->schoolStream;


        return View::make('school.main.list')->with(compact('schools', 'school_type', 'school_state', 'states','streams'));
    }

    public function map()
    {
        $schoolLocation = $this->schoolLocation;

        return View::make('school.map.map')->with(compact('schoolLocation'));
    }

    public function register()
    {
        $states = $this->states;

        $type = $this->type;

        $school_type = $this->school_type;

        $school_stream = $this->schoolStream;

        return View::make('school.main.register-school')->with(compact('states', 'school_type', 'type', 'school_stream'));
    }

    public function edit($id)
    {
        $school = School::whereSlug($id)->first();

        $states = $this->states;

        $type = $this->type;

        $school_type = $this->school_type;

        $location = SchoolLocation::whereSchoolId($school->id)->first();

        $school_stream = $this->schoolStream;


        return View::make('school.main.edit')->with(compact('location', 'school', 'states', 'type', 'school_type', 'school_stream'));
    }

    public function store(Request $request)
    {

//        return $request->all();
        $this->validate($request, $this->form_validations);

        $request['slug'] = $this->slugify($request->name);
//        $request['code'] = (integer) $request->code;


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

        $this->validate($request, $this->form_validations);

        // Update the chosen school record
        $school = School::find($request->id);
        $school->update($request->except(['_token', 'lat', 'lng']));

        // Update the chosen school location record
        $schoolLocation = SchoolLocation::whereSchoolId($school->id)->first();


        if (isset($schoolLocation)) {

            $schoolLocation->update([
                'latitude' => $request->lat,
                'longtitude' => $request->lng
            ]);

        } else {

            SchoolLocation::create([
                'school_id' => $school->id,
                'latitude' => $request->lat,
                'longtitude' => $request->lng
            ]);

        }

        return redirect()->back()->with('status', 'Updated the school');

    }

    public function delete($id)
    {
        $school = School::find($id);

        $name = $school->name;

        $school->delete();

        return $name;
    }

    public function search(Request $request)
    {
        $schools = School::where('name', 'like', '%' . $request->term . '%')->select('name')->get();
        $data = [];

        foreach ($schools as $school) {
            $data[] = $school->name;
        }

        return response()->json($data);
    }

    public function postSearch(Request $request)
    {
        $school = School::whereName($request->name)->first();

        if (empty($school)) {

            return redirect()->back()->with('status', 'No school found for this query');
        }

        return redirect()->action('School\SchoolController@viewSchool', $school->slug);
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


}

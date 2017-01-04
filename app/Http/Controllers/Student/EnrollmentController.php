<?php

namespace App\Http\Controllers\Student;

use App\Models\Course;
use App\Models\Institution;
use App\Models\InstitutionUser;
use App\Models\StudentEnrollment;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;

class EnrollmentController extends Controller
{
    public function index()
    {
        return view('client.enroll.view');
    }

    public function view($slug)
    {
        $institution = Institution::where('slug', $slug)->first();
        $enrollments = StudentEnrollment::where('user_id', auth()->user()->id)->get();

        return view('student.institution.enroll')->with(compact('institution', 'enrollments'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'application_form' => 'file|max:5012'
        ]);

        $file = $request->file('application_form');
        $filePath = 'enrollment/' . $request->get('slug') . auth()->user()->id . '/' . $file->getClientOriginalName();
        $institution = Institution::where('slug', $request->get('slug'))->first();

        DB::beginTransaction();
        try {
            $check_enrollments = StudentEnrollment::where('institution_id', $institution->id)
                ->where('user_id', auth()->user()->id)
                ->first();

            // Check if student already apply for this institution
            if ($check_enrollments) throw new Exception('You have already applied for this institution');

            StudentEnrollment::create([
                'user_id' => auth()->user()->id,
                'uploaded_file_path' => $filePath,
                'institution_id' => $institution->id
            ]);
//                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        return redirect()->back()->with('status', 'Successfully upload form');
    }

    public function storeProof(Request $request)
    {
        $this->validate($request, [
            'enrollment_proof_form' => 'file|max:5012'
        ]);

        $file = $request->file('enrollment_proof_form');
        $filePath = 'enrollment/proof/' . $request->get('slug') . auth()->user()->id . '/' . $file->getClientOriginalName();
        $institution = Institution::where('slug', $request->get('slug'))->first();

        DB::beginTransaction();
        try {
            $studentEnrollment = StudentEnrollment::where('institution_id', $institution->id)
                ->where('user_id', auth()->user()->id)
                ->whereNotNull('proof_file_path')
                ->first();

            // Check if student already upload proof files
            if ($studentEnrollment) throw new Exception('You have already uploaded the proof files');

            $studentEnrollment = StudentEnrollment::where('institution_id', $institution->id)
                ->where('user_id', auth()->user()->id)
                ->first();

            $studentEnrollment->proof_file_path = $filePath;
            $studentEnrollment->save();

            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        return redirect()->back()->with('status', 'Uploaded the proof.');
    }
}

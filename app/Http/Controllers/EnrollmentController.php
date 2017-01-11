<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\StudentEnrollment;
use App\Notifications\ConfirmPayment;
use App\Notifications\StudentEnrolled;
use App\User;
use Auth;
use Aws\Exception\AwsException;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Storage;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = StudentEnrollment::where('institution_id', auth()->user()->client->institution->id)->get();

        return view('client.enrollment.view')->with(compact('enrollments'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'application_form' => 'file | max:5012|required'
        ]);

        DB::beginTransaction();
        try {
            $institution = Auth::user()->client->institution;
            $file = $request->file('application_form');
            $oldFilePath = $institution->enrollment_file_path;
            $newFilePath = time() . '_' . $institution->name . '_' . $file->getClientOriginalName();

            // Delete old file if exist
            if (Storage::disk('s3')->exists($oldFilePath)) {
                Storage::disk('s3')->delete($oldFilePath);
            }

            Storage::disk('s3')->put($newFilePath, file_get_contents($file), 'public');
            $institution->enrollment_file_path = $newFilePath;
            $institution->save();
            DB::commit();

            return redirect()->back()->with('status', 'Successfully upload form');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (AwsException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function enroll(StudentEnrollment $studentEnrollment)
    {
        $studentEnrollment->status = 3;
        $studentEnrollment->save();

        $admin =  $this->getAdmin();
        $admin->notify(new StudentEnrolled($studentEnrollment->user,auth()->user()->client->institution));

        return redirect()->back()->with('status', 'This student has been confirmed enrolled in your institution');
    }

    public function accept(StudentEnrollment $studentEnrollment)
    {
        $studentEnrollment->status = 1;
        $studentEnrollment->save();

        return redirect()->back()->with('status', 'This student has been confirmed accepted in your institution');
    }

    public function reject(StudentEnrollment $studentEnrollment)
    {
        $studentEnrollment->status = 2;
        $studentEnrollment->save();

        return redirect()->back()->with('status', 'This student has been confirmed reject in your institution');
    }

    public function toggleStatus(Request $request)
    {
        Institution::find(Auth::user()->client->institution->id)
                    ->update(['enrollment_status' => $request->enrollment_status]);

        return redirect()->back()->with('status', 'Updated status of application form');
    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'payment_details' => 'required'
        ]);
        $studentEnrollment = StudentEnrollment::find($request->id);
        // Confirm the payment
        if($studentEnrollment->status == 3) {
            $studentEnrollment->status = 4;
            $studentEnrollment->payment_details = $request->payment_details or null;

            $studentEnrollment->user->notify(new ConfirmPayment($studentEnrollment->user));

        }
        // Cancel the payment
        else if($studentEnrollment->status == 4) $studentEnrollment->status = 3;
        else $studentEnrollment->status = 3;

        $studentEnrollment->save();

        return redirect()->back()->with('status','Update status for the record');
    }


    public function getAdmin()
    {
        foreach (User::all() as $user)
        {
            if($user->hasRole('admin'))
                return $user;
        }
        return null;
    }

}

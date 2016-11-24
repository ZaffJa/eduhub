<?php

namespace App\Http\Controllers\Student;

use App\Models\FileCategory;
use App\Models\Student\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Student\StudentFile;
use App\Models\UserLocation;

use Storage;
use Auth;

use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $student = auth()->user()->student;
        $location = UserLocation::whereUserId(Auth::user()->id)->first();

        return view('student.profile.view',compact('user','student','location'));
    }

    public function edit()
    {
        $user = auth()->user();
        $student = auth()->user()->student;
        $location = UserLocation::whereUserId(Auth::user()->id)->first();

        return view('student.profile.edit',compact('user','student','location'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'image'=>'image|max:2048',
            'name'=>'required|max:65',
            'email'=>'required|email|max:65',
        ]);


        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        $student = Student::whereUserId(Auth::user()->id)->first();

        if($student == null){

            Student::create([
                'user_id' => Auth::user()->id,
                'address' => $request->school,
                'phone' => $request->phone,
                'school' => $request->school,
                'birthday' => $request->birthday,

            ]);

        } else {

            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->school = $request->school;
            $student->birthday = $request->birthday;
            $student->save();

        }

        $location = UserLocation::whereUserId(Auth::user()->id)->first();

        if($location == null){

            UserLocation::create([
                'user_id' => Auth::user()->id,
                'latitude' => $request->latitude,
                'longtitude' => $request->longtitude,
            ]);

        } else {

            $location->latitude = $request->latitude;
            $location->longtitude = $request->longtitude;
            $location->save();

        }

        if($request->hasFile('image'))
        {
            $file = StudentFile::whereUserId(Auth::user()->id)->first();
            $image = $request->file('image');
            $path = 'student/profile/'.Auth::user()->id.'/'.$image->getClientOriginalName();

            if($file != null){

                $this->updateProfilePicture($file,$image,$path);

            }else{

                $fileCategory  = FileCategory::whereName('Student Profile Pic')->first();

                if(!isset($fileCategory)){
                    $fileCategory = FileCategory::create(['name'=>'Student Profile Pic']);
                }

                StudentFile::create([
                    'file_type_id'=>1,  // 1 corresponce to image
                    'file_category_id'=>$fileCategory->id, //corresponce to student profile picture
                    'user_id'=> Auth::user()->id,
                    'filename'=>$image->getClientOriginalName(),
                    'path'=>$path,
                    'mime'=>$image->getClientMimeType(),
                    'size'=>$image->getClientSize(),
                    'description'=>'No description',
                ]);

            }

            Storage::disk('s3')->put($path,file_get_contents($image),'public');
            
        }


        return redirect()
                ->action('Student\ProfileController@index')
                ->with('status','Succesfully update your profile');
    }





    public function updateProfilePicture($old,$new,$path)
    {
        $old->filename = $new->getClientOriginalName();
        $old->path = $path;
        $old->mime = $new->getClientMimeType();
        $old->size = $new->getClientSize();

        $old->update();
    }
}

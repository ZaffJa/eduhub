<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\ShortCourse\Provider;
use App\Models\ShortCourse\ActivateShortProvider;
use App\Models\ShortCourse\ProviderType;
use App\Models\ShortCourse\Course;
use App\Models\ShortCourse\Level;
use App\Models\ShortCourse\Field;
use App\Models\ShortCourse\File;
use App\Models\BankType;
use App\Models\PeriodType;
use App\Models\Role;
use Validator;
use View;
use Auth;
use App\User;

class ShortController extends Controller
{

    public function postLogin(Request $request)
    {
        if($user = Auth::attempt($request->only('email','password'))){

            $user = User::whereEmail($request->email)->first();

            if($user->short_provider != null){

                if($user->short_provider->status != null){   //  User exist and has verify email

                    return redirect()->action('ShortController@dashboard')->with(compact('ShortCoursesCount'));

                }else{  // User has not verify email yet

                    $activate = ActivateShortProvider::whereEmail(Auth::user()->email)->first();
                    Auth::logout(); //must logout because Auth::attempt will automatically logged user when true

                    if($activate == null){    // User has data in users table but did not register for short course

                        $provider_types = \App\Models\ShortCourse\ProviderType::pluck('name','id');
                        return view('short.auth.register')
                            ->with(compact('provider_types'))
                            ->withErrors([
                                'status'=>'You have not registered yet. Please register first.'
                            ]);

                    }else {

                        return redirect()->action('ShortController@getLogin')
                          ->withErrors([
                            'password'=>'Your account has not been activated. Please  verify your email.',
                            'activate'=>$activate->token]
                        );
                    }
                }
            }
        }
        return redirect()->back()
          ->withErrors([
            'password'=>'These credentials is either wrong or does not exist in our database.']);
    }

    public function getLogin()
    {
        $hello = 'helo';
        return view('short.auth.login');
    }

    public function getRegister()
    {
        $provider_types = \App\Models\ShortCourse\ProviderType::pluck('name','id');
        return view('short.auth.register')->with(compact('provider_types'));
    }

    public function postRegister(Request $request)
    {
        $input = $request->except(['password_confirmation','_token']);

        $this->validate($request, [
            'name' => 'required|max:75',
            'email' => 'required|unique:users|max:45|email',
            'description' => 'required|max:455',
            'established' => 'required|max:255',
            'location' => 'required|max:255',
            'type' => 'required',
            'password' => 'required|alpha_num|max:20|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        try{

            $input['password'] = bcrypt($input['password']);    //encrypt the password
            $user = User::create($input);   //mass assign input

            $provider = new Provider;
            $provider->type_id = $request->type;
            $provider->parent_id = $user->id;  //get id from users table
            $provider->name = $user->name;  //get name from users table
            $provider->slug = $this->slugify($user->name); //custom slug function text from column name in users table
            $provider->description = $request->description;
            $provider->established = $request->established;
            $provider->location = $request->location;
            $provider->save();

            $activate = ActivateShortProvider::create([
                'email' => $user->email,
                'token' => str_random(64),
                'status'=> 0
            ]);

            $role = Role::create([
                'user_id'=>$user->id,
                'role_id'=>3
            ]);

            $user->notify(new \App\Notifications\RegisterConsultant($user->name,$activate->token));

            return view('short.auth.login')->with('status','Your account has been created. Please verify your email before login.');

        }catch(\Illuminate\Database\QueryException $ex){

            return redirect()->back()->withErrors($ex->errorInfo);

        }

    }

    public function dashboard()
    {
        $profilePic = File::whereFileableId(Auth::user()->short_provider->id)->first();
        $status = 'hello';
        $ShortCoursesCount =  Course::whereProviderId(Auth::user()->short_provider->id)->count();
        
        return View::make('short.dashboard',compact('profilePic','status','ShortCoursesCount'));
    }

    public function viewCourse()
    {
        $course = Course::whereProviderId(Auth::user()->short_provider->id)->get();

        return View::make('short.course.view',compact('course'));
    }

    public function activateAccount($token)
    {
        $activateUser = ActivateShortProvider::whereTokenAndStatus($token,0)->first();

        if($activateUser)
        {
            $user = User::whereEmail($activateUser->email)->first();
            $sp = Provider::whereParentId($user->id)->first();

            $activateUser->status = 1;
            $sp->status = 1;

            $activateUser->save();
            $sp->save();

            Role::create([
                'user_id'=>$user->id,
                'role_id'=>3
            ]);

            Auth::login($user);

            return redirect()->action('ShortController@dashboard')->with('status','Welcome '.Auth::user()->name.'!');

        }else{

            return view('errors.token-verified');

        }
    }


    public function editprofile()
    {
        $providerType = ProviderType::pluck('name','id');
        $bankType = BankType::pluck('name','id');
        $provider = Auth::user()->short_provider;
        $profilePic = File::whereFileableId(Auth::user()->short_provider->id)->first();

        return View::make('short.profile.edit',compact('providerType','bankType','provider','profilePic'));
    }

    public function updateProfile(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:255',
            'bank_account' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);

        try{
            $provider =  Provider::whereId(Auth::user()->short_provider->id)->firstOrFail();

            $provider->name =  $r->name;
            $provider->headline = $r->headline;
            $provider->abbreviation = $r->abbreviation;
            $provider->established = $r->established;
            $provider->location =  $r->location;
            $provider->type_id = $r->type_id;
            $provider->website = $r->website;
            $provider->facebook = $r->facebook;
            $provider->instagram = $r->instagram;
            $provider->phone = $r->phone;
            $provider->description = $r->description;
            $provider->bank_type_id = $r->bank_type;
            $provider->bank_account = $r->bank_account;
            $provider->save();


        }catch(\Illuminate\Database\QueryException $ex){
            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }

        if($r->provider_pic)
        {
            try{

            if(!$provider_pic = File::whereFileableId(Auth::user()->short_provider->id)->first())
            {
                $provider_pic = new File;
            }else{
             $provider_pic = File::whereFileableId(Auth::user()->short_provider->id)->first();
            }

            $provider_pic->fileable_id = $provider->id;
            $provider_pic->type_id = 1;
            $provider_pic->category_id = 3;
            $provider_pic->filename = $r->provider_pic->getClientOriginalName();
            $provider_pic->path = 'shortProvider/'.$r->provider_pic->getClientOriginalName();
            $provider_pic->mime = $r->provider_pic->extension();
            $provider_pic->size = $r->provider_pic->getSize();
            $file =  $r->file('provider_pic');

            // Save to public path
            // $r->provider_pic->move(public_path()."/img/provider",$r->provider_pic->getClientOriginalName());

            Storage::disk('s3')->put('shortProvider/'.$r->provider_pic->getClientOriginalName(),file_get_contents($file),'public');


            $provider_pic->save();

            }catch(\Illuminate\Database\QueryException $ex){
                return redirect()
                    ->back()
                    ->withErrors($ex->errorInfo[2])
                    ->withInput();
            }

        }
    	return  redirect()
                ->back()
                ->with(['status'=>'The provider name '.$provider->name.' has been updated.']);

    }

    public function resendActivateAccount($token)
    {
        $activate = ActivateShortProvider::whereToken($token)->first();
        $user = User::whereEmail($activate->email)->first();
        $user->notify(new \App\Notifications\RegisterConsultant($user->name,$activate->token));

        return redirect()
            ->back()
            ->with('status','We have sent you an email. Please verify your email address to login.');
    }

    public function activateInstitutionUser($user_id)
    {
        $user = User::find($user_id);

        try{
            $institution = $user->client->institution;
            $sp = new Provider;
            $sp->type_id = 1;
            $sp->parent_id = $user->id;
            $sp->name = $user->name;
            $sp->slug = $this->slugify($user->name);
            $sp->abbreviation = $institution->abbreviation;
            $sp->description = $institution->description;
            $sp->established = $institution->established;
            $sp->location = $institution->location;
            $sp->website = $institution->website;
            $sp->website = $institution->website;
            $sp->status = 1;

            $sp->save();

            Role::create([
                'user_id'=>$user->id,
                'role_id'=>3
            ]);

            return view('short.dashboard');

        }catch(\Illuminate\Database\QueryException $ex){

            return redirect()->back()->withErrors('Something went wrong. We cannot register you to short courses');
        }
    }

    public function institutionShortCourse()
    {
        return $this->dashboard();
    }

    public function viewProfile()
    {
    	$provider = Auth::user()->short_provider;
    	$providerType = Auth::user()->short_provider->type;
        $profilePic = File::whereFileableId(Auth::user()->short_provider->id)->first();

    	return View::make('short.profile.view', compact('provider','providerType','profilePic'));
    }

    public function addCourse()
    {
        $periodType = PeriodType::pluck('name','id');
        $levelType = Level::pluck('name','id');
        $fieldType = Field::orderBy('name')->pluck('name','id')->toArray();

        return View::make('short.course.add', compact('periodType','levelType','fieldType'));
    }

    public function storeCourse(Request $r)
    {
        // $validator = Validator::make($r->all(), [
        //     'name_en' => 'required|max:255',
        //     'name_ms' => 'required|max:255',
        //     'location' => 'required',
        //     'price' => 'required',
        //     'short_pic1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        //     'short_pic2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        //     'short_pic3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        //     'short_pic4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        //     'short_pic5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        // ]);
        //
        // if ($validator->fails()) {
        //    return redirect()
        //                ->back()
        //                ->withErrors($validator)
        //                ->withInput();
        // }

        try{

            $r['provider_id'] = Auth::user()->short_provider->id;
            $r['mode_id'] = 2;
            $r['slug'] = $this->slugify($r->name_en);

            if($r->field_id == 0)
            {

                $field = new Field;

                $field->name = $r->others;
                $field->slug = $this->slugify($r->others);

                $field->save();


                // Send notification to admin
                $roles = Role::all();


                $an = new \App\Models\AdminNotification;
                $an->message = 'A user named '.Auth::user()->short_provider->name.' with id '.Auth::user()->short_provider->id.' has created a new field name called '. $r->others.'.';
                $an->action = 1;
                $an->user_id = Auth::user()->id;
                $an->click = 0;
                $an->save();

                //Send email to admin
                foreach ($roles as $role) {
                    if($role->user_role->name == "admin")
                    {
                        $admin = User::find($role->user_id);

                        $admin->notify(new \App\Notifications\ShortCreateOther(
                                        Auth::user()->short_provider->name,
                                        $r->others,
                                        Auth::user()->id));
                    }
                }

                $r['field_id'] = $field->id;

            }

            $course = Course::create($r->all());

            if($r->short_pic1){
                $short_pic1 = new File;
                $file = $r->file('short_pic1');
                $short_pic1->fileable_id = Auth::user()->short_provider->id;
                $short_pic1->filename = $course->id."short_pic1";
                $short_pic1->category_id = 4;
                $short_pic1->type_id = 2;
                $short_pic1->path = "shortCourse/".$course->id."short_pic1";
                $short_pic1->mime = $r->short_pic1->extension();
                $short_pic1->size = $r->short_pic1->getSize();

                Storage::disk('s3')->put('shortCourse/'.$course->id.'short_pic1',file_get_contents($file),'public');


                $short_pic1->save();
            }

            if($r->short_pic2){
                $short_pic2= new File;
                $file = $r->file('short_pic2');
                $short_pic2->fileable_id = Auth::user()->short_provider->id;
                $short_pic2->filename = $course->id."short_pic2";
                $short_pic2->category_id = 4;
                $short_pic2->type_id = 2;
                $short_pic2->path = "shortCourse/".$course->id."short_pic2";
                $short_pic2->mime = $r->short_pic2->extension();
                $short_pic2->size = $r->short_pic2->getSize();

                // $r->short_pic2->move(public_path()."/img/shortCourse",$course->id."short_pic2");
                Storage::disk('s3')->put('shortCourse/'.$course->id.'short_pic2',file_get_contents($file),'public');


                $short_pic2->save();
            }

            if($r->short_pic3){
                $short_pic3 = new File;
                $file = $r->file('short_pic3');
                $short_pic3->fileable_id = Auth::user()->short_provider->id;
                $short_pic3->filename = $course->id."short_pic3";
                $short_pic3->category_id = 4;
                $short_pic3->type_id = 2;
                $short_pic3->path = "shortCourse/".$course->id."short_pic3";
                $short_pic3->mime = $r->short_pic3->extension();
                $short_pic3->size = $r->short_pic3->getSize();

                // $r->short_pic3->move(public_path()."/img/shortCourse",$course->id."short_pic3");
                Storage::disk('s3')->put('shortCourse/'.$course->id.'short_pic3',file_get_contents($file),'public');


                $short_pic3->save();
            }

            if($r->short_pic4){
                $short_pic4 = new File;
                $file = $r->file('short_pic4');
                $short_pic4->fileable_id = Auth::user()->short_provider->id;
                $short_pic4->filename = $course->id."short_pic4";
                $short_pic4->category_id = 4;
                $short_pic4->type_id = 2;
                $short_pic4->path = "shortCourse/".$course->id."short_pic4";
                $short_pic4->mime = $r->short_pic4->extension();
                $short_pic4->size = $r->short_pic4->getSize();

                // $r->short_pic4->move(public_path()."/img/shortCourse",$course->id."short_pic4");
                Storage::disk('s3')->put('shortCourse/'.$course->id.'short_pic4',file_get_contents($file),'public');


                $short_pic4->save();
            }

            if($r->short_pic5){
                $short_pic5 = new File;
                $file = $r->file('short_pic5');
                $short_pic5->fileable_id = Auth::user()->short_provider->id;
                $short_pic5->filename = $course->id."short_pic5";
                $short_pic5->category_id = 4;
                $short_pic5->type_id = 2;
                $short_pic5->path = "shortCourse/".$course->id."short_pic5";
                $short_pic5->mime = $r->short_pic5->extension();
                $short_pic5->size = $r->short_pic5->getSize();

                // $r->short_pic5->move(public_path()."/img/shortCourse",$course->id."short_pic5");
                Storage::disk('s3')->put('shortCourse/'.$course->id.'short_pic5',file_get_contents($file),'public');


                $short_pic5->save();
            }

        }catch(\Illuminate\Database\QueryException $e){
            return $e->errorInfo;
        }

        return redirect()
                ->route('short.course.view')
                ->with(['status'=>'Course '.$course->name_en.' successfully added']);
    }

    public function viewCourseInfo($id)
    {
        $course = Course::whereId($id)->firstOrFail();
        $picture  = DB::table('short_files')
                        ->where('category_id',4)
                        ->where('filename','like',$id.'%')
                        ->get();

        return View::make('short.course.course-info',compact('course','picture'));
    }

    public function editCourse($id)
    {
        $course = Course::whereId($id)->firstOrFail();
        $periodType = PeriodType::pluck('name','id');
        $levelType = Level::pluck('name','id');
        $fieldType = Field::orderBy('name')->pluck('name','id')->toArray();
        $picture = DB::table('short_files')
                        ->where('category_id',4)
                        ->where('filename','like',$id.'%')
                        ->get();

        return View::make('short.course.edit',compact('picture','course','periodType','levelType','fieldType'));
    }

    public function updateCourse(Request $r,$id)
    {
        $validator = Validator::make($r->all(), [
            'name_en' => 'required|min:15|max:255',
            'name_ms' => 'required|max:255',
            'location' => 'required',
            'price' => 'required',
            'short_pic1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'short_pic2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'short_pic3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'short_pic4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'short_pic5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        try{

            $course = Course::whereId($id)->firstOrFail();

            $course->name_en = $r->name_en;
            $course->name_ms = $r->name_ms;
            $course->description = $r->description;
            $course->period_value_min = $r->period_value_min;
            $course->period_value_max = $r->period_value_max;
            $course->period_type_id = $r->period_type_id;
            $course->level_id = $r->level_id;
            $course->code = $r->code;
            $course->start_date = $r->start_date;
            $course->length = $r->length;
            $course->class_size = $r->class_size;
            $course->price = $r->price;

            if($r->exam_fee)
            {
            $course->exam_fee = $r->exam_fee;
            }

            $course->note = $r->note;
            $course->language = $r->language;
            $course->inclusive = $r->inclusive;

            if($r->hrdf_scheme){
            $course->hrdf_scheme = $r->hrdf_scheme;
            }

            $course->learning_outcome = $r->learning_outcome;

            if($r->field_id == 0)
            {
                $field = new Field;

                $field->name = $r->others;
                $field->slug = $this->slugify($r->others);

                $field->save();

                $course->field_id = $field->id;

            }else {

                $course->field_id = $r->field_id;
            }

            $course->save();

            if($r->short_pic1){

                $short_pic1 = DB::table('short_files')
                                ->where('category_id',4)
                                ->where('filename',$id.'short_pic1')
                                ->first();

                if($short_pic1 == null)
                {
                $short_pic1 = new File;
                $short_pic1->fileable_id = Auth::user()->short_provider->id;
                $short_pic1->filename = $id."short_pic1";
                $short_pic1->path = "shortCourse/".$id."short_pic1";
                $short_pic1->category_id = 4;
                $short_pic1->type_id = 2;
                $short_pic1->mime = $r->short_pic1->getClientOriginalExtension();
                $short_pic1->size = $r->short_pic1->getSize();
                $short_pic1->save();
                }
                $file = $r->file('short_pic1');

                // $r->short_pic1->move(public_path()."/img/shortCourse",$id."short_pic1");
                Storage::disk('s3')->put('shortCourse/'.$id.'short_pic1',file_get_contents($file),'public');


                DB::table('short_files')
                    ->where('category_id',4)
                    ->where('filename',$id.'short_pic1')
                    ->update(['size' => $r->short_pic1->getSize(), 'mime' => $r->short_pic1->getClientOriginalExtension() ]);

            }
            if($r->short_pic2){

                $short_pic2 = DB::table('short_files')
                                ->where('category_id',4)
                                ->where('filename',$id.'short_pic2')
                                ->first();

                if($short_pic2 == null)
                {
                $short_pic2 = new File;
                $short_pic2->fileable_id = Auth::user()->short_provider->id;
                $short_pic2->filename = $id."short_pic2";
                $short_pic2->path = "shortCourse/".$id."short_pic2";
                $short_pic2->category_id = 4;
                $short_pic2->type_id = 2;
                $short_pic2->mime = $r->short_pic2->getClientOriginalExtension();
                $short_pic2->size = $r->short_pic2->getSize();
                $short_pic2->save();
                }
                $file = $r->file('short_pic2');

                // $r->short_pic2->move(public_path()."/img/shortCourse",$id."short_pic2");
                Storage::disk('s3')->put('shortCourse/'.$id.'short_pic2',file_get_contents($file),'public');


                DB::table('short_files')
                    ->where('category_id',4)
                    ->where('filename',$id.'short_pic2')
                    ->update(['size' => $r->short_pic2->getSize(), 'mime' => $r->short_pic2->getClientOriginalExtension() ]);
            }
            if($r->short_pic4){

                $short_pic4 = DB::table('short_files')
                                ->where('category_id',4)
                                ->where('filename',$id.'short_pic4')
                                ->first();

                if($short_pic4 == null)
                {
                $short_pic4 = new File;
                $short_pic4->fileable_id = Auth::user()->short_provider->id;
                $short_pic4->filename = $id."short_pic4";
                $short_pic4->path = "shortCourse/".$id."short_pic4";
                $short_pic4->category_id = 4;
                $short_pic4->type_id = 2;
                $short_pic4->mime = $r->short_pic4->getClientOriginalExtension();
                $short_pic4->size = $r->short_pic4->getSize();
                $short_pic4->save();
                }
                $file = $r->file('short_pic4');
                Storage::disk('s3')->put('shortCourse/'.$id.'short_pic4',file_get_contents($file),'public');

                // $r->short_pic4->move(public_path()."/img/shortCourse",$id."short_pic4");

                DB::table('short_files')
                    ->where('category_id',4)
                    ->where('filename',$id.'short_pic4')
                    ->update(['size' => $r->short_pic4->getSize(), 'mime' => $r->short_pic4->getClientOriginalExtension() ]);
            }
            if($r->short_pic3){

                $short_pic3 = DB::table('short_files')
                                ->where('category_id',4)
                                ->where('filename',$id.'short_pic3')
                                ->first();

                if($short_pic3 == null)
                {
                $short_pic3 = new File;
                $short_pic3->fileable_id = Auth::user()->short_provider->id;
                $short_pic3->filename = $id."short_pic3";
                $short_pic3->path = "shortCourse/".$id."short_pic3";
                $short_pic3->category_id = 4;
                $short_pic3->type_id = 2;
                $short_pic3->mime = $r->short_pic3->getClientOriginalExtension();
                $short_pic3->size = $r->short_pic3->getSize();
                $short_pic3->save();
                }

                $file = $r->file('short_pic3');
                // $r->short_pic3->move(public_path()."/img/shortCourse",$id."short_pic3");
                Storage::disk('s3')->put('shortCourse/'.$id.'short_pic3',file_get_contents($file),'public');


                DB::table('short_files')
                    ->where('category_id',4)
                    ->where('filename',$id.'short_pic3')
                    ->update(['size' => $r->short_pic3->getSize(), 'mime' => $r->short_pic3->getClientOriginalExtension() ]);
            }
            if($r->short_pic5){

                $file = $r->file('short_pic5');
                $short_pic5 = DB::table('short_files')
                                ->where('category_id',4)
                                ->where('filename',$id.'short_pic5')
                                ->first();

                if($short_pic5 == null)
                {
                $short_pic5 = new File;
                $short_pic5->fileable_id = Auth::user()->short_provider->id;
                $short_pic5->filename = $id."short_pic5";
                $short_pic5->path = "shortCourse/".$id."short_pic5";
                $short_pic5->category_id = 4;
                $short_pic5->type_id = 2;
                $short_pic5->mime = $r->short_pic5->getClientOriginalExtension();
                $short_pic5->size = $r->short_pic5->getSize();
                $short_pic5->save();
                }


                // $r->short_pic5->move(public_path()."/img/shortCourse",$id."short_pic5");
                Storage::disk('s3')->put('shortCourse/'.$id.'short_pic5',file_get_contents($file),'public');


                DB::table('short_files')
                    ->where('category_id',4)
                    ->where('filename',$id.'short_pic5')
                    ->update(['size' => $r->short_pic5->getSize(), 'mime' => $r->short_pic5->getClientOriginalExtension() ]);
            }


        }catch(\Illuminate\Database\QueryException $e){
            return redirect()
                    ->back()
                    ->withErrors([$e->errorInfo[2]]);
        }

                return redirect()
                ->back()
                ->with(['status'=>'The course '.$course->name_en.' has been updated']);


    }


    public function destroy($id)
    {
        $shortcourse = Course::find($id);

        try {

            $shortcourse->delete();

            return redirect()
                ->action('ShortController@viewCourse')
                ->with('status','Successfully delete the record');

        }catch(\Illuminate\Database\QueryException $ex){

            return redirect()
                ->action('ShortController@viewCourse')
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }
    }

    private function slugify($text)
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

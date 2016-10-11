<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\ShortCourse\Provider;
use App\Models\ShortCourse\ActivateShortProvider;
use App\Models\ShortCourse\ProviderType;
use App\Models\ShortCourse\Course;
use App\Models\ShortCourse\Level;
use App\Models\ShortCourse\Field;
use App\Models\ShortCourse\File;
use App\Models\BankType;
use App\Models\PeriodType;
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

                    $profilePic = File::whereFileableId(Auth::user()->short_provider->id)->first();

                    return View::make('short.dashboard',compact('profilePic'));
                    return redirect()->action('ShortController@dashboard');

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
            'name' => 'required|unique:users|max:75',
            'email' => 'required|unique:users|max:45|email',
            'description' => 'required|max:455',
            'established' => 'required|max:255',
            'location' => 'required|max:255',
            'type' => 'required|boolean',
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

            $user->notify(new \App\Notifications\RegisterConsultant($user->name,$activate->token));

            return view('short.auth.login')->with('status','Your account has been created. Please verify your email before login.');

        }catch(\Illuminate\Database\QueryException $ex){

            return redirect()->back()->withErrors($ex->errorInfo);

        }

    }

    public function dashboard()
    {
        $profilePic = File::whereFileableId(Auth::user()->short_provider->id)->first();

        return View::make('short.dashboard',compact('profilePic'));
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

            return $sp;
            Auth::login($user);

            return $this->dashboard();

        }else{

            return view('errors.404');

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
            $provider_pic->path = 'provider/'.$r->provider_pic->getClientOriginalName();
            $provider_pic->mime = $r->provider_pic->extension();
            $provider_pic->size = $r->provider_pic->getSize();

            $r->provider_pic->move(public_path()."/img/provider",$r->provider_pic->getClientOriginalName());

            // $s3 = Storage::disk('s3');
            // $s3->put($r->provider_pic->getClientOriginalName(),public_path()."img/provider");

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

            $sp = new Provider;
            $sp->type_id = 1;
            $sp->parent_id = $user->id;
            $sp->name = $user->name;
            $sp->slug = $this->slugify($user->name);
            $sp->abbreviation = $user->client->institution->abbreviation;
            $sp->description = $user->client->institution->description;
            $sp->established = $user->client->institution->established;
            $sp->location = $user->client->institution->location;
            $sp->website = $user->client->institution->website;
            $sp->website = $user->client->institution->website;
            $sp->status = 1;

            $sp->save();

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
        $validator = Validator::make($r->all(), [
            'name_en' => 'required|max:255',
            'name_ms' => 'required|max:255',
            'location' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
           return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
        }

        try{
            $course = new Course;
            $course->provider_id = Auth::user()->short_provider->id;
            $course->name_en = $r->name_en;
            $course->name_ms = $r->name_ms;
            $course->mode_id = 2;

            if($r->description)
              $course->description = $r->description;

            if($r->period_value_min)
              $course->period_value_min = $r->period_value_min;

            if($r->period_value_max)
              $course->period_value_max = $r->period_value_max;

            $course->period_type_id =  $r->period_type_id;

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

            if($r->code)
              $course->code = $r->code;

            if($r->start_date)
              $course->start_date = $r->start_date;

            if($r->length)
              $course->length = $r->length;

            if($r->attendance)
              $course->attendance = $r->attendance;

            if($r->class_size)
              $course->class_size = $r->class_size;

            $course->price = $r->price;

            if($r->exam_fee)
              $course->exam_fee = $r->exam_fee;

            if($r->note)
              $course->note = $r->note;

            if($r->language)
              $course->language = $r->language;

            if($r->hrdf_scheme)
              $course->hrdf_scheme = $r->hrdf_scheme;

            if($r->learning_outcome)
              $course->learning_outcome = $r->learning_outcome;

            if($r->inclusive)
              $course->inclusive = $r->inclusive;

            $course->location = $r->location;

            $course->save();

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

        return View::make('short.course.course-info',compact('course'));
    }

    public function editCourse($id)
    {
        $course = Course::whereId($id)->firstOrFail();
        $periodType = PeriodType::pluck('name','id');
        $levelType = Level::pluck('name','id');
        $fieldType = Field::orderBy('name')->pluck('name','id')->toArray();

        return View::make('short.course.edit',compact('course','periodType','levelType','fieldType'));
    }

    public function updateCourse(Request $r,$id)
    {
        $validator = Validator::make($r->all(), [
            'name_en' => 'required|min:15|max:255',
            'name_ms' => 'required|max:255',
            'location' => 'required',
            'price' => 'required',
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
            $course->exam_fee = $r->exam_fee;
            $course->note = $r->note;
            $course->language = $r->language;
            $course->inclusive = $r->inclusive;

            if($r->hrdf_scheme)
                $course->hrdf_scheme = $r->hrdf_scheme;

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

        }catch(\Illuminate\Database\QueryException $e){
            return ;
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

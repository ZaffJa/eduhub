<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortCourse\Provider;
use App\Models\ShortCourse\ActivateShortProvider;
use App\Models\ShortCourse\ProviderType;
use App\Models\BankType;
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

                if($user->short_provider->status !=null){   //  User exist and has verify email

                    return view('short.dashboard');

                }else{  // User has not verify email yet

                    $activate = ActivateShortProvider::whereEmail(Auth::user()->email)->first();
                    Auth::logout(); //must logout because Auth::attempt will automatically logged user when true

                    return redirect()->back()
                      ->withErrors([
                        'password'=>'Your account has not been activated. Please  verify your email.',
                        'activate'=>$activate->token]
                    );
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
            'name' => 'required|unique:users|max:75|alpha',
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
                'token' => str_random(64)
            ]);

            $user->notify(new \App\Notifications\RegisterConsultant($user->name,$activate->token));

            return view('short.auth.login')->with('status','Your account has been created. Please verify your email before login.');

        }catch(\Illuminate\Database\QueryException $ex){

            return redirect()->back()->withErrors($ex->errorInfo);

        }
        return $input;
    }

    public function dashboard()
    {
        return view('short.dashboard');
    }

    public function editprofile()
    {


    return view('short.profile.edit');
    }

    public function activateAccount($token)
    {
        $activateUser = ActivateShortProvider::whereToken($token)->first();

        if($activateUser){
            $user = User::whereEmail($activateUser->email)->first();

            $activateUser->status = 1;
            $user->short_provider->status = 1;

            $activateUser->save();
            $user->save();

            Auth::login($user);

            return view('short.dashboard');

        }else{

            return view('errors.503');
        }
    }


    public function editprofile()
    {
        $providerType = ProviderType::pluck('name','id');
        $bankType = BankType::pluck('name','id');
        $provider = Auth::user()->short_provider;

        return View::make('short.profile.edit',compact('providerType','bankType','provider'));
    }

    public function updateProfile(Request $r)
    {
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
            $provider->bank_type = $r->bank_type;
            $provider->bank_account = $r->bank_account;
            $provider->save();

            return  redirect()->back()->with(['status'=>'The provider name '.$provider->name.' has been updated.']);


        }catch(\Illuminate\Database\QueryException $ex){
            return redirect()
                ->back()
                ->withErrors($ex->errorInfo[2])
                ->withInput();
        }
        // return $provider->bank;
    	return View::make('short.profile.view', compact('provider'));
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

    public function viewProfile()
    {
    	$provider = Auth::user()->short_provider;
    	$providerType = Auth::user()->short_provider->type;

    	return View::make('short.profile.view', compact('provider','providerType'));
    }

    public function viewCourse()
    {
        return view('short.course.view');
    }

    public function addCourse()
    {
    return view('short.course.add');
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

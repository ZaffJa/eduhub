<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\Student\SocialAccount;
use Auth;
use App\User;
use App\Models\Role;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $account = SocialAccount::whereProvider($provider)
                    ->whereProviderUserId($providerUser->getId())
                    ->first();

        if ($account) {
            return $account->user;
            Auth::login($account->user);

            return redirect()->action('Student\SpmController@index');
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email'=>$providerUser->getEmail(),
                    'name'=>$providerUser->getName(),
                ]);

            }

            $account->user()->associate($user);
            $account->save();

            //Assign role student upon registration
            Role::create([
                'user_id'=>$user->id,
                'role_id'=>4
            ]);
        }

        Auth::login($user);

        return redirect()->action('Student\SpmController@index');
    }
}

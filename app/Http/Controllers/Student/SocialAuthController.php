<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\Student\SocialAccount;
use Auth;
use App\User;

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
            Auth::login($account->user);

            return redirect()->action('Student\SpmController@index');
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = new User;
                $user->email = $providerUser->getEmail();
                $user->name = $providerUser->getName();
                $user->save();

            }

            $account->user()->associate($user);
            $account->save();
        }

        Auth::login($user);

        return redirect()->action('Student\SpmController@index');
    }
}

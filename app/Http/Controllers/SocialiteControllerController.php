<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialiteControllerController extends Controller
{
    public function redirectToGoogle()
    {
 

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback( )
    {
 
        try {
            $user = Socialite::driver('google')->stateless()->user();
            dd($user);
            $findUser = User::where('email', $user->getEmail())->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                return redirect()->intended('home');
            }

        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

public function google()
{ 

}


}

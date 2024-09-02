<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;
use Exception;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            
            $findUser = User::where('facebook_id', $user->id)->first();
            
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('my-facebook')
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            return redirect('login');
        }
    }
}

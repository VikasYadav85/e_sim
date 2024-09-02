<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Session;
use Redirect;



class AuthController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->where('status','1')->first();

        if(!is_object($user)){
            return redirect(route('login'))->withErrors(['msg' => 'Invalid Email']);
        }

       // dd(Hash::check($request->password, $user->password));
        if( Hash::check($request->password, $user->password) == false ){

            return redirect(route('login'))->withErrors(['msg' => 'Invalid Password']);

        }

          // dd(Auth::attempt($request->only('email','password')));

        if(Auth::attempt($request->only('email','password'))){
            return redirect(route('dashboard'));

        }

    }




    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }


}

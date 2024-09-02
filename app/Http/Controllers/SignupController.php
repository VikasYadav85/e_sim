<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\Forgetpassword;

use App\Models\Signup;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Redirect;

class SignupController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }
 
    public function create(Request $request)
    {
       
      
     $user=User::where('email',$request->email)->first();
     if($user)
     {
       
        return redirect(route('signup'))->with('successMessage','User Already exist!');


     }
    else{

        if($request->file('image')) {
            $background_image = $request->file('image');
            $filename = uniqid() . '.'. $background_image->getClientOriginalExtension();
            $path = public_path('images/user_image');
            $imagepath = $request->image->move($path, $filename);
        }
       
            $user = new User(); 
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->contact_number = $request->contact_number;
            $user->designation = $request->designation;
            $user->gender = $request->Gender; // Assuming 'Gender' is correctly spelled in your form
            $user->status = $request->status;
            if ($request->file('image')) {
                $user->image = $filename; 
            }
            
            $user->save();
            Auth::login($user);
            return redirect(route('dashboard'));
    }
        

    }
    

    
   
    
    public function changepass(Request $request)
    {
        $getUser=User::where('id',$request->change_id)->first();
        if (Hash::check($request->Current, $getUser->password)) {
            $getUser->password = Hash::make($request->Confirm);
            $getUser->save();
        return redirect(route('dashboard'))->with('successMessage','Password updated successfully.');

        } else {
         
        return redirect(route('dashboard'))->with('alertMessage','Incorrect current password.');

          }
    }
 
    
   

    
    public function forget()
    {
        return view('auth.forget');

    }
    public function forgetpassword(Request $request)
    {
       

        $resetToken = Str::random(6);   
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            $usern=$user->name;
            if ($request->has('email')) {
                $user = User::where('email', $request->email)->update(['remember_token' => $resetToken]);
                Mail::to($request->email)->send(new Forgetpassword($usern,$resetToken));
                
            }
            return redirect(route('otp_validation'))->with('successMessage','OTP send successfully please check your email');
        }
        else
        {
            $usern='';
            return redirect(route('login'))->with('alertMessage','Incorrect current email.');

        }
       
      
      
    }
    
    public function otp_validation()
    {

        return view('auth.Otp_validate');

    }

   
    public function validation(Request $request)
    {

       
       $getUser = User::where('remember_token', $request->otp_id)->first();

    if (!$getUser) {
        return response()->json(['error' => 'Incorrect OTP.'], 400);
    }
   

    return response()->json(['message' => 'Success!', 'email' => $getUser->email], 200);


    }
    public function new_password(Request $request)
    {
      
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        return response()->json(['message' => 'Success!'], 200);

       
    }
}

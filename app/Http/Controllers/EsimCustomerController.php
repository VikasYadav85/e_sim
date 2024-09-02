<?php

namespace App\Http\Controllers;

use App\Models\EsimCustomer;
use App\Models\Operator;
use App\Models\Coverage;
use App\Models\Package;
use App\Models\PackageCountry;
use App\Models\ESIMPlan;
use App\Models\Country;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Validation\ValidationException;
use Session; 

use Redirect;
class EsimCustomerController extends Controller
{
    
    public function index()
    {
 
        return view('Front.login');
    }

    public function signup()
    {
        return view('Front.register');
         
    }
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:esim_customers,email',
    ]);
    if ($validator->fails()) {
        return response()->json(['success' => false,'message' => $validator->errors()], 422);
    }
    $EsimCustomer = EsimCustomer::firstOrNew(['email' => $request->email]);

    if ($EsimCustomer->exists) {
        return response()->json(['success' => false,'message' => 'Email already exists.'], 409);
    }
    
    $EsimCustomer->email = $request->email;
    $EsimCustomer->password = Hash::make($request->password);
    $EsimCustomer->save();
    return response()->json(['success' => true,'message' => 'Registration successful.'], 201);
}
 
    
    public function login(Request $request)
    { 
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email =DB::table('esim_customers')->where('email',$request->email)->first();
        if (!$email) {
            return response()->json(['success' => false, 'message' => 'Email'], 409);
        }
        if (!Hash::check($request->password,$email->password)) {
            return response()->json(['success' => false, 'message' => 'Password'], 409);
        }
        $credentials  = $request->only('email', 'password');
        if (Auth::guard('esim_customer')->attempt($credentials)) {
            $user = Auth::guard('esim_customer')->user();
            return response()->json(['success' => true,'message' => 'Login successful', 'user' => $user]);
        }else{
            return response()->json(['success' => false,'message' => 'Invalid credentials.'], 409);
        }
    }



    public function front_logout(){
        Session::flush();
        Auth::guard('esim_customer')->logout();
        return redirect(route('front_login'));
    }

    public function test()
    {
 
     

          
        $operator = Operator::orderBy('id', 'asc')->get();
        foreach( $operator as $operators){
            $coverages = Coverage::where('operator_id',$operators->operator_id)->get();
            $packages = Package::where('operator_id',$operators->operator_id)->first();

        }
      //dd($packageCountries);
        $packageCountries = PackageCountry::orderBy('id', 'asc')->get();

        $Country   = Country::orderBy('id', 'asc')->get();
        $eSIMPlans = ESIMPlan::with('eSIMPlanCountries')->orderBy('id', 'asc')->get();
        return view('Front.old_home',compact('Country','eSIMPlans','packageCountries','operator','coverages','packages'));
    }
      



    

}

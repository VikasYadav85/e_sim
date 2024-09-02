<?php

namespace App\Http\Controllers\FrontController;
use App\Http\Controllers\Controller; 
use App\Models\FrontHome;
use App\Models\Country;
use App\Models\ESIMPlan;
use App\Models\PackageCountry;
use App\Models\Operator;
use App\Models\Package;
use App\Models\Coverage;
use App\Models\ESIMPlanCountry;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{   
     
    public function index()
    {
       
        $operator = Operator::orderBy('id', 'asc')->get();
        foreach( $operator as $operators){
            $coverages = Coverage::where('operator_id',$operators->operator_id)->get();
            $packages = Package::where('operator_id',$operators->operator_id)->first();

        }
      //dd($packageCountries);
        $packageCountries = PackageCountry::take(20)->orderBy('id', 'asc')->get();
 
        $Country   = Country::orderBy('id', 'asc')->get();
        $eSIMPlans = ESIMPlan::with('eSIMPlanCountries')->orderBy('id', 'asc')->get();
        return view('Front.home',compact('Country','eSIMPlans','packageCountries','operator','coverages','packages'));
    }
     
    
    public function operator(Request $request)
    {
        $packageCountry = PackageCountry::where('operator_id', $request->id)->first();
        $operator = Operator::where('operator_id', $request->id)->first();
        $packages = Package::with('packageCountry')->where('operator_id', $request->id)->orderBy('id', 'asc')->get();
        return view('Front.package',compact('packages', 'operator', 'packageCountry'));
    }

   
    public function selectPackage(Request $request)
    {
        $countries   = Country::orderBy('id', 'asc')->get();
        $packages = Package::with('packageCountry')->where('id', $request->id)->orderBy('id', 'asc')->first();
        return view('Front.select_package',compact('packages', 'countries'));
    }

   
    public function show(FrontHome $frontHome)
    {
        //
    }

  
    public function edit(FrontHome $frontHome)
    {
        //
    }

    
    public function update(Request $request, FrontHome $frontHome)
    {
        //
    }

   
    public function destroy(FrontHome $frontHome)
    {
        //
    }

    public function shopNow(Request $request)
    { 
        $packageCountry = PackageCountry::where('operator_id', $request->id)->first();
        $packageCountryCount = PackageCountry::where('operator_id', $request->id)->count();
        $operator = Operator::where('operator_id', $request->id)->first();
        $packages = Package::with('packageCountry')->where('operator_id', $request->id)->orderBy('id', 'asc')->get();
        return view('Front.region-asia',compact('packages', 'operator', 'packageCountry', 'packageCountryCount'));
    }

    public function searchDestination(Request $request) {
        $packageCountries = PackageCountry::where('title', 'like', '%'.$request->search.'%')->take(20)->orderBy('id', 'asc')->get();
        return view('Front.popular',compact('packageCountries'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ESIMPlan;
use App\Models\ESIMPlanCountry;
use App\Models\Country;
use DB;

class ESIMPlansController extends Controller
{
    public function index()
    {
        $eSIMPlans = ESIMPlan::orderBy('id', 'desc')->get();
  
         return view('plans.list',compact('eSIMPlans'));
    }
   
     
    public function create()
    {
    	$countries = Country::orderBy('id', 'desc')->get();
        return view('plans.add', compact('countries'));
       
    }

   
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {

            if ($request->updated_id) {
                $eSIMPlan = ESIMPlan::find($request->updated_id);
            } else {
                $eSIMPlan = new ESIMPlan; 
            }
            $eSIMPlan->heading = $request->heading;
            $eSIMPlan->sub_heading = $request->sub_heading;
            $eSIMPlan->validity = $request->validity;
            $eSIMPlan->data = $request->data;
            $eSIMPlan->price = $request->price;
            $eSIMPlan->status = $request->status;
            $eSIMPlan->save();
            if (!empty($request->country_id)) {
                if (!empty($request->updated_id)) {
                    ESIMPlanCountry::where('e_s_i_m_plan_id', $request->updated_id)->delete();
                }
                foreach ($request->country_id as $id) {
                    $eSIMPlanCountry = new ESIMPlanCountry;
                    $eSIMPlanCountry->country_id = $id;
                    $eSIMPlanCountry->e_s_i_m_plan_id = $eSIMPlan->id;
                    $eSIMPlanCountry->save();
                }
            }

            DB::commit();
            return redirect(route('index_e_sim_plan'))->with('successMessage', 'E-SIM Plan added successfully');
        } catch (\Exception $exception) {
            return $exception->getMessage();
            DB::rollback();
            return redirect(route('index_e_sim_plan'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        } catch (\Throwable $exception) {
           
            DB::rollback();
            return redirect(route('index_e_sim_plan'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }
            
    }

  
    public function edit($id)
    { 
        $eSIMPlan =  ESIMPlan::with('eSIMPlanCountries')->find($id); 
        $countries = Country::orderBy('id', 'desc')->get();
        return view('plans.add',compact('eSIMPlan', 'countries'));

    }


  
    public function update(Request $request, Country $country)
    {
        //
    }

   
    public function destroy(Country $country)
    {
        //
    }
}

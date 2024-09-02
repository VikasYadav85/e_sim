<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sim;
use App\Models\Simable;
use App\Models\User;
use Curl;
use DB;

class SimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sims = Sim::where('order_id', 0)->orderBy('id', 'desc')->get();
        return view('admin.esims.list', compact('sims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        $withData = [
            'client_id'       => '7d6651fa07aa43af9390fceee25d1ae9',
            'client_secret'   => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
            'grant_type'      => 'client_credentials',
        ];

        $response = Curl::to('https://sandbox-partners-api.airalo.com/v2/token')
            ->withData($withData)
            ->post();
        $responses = json_decode($response, true);
        $token     = $responses['data']['access_token'];
        $live_url = 'https://sandbox-partners-api.airalo.com/v2/sims?include=order%2Corder.status%2Corder.user';
        $result = Curl::to($live_url)
            ->withBearer($token)
            ->withHeader('Accept: application/json')
            ->get();
        $results = json_decode($result, true);
        $esims = $results['data'];
        DB::beginTransaction();
          try {
            foreach ($esims as $key => $esim) { 
                $sim = Sim::where('esims_id', $esim['id'])->first();
                if (!$sim) {
                    $sim = new Sim;
                }
                $sim->esims_id = $esim['id']; 
                $sim->esims_created_at = $esim['created_at']; 
                $sim->iccid = $esim['iccid']; 
                $sim->lpa = $esim['lpa']; 
                $sim->imsis = $esim['imsis']; 
                $sim->matching_id = $esim['matching_id']; 
                $sim->qrcode = $esim['qrcode']; 
                $sim->qrcode_url = $esim['qrcode_url']; 
                $sim->voucher_code = $esim['voucher_code']; 
                $sim->airalo_code = $esim['airalo_code']; 
                $sim->apn_type = $esim['apn_type']; 
                $sim->apn_value = $esim['apn_value']; 
                $sim->is_roaming = $esim['is_roaming']; 
                $sim->confirmation_code = $esim['confirmation_code'];
                $sim->save();  
                $simable = Simable::where('esims_id', $sim->id)->where('simable_id', $esim['simable']['id'])->first();
                if (!$simable) {
                    $simable = new Simable;
                }
                $simable->esims_id = $sim->id; 
                $simable->simable_id = $esim['simable']['id']; 
                $simable->simable_created_at = $esim['simable']['created_at']; 
                $simable->code = $esim['simable']['code']; 
                $simable->description = $esim['simable']['description']; 
                $simable->type = $esim['simable']['type']; 
                $simable->package_id = $esim['simable']['package_id']; 
                $simable->quantity = $esim['simable']['quantity'];
                $simable->package = $esim['simable']['package'];
                $simable->esim_type = $esim['simable']['esim_type']; 
                $simable->validity = $esim['simable']['validity']; 
                $simable->price = $esim['simable']['price']; 
                $simable->data = $esim['simable']['data']; 
                $simable->currency = $esim['simable']['currency']; 
                $simable->manual_installation = $esim['simable']['manual_installation']; 
                $simable->qrcode_installation = $esim['simable']['qrcode_installation']; 
                $simable->installation_guides = json_encode($esim['simable']['installation_guides']); 
                $simable->status = json_encode($esim['simable']['status']);
                $simable->save();
                $user = User::where('esim_user_id', $esim['simable']['user']['id'])->first();
                if (!$user) {
                    $user = new User;
                }
                $user->esim_user_id = $esim['simable']['user']['id']; 
                $user->simable_id = $simable->id; 
                $user->name = $esim['simable']['user']['name']; 
                $user->email = $esim['simable']['user']['email']; 
                $user->mobile = $esim['simable']['user']['mobile']; 
                $user->address = $esim['simable']['user']['address']; 
                $user->state = $esim['simable']['user']['state']; 
                $user->postal_code = $esim['simable']['user']['postal_code']; 
                $user->country_id = $esim['simable']['user']['country_id']; 
                $user->company = $esim['simable']['user']['company']; 
                $user->save();
            }
           DB::commit();
            if ($request->ajax()) {
                return response()->json(['success' => 'E-SIMs updated successfully'], 200);
            }
           return redirect(route('index_package'))->with('successMessage', 'Synced successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect(route('index_package'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }  
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sims  $sims
     * @return \Illuminate\Http\Response
     */
    public function show(Sims $sims)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sims  $sims
     * @return \Illuminate\Http\Response
     */
    public function edit(Sims $sims)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sims  $sims
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sims $sims)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sims  $sims
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sims $sims)
    {
        //
    }


    public function test(Request $request){
 
        $withData = [
            'client_id'       => '7d6651fa07aa43af9390fceee25d1ae9',
            'client_secret'   => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
            'grant_type'      => 'client_credentials',
            //'resource'      => 'https://barakatuat.sandbox.operations.dynamics.com',
        ];

        $response = Curl::to('https://sandbox-partners-api.airalo.com/v2/token')
            ->withData($withData)
            ->post();
dd($response); 
        $responses = json_decode($response, true);
        $token     = $responses['access_token'];
        
        $live_url      = 'API URL';

        $erp_item_load = Curl::to($live_url)
        
            ->withBearer("$token")
            ->withHeaders(['X-REPORT-TOKEN'=>'CreportO0u2TW4P9MTvjyLHigspW1R7$rV7RHqzutZ'])
            ->withData([
                '$format'       => 'json',
                'cross-company' => 'true', 
                'page'=>$request->page
            ])->get();

        $erp_item_load1 = json_decode($erp_item_load, true);

        DB::beginTransaction();
          try {
            
            /// Code here

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return prepareResult(true, [], [], 'Catalog report Added', $this->success);

    }
}

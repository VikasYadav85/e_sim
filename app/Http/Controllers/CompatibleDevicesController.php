<?php

namespace App\Http\Controllers;

use App\Models\CompatibleDevices;
use App\Models\CompatibleDevice;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CompatibleDevicesController extends Controller
{

    public function index()
    {
        $compatibleDevices = CompatibleDevice::orderBy('id', 'desc')->get();
        return view('CompatibleDevices.list', compact('compatibleDevices'));
    }

    public function add()
    {
        return view('CompatibleDevices.add');
    }

    public function save(Request $request)
    {
      
        $response = Http::post('https://sandbox-partners-api.airalo.com/v2/token', [
            'client_id' => '7d6651fa07aa43af9390fceee25d1ae9',
            'client_secret' => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
            'grant_type' => 'client_credentials',
        ]);
        $responses = $response->json(); 
        $token = $responses['data']['access_token'];
        $result = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/json'])
            ->get('https://sandbox-partners-api.airalo.com/v1/compatible-devices');

        $results = $result->json();
        $CompatibleDevice = $results['data'];
       
            DB::beginTransaction();
            try {
                foreach ($CompatibleDevice as $deviceData) {
                    $Comp_Device = CompatibleDevice::firstOrNew(['model' => $deviceData['model']]);
                    $Comp_Device->os = $deviceData['os'];
                    $Comp_Device->brand = $deviceData['brand'];
                    $Comp_Device->name = $deviceData['name'];
                    $Comp_Device->save();
                }
                DB::commit();
                return redirect(route('compatible-devices'))->with('successMessage', 'Synced successfully');
            } catch (\Exception $exception) {
                DB::rollback();
                return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            } catch (\Throwable $exception) {
                DB::rollback();
                return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            }
        
    }



    public function edit($id)
    {
        $compatibleDevices = CompatibleDevice::find($id);
        return view('CompatibleDevices.add', compact('compatibleDevices'));

    }


    public function delete($id)
    {
        $compatibleDevices = CompatibleDevice::find($id);
        if (is_object($compatibleDevices)) {
            $compatibleDevices->delete();
            return redirect(route('compatible-devices'))->with('successMessage', 'compatible devices Deleted successfully');
        } else {
            return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }

    }


    
    // public function save(Request $request)
    // {
    //     if ($request->updated_id) {
    //         DB::beginTransaction();
    //         try {
    //             $eSIMPlan = CompatibleDevice::find($request->updated_id);
    //             $eSIMPlan->model = $request->model;
    //             $eSIMPlan->os = $request->os;
    //             $eSIMPlan->brand = $request->brand;
    //             $eSIMPlan->name = $request->name;

    //             $eSIMPlan->save();
    //             DB::commit();
    //             return redirect(route('compatible-devices'))->with('successMessage', 'compatible devices Updated successfully');
    //         } catch (\Exception $exception) {
    //             DB::rollback();
    //             return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    //         } catch (\Throwable $exception) {
    //             DB::rollback();
    //             return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    //         }

    //     } else {
    //         DB::beginTransaction();
    //         try {
    //             $eSIMPlan = new CompatibleDevice;
    //             $eSIMPlan->model = $request->model;
    //             $eSIMPlan->os = $request->os;
    //             $eSIMPlan->brand = $request->brand;
    //             $eSIMPlan->name = $request->name;

    //             $eSIMPlan->save();
    //             DB::commit();
    //             return redirect(route('compatible-devices'))->with('successMessage', 'compatible devices Add successfully');
    //         } catch (\Exception $exception) {
    //             DB::rollback();
    //             return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    //         } catch (\Throwable $exception) {
    //             DB::rollback();
    //             return redirect(route('compatible-devices'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
    //         }

    //     }
    // }

}

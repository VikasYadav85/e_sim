<?php


namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\CompatibleDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CompatibleDeviceController extends Controller
{

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
                foreach ($CompatibleDevice  as $deviceData) {
                    $Comp_Device = CompatibleDevice::firstOrNew(['model' => $deviceData['model']]);
                    $Comp_Device->os = $deviceData['os'];
                    $Comp_Device->brand = $deviceData['brand'];
                    $Comp_Device->name = $deviceData['name'];
                    $Comp_Device->save();
                }
                DB::commit();
                return response()->json(['API_Status' => 1, 'message' => 'Compatible Devices added successfully']);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
            } catch (\Throwable $exception) {
                DB::rollback();
                return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
            }
       
    }


    // public function save(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         foreach ($request->data as $deviceData) {
    //             $Comp_Device = CompatibleDevice::firstOrNew(['model' => $deviceData['model']]);
    //             $Comp_Device->os = $deviceData['os'];
    //             $Comp_Device->brand = $deviceData['brand'];
    //             $Comp_Device->name = $deviceData['name'];
    //             $Comp_Device->save();
    //         }
    //         DB::commit();
    //         return response()->json(['API_Status' => 1, 'message' => 'Compatible Devices added successfully']);
    //     } catch (\Exception $exception) {
    //         DB::rollback();
    //         return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
    //     } catch (\Throwable $exception) {
    //         DB::rollback();
    //         return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
    //     }
    // }


    public function saves(Request $request)
    {
        $response = Http::get('http://174.138.3.35/esim/api/datacompatible-device');
        if ($response->successful()) {
            $jsonData = $response->body();
            $devicesData = json_decode($jsonData, true);
            DB::beginTransaction();
            try {
                foreach ($devicesData['data'] as $deviceData) {
                    $Comp_Device = CompatibleDevice::firstOrNew(['model' => $deviceData['model']]);
                    $Comp_Device->os = $deviceData['os'];
                    $Comp_Device->brand = $deviceData['brand'];
                    $Comp_Device->name = $deviceData['name'];
                    $Comp_Device->save();
                }
                DB::commit();
                return response()->json(['API_Status' => 1, 'message' => 'Compatible Devices added successfully']);
            } catch (\Exception $exception) {
                DB::rollback();
                return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
            } catch (\Throwable $exception) {
                DB::rollback();
                return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
            }
        } else {
            return response()->json(['API_Status' => 0, 'error' => 'Failed to fetch data from the API'], 500);
        }
    }



    
    public function datacompatible()
    {
        try {
            $compatibleDevices = DB::table('test')->get();
            
            return response()->json(['API_Status' => 1, 'data' => $compatibleDevices]);
        } catch (\Exception $exception) {
            return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
        }
    }
    






 
}

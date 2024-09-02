<?php
namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\TopupOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TopupOrdersApiController extends Controller
{

    public function save(Request $request)
    {
        $response = Http::get('http://174.138.3.35/esim/api/testorder');

        if ($response->successful()) {
            $devicesData = $response->json();
            try {
                foreach ($devicesData['data'] as $deviceData) {
                    $packageId = $deviceData['package_id'];
                    $topupOrder = TopupOrders::updateOrCreate(
                        ['package_id' => $packageId],
                        $deviceData
                    );
                    $installationGuides = isset($deviceData['installation_guide_en']) ? $deviceData['installation_guide_en'] : '';
                    $topupOrder->installation_guide_en = $installationGuides;
                    
                    $topupOrder->save();
                }
                return response()->json(['API_Status' => 1, 'message' => 'Topup Orders stored successfully']);
            } catch (\Exception $exception) {
                return response()->json(['API_Status' => 0, 'error' => $exception->getMessage()], 500);
            }
        } else {
            return response()->json(['API_Status' => 0, 'message' => 'Failed to fetch data from external API']);
        }
    }
    





    //     public function save(Request $request)
//     {


    //         // $response = Http::get('http://174.138.3.35/esim/api/testorder');
//         // if ($response->successful()) {
//         // $jsonData = $response->body();
//         // $devicesData = json_decode($jsonData, true);
//         DB::beginTransaction();
//         try {
//             foreach ($request['data'] as $deviceData) {

    //                 $TopupOrders = TopupOrders::firstOrNew(['package_id' => $deviceData['package_id']]);
//                 $TopupOrders->package_id = $deviceData['package_id'];
//                 $TopupOrders->quantity = $deviceData['quantity'];
//                 $TopupOrders->description = $deviceData['description'];
//                 $TopupOrders->esim_type = $deviceData['esim_type'];
//                 $TopupOrders->validity = $deviceData['validity'];
//                 $TopupOrders->package = $deviceData['package'];
//                 $TopupOrders->data = $deviceData['data'];
//                 $TopupOrders->price = $deviceData['price'];
//                 $TopupOrders->created_at = $deviceData['created_at'];
//                 $TopupOrders->ids = $deviceData['id'];
//                 $TopupOrders->code = $deviceData['code'];
//                 $TopupOrders->currency = $deviceData['currency'];
//                 $TopupOrders->os = $deviceData['os'];
//                 $TopupOrders->manual_installation = $deviceData['manual_installation'];
//                 $TopupOrders->qrcode_installation = $deviceData['qrcode_installation'];
//                 $TopupOrders->installation_guides = $deviceData['installation_guides'];
// dd($TopupOrders);
//                 $TopupOrders->save();
//             }
//             DB::commit();
//             return response()->json(['API_Status' => 1, 'message' => 'Compatible Devices added successfully']);
//         } catch (\Exception $exception) {
//             DB::rollback();
//             return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
//         } catch (\Throwable $exception) {
//             DB::rollback();
//             return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
//         }
//         // } else {
//         //     return response()->json(['API_Status' => 0, 'error' => 'Failed to fetch data from the API'], 500);
//         // }


    //     }


    public function testorder()
    {
        $topupOrder = TopupOrders::get();
        return response()->json(['API_Status' => 1, 'data' => $topupOrder]);
    }


    public function edit(TopupOrders $topupOrders)
    {
        //
    }


    public function update(Request $request, TopupOrders $topupOrders)
    {
        //
    }


    public function destroy(TopupOrders $topupOrders)
    {
        //
    }
}

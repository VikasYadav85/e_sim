<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Sims;
use App\Models\Status;
use App\Models\EsimUser;

class OrderController extends Controller
{
    
    
    public function index()
    {



        
        $get_data=Order::orderBy('id', 'desc')->get();
        // dd($get_data);
         return view('Order.Orders.list',compact('get_data'));
       
    }

    public function view($id)
    {
        $Order = Order:: where('id',$id)->first(); 
        $Simsa = Sims:: where('order_id',$Order->id)->get();
        $Status = Status:: where('id',$Order->status_id)->first();
        $EsimUser = EsimUser:: where('id',$Order->user_id)->first();
        $installationGuides = json_decode($Order->installation_guides, true);
        
        return view('Order.Orders.view', compact('Order','Simsa','Status','EsimUser','installationGuides'));
        
       
    }

  public function sync()
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
            ->get('https://sandbox-partners-api.airalo.com/v2/orders');
        $results = $result->json();
        $order = $results['data'];
       // dd($order); 
   
         DB::beginTransaction();
       try {
   
        foreach ($order as $orderData) {
            // Create or update Order
            $order = Order::updateOrCreate(
                ['code' => $orderData['code']],
                [
                    'code' => $orderData['code'],
                    'description' => $orderData['description'],
                    'type' => $orderData['type'],
                    'package_id' => $orderData['package_id'],
                    'quantity' => $orderData['quantity'],
                    'package' => $orderData['package'],
                    'esim_type' => $orderData['esim_type'],
                    'validity' => $orderData['validity'],
                    'price' => $orderData['price'],
                    'data' => $orderData['data'],
                    'currency' => $orderData['currency'],
                    'manual_installation' => $orderData['manual_installation'],
                    'qrcode_installation' => $orderData['qrcode_installation'],
                    'installation_guides' => json_encode($orderData['installation_guides']), // Assuming conversion to JSON
                ]
            );
        
            // Process Sims if present
            if (isset($orderData['sims'])) {
                foreach ($orderData['sims'] as $simData) {
                    Sims::updateOrCreate(
                        ['iccid' => $simData['iccid']],
                        [
                            'order_id' => $order->id,
                            'created_at' => $simData['created_at'],
                            'iccid' => $simData['iccid'],
                            'lpa' => $simData['lpa'],
                            'imsis' => $simData['imsis'],
                            'matching_id' => $simData['matching_id'],
                            'qrcode' => $simData['qrcode'],
                            'qrcode_url' => $simData['qrcode_url'],
                            'airalo_code' => $simData['airalo_code'],
                            'apn_type' => $simData['apn_type'],
                            'apn_value' => $simData['apn_value'],
                            'is_roaming' => $simData['is_roaming'],
                            'confirmation_code' => $simData['confirmation_code'],
                        ]
                    );
                }
            }
        
            // Create or update EsimUser if present
            if (isset($orderData['user'])) {
                EsimUser::updateOrCreate(
                    ['email' => $orderData['user']['email']],
                    [
                        'created_at' => $orderData['user']['created_at'],
                        'name' => $orderData['user']['name'],
                        'email' => $orderData['user']['email'],
                        'mobile' => $orderData['user']['mobile'],
                        'address' => $orderData['user']['address'],
                        'state' => $orderData['user']['state'],
                        'city' => $orderData['user']['city'],
                        'postal_code' => $orderData['user']['postal_code'],
                        'country_id' => $orderData['user']['country_id'],
                        'company' => $orderData['user']['company'],
                        'order_id' => $order->id,
                    ]
                );
            }
        
            // Create or update Status if present
            if (isset($orderData['status'])) {
                Status::updateOrCreate(
                    ['slug' => $orderData['status']['slug']],
                    ['name' => $orderData['status']['name']]
                );  
            }
        }
   
           DB::commit();
           return redirect(route('order-list'))->with('successMessage', 'Synced successfully');
       } catch (\Exception $exception) {
           DB::rollback();
           return redirect(route('order-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
       } catch (\Throwable $exception) {
           DB::rollback();
           return redirect(route('order-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
       }
       }


       public function post_data(Request $request)
       {
       
        $response = Http::post('https://sandbox-partners-api.airalo.com/v2/token', [
            'client_id' => '7d6651fa07aa43af9390fceee25d1ae9',
            'client_secret' => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
            'grant_type' => 'client_credentials',
        ]);

           $responses = $response->json();
           if ($response->successful()) {
               $responses = $response->json();
               $token = $responses['data']['access_token'];
               $postData=DB::table('packages')->where('operator_id','550')->first();  
               $responseData = [
                "data" => [
                    'quantity' => '1',
                    'package_id' => $postData->package_id,
                    'type' => $postData->type,
                ],
                "meta" => [
                    "message" => "the parameter is invalid"
                ]
              ];
                              
                $result = Http::withToken($token)
                   ->withHeaders([
                       'Accept' => 'application/json',
                       'Authorization' => 'Bearer ' . $token,
                   ])
                   ->post('https://sandbox-partners-api.airalo.com/v2/orders', $responseData);
                   $response = $result->json();
                 
                   return [ 'data' =>  $response ];

 
           } else {
               $errorCode = $response->status();
           }
       }


    //    public function post_data(Request $request)
    //    {
    //        $accessToken = $this->getAccessToken();
   
    //        if (!$accessToken) {
    //            return response()->json(["error" => "Failed to obtain access token"], 500);
    //        }
    //        $packageData = $this->fetchPackageData();
   
    //        if (!$packageData) {
    //            return response()->json(["error" => "Package data not found"], 404);
    //        }
    //        $orderData = [
    //            "data" => [
    //                'quantity' => '1',
    //                'package_id' => $packageData->package_id,
    //                'type' => $packageData->type,
    //            ],
    //            "meta" => [
    //                "message" => "the parameter is invalid"
    //            ]
    //        ];

    //        $result = $this->createOrder($accessToken, $orderData);

    //        if ($result['success']) {
    //            return response()->json($result['data']);
    //        } else {
    //            return response()->json(["error" => "Failed to create order"], 500);
    //        }
    //    }
   
    //    private function getAccessToken()
    //    {
    //        try {
    //            $response = Http::post('https://sandbox-partners-api.airalo.com/v2/token', [
    //                'client_id' => '7d6651fa07aa43af9390fceee25d1ae9',
    //                'client_secret' => '4n42RKTT0BGHwFHjrA4XyF2bCIXelml5SRTgutli',
    //                'grant_type' => 'client_credentials',
    //            ]);
   
    //            if ($response->successful()) {
    //                $responseData = $response->json();
    //                return $responseData['data']['access_token'];
    //            } else {
    //                return null;
    //            }
    //        } catch (\Exception $e) {
    //            return null;
    //        }
    //    }
   
    //    private function fetchPackageData()
    //    {
    //        try {
    //            return DB::table('packages')->where('operator_id', '550')->first();
    //        } catch (\Exception $e) {
    //            return null;
    //        }
    //    }
   
    //    private function createOrder($accessToken, $orderData)
    //    {
    //        try {
    //            $response = Http::withToken($accessToken)
    //                ->withHeaders([
    //                    'Accept' => 'application/json',
    //                    'Authorization' => 'Bearer ' . $accessToken,
    //                ])
    //                ->post('https://sandbox-partners-api.airalo.com/v2/orders', $orderData);
   
    //            if ($response->successful()) {
    //                return [
    //                    'success' => true,
    //                    'data' => $response->json()
    //                ];
    //            } else {
    //                return [
    //                    'success' => false
    //                ];
    //            }
    //        } catch (\Exception $e) {
    //            return [
    //                'success' => false
    //            ];
    //        }
    //    }
       
       
       
     
}

<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\CompatibleDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use App\Models\Sims;
use App\Models\Status;
use App\Models\EsimUser;

class ApiOrderController extends Controller
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
            ->get('https://sandbox-partners-api.airalo.com/v2/orders');
        $results = $result->json();
        $order = $results['data'];
         // dd($order); 
        DB::beginTransaction();
        try { 

            foreach ($order as $orderData) {
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

                if (isset($orderData['status'])) {
                    Status::updateOrCreate(
                        ['slug' => $orderData['status']['slug']],
                        ['name' => $orderData['status']['name']]
                    );
                }
            }
            

            DB::commit();
            return response()->json(['API_Status' => 1, 'message' => 'Orders stored successfully']);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
        } catch (\Throwable $exception) {
            DB::rollback();
            return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
        }
    }



    public function saves(Request $request)
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
        //  dd($order);
        DB::beginTransaction();
        try {

            foreach ($order as $orderData) {
                if (isset($orderData['user'])) {
                    $user = EsimUser::updateOrCreate(
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
                            'company' => $orderData['user']['company']
                        ]
                    );
                } else {

                    $user = null;

                }
                if (isset($orderData['status'])) {
                    $status = Status::updateOrCreate(
                        ['slug' => $orderData['status']['slug']],
                        ['name' => $orderData['status']['name']]
                    );
                } else {
                    $status = null;
                }
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
                        'installation_guides' => $orderData['installation_guides'],
                        'user_id' => $user->id ?? null,
                        'status_id' => $status->id ?? null,
                    ]
                );

                if (isset($orderData['sims'])) {
                    foreach ($orderData['sims'] as $simData) {
                        $esim = Sims::updateOrCreate(
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
                                'confirmation_code' => $simData['confirmation_code']
                            ]
                        );

                    }
                } else {
                    $esim = null;
                }

            }

            DB::commit();
            return response()->json(['API_Status' => 1, 'message' => 'Orders stored successfully']);
        } catch (\Exception $exception) {
            DB::rollback();

            return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
        } catch (\Throwable $exception) {
            DB::rollback();


            return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
        }












        //    $response = Http::get('https://sandbox-partners-api.airalo.com/v2/orders');

        //     if ($response->successful()) 

        //        {
        //          $jsonData = $response->body();
        //          $devicesData = json_decode($jsonData, true);
        //        }

        //   DB::beginTransaction();
        // try {

        //     foreach ($devicesData['data'] as $orderData) {
        //         $user = EsimUser::updateOrCreate(

        //             ['email' => $orderData['user']['email']],

        //             [
        //                 'created_at'            => $orderData['user']['created_at'],
        //                 'name'                  => $orderData['user']['name'],
        //                 'email'                 => $orderData['user']['email'],
        //                 'mobile'                => $orderData['user']['mobile'],
        //                 'address'               => $orderData['user']['address'],
        //                 'state'                 => $orderData['user']['state'],
        //                 'city'                  => $orderData['user']['city'],
        //                 'postal_code'           => $orderData['user']['postal_code'],
        //                 'country_id'            => $orderData['user']['country_id'],
        //                 'company'               => $orderData['user']['company']
        //             ]
        //         );

        //         $status = Status::updateOrCreate(
        //             ['slug' => $orderData['status']['slug']],
        //             ['name' => $orderData['status']['name']]
        //         );

        //         $order = Order::updateOrCreate(

        //             ['code' => $orderData['code']],
        //             [
        //                 'code'                  => $orderData['code'],
        //                 'description'           => $orderData['description'],
        //                 'type'                  => $orderData['type'],
        //                 'package_id'            => $orderData['package_id'],
        //                 'quantity'              => $orderData['quantity'],
        //                 'package'               => $orderData['package'],
        //                 'esim_type'             => $orderData['esim_type'],
        //                 'validity'              => $orderData['validity'],
        //                 'price'                 => $orderData['price'],
        //                 'data'                  => $orderData['data'],
        //                 'currency'              => $orderData['currency'],
        //                 'manual_installation'   => $orderData['manual_installation'],
        //                 'qrcode_installation'   => $orderData['qrcode_installation'],
        //                 'installation_guides'   => $orderData['installation_guides'],
        //                 'user_id' => $user->id,
        //                 'status_id' => $status->id
        //             ]
        //         );
        //        // dd($orderData['installation_guides'],$order );
        //         foreach ($orderData['sims'] as $simData) {
        //            $esim= Sims::updateOrCreate(
        //                 ['iccid' => $simData['iccid']],
        //                 [
        //                     'order_id'             => $order->id,
        //                     'created_at'           => $simData['created_at'],
        //                     'iccid'                => $simData['iccid'],
        //                     'lpa'                  => $simData['lpa'],
        //                     'imsis'                => $simData['imsis'],
        //                     'matching_id'          => $simData['matching_id'],
        //                     'qrcode'               => $simData['qrcode'],
        //                     'qrcode_url'           => $simData['qrcode_url'],
        //                     'airalo_code'          => $simData['airalo_code'],
        //                     'apn_type'             => $simData['apn_type'],
        //                     'apn_value'            => $simData['apn_value'],
        //                     'is_roaming'           => $simData['is_roaming'],
        //                     'confirmation_code'    => $simData['confirmation_code']
        //                 ]
        //             ); 

        //         }

        //     }

        //     DB::commit();
        //     return response()->json(['API_Status' => 1, 'message' => 'Orders stored successfully']);
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     return response()->json(['API_Status' => 0, 'error' => "Oops!!!, something went wrong, please try again."], 500);
        // } catch (\Throwable $exception) {
        //     DB::rollback();
        //     return response()->json(['API_Status' => 0, 'error' => 'Oops!!!, something went wrong, please try again.'], 500);
        // }
    }
    public function data()
    {
        $get_data = Order::with('user', 'status', 'sims')->orderBy('id', 'desc')->get();
        return response()->json(['API_Status' => 1, 'data' => $get_data]);
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\TopupOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
class TopupOrdersController extends Controller
{
    
    public function index()
    {
        $TopupOrders=TopupOrders::orderBy('id', 'desc')->get();
        
        return view('Order.list',compact('TopupOrders'));
    }

    public function sync( )
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
                DB::commit();
                return redirect(route('top-up-order-list'))->with('successMessage', 'Synced successfully');
            } catch (\Exception $exception) {
                return $exception->getMessage();
            DB::rollback();
            return redirect(route('top-up-order-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
            }
        } else {
            DB::rollback();
            return redirect(route('top-up-order-list'))->with('alertMessage', 'Oops!!!, something went wrong, please try again.');
        }
    }

     
    public function view($id)
    {
        $TopupOrders=TopupOrders::find($id);
        return view('Order.view',compact('TopupOrders'));
         
    }

    
    public function show(TopupOrders $topupOrders)
    {
        //
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

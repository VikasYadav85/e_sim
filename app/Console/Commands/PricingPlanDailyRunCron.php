<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use Illuminate\Support\Facades\Storage;
class PricingPlanDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pricing:pricingplan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $current = Carbon::now();
        $todays = date("Y-m-d", strtotime("-5 day")); 
        $tomorow = date("Y-m-d", strtotime("+1 day")); 
       
         $start_date= $todays; 
         $end_date= $tomorow;
        
        $TenantCode='MPLUGANDA';
        
        $final_data=array();
        $token= get_central_token();
        $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xc="http://xc.vxceed.com">
            <soapenv:Header/>
            <soapenv:Body>
                <xc:GetPricingPlan>
                    <!--Optional:-->
                    <xc:PricingPlan_Request>
                        <xc:TokenID>'.$token.'</xc:TokenID>
                        <xc:TenantCode>'.$TenantCode.'</xc:TenantCode>           
                    </xc:PricingPlan_Request>
                </xc:GetPricingPlan>
            </soapenv:Body>
            </soapenv:Envelope>';

     $response= get_central_curl_header('GetPricingPlan',$xml_post_string);
   
     $dom=new \DOMDocument();
    $dom->loadXML($response);
    
    $product_master=$dom->getElementsByTagName('PricePlanDetail');
    $current = Carbon::now();
    foreach ($product_master as $key => $value) {

        $get_code = DB::table('tbl_pricing_plan')
        ->select('tbl_pricing_plan.*')
        ->where('tbl_pricing_plan.ItemCode' ,'=', $value->getElementsByTagName('ItemCode')->item(0)->nodeValue)
        ->get()->first();

      //  dd($get_code);
        if($get_code==''){
               $data2=array
               (
                'TenantCode'              => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                'PricingCode'             => $value->getElementsByTagName('PricingCode')->item(0)->nodeValue,
                'ItemCode'                => $value->getElementsByTagName('ItemCode')->item(0)->nodeValue,
                
                'BaseUOM'                 =>(isset($value->getElementsByTagName('BaseUOM')->item(0)->nodeValue) ? $value->getElementsByTagName('BaseUOM')->item(0)->nodeValue : ''), 
                
                'Conversion'              => $value->getElementsByTagName('Conversion1')->item(0)->nodeValue,
                'SalesPrice'              => $value->getElementsByTagName('SalesPrice')->item(0)->nodeValue,
                'SalesPriceInBaseUOM'     => $value->getElementsByTagName('SalesPriceInBaseUOM')->item(0)->nodeValue,
                'ActiveIndicator'         => $value->getElementsByTagName('ActiveIndicator')->item(0)->nodeValue, 
                'created_at'              => $current,

               );
              //  dd($data2);
                DB::table('tbl_pricing_plan')->insert($data2);  
            } 
             $final_data[$key]['TenantCode']  =  $value->getElementsByTagName('TenantCode')->item(0)->nodeValue;
             $final_data[$key]['PricingCode']    =  $value->getElementsByTagName('PricingCode')->item(0)->nodeValue;
             $final_data[$key]['EffectiveDate']    =  $value->getElementsByTagName('EffectiveDate')->item(0)->nodeValue;
             $final_data[$key]['ItemCode']    =  $value->getElementsByTagName('ItemCode')->item(0)->nodeValue;
             $final_data[$key]['BaseUOM']    =  (isset($value->getElementsByTagName('BaseUOM')->item(0)->nodeValue) ? $value->getElementsByTagName('BaseUOM')->item(0)->nodeValue : '');
             $final_data[$key]['Conversion1']    =  $value->getElementsByTagName('Conversion1')->item(0)->nodeValue;
             $final_data[$key]['SalesPrice']    =  $value->getElementsByTagName('SalesPrice')->item(0)->nodeValue;
             $final_data[$key]['SalesPriceInBaseUOM']    =  $value->getElementsByTagName('SalesPriceInBaseUOM')->item(0)->nodeValue;
             $final_data[$key]['ActiveIndicator']    =  $value->getElementsByTagName('ActiveIndicator')->item(0)->nodeValue; 
                      
        } 
    }
}

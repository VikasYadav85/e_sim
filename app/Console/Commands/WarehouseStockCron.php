<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;

class WarehouseStockCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warehouse_stock:warehouse_stocks';

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

        $get_distributor =DB::table('tbl_distributor')  
        ->select('tbl_distributor.*')  
        ->get(); 
  
      foreach($get_distributor as $key =>$dists_details){
                 //dd($dists_details);
              $current = Carbon::now();
              // $todays = date("Y-m-d", strtotime($current)); 
              $todays = date("Y-m-d", strtotime($current)); 
              $tomorow = date("Y-m-d", strtotime("+1 day")); 
           
              $start_date= $todays; 
              $end_date= $tomorow;
              
           $TenantCode=$dists_details->DistributorCode;

          $PrincipleCode='MPLUGANDA'; 

        $final_data=array();
        $final_details=array();
        $token= get_dms_token();

        $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com"> 
          
               <soapenv:Header/>
               <soapenv:Body>
                   <rt6:GetDMSWarehouseStock>
                       <!--Optional:-->
                       <rt6:DMSWarehouseStock_Request>
                       <rt6:TokenID>'.$token.'</rt6:TokenID>
                       <rt6:PrincipleCode>'.$PrincipleCode.'</rt6:PrincipleCode>
                       <rt6:TenantCode>'.$TenantCode.'</rt6:TenantCode> 
                       <rt6:StartDateTime>'.$todays.'</rt6:StartDateTime>
                       <rt6:EndDateTime>'.$end_date.'</rt6:EndDateTime>
           
                       </rt6:DMSWarehouseStock_Request>
                   </rt6:GetDMSWarehouseStock>
               </soapenv:Body>
               </soapenv:Envelope>
                           '; 

        $response= get_dms_curl_header('GetDMSWarehouseStock',$xml_post_string);
 
        $dom=new \DOMDocument();
        $dom->loadXML($response); 
        $outlet_master=$dom->getElementsByTagName('DMSWarehouseStock'); 
        $current = Carbon::now();
        foreach ($outlet_master as $key => $value) {  
        $get_code = DB::table('tbl_warehouse_stock')
        ->select('tbl_warehouse_stock.*')
        ->where('tbl_warehouse_stock.ItemCode' ,'=', $value->getElementsByTagName('ItemCode')->item(0)->nodeValue)
        ->where('tbl_warehouse_stock.TenantCode' ,'=', $value->getElementsByTagName('TenantCode')->item(0)->nodeValue)
        ->get()->first();

        //  dd($get_code);
        if($get_code==''){
               $data2=array
                (
               'TenantCode'              => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
               'PrincipleCode'             => $value->getElementsByTagName('PrincipleCode')->item(0)->nodeValue,
               'LocationCode'                => $value->getElementsByTagName('LocationCode')->item(0)->nodeValue,
               'ItemCode'                 => $value->getElementsByTagName('ItemCode')->item(0)->nodeValue,
               'HierarchyCode'              => $value->getElementsByTagName('HierarchyCode')->item(0)->nodeValue,
               'StockQuantity'              => $value->getElementsByTagName('StockQuantity')->item(0)->nodeValue,
               'StockQuantity1'              => $value->getElementsByTagName('StockQuantity1')->item(0)->nodeValue,
               'created_at'              => $current,
                ); 
              $header =  DB::table('tbl_warehouse_stock')->insertGetId($data2);    
               } 
            }
        } 
    }
}

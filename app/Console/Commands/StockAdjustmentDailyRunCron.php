<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use App\Models\DistributorDetails;

use Illuminate\Support\Facades\Storage;
class StockAdjustmentDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:stockadjustments';

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
        $distributer=DistributorDetails::get();  
        foreach ($distributer as $distributers)
        {
            $current = Carbon::now();
            $todays = date("Y-m-d", strtotime($current)); 
            $tomorow = date("Y-m-d", strtotime("+1 day")); 
           
             $start_date= $todays; 
             $end_date= $tomorow;
            //  $user = Auth::user();
             $TenantCode= $distributers->DistributorCode;
            // $TenantCode='1000005858'; 
            $PrincipleCode='MPLUGANDA'; 
    
            $final_data=array();
            $final_details=array();
            $token= get_dms_token();
            $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com"> 
                <soapenv:Header/>
                <soapenv:Body>
                    <rt6:GetDMSStockAdjustment>
                        <!--Optional:-->
                        <rt6:StockAdjustment_Request>
                            <rt6:TokenID>'.$token.'</rt6:TokenID>
                            <rt6:PrincipleCode>'.$PrincipleCode.'</rt6:PrincipleCode>
                           
                            <rt6:StartDateTime>'.$start_date.'</rt6:StartDateTime>
                            <rt6:EndDateTime>'.$end_date.'</rt6:EndDateTime>
                            <rt6:TenantCode>'.$TenantCode.'</rt6:TenantCode>
    
                            <!--Optional:-->
                            <rt6:PullDataForPrincipleManagedDT>?</rt6:PullDataForPrincipleManagedDT>
                        </rt6:StockAdjustment_Request>
                    </rt6:GetDMSStockAdjustment>
                </soapenv:Body>
                </soapenv:Envelope>'; 
    
         $response= get_dms_curl_header('GetDMSStockAdjustment',$xml_post_string);
      
         $dom=new \DOMDocument();
        $dom->loadXML($response); 
        $outlet_master=$dom->getElementsByTagName('SAHeader'); 
        $current = Carbon::now();
        foreach ($outlet_master as $key => $value) {  
    
                $get_code = DB::table('tbl_stock_adjustment_header')
                    ->select('tbl_stock_adjustment_header.*')
                    ->where('tbl_stock_adjustment_header.InternalDocumentNo' ,'=', $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue)
                    ->where('tbl_stock_adjustment_header.TenantCode' ,'=', $value->getElementsByTagName('TenantCode')->item(0)->nodeValue)
                    ->get()->first();
    
                  //  dd($get_code);
                    if($get_code==''){
                  $data2=array
                   (
                    'TenantCode'                      => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                    'InternalDocumentNo'              => $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue,
                    'PrincipleCode'                   => $value->getElementsByTagName('PrincipleCode')->item(0)->nodeValue,
                    'LocationCode'                    => $value->getElementsByTagName('LocationCode')->item(0)->nodeValue,
                    'DocumentNumber'                  => $value->getElementsByTagName('DocumentNumber')->item(0)->nodeValue,
                    'SADescription'                   => $value->getElementsByTagName('SADescription')->item(0)->nodeValue,
                    'WarehouseCode'                   => $value->getElementsByTagName('WarehouseCode')->item(0)->nodeValue,
                    'created_at'                      => $current,
                   );
                  
                  $header =  DB::table('tbl_stock_adjustment_header')->insertGetId($data2);  
    
                 foreach ($value->getElementsByTagName('SADetail') as $key1 => $data) { 
                    $fields= array
                    (                     
                         'header_id'            => $header,   
                        'SALineID'              => $data->getElementsByTagName('SALineID')->item(0)->nodeValue,   
                        'ItemCode'              => $data->getElementsByTagName('ItemCode')->item(0)->nodeValue, 
                        'InternalDocumentNo'    => $data->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue, 
                        'ProductHierarchyCode'  => $data->getElementsByTagName('ProductHierarchyCode')->item(0)->nodeValue,   
                        'AdjustQuantity'        => $data->getElementsByTagName('AdjustQuantity')->item(0)->nodeValue, 
                        'AdjustQuantity1'       => $data->getElementsByTagName('AdjustQuantity1')->item(0)->nodeValue, 
                        'AdjustQuantity2'       => $data->getElementsByTagName('AdjustQuantity2')->item(0)->nodeValue, 
                        'Conversion'            => $data->getElementsByTagName('Conversion1')->item(0)->nodeValue, 
                        'LineDescription'       => $data->getElementsByTagName('LineDescription')->item(0)->nodeValue, 
                        'created_at'            => $current,
                     ); 
                      
                    // dd($fields ,$data2);
                     DB::table('tbl_stock_adjustment_details')->insert($fields);
                   }   
                } 
            } 
        }
    }
}

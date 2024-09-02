<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use App\Models\DistributorDetails;
use Illuminate\Support\Facades\Storage;
class GRNDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grndaily:grndailys';

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
        
         $TenantCode=$distributers->DistributorCode;
         $PrincipleCode='MPLUGANDA'; 
         $final_data=array();
         $final_details=array();
         $token= get_dms_token();
         $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com"> 
           <soapenv:Header/>
             <soapenv:Body>
                 <rt6:GetDMSGoodsReceiptNoteC2>
                     <!--Optional:-->
                     <rt6:DMSGoodsReceiptNoteC2_Request>
                         <rt6:TokenID>'.$token.'</rt6:TokenID>
                         <rt6:TenantCode>'.$TenantCode.'</rt6:TenantCode> 
                         <rt6:PrincipleCode>'.$PrincipleCode.'</rt6:PrincipleCode>
                         <rt6:StartDateTime>'.$start_date.'</rt6:StartDateTime> 
                         <rt6:EndDateTime>'.$end_date.'</rt6:EndDateTime>   
                         <!--Optional:--> 
                     </rt6:DMSGoodsReceiptNoteC2_Request>
                 </rt6:GetDMSGoodsReceiptNoteC2>
             </soapenv:Body>
             </soapenv:Envelope>'; 
 
      $response= get_dms_curl_header('GetDMSGoodsReceiptNoteC2',$xml_post_string);
   
     $dom=new \DOMDocument();
     $dom->loadXML($response); 
     $outlet_master=$dom->getElementsByTagName('GRNHeader'); 
     $current = Carbon::now();
     foreach ($outlet_master as $key => $value) {  
 
         $get_code = DB::table('tbl_grn_header')
         ->select('tbl_grn_header.*')
         ->where('tbl_grn_header.InternalDocumentNo' ,'=', $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue)
         ->where('tbl_grn_header.TenantCode' ,'=', $value->getElementsByTagName('TenantCode')->item(0)->nodeValue)
         ->get()->first();
 
       //  dd($get_code);
         if($get_code==''){
            $data2=array
         (
          'PrincipleCode'              => $value->getElementsByTagName('PrincipleCode')->item(0)->nodeValue,
          'TenantCode'             => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
          'LocationCode'                => $value->getElementsByTagName('LocationCode')->item(0)->nodeValue,
          'DocumentNumber'                 => $value->getElementsByTagName('DocumentNumber')->item(0)->nodeValue,
          'BusinessPartnerCode'              => $value->getElementsByTagName('BusinessPartnerCode')->item(0)->nodeValue,
          'DivisionCode'              => $value->getElementsByTagName('DivisionCode')->item(0)->nodeValue,
          'DocumentAmount'              => $value->getElementsByTagName('DocumentAmount')->item(0)->nodeValue,
          'VoidIndicator'             => $value->getElementsByTagName('VoidIndicator')->item(0)->nodeValue,
          'PurchaseOrderNo'                => $value->getElementsByTagName('PurchaseOrderNo')->item(0)->nodeValue,
          'RCInternalDocumentNo'                 => $value->getElementsByTagName('RCInternalDocumentNo')->item(0)->nodeValue,      
          'InternalDocumentNo'                 => $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue,         
 
          'created_at'              => $current,
         );
        
         $header =  DB::table('tbl_grn_header')->insertGetId($data2);  
 
          foreach ($value->getElementsByTagName('GRNDetail') as $key1 => $data) { 
                 $fields= array
                 (                     
                     'header_id'    => $header,   
                     'GRNLineNo'    => $data->getElementsByTagName('GRNLineNo')->item(0)->nodeValue,   
                     'ItemCode'    => $data->getElementsByTagName('ItemCode')->item(0)->nodeValue, 
                     'ProductHierarchyCode'    => $data->getElementsByTagName('ProductHierarchyCode')->item(0)->nodeValue,   
                     'ExpireDate'    => $data->getElementsByTagName('ExpireDate')->item(0)->nodeValue, 
                     'ProductionDate'    => $data->getElementsByTagName('ProductionDate')->item(0)->nodeValue, 
                     'SupplierQuantity'    => $data->getElementsByTagName('SupplierQuantity')->item(0)->nodeValue, 
                     'SupplierQuantity1'    => $data->getElementsByTagName('SupplierQuantity1')->item(0)->nodeValue, 
                     'SupplierQuantity2'    => $data->getElementsByTagName('SupplierQuantity2')->item(0)->nodeValue,   
                     'SaleableQuantity'    => $data->getElementsByTagName('SaleableQuantity')->item(0)->nodeValue, 
                     'SaleableQuantity1'    => $data->getElementsByTagName('SaleableQuantity1')->item(0)->nodeValue,   
                     'SaleableQuantity2'    => $data->getElementsByTagName('SaleableQuantity2')->item(0)->nodeValue, 
                     'DamageQuantity'    => $data->getElementsByTagName('DamageQuantity')->item(0)->nodeValue, 
                     'DamageQuantity1'    => $data->getElementsByTagName('DamageQuantity1')->item(0)->nodeValue, 
                     'DamageQuantity2'    => $data->getElementsByTagName('DamageQuantity2')->item(0)->nodeValue, 
                     'BreakageQuantity'    => $data->getElementsByTagName('BreakageQuantity')->item(0)->nodeValue,   
                     'BreakageQuantity1'    => $data->getElementsByTagName('BreakageQuantity1')->item(0)->nodeValue, 
                     'BreakageQuantity2'    => $data->getElementsByTagName('BreakageQuantity2')->item(0)->nodeValue,   
                     'LeakageQuantity'    => $data->getElementsByTagName('LeakageQuantity')->item(0)->nodeValue, 
                     'LeakageQuantity1'    => $data->getElementsByTagName('LeakageQuantity1')->item(0)->nodeValue, 
                     'LeakageQuantity2'    => $data->getElementsByTagName('LeakageQuantity2')->item(0)->nodeValue, 
                     'ShortageQuantity'    => $data->getElementsByTagName('ShortageQuantity')->item(0)->nodeValue, 
                     'ShortageQuantity1'    => $data->getElementsByTagName('ShortageQuantity1')->item(0)->nodeValue, 
                     'ShortageQuantity2'    => $data->getElementsByTagName('ShortageQuantity2')->item(0)->nodeValue,     
                     'Conversion'    => $data->getElementsByTagName('Conversion1')->item(0)->nodeValue, 
                     'BaseUOM'    => $data->getElementsByTagName('BaseUOM')->item(0)->nodeValue, 
                     'PurchasePrice'    => $data->getElementsByTagName('PurchasePrice')->item(0)->nodeValue,   
                     'TotalNetAmount'    => $data->getElementsByTagName('TotalNetAmount')->item(0)->nodeValue,  
                     'InternalDocumentNo'    => $data->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue,           
 
                     'created_at'              => $current,
                  );            
                    // dd($fields ,$data2);
                    DB::table('tbl_grn_details')->insert($fields);
                  }      
               } 
            }
        }
    }
}

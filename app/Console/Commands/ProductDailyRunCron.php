<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use Illuminate\Support\Facades\Storage;
class ProductDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:product_run';

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
        $todays = date("Y-m-d", strtotime($current)); 
        $tomorow = date("Y-m-d", strtotime("+1 day")); 
       
         $start_date= $todays; 
         $end_date= $tomorow;
        
        $TenantCode='MPLUGANDA';
       
        $final_data=array();
        $token= get_central_token();
       // dd($token);
        $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xc="http://xc.vxceed.com">
        <soapenv:Header/>
        <soapenv:Body>
           <xc:GetProductMasterC1>
              <!--Optional:-->
              <xc:ProductMasterC1_Request>
                 <xc:TokenID>'.$token.'</xc:TokenID>
                 <xc:TenantCode>'.$TenantCode.'</xc:TenantCode>
                 <xc:StartDateTime>'.$start_date.'</xc:StartDateTime>
                 <xc:EndDateTime>'.$end_date.'</xc:EndDateTime>
              </xc:ProductMasterC1_Request>
           </xc:GetProductMasterC1>
        </soapenv:Body>
     </soapenv:Envelope>';

     $response= get_central_curl_header('GetProductMasterC1',$xml_post_string);
    
     $dom=new \DOMDocument();
    $dom->loadXML($response);
    //dd($dom);
    $product_master=$dom->getElementsByTagName('ProdC1');
   
    $current = Carbon::now();
    foreach ($product_master as $key => $value) {
        $get_code = DB::table('tbl_products')
        ->select('tbl_products.*')
        ->where('tbl_products.ItemCode' ,'=', $value->getElementsByTagName('ItemCode')->item(0)->nodeValue)
        ->get()->first();

         //dd($value->getElementsByTagName('BaseUOM')->item(0)->nodeValue);
        if($get_code==''){
            $data2=array
               (
                'TenantCode'              => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                'ItemDescription'             => $value->getElementsByTagName('ItemDescription')->item(0)->nodeValue,
                'ItemCode'                => $value->getElementsByTagName('ItemCode')->item(0)->nodeValue,
                'BaseUOM'                 =>(isset($value->getElementsByTagName('BaseUOM')->item(0)->nodeValue) ? $value->getElementsByTagName('BaseUOM')->item(0)->nodeValue : ''), 
                'UOM1'              => (isset($value->getElementsByTagName('UOM1')->item(0)->nodeValue) ? $value->getElementsByTagName('UOM1')->item(0)->nodeValue : ''), 
                'UOM2'              => (isset($value->getElementsByTagName('UOM2')->item(0)->nodeValue) ? $value->getElementsByTagName('UOM2')->item(0)->nodeValue : ''), 
                'Conversion'              => $value->getElementsByTagName('Conversion1')->item(0)->nodeValue,
                'SalesPrice'              => $value->getElementsByTagName('MRP')->item(0)->nodeValue,
                 'CategoryCode1'              => $value->getElementsByTagName('CategoryCode1')->item(0)->nodeValue,
                  'CategoryCode2'              => $value->getElementsByTagName('CategoryCode2')->item(0)->nodeValue,
                   'CategoryCode3'              => $value->getElementsByTagName('CategoryCode3')->item(0)->nodeValue,
                    'ShortDescription'              => $value->getElementsByTagName('ShortDescription')->item(0)->nodeValue,
                     'PC_Conversion'              => $value->getElementsByTagName('PC_Conversion')->item(0)->nodeValue,
                      'UC_Conversion'              => $value->getElementsByTagName('UC_Conversion')->item(0)->nodeValue,
                       'HierarchyCode'              => $value->getElementsByTagName('HierarchyCode')->item(0)->nodeValue,
                'TaxGroupCode'     => $value->getElementsByTagName('TaxGroupCode')->item(0)->nodeValue,
                'IsActive'         => $value->getElementsByTagName('IsActive')->item(0)->nodeValue, 
                'created_at'              => $current,
                'Conversion2'              => $value->getElementsByTagName('Conversion2')->item(0)->nodeValue,
                'Primary_RC'              => $value->getElementsByTagName('Primary_RC')->item(0)->nodeValue,
                'Secondary_RC'              => $value->getElementsByTagName('Secondary_RC')->item(0)->nodeValue,
                'Unsorted_RC'              => $value->getElementsByTagName('Unsorted_RC')->item(0)->nodeValue,
                'commodity_goods_id'              => $value->getElementsByTagName('CategoryCode10')->item(0)->nodeValue,
              

               );

                // dd($data2);
               DB::table('tbl_products')->insert($data2);   
            }   
         } 
      }
   }

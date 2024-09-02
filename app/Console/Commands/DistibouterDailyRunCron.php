<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use Illuminate\Support\Facades\Storage;

class DistibouterDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'distibouter:descriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command description';

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
         $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xc="http://xc.vxceed.com">
         
    <soapenv:Header/>
    <soapenv:Body>
       <xc:GetDistributorDetailsC1>
          <!--Optional:-->
          <xc:DistributorDetailsC1_Request>
             <xc:TokenID>'.$token.'</xc:TokenID>
             <xc:TenantCode>'.$TenantCode.'</xc:TenantCode>
              
          </xc:DistributorDetailsC1_Request>
       </xc:GetDistributorDetailsC1>
    </soapenv:Body>
 </soapenv:Envelope>';
 
      $response= get_central_curl_header('GetDistributorDetailsC1',$xml_post_string);
    
      $dom=new \DOMDocument();
     $dom->loadXML($response);
     
     $product_master=$dom->getElementsByTagName('DistributorDetail');
     $current = Carbon::now();
     foreach ($product_master as $key => $value) {
 
         $get_code = DB::table('tbl_distributor')
         ->select('tbl_distributor.*')
         ->where('tbl_distributor.DistributorCode' ,'=', $value->getElementsByTagName('DistributorCode')->item(0)->nodeValue)
         ->get()->first();
 
        // dd($get_code);
         if($get_code==''){
 
          $data2=array
                (
                 'TenantCode'              => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                 'DistributorCode'             => $value->getElementsByTagName('DistributorCode')->item(0)->nodeValue,
                 'DistributorName'                => $value->getElementsByTagName('DistributorName')->item(0)->nodeValue,
                 'LicenseStartDate1'                 => $value->getElementsByTagName('LicenseStartDate1')->item(0)->nodeValue,
                 'LicenseStartDate2'              => $value->getElementsByTagName('LicenseStartDate2')->item(0)->nodeValue,
                 'TerritoryHierarchy'              => $value->getElementsByTagName('TerritoryHierarchy')->item(0)->nodeValue,
                 'OrganizationHierarchy'     => $value->getElementsByTagName('OrganizationHierarchy')->item(0)->nodeValue,
                 'CurrencyCode'         => $value->getElementsByTagName('CurrencyCode')->item(0)->nodeValue, 
                 'IsActive'         => $value->getElementsByTagName('IsActive')->item(0)->nodeValue, 
                 'created_at'              => $current,
 
                 'City'         => $value->getElementsByTagName('City')->item(0)->nodeValue, 
                 'State'         => $value->getElementsByTagName('State')->item(0)->nodeValue, 
                 'Country'         => $value->getElementsByTagName('Country')->item(0)->nodeValue, 
                 'Phone'         => $value->getElementsByTagName('Phone')->item(0)->nodeValue, 
                 'Mobile'         => $value->getElementsByTagName('Mobile')->item(0)->nodeValue, 
                 'Email'         => $value->getElementsByTagName('Email')->item(0)->nodeValue, 
                 'GSTNumber'         => $value->getElementsByTagName('GSTNumber')->item(0)->nodeValue, 
                 'Address'         => $value->getElementsByTagName('Address')->item(0)->nodeValue, 
                 'OwnerName'         => $value->getElementsByTagName('OwnerName')->item(0)->nodeValue, 
                 'SalesTaxNumber'         => $value->getElementsByTagName('SalesTaxNumber')->item(0)->nodeValue, 
                 'LicenseNumber'         => $value->getElementsByTagName('LicenseNumber')->item(0)->nodeValue, 
                 'TradeIDNumber'         => $value->getElementsByTagName('TradeIDNumber')->item(0)->nodeValue, 
                 'CSTNumber'         => $value->getElementsByTagName('CSTNumber')->item(0)->nodeValue, 
                 'PANCardNumber'         => $value->getElementsByTagName('PANCardNumber')->item(0)->nodeValue, 
 
                );
                // dd($data2);
                 DB::table('tbl_distributor')->insert($data2);     
            }     
         } 
      }
   }

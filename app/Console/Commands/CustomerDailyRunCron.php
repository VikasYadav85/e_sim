<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;  
use Illuminate\Support\Facades\DB;
use Session; 
use App\Models\DistributorDetails;
use Illuminate\Support\Facades\Storage;

class CustomerDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:customers';

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
          $token= get_dms_token();
          $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com">
  
          <soapenv:Header/>
          <soapenv:Body>
          <rt6:GetCustomerList>
              <!--Optional:--> 
                  <rt6:Customer_Request>
                  <rt6:TokenID>'.$token.'</rt6:TokenID>
                  <rt6:PrincipleCode>'.$PrincipleCode.'</rt6:PrincipleCode> 
                  <!--Optional:-->
                  <rt6:TenantLocationList>
                     <!--Zero or more repetitions:-->
                     <rt6:SetTenantLocations>
                        <!--Optional:-->
                        <rt6:TenantCode>'.$TenantCode.'</rt6:TenantCode>
                        <!--Optional:-->
                        <rt6:LocationCode>'.$TenantCode.'</rt6:LocationCode>
                     </rt6:SetTenantLocations>
                  </rt6:TenantLocationList>
                  
                  <rt6:StartDateTime>'.$start_date.'</rt6:StartDateTime>
                  <rt6:EndDateTime>'.$end_date.'</rt6:EndDateTime>
                 
               </rt6:Customer_Request>
              </rt6:GetCustomerList>
          </soapenv:Body>
          </soapenv:Envelope>'; 
  
       $response= get_dms_curl_header('GetCustomerList',$xml_post_string);
    
       $dom=new \DOMDocument();
      $dom->loadXML($response); 
      $outlet_master=$dom->getElementsByTagName('Customer'); 
      $current = Carbon::now();
      foreach ($outlet_master as $key => $value) { 
          
                    $get_code = DB::table('tbl_customer')
                    ->select('tbl_customer.*')
                    ->where('tbl_customer.CustomerCode' ,'=', $value->getElementsByTagName('CustomerCode')->item(0)->nodeValue)
                    // ->where('tbl_customer.TenantCode' ,'=', $value->getElementsByTagName('TenantCode')->item(0)->nodeValue)
                    ->get()->first();
            
                    // dd($get_code);
                    if($get_code==''){
                    $data2=array
                    (
                    'TenantCode'              => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                    'LocationCode'             => $value->getElementsByTagName('LocationCode')->item(0)->nodeValue,
                    'CustomerCode'                => $value->getElementsByTagName('CustomerCode')->item(0)->nodeValue,
                    'CustomerName'                 => $value->getElementsByTagName('CustomerName')->item(0)->nodeValue,
                    'Address'              => $value->getElementsByTagName('Address1')->item(0)->nodeValue,
                    'CategoryCode5'              => (isset($value->getElementsByTagName('CategoryCode5')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode5')->item(0)->nodeValue :''),
                    'TINNumber'              => (isset($value->getElementsByTagName('TINNumber')->item(0)->nodeValue) ? $value->getElementsByTagName('TINNumber')->item(0)->nodeValue :''),
                    'City'              => $value->getElementsByTagName('City')->item(0)->nodeValue,
                    'State'              => $value->getElementsByTagName('State')->item(0)->nodeValue,
                    'Phone'              => $value->getElementsByTagName('Phone')->item(0)->nodeValue,
                    'ContactPerson'              => $value->getElementsByTagName('ContactPerson')->item(0)->nodeValue,
                    'GeoCodeX'              => $value->getElementsByTagName('GeoCodeX')->item(0)->nodeValue,
                    'GeoCodeY'              => $value->getElementsByTagName('GeoCodeY')->item(0)->nodeValue,
                    'CustomerStatus'              => $value->getElementsByTagName('CustomerStatus')->item(0)->nodeValue,
                    'SalesMode'              => $value->getElementsByTagName('SalesMode')->item(0)->nodeValue,
                    'PaymentType'     => $value->getElementsByTagName('PaymentType')->item(0)->nodeValue,
                    'CustomerPriceLevel'         => $value->getElementsByTagName('CustomerPriceLevel')->item(0)->nodeValue, 
                    'OfficeAccount'         => $value->getElementsByTagName('OfficeAccount')->item(0)->nodeValue, 
                    'TotalCreditLimit'         => $value->getElementsByTagName('TotalCreditLimit')->item(0)->nodeValue, 
                    'TotalBalanceDue'         => $value->getElementsByTagName('TotalBalanceDue')->item(0)->nodeValue, 
                    'IsTaxable'         => $value->getElementsByTagName('IsTaxable')->item(0)->nodeValue, 
                    'created_at'              => $current,
            
                    'Address2'    =>  $value->getElementsByTagName('Address2')->item(0)->nodeValue,
                    'Address3'    =>  $value->getElementsByTagName('Address3')->item(0)->nodeValue,
                        'Address4'    =>  (isset($value->getElementsByTagName('Address4')->item(0)->nodeValue) ? $value->getElementsByTagName('Address4')->item(0)->nodeValue :'') , 
                        'Zip'    =>  (isset($value->getElementsByTagName('Zip')->item(0)->nodeValue) ? $value->getElementsByTagName('Zip')->item(0)->nodeValue :'') ,  
                        'CategoryCode1'    =>  (isset($value->getElementsByTagName('CategoryCode1')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode1')->item(0)->nodeValue :'') ,             
                        'CategoryCode2'    => (isset($value->getElementsByTagName('CategoryCode2')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode2')->item(0)->nodeValue :'') , 
                        'CategoryCode3'    =>  (isset($value->getElementsByTagName('CategoryCode3')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode3')->item(0)->nodeValue :'') , 
                        'CategoryCode4'    =>  (isset($value->getElementsByTagName('CategoryCode4')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode4')->item(0)->nodeValue :'') , 
                        'DefaultPriority'    =>  (isset($value->getElementsByTagName('DefaultPriority')->item(0)->nodeValue) ? $value->getElementsByTagName('DefaultPriority')->item(0)->nodeValue :'') ,             
                        
            
                    'HierarchyCode' => (isset($value->getElementsByTagName('HierarchyCode')->item(0)->nodeValue) ? $value->getElementsByTagName('HierarchyCode')->item(0)->nodeValue :''),
                        'Notes' => (isset($value->getElementsByTagName('Notes')->item(0)->nodeValue) ? $value->getElementsByTagName('Notes')->item(0)->nodeValue :''),
                    'email' => (isset($value->getElementsByTagName('Email')->item(0)->nodeValue) ? $value->getElementsByTagName('Email')->item(0)->nodeValue :''),
                        'CustomerNameA'  => (isset($value->getElementsByTagName('CustomerNameA')->item(0)->nodeValue) ? $value->getElementsByTagName('CustomerNameA')->item(0)->nodeValue :'') ,
                        'Fax'    =>  (isset($value->getElementsByTagName('Fax')->item(0)->nodeValue) ? $value->getElementsByTagName('Fax')->item(0)->nodeValue :'') ,             
                        'CategoryCode6'    =>  (isset($value->getElementsByTagName('CategoryCode6')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode6')->item(0)->nodeValue :'') ,             
                        'CategoryCode8'    =>  (isset($value->getElementsByTagName('CategoryCode8')->item(0)->nodeValue) ? $value->getElementsByTagName('CategoryCode8')->item(0)->nodeValue :'') ,             
                        'TerritoryHierarchy'    =>  (isset($value->getElementsByTagName('TerritoryHierarchy')->item(0)->nodeValue) ? $value->getElementsByTagName('TerritoryHierarchy')->item(0)->nodeValue :'') ,             
                        'CustomerPricingKey'    =>  (isset($value->getElementsByTagName('CustomerPricingKey')->item(0)->nodeValue) ? $value->getElementsByTagName('CustomerPricingKey')->item(0)->nodeValue :'') ,             
                        'BarcodeCheckDigit'    =>  (isset($value->getElementsByTagName('BarcodeCheckDigit')->item(0)->nodeValue) ? $value->getElementsByTagName('BarcodeCheckDigit')->item(0)->nodeValue :'') ,             
                        'TaxID'    =>  (isset($value->getElementsByTagName('TaxID')->item(0)->nodeValue) ? $value->getElementsByTagName('TaxID')->item(0)->nodeValue :'') ,             
                        'DateofBirth'    =>  (isset($value->getElementsByTagName('DateofBirth')->item(0)->nodeValue) ? $value->getElementsByTagName('DateofBirth')->item(0)->nodeValue :'') ,             
                        'SurveyKey'    =>  (isset($value->getElementsByTagName('SurveyKey')->item(0)->nodeValue) ? $value->getElementsByTagName('SurveyKey')->item(0)->nodeValue :'') , 
            
                    );
                        // dd($data2);
                    DB::table('tbl_customer')->insert($data2);  
                }    
            } 
        }
    }
}

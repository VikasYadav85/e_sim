<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Models\DistributorDetails;

use Illuminate\Console\Command;

class SetApiCustomerCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetApiCustomer:SetApiCustomers';

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
        $get_customer = DB::table('tbl_customer')  
        ->select('tbl_customer.*')  
       ->where('tbl_customer.set_api_posted','=', '0')
       ->where('tbl_customer.efris_posted','=', '1')
    //    ->where('tbl_customer.TenantCode','=', $distributers->DistributorCode)
       ->get();
        foreach ($get_customer as $get_data)
        {

      
          // dd($get_data); 
   $get_document_zero = '0'; 
 
   $PrincipleCode='MPLUGANDA'; 
   $final_data=array();
   $final_details=array();
   $token= get_central_token(); 
  
   $xml_post_string =' <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xc="http://xc.vxceed.com">
   <soapenv:Header/>
   <soapenv:Body>
      <xc:SetOutletMasterC2>
         <!--Optional:-->
         <xc:OutletMasterRequest>
            <xc:TokenID>'.$token.'</xc:TokenID>               
           <!--Optional:-->
        <xc:OutletMasterList>
           <!--Zero or more repetitions:-->
           <xc:OutletDetailsC2> 

           <xc:OutletInfo>
                 
                 <xc:TenantCode>'.$PrincipleCode.'</xc:TenantCode>
                 <!--Optional:-->
                 <xc:OutletCode>'.$get_data->TenantCode.'-'.$get_data->CustomerCode.'</xc:OutletCode>
                 <xc:TradeIDNumber>'.$get_data->TINNumber.'</xc:TradeIDNumber>
                 <xc:GSTNumber>'.$get_data->TINNumber.'</xc:GSTNumber>
                 
              </xc:OutletInfo>
              <!--Optional:-->
              <xc:DistributorOutletMappings>
                 <!--Zero or more repetitions:-->
                 <xc:DistributorOutletMapping>
                   
                    <xc:TenantCode>'.$PrincipleCode.'</xc:TenantCode>
                    <!--Optional:-->
                    <xc:OutletCode>'.$get_data->TenantCode.'-'.$get_data->CustomerCode.'</xc:OutletCode>
                    <!--Optional:-->
                    <xc:DistributorCode>'.$get_data->TenantCode.'</xc:DistributorCode>
                    <!--Optional:-->
                    <xc:DistributorOutletCode>'.$get_data->CustomerCode.'</xc:DistributorOutletCode>
                    <xc:IsActive>'.$get_data->CustomerStatus.'</xc:IsActive>
                 </xc:DistributorOutletMapping>
              </xc:DistributorOutletMappings>

          
              <!--Optional:-->
              <xc:TenantCode>'.$PrincipleCode.'</xc:TenantCode>
              <!--Optional:-->
              <xc:OutletCode>'.$get_data->TenantCode.'-'.$get_data->CustomerCode.'</xc:OutletCode>
              <!--Optional:-->
              <xc:OutletName>'.$get_data->CustomerName.'</xc:OutletName>
              <!--Optional:-->
              <xc:OutletNameA>'.$get_data->CustomerNameA.'</xc:OutletNameA>
              <!--Optional:-->
              <xc:Address1>'.$get_data->Address.'</xc:Address1>
              <!--Optional:-->
              <xc:Address2>'.$get_data->Address2.'</xc:Address2>
              <!--Optional:-->
              <xc:Address3>'.$get_data->Address3.'</xc:Address3>
              <!--Optional:-->
              <xc:Address4>'.$get_data->Address4.'</xc:Address4>
              <!--Optional:-->
              <xc:City>'.$get_data->City.'</xc:City>
              <!--Optional:-->
              <xc:State>'.$get_data->State.'</xc:State>
              <!--Optional:-->
              <xc:Zip>'.$get_data->TINNumber.'</xc:Zip>
              <!--Optional:-->
              <xc:Phone>'.$get_data->Phone.'</xc:Phone>
              <!--Optional:-->
              <xc:Fax>'.$get_data->Fax.'</xc:Fax>
              <!--Optional:-->
              <xc:Email>'.$get_data->email.'</xc:Email>
              <xc:TINNumber>'.$get_data->TINNumber.'</xc:TINNumber>
              <!--Optional:-->
              <xc:ContactPerson>'.$get_data->ContactPerson.'</xc:ContactPerson>
              <!--Optional:-->
              <xc:Notes>'.$get_data->Notes.'</xc:Notes>
              <!--Optional:-->
              <xc:CategoryCode1>'.$get_data->CategoryCode1.'</xc:CategoryCode1>
              <!--Optional:-->
              <xc:CategoryCode2>'.$get_data->CategoryCode2.'</xc:CategoryCode2>
              <!--Optional:-->
              <xc:CategoryCode3>'.$get_data->CategoryCode3.'</xc:CategoryCode3>
              <!--Optional:-->
              <xc:CategoryCode4>'.$get_data->CategoryCode4.'</xc:CategoryCode4>
              <!--Optional:-->
              <xc:CategoryCode5>'.$get_data->CategoryCode5.'</xc:CategoryCode5>
              <!--Optional:-->
              <xc:HierarchyCode>'.$get_data->HierarchyCode.'</xc:HierarchyCode>
              <!--Optional:-->
               <xc:GeoCodeX>'.$get_data->GeoCodeX.'</xc:GeoCodeX>
              <!--Optional:-->
              <xc:GeoCodeY>'.$get_data->GeoCodeY.'</xc:GeoCodeY>
              <!--Optional:-->
              <xc:OutletStatus>'.$get_data->CustomerStatus.'</xc:OutletStatus>
              <!--Optional:-->
              <xc:SalesMode>'.$get_data->SalesMode.'</xc:SalesMode>
              <!--Optional:-->
              <xc:PaymentType>'.$get_data->PaymentType.'</xc:PaymentType>
              <!--Optional:-->
              <xc:IsTaxable>'.$get_data->IsTaxable.'</xc:IsTaxable>
              <xc:TerritoryHierarchy>'.$get_data->TerritoryHierarchy.'</xc:TerritoryHierarchy>                 
              <xc:OutletPricingKey>'.$get_data->CustomerPricingKey.'</xc:OutletPricingKey>

           </xc:OutletDetailsC2>
        </xc:OutletMasterList>
     </xc:OutletMasterRequest>
  </xc:SetOutletMasterC2>
</soapenv:Body>
</soapenv:Envelope>'
;
$response= get_central_curl_header('SetOutletMasterC2',$xml_post_string);
 //dd($xml_post_string);
$dom=new \DOMDocument();
$dom->loadXML($response); 
$set_api_customer =$dom->getElementsByTagName('SetOutletMasterC2Result'); 
// dd($set_api_customer);
$current = Carbon::now();
$final_data = array(); 

if($set_api_customer->length=='1'){
foreach ($set_api_customer as $key => $value) { 
//dd($value->getElementsByTagName('ServiceCallStatus')->item(0)->nodeValue); 
 $final_data[$key]['ServiceCallStatus']  =  $value->getElementsByTagName('ServiceCallStatus')->item(0)->nodeValue;
 $final_data[$key]['TransactionID']  =  $value->getElementsByTagName('TransactionID')->item(0)->nodeValue;
 $final_data[$key]['RecordsReceived']  =  $value->getElementsByTagName('RecordsReceived')->item(0)->nodeValue;
}  

DB::table('tbl_customer')
->where('tbl_customer.cust_id','=', $get_data->cust_id) 
->update([
   'set_api_posted' => '1'
   ]);

// return redirect(route('customer_list'))->with('successMessage','Set API successfully');

// p($final_data);
}else{
// return redirect(route('customer_list'))->with('successMessage','Set Api issue');
    }
}
}
}

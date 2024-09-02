<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class SetApiSalesInvoiceCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SetApiSalesInvoice:SetApiSalesInvoices';

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
        
        $get_customer = DB::table('tbl_sales_invoice_header')  
       ->leftJoin('tbl_customer', 'tbl_sales_invoice_header.CustCode', '=', 'tbl_customer.CustomerCode')  
           ->select('tbl_sales_invoice_header.*','tbl_customer.Phone','tbl_customer.City','tbl_customer.State','tbl_customer.Address')  
           ->where('tbl_sales_invoice_header.efris_posted','=', '1')
           ->where('tbl_sales_invoice_header.set_api_posted','=', '0')
           ->get();
           foreach ($get_customer as $get_data)
           {
          //  dd($get_data); 
       $get_document_zero = '0';
      $TenantCode='1000005858';
       $PrincipleCode='MPLUGANDA'; 
       $final_data=array();
       $final_details=array();
       $token= get_dms_token();
      
       $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com">
       <soapenv:Header/>
       <soapenv:Body>
          <rt6:SetIRNInfo>
            
             <rt6:IRNInfoRequest>
                <rt6:TokenID>'.$token.'</rt6:TokenID>               
                <rt6:ClientTransactionID>'.$get_data->TenantCode.'</rt6:ClientTransactionID>               
                <rt6:DMSSIIRNInfoList>
                   <!--Zero or more repetitions:-->
                   <rt6:IRNInfo>                     
                      <rt6:EntityKey>                        
                         <rt6:EntitySetName>Testing</rt6:EntitySetName>                        
                         <rt6:EntityContainerName>Testing</rt6:EntityContainerName>                        
                         <rt6:EntityKeyValues>
                            <!--Zero or more repetitions:-->
                            <rt6:EntityKeyMember>                              
                               <rt6:Key>Testing123</rt6:Key>                              
                               <rt6:Value>Testing1234</rt6:Value>
                            </rt6:EntityKeyMember>
                         </rt6:EntityKeyValues>
                      </rt6:EntityKey>                     
                      <rt6:TenantCode>'.$get_data->TenantCode.'</rt6:TenantCode>                     
                      <rt6:LocationCode>'.$get_data->TenantCode.'</rt6:LocationCode>
                      <rt6:DocumentType>0</rt6:DocumentType>                     
                      <rt6:DocumentNumber>'.$get_data->DocumentNumber.'</rt6:DocumentNumber>                     
                      <rt6:AckNo>'.$get_data->ura_invoiceNo.'</rt6:AckNo>
                      <rt6:AckDate>2023-06-30</rt6:AckDate>                     
                      <rt6:IRNNo>'.$get_data->ura_invoiceNo.'</rt6:IRNNo>                     
                      <rt6:SignedInvoice>'.$get_data->ura_antifakeCode.'</rt6:SignedInvoice>                     
                      <rt6:SignedQRCode>'.$get_data->ura_qrCode.'</rt6:SignedQRCode>                     
                      <rt6:IRNStatus>'.$get_data->efris_posted.'</rt6:IRNStatus>
                   </rt6:IRNInfo>
                </rt6:DMSSIIRNInfoList>
             </rt6:IRNInfoRequest>
          </rt6:SetIRNInfo>
       </soapenv:Body>
    </soapenv:Envelope>'; 
 
    $response= get_dms_curl_header('SetIRNInfo',$xml_post_string);
       
   $dom=new \DOMDocument();
   $dom->loadXML($response); 
   $set_api_invoice =$dom->getElementsByTagName('SetIRNInfoResult'); 
   $current = Carbon::now();
   $final_data = array();

   
   if($set_api_invoice->length=='1'){
   foreach ($set_api_invoice as $key => $value) { 
    //dd($value->getElementsByTagName('ServiceCallStatus')->item(0)->nodeValue); 
     $final_data[$key]['ServiceCallStatus']  =  $value->getElementsByTagName('ServiceCallStatus')->item(0)->nodeValue;
     $final_data[$key]['TransactionID']  =  $value->getElementsByTagName('TransactionID')->item(0)->nodeValue;
     $final_data[$key]['RecordsReceived']  =  $value->getElementsByTagName('RecordsReceived')->item(0)->nodeValue;
   }  

   DB::table('tbl_sales_invoice_header')
   ->where('inv_id', $get_data->inv_id)
   ->update([
       'set_api_posted' => '1'
       ]);
   
//    return redirect(route('sales_invoice_list'))->with('successMessage','Set API Send successfully');
   
  // p($final_data);
}else{
    // return redirect(route('sales_invoice_list'))->with('successMessage','Set Api issue');
}
    
     
    }
}
}

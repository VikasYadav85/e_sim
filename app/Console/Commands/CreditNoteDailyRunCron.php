<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;
class CreditNoteDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creditnote:creditnotes';

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
                  <rt6:GetDMSSalesReturnNEP>
                     <!--Optional:-->
                     <rt6:SalesReturnNEP_Request>
                        <rt6:TokenID>'.$token.'</rt6:TokenID>
                        <rt6:PrincipleCode>'.$PrincipleCode.'</rt6:PrincipleCode>
                        <rt6:TenantCode>'.$TenantCode.'</rt6:TenantCode>
                        <rt6:StartDateTime>'.$start_date.'</rt6:StartDateTime> 
                        <rt6:EndDateTime>'.$end_date.'</rt6:EndDateTime>  
                     </rt6:SalesReturnNEP_Request>
                  </rt6:GetDMSSalesReturnNEP>
               </soapenv:Body>
            </soapenv:Envelope>'; 

            $response= get_dms_curl_header('GetDMSSalesReturnNEP',$xml_post_string);

            $dom=new \DOMDocument();
            $dom->loadXML($response); 
            $outlet_master=$dom->getElementsByTagName('SRHeaderGST'); 
            $current = Carbon::now();
            foreach ($outlet_master as $key => $value) { 
               $get_code = DB::table('tbl_sales_return_header')
               ->select('tbl_sales_return_header.*')
               ->where('tbl_sales_return_header.InternalDocumentNo' ,'=', $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue)
               ->where('tbl_sales_return_header.DTCode' ,'=', $value->getElementsByTagName('DTCode')->item(0)->nodeValue)
               ->get()->first();

               //  dd($get_code);
               if($get_code==''){
                  $data2=array
               (
                  'PrincipleCode'              => $value->getElementsByTagName('PrincipleCode')->item(0)->nodeValue,
                  'TenantCode'             => $value->getElementsByTagName('TenantCode')->item(0)->nodeValue,
                  'DTCode'                => $value->getElementsByTagName('DTCode')->item(0)->nodeValue,
                  'DTName'                 => $value->getElementsByTagName('DTName')->item(0)->nodeValue,
                  'DTGSTNumber'              => $value->getElementsByTagName('DTGSTNumber')->item(0)->nodeValue,
                  'DTAddress'              => $value->getElementsByTagName('DTAddress')->item(0)->nodeValue,
                  'DTCity'              => $value->getElementsByTagName('DTCity')->item(0)->nodeValue,
                  'DTZip'             => $value->getElementsByTagName('DTZip')->item(0)->nodeValue,
                  'CustCode'                => $value->getElementsByTagName('CustCode')->item(0)->nodeValue,
                  'CustName'                 => $value->getElementsByTagName('CustName')->item(0)->nodeValue,
                  'CustGSTRegistrationType'              => $value->getElementsByTagName('CustGSTRegistrationType')->item(0)->nodeValue,
                  'CustAddress1'              => $value->getElementsByTagName('CustAddress1')->item(0)->nodeValue,
                  'TransactionType'              => $value->getElementsByTagName('TransactionType')->item(0)->nodeValue,
                  'DocumentNumber'             => $value->getElementsByTagName('DocumentNumber')->item(0)->nodeValue,
                  'DocumentAmount'                => $value->getElementsByTagName('DocumentAmount')->item(0)->nodeValue,
                  'RoundOffAmount'                 => $value->getElementsByTagName('RoundOffAmount')->item(0)->nodeValue,
                  'CurrencyCode'              => $value->getElementsByTagName('CurrencyCode')->item(0)->nodeValue,
                  'FiscalYear'              => $value->getElementsByTagName('FiscalYear')->item(0)->nodeValue,
                  'TotalNetAmount'              => $value->getElementsByTagName('TotalNetAmount')->item(0)->nodeValue,
                  'TotalDiscountAmount'             => $value->getElementsByTagName('TotalDiscountAmount')->item(0)->nodeValue,
                  'TotalAssessmentAmount'                => $value->getElementsByTagName('TotalAssessmentAmount')->item(0)->nodeValue,
                  'TotalTaxAmount1'                 => $value->getElementsByTagName('TotalTaxAmount1')->item(0)->nodeValue,
                  'InternalDocumentNo'    => $value->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue,
                  'SalesInvoiceNo'    => $value->getElementsByTagName('SalesInvoiceNo')->item(0)->nodeValue,
                  'created_at'              => $current,
               );
               
               $header =  DB::table('tbl_sales_return_header')->insertGetId($data2);  

               foreach ($value->getElementsByTagName('SRDetailGST') as $key1 => $data) { 
                  $fields= array
                  (                     
                     'header_id'    => $header,   
                     'SalesLineNo'    => $data->getElementsByTagName('SalesLineNo')->item(0)->nodeValue,   
                     'ItemCode'    => $data->getElementsByTagName('ItemCode')->item(0)->nodeValue, 
                     'ItemDescription'    => $data->getElementsByTagName('ItemDescription')->item(0)->nodeValue,   
                     'UnitsOfMeasure'    => $data->getElementsByTagName('UnitsOfMeasure')->item(0)->nodeValue, 
                     'ItemQuantity'    => $data->getElementsByTagName('ItemQuantity')->item(0)->nodeValue, 
                     'ItemPrice'    => $data->getElementsByTagName('ItemPrice')->item(0)->nodeValue, 
                     'TotalDiscountAmount'    => $data->getElementsByTagName('TotalDiscountAmount')->item(0)->nodeValue, 
                     'TotalTaxAmount'    => $data->getElementsByTagName('TotalTaxAmount')->item(0)->nodeValue,   
                     'TotalNetAmount'    => $data->getElementsByTagName('TotalNetAmount')->item(0)->nodeValue, 
                     'IsFreeGood'    => $data->getElementsByTagName('IsFreeGood')->item(0)->nodeValue,   
                     'TaxPercentage1'    => $data->getElementsByTagName('TaxPercentage1')->item(0)->nodeValue, 
                     'TaxAmount1'    => $data->getElementsByTagName('TaxAmount1')->item(0)->nodeValue, 
                     'TaxPercentage2'    => $data->getElementsByTagName('TaxPercentage2')->item(0)->nodeValue, 
                     'TaxAmount2'    => $data->getElementsByTagName('TaxAmount2')->item(0)->nodeValue, 
                     'TaxPercentage3'    => $data->getElementsByTagName('TaxPercentage3')->item(0)->nodeValue,   
                     'TaxAmount3'    => $data->getElementsByTagName('TaxAmount3')->item(0)->nodeValue, 
                     'TaxPercentage4'    => $data->getElementsByTagName('TaxPercentage4')->item(0)->nodeValue,   
                     'TaxAmount4'    => $data->getElementsByTagName('TaxAmount4')->item(0)->nodeValue, 
                     'TaxPercentage5'    => $data->getElementsByTagName('TaxPercentage5')->item(0)->nodeValue, 
                     'TaxAmount5'    => $data->getElementsByTagName('TaxAmount5')->item(0)->nodeValue, 
                     'FreeQuantity'    => $data->getElementsByTagName('FreeQuantity')->item(0)->nodeValue, 
                     'GrossAmount'    => $data->getElementsByTagName('GrossAmount')->item(0)->nodeValue, 
                     'AssessmentAmount'    => $data->getElementsByTagName('AssessmentAmount')->item(0)->nodeValue, 
                     'InternalDocumentNo'    => $data->getElementsByTagName('InternalDocumentNo')->item(0)->nodeValue,   
                     'created_at'              => $current,
                  );            
                  // dd($fields ,$data2);
                  DB::table('tbl_sales_return_details')->insert($fields);
               } 
            }
          }
       } 
    }
}

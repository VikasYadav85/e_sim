<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SyncEfrisSalesInvoiceCron extends Command
{         
           
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SyncEfrisSalesInvoice:SyncEfrisSalesInvoices';

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
        $get_datas = DB::table('tbl_sales_invoice_header')  
        ->leftJoin('tbl_customer', 'tbl_sales_invoice_header.CustCode', '=', 'tbl_customer.CustomerCode')  
        ->select('tbl_sales_invoice_header.inv_id','tbl_sales_invoice_header.DTCode','tbl_sales_invoice_header.CustCode','tbl_sales_invoice_header.TenantCode','tbl_sales_invoice_header.created_at','tbl_sales_invoice_header.DocumentNumber','tbl_sales_invoice_header.efris_posted','tbl_sales_invoice_header.CustName') 
        ->where('tbl_sales_invoice_header.efris_posted','=', '0')
        ->orderBy('tbl_sales_invoice_header.inv_id','desc') 
        ->get();
       //  dd($get_datas); 
      foreach ($get_datas as $get_data) { 
        $get_customer= DB::table('tbl_customer')             
        ->select('tbl_customer.cust_id','tbl_customer.CustomerName','tbl_customer.Phone','tbl_customer.City','tbl_customer.State','tbl_customer.Address','tbl_customer.TINNumber','tbl_customer.CategoryCode5')  
        ->where('tbl_customer.CustomerCode','=', $get_data->CustCode)
        ->where('tbl_customer.TenantCode','=', $get_data->TenantCode)
        ->get()->first();
      //  dd($get_customer->CustomerName,$get_data);
       $get_details = DB::table('tbl_sales_invoice_details') 
       ->leftJoin('tbl_products', 'tbl_sales_invoice_details.ItemCode', '=', 'tbl_products.ItemCode')  
       ->select('tbl_sales_invoice_details.*','tbl_products.ItemDescription as product_name', 'tbl_products.ItemCode as product_code','tbl_products.commodity_goods_id')  
       ->where('tbl_sales_invoice_details.header_id','=', $get_data->inv_id)
       ->get();
       // dd( $get_details);
       $dist_detials_hel = $this->get_distrbutor_details($get_data->DTCode);

 if($get_customer->TINNumber > 0){

   if($get_customer->CategoryCode5=='B2B'){
       $byer_type = '0';
   }else{
       $byer_type = '1';
   }

   $custmer_Upload =array("tin"=> "$get_customer->TINNumber");
 
   $result = $this->make_post('T119', $custmer_Upload,$dist_detials_hel);  
          
   $resp = json_decode($result);
   
if($resp && $resp->{'taxpayer'} ){
   $string =  $resp->{'taxpayer'}; 

   $header_vat = 0;
   $i=0; 
   $detail_unit_price = 0;
   $detail_total = 0;
   $detail_vat = 0;
   $detail_discount = 0;
   $store_unit_price = 0;
   $store_total = 0;
   $store_vat = 0;
   $store_discount = 0;
   $unit_price = 0;
   $item_qty_array = array();
   $discount_total = array();
   $discount_vat = array();
   $discount_net = array();
   $counts_n =0;
   
   foreach($get_details as $key=> $value){
       
       $unit_price = round($value->ItemPrice,4);
       
      if(isset($item_qty_array[$value->ItemCode])){
       $item_qty_array[$value->ItemCode] += $value->ItemQuantity;
      }
       else{
           $item_qty_array[$value->ItemCode] = $value->ItemQuantity;
       }
        if($value->IsFreeGood =='1'){
        
           $discount_total[$value->ItemCode] = $unit_price  + (0.01 * ($unit_price * $value->TaxPercentage1)) * $value->ItemQuantity;
           $discount_vat[$value->ItemCode] = $discount_total[$value->ItemCode] - $discount_total[$value->ItemCode]*18/100;
           $discount_net[$value->ItemCode] = $discount_total[$value->ItemCode] - $discount_vat[$value->ItemCode];
        }
   }
   $total_cont_item = 0;
   $i; 
   $k=0;
   $discont_tax_colc =0;
   $gross_total =0;
   foreach($get_details as $key=> $value){            
       $k++;
       $unit_price = round( $value->ItemPrice  + (0.01 * ($value->ItemPrice * $value->TaxPercentage1)),4);            
   $uom_ura = 0; 
   if($value->UnitsOfMeasure=='CAR'){
       $uom_ura = 'CT' ;
   }
   if($value->UnitsOfMeasure=='DZ'){
       $uom_ura = 'DZN' ;
   }
   if($value->UnitsOfMeasure=='PC'){
       $uom_ura = 'PP' ; 
   }         
   
   $detail_total = round($unit_price * $item_qty_array[$value->product_code],2);
   $detail_vat = round($detail_total-$detail_total/1.18,2);
   $detail_discount = isset($discount_total[$value->product_code]) ? round($discount_total[$value->product_code],2) : null ;       
   $total_qty = $item_qty_array[$value->product_code];
 
   if($value->IsFreeGood =='1'){ 
        
       $discount = 0 ;
       $discount = round($detail_discount - $detail_discount/1.18,2);            
       $itemdetails[] = array(
           "item"=> "$value->product_name"." (Discount)","itemCode"=> "$value->product_code", "qty"=> "","unitOfMeasure"=> "$uom_ura","unitPrice"=> "","total"=> "-$detail_discount","taxRate"=> "0.18","tax"=> "-$discount","orderNumber"=> "$i", "discountFlag"=> "0","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i++;
           $discont_tax_colc += ($discount);
           $gross_total += $detail_discount;
       continue;    
           
   }else if($value->TotalDiscountAmount > 0 && $value->IsFreeGood =='0'){            
     
     $detail_discount = round( $value->TotalDiscountAmount  + (0.01 * ($value->TotalDiscountAmount * $value->TaxPercentage1)),2); 
       $itemdetails[] = array(
           "item"=> "$value->product_name","itemCode"=> "$value->product_code", "qty"=> "$total_qty","unitOfMeasure"=> $uom_ura,"unitPrice"=> "$unit_price","total"=> "$detail_total","taxRate"=> "0.18","tax"=> "$detail_vat","discountTotal" => "-$detail_discount","orderNumber"=> "$i", "discountFlag"=> "1","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i++;
         
       $discount = 0 ;
       $discount = round(($detail_discount) - ($detail_discount)/1.18,2); 
       $itemdetails[] = array(
           "item"=> "$value->product_name"." (Discount)","itemCode"=> "$value->product_code", "qty"=> "","unitOfMeasure"=> "$uom_ura","unitPrice"=> "","total"=> "-$detail_discount","taxRate"=> "0.18","tax"=> "-$discount","orderNumber"=> "$i", "discountFlag"=> "0","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i;   
           $gross_total += $detail_total + (-$detail_discount);
           $discont_tax_colc += ($detail_vat) + (-$discount) ;               
   }
    else{ 
      
      $disc = $detail_discount > 0 ? '1' : '2' ;
      $disc_sgin = $detail_discount > 0 ? '-' : '' ;
       $itemdetails[] = array(
           "item"=> "$value->product_name","itemCode"=> "$value->product_code", "qty"=> "$total_qty","unitOfMeasure"=> $uom_ura,"unitPrice"=> "$unit_price","total"=> "$detail_total","taxRate"=> "0.18","tax"=> "$detail_vat","discountTotal" => "$disc_sgin$detail_discount","orderNumber"=> "$i", "discountFlag"=> "$disc","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i; 
           $gross_total += $detail_total;
           $discont_tax_colc += $detail_vat; 
   } 
     
    $i++;
   $store_total += $detail_total;
   $store_vat += $detail_vat;
   $store_discount += $detail_discount;       
       }             
      $header_totals =0;
      $header_vats =0; 
       $header_net =0;  
       $header_discount =0; 
       $header_discount =  $store_discount; 
       $header_totals = $gross_total;            
       $header_vats =  $discont_tax_colc; 
       $header_net =  ($gross_total) - ($discont_tax_colc);
     // dd($header_totals, $header_vats ,$header_net);
    $invoic_date = date('Y-m-d', strtotime($get_data->created_at));
   $taxDetails[] =  array("taxCategoryCode" => "01","netAmount"=> "$header_net","taxRate"=> "0.18", "taxAmount"=> "$header_vats","grossAmount"=> "$header_totals");     
    
   $goodsUpload = array( "sellerDetails" => array("tin" => $dist_detials_hel->GSTNumber,"emailAddress" => $dist_detials_hel->Email, "placeOfBusiness" => "beijin","referenceNo" => $get_data->DocumentNumber,"branchName" => "xyz"),
   "basicInformation" => array("deviceNo"=> $dist_detials_hel->device_no, "issuedDate"=> $get_data->created_at, "operator"=> "aisino","currency"=> "UGX","invoiceType"=> "1", "invoiceKind"=> "1","dataSource"=> "103", "invoiceIndustryCode" => "101"),
   "buyerDetails" => array("buyerTin"=> $string->{'tin'},"buyerLegalName"=> $string->{'legalName'},"buyerBusinessName"=> $string->{'businessName'},"buyerType" => $byer_type, "buyerCitizenship" => "Uganda", "buyerSector"=> "1"), "buyerExtend" => array("district" => $get_customer->City),
   "goodsDetails" => $itemdetails,
   "taxDetails" => $taxDetails,
   "summary"=> array( "netAmount"=> "$header_net", "taxAmount"=> "$header_vats","grossAmount"=> "$header_totals","itemCount"=> "$k","modeCode"=> "1","remarks"=> "This is another remark test.","qrCode"=> ""),
   "payWay"=>array( 0 => array( "paymentMode"=> "101","paymentAmount"=> "$header_totals","orderNumber"=> "a" )),
   "extend"=>array( "reason" => "testing data" ),"importServicesSeller"=> array( "importInvoiceDate"=> $invoic_date),
   "edcDetails"=> array( "tankNo"=> "1111","pumpNo"=> "2222","nozzleNo"=> "3333"),"airlineGoodsDetails" => array( 0 => array("item"=> "","itemCode"=> "","qty"=> "","unitOfMeasure"=> "103","unitPrice"=> "0", "total"=> "0", "orderNumber"=> "0")),"edcDetails"=> array( "tankNo"=> "1111","pumpNo"=> "2222","nozzleNo"=> "3333") );  
            
       //dd($goodsUpload);
       $result = $this->make_post('T109', $goodsUpload,$dist_detials_hel);  
    // dd($result);
  $resp = json_decode($result); 
  // dd($resp);    
   if($resp && $resp->{'sellerDetails'}){
   $string =  $resp->{'sellerDetails'}->{'referenceNo'} ; 
   DB::table('tbl_sales_invoice_header')
   ->where('tbl_sales_invoice_header.inv_id','=', $get_data->inv_id)
   ->update([
       'ura_invoiceId' => $resp->{'basicInformation'}->{'invoiceId'} ,'ura_invoiceNo' => $resp->{'basicInformation'}->{'invoiceNo'} ,'ura_antifakeCode' => $resp->{'basicInformation'}->{'antifakeCode'} ,'ura_qrCode' => $resp->{'summary'}->{'qrCode'},'efris_posted'=> '1'
       ]);

       DB::table('tbl_sales_return_header')
       ->where('tbl_sales_return_header.SalesInvoiceNo', $resp->{'sellerDetails'}->{'referenceNo'})
        ->where('tbl_sales_return_header.TenantCode', $get_data->TenantCode)
       ->update([
           'ura_invoiceId' => $resp->{'basicInformation'}->{'invoiceId'} ,'ura_invoiceNo' => $resp->{'basicInformation'}->{'invoiceNo'} ,'ura_antifakeCode' => $resp->{'basicInformation'}->{'antifakeCode'} 
           ]);
        //   dd("df1");
      // return redirect(route('sales_invoice_list'))->with('successMessage','EFRIS Invoice added successfully');
      }else
       {
       $error_store=array
       (
       'enterface_code'     => 'T109',
       'error_massege'      => $result,
       'tin_no'             => $dist_detials_hel->GSTNumber,
       );
           DB::table('tbl_efris_log_dashboard')->insert($error_store);  
        //   dd("df11");
      // return redirect(route('sales_invoice_list'))->with('alertMessage', $result);
   }

 }else
  {
 $error_store=array
    (
   'enterface_code'     => 'T119',
   'error_massege'      => $result,
   'tin_no'             => $dist_detials_hel->GSTNumber,
   );
   DB::table('tbl_efris_log_dashboard')->insert($error_store);  
  
 //  return redirect(route('sales_invoice_list'))->with('alertMessage','EFRIS Customer Tin Number not valid');
} 

}else{

   $header_vat = 0;
   $i=0; 
   $detail_unit_price = 0;
   $detail_total = 0;
   $detail_vat = 0;
   $detail_discount = 0;
   $store_unit_price = 0;
   $store_total = 0;
   $store_vat = 0;
   $store_discount = 0;
   $unit_price = 0;
   $item_qty_array = array();
   $discount_total = array();
   $discount_vat = array();
   $discount_net = array();
   $counts_n =0;
   
   foreach($get_details as $key=> $value){
       
       $unit_price = round($value->ItemPrice,4);
      // dd($value);
      if(isset($item_qty_array[$value->ItemCode])){
       $item_qty_array[$value->ItemCode] += $value->ItemQuantity;
      }
       else{
           $item_qty_array[$value->ItemCode] = $value->ItemQuantity;
       }
        if($value->IsFreeGood =='1'){
        
           $discount_total[$value->ItemCode] = $unit_price  + (0.01 * ($unit_price * $value->TaxPercentage1)) * $value->ItemQuantity;
           $discount_vat[$value->ItemCode] = $discount_total[$value->ItemCode] - $discount_total[$value->ItemCode]*18/100;
           $discount_net[$value->ItemCode] = $discount_total[$value->ItemCode] - $discount_vat[$value->ItemCode];
        }
   }
   $total_cont_item = 0;
   $i; 
   $k=0;
   $discont_tax_colc =0;
   $gross_total =0;
   foreach($get_details as $key=> $value){            
       $k++;
       $unit_price = round( $value->ItemPrice  + (0.01 * ($value->ItemPrice * $value->TaxPercentage1)),4);            
   $uom_ura = 0; 
   if($value->UnitsOfMeasure=='CAR'){
       $uom_ura = 'CT' ;
   }
   if($value->UnitsOfMeasure=='DZ'){
       $uom_ura = 'DZN' ;
   }
   if($value->UnitsOfMeasure=='PC'){
       $uom_ura = 'PP' ; 
   }         
   
   $detail_total = round($unit_price * $item_qty_array[$value->product_code],2);
   $detail_vat = round($detail_total-$detail_total/1.18,2);
   $detail_discount = isset($discount_total[$value->product_code]) ? round($discount_total[$value->product_code],2) : null ;       
   $total_qty = $item_qty_array[$value->product_code];
  // dd($detail_unit_price,$detail_total, $detail_vat,$detail_discount);
   if($value->IsFreeGood =='1'){ 
        
       $discount = 0 ;
       $discount = round($detail_discount - $detail_discount/1.18,2);            
       $itemdetails[] = array(
           "item"=> "$value->product_name"." (Discount)","itemCode"=> "$value->product_code", "qty"=> "","unitOfMeasure"=> "$uom_ura","unitPrice"=> "","total"=> "-$detail_discount","taxRate"=> "0.18","tax"=> "-$discount","orderNumber"=> "$i", "discountFlag"=> "0","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i++;
           $discont_tax_colc += ($discount);
           $gross_total += $detail_discount;
       continue;    
           
   }else if($value->TotalDiscountAmount > 0 && $value->IsFreeGood =='0'){            
     //  $detail_discount = round($value->TotalDiscountAmount,2); 
        $detail_discount = round( $value->TotalDiscountAmount  + (0.01 * ($value->TotalDiscountAmount * $value->TaxPercentage1)),2); 
          $itemdetails[] = array(
           "item"=> "$value->product_name","itemCode"=> "$value->product_code", "qty"=> "$total_qty","unitOfMeasure"=> $uom_ura,"unitPrice"=> "$unit_price","total"=> "$detail_total","taxRate"=> "0.18","tax"=> "$detail_vat","discountTotal" => "-$detail_discount","orderNumber"=> "$i", "discountFlag"=> "1","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i++;
         
       $discount = 0 ;
       $discount = round(($detail_discount) - ($detail_discount)/1.18,2); 
       $itemdetails[] = array(
           "item"=> "$value->product_name"." (Discount)","itemCode"=> "$value->product_code", "qty"=> "","unitOfMeasure"=> "$uom_ura","unitPrice"=> "","total"=> "-$detail_discount","taxRate"=> "0.18","tax"=> "-$discount","orderNumber"=> "$i", "discountFlag"=> "0","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i;   
           $gross_total += $detail_total + (-$detail_discount);
           $discont_tax_colc += ($detail_vat) + (-$discount) ;               
   }
    else{ 
      
      $disc = $detail_discount > 0 ? '1' : '2' ;
      $disc_sgin = $detail_discount > 0 ? '-' : '' ;
       $itemdetails[] = array(
           "item"=> "$value->product_name","itemCode"=> "$value->product_code", "qty"=> "$total_qty","unitOfMeasure"=> $uom_ura,"unitPrice"=> "$unit_price","total"=> "$detail_total","taxRate"=> "0.18","tax"=> "$detail_vat","discountTotal" => "$disc_sgin$detail_discount","orderNumber"=> "$i", "discountFlag"=> "$disc","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$value->commodity_goods_id"); 
           $i; 
           $gross_total += $detail_total;
           $discont_tax_colc += $detail_vat; 
   } 
     
    $i++;
   $store_total += $detail_total;
   $store_vat += $detail_vat;
   $store_discount += $detail_discount;       
       }             
      $header_totals =0;
      $header_vats =0; 
       $header_net =0;  
       $header_discount =0; 
       $header_discount =  $store_discount; 
       $header_totals = $gross_total;            
       $header_vats =  $discont_tax_colc; 
       $header_net =  ($gross_total) - ($discont_tax_colc);
     // dd($header_totals, $header_vats ,$header_net);
    $invoic_date = date('Y-m-d', strtotime($get_data->created_at));
   $taxDetails[] =  array("taxCategoryCode" => "01","netAmount"=> "$header_net","taxRate"=> "0.18", "taxAmount"=> "$header_vats","grossAmount"=> "$header_totals");     
    
   $goodsUpload = array( "sellerDetails" => array("tin" => $dist_detials_hel->GSTNumber,"emailAddress" => $dist_detials_hel->Email, "placeOfBusiness" => "beijin","referenceNo" => $get_data->DocumentNumber,"branchName" => "xyz"),
   "basicInformation" => array("deviceNo"=> $dist_detials_hel->device_no, "issuedDate"=> $get_data->created_at, "operator"=> "aisino","currency"=> "UGX","invoiceType"=> "1", "invoiceKind"=> "1","dataSource"=> "103", "invoiceIndustryCode" => "101"),
   "buyerDetails" => array("buyerLegalName"=> $get_customer->CustomerName,"buyerMobilePhone"=> $get_customer->Phone,"buyerType" => "1", "buyerCitizenship" => "Ugandan", "buyerSector"=> "1"), "buyerExtend" => array("district" => $get_customer->City),
   "goodsDetails" => $itemdetails,
   "taxDetails" => $taxDetails,
   "summary"=> array( "netAmount"=> "$header_net", "taxAmount"=> "$header_vats","grossAmount"=> "$header_totals","itemCount"=> "$k","modeCode"=> "1","remarks"=> "This is another remark test.","qrCode"=> ""),
   "payWay"=>array( 0 => array( "paymentMode"=> "101","paymentAmount"=> "$header_totals","orderNumber"=> "a" )),
   "extend"=>array( "reason" => "testing data" ),"importServicesSeller"=> array( "importInvoiceDate"=> $invoic_date),
   "edcDetails"=> array( "tankNo"=> "1111","pumpNo"=> "2222","nozzleNo"=> "3333"),"airlineGoodsDetails" => array( 0 => array("item"=> "","itemCode"=> "","qty"=> "","unitOfMeasure"=> "103","unitPrice"=> "0", "total"=> "0", "orderNumber"=> "0")),"edcDetails"=> array( "tankNo"=> "1111","pumpNo"=> "2222","nozzleNo"=> "3333") );  
         
   // dd($goodsUpload);
       $result = $this->make_post('T109', $goodsUpload,$dist_detials_hel);  
   
 $resp = json_decode($result); 
 // dd($resp);    
   if($resp && $resp->{'sellerDetails'}){
   $string =  $resp->{'sellerDetails'}->{'referenceNo'} ; 
   DB::table('tbl_sales_invoice_header')
   ->where('tbl_sales_invoice_header.inv_id','=', $get_data->inv_id)
   ->update([
       'ura_invoiceId' => $resp->{'basicInformation'}->{'invoiceId'} ,'ura_invoiceNo' => $resp->{'basicInformation'}->{'invoiceNo'} ,'ura_antifakeCode' => $resp->{'basicInformation'}->{'antifakeCode'} ,'ura_qrCode' => $resp->{'summary'}->{'qrCode'},'efris_posted'=> '1'
       ]);

       DB::table('tbl_sales_return_header')
       ->where('tbl_sales_return_header.SalesInvoiceNo', $resp->{'sellerDetails'}->{'referenceNo'})
        ->where('tbl_sales_return_header.TenantCode', $get_data->TenantCode)
       ->update([
           'ura_invoiceId' => $resp->{'basicInformation'}->{'invoiceId'} ,'ura_invoiceNo' => $resp->{'basicInformation'}->{'invoiceNo'} ,'ura_antifakeCode' => $resp->{'basicInformation'}->{'antifakeCode'} 
           ]);
         //  dd("df2");
      // return redirect(route('sales_invoice_list'))->with('successMessage','EFRIS Invoice added successfully');
     }else
         {
       $error_store=array
       (
       'enterface_code'     => 'T109',
       'error_massege'      => $result,
       'tin_no'             => $dist_detials_hel->GSTNumber,
       );
           DB::table('tbl_efris_log_dashboard')->insert($error_store);  
          // dd("df22");
    // return redirect(route('sales_invoice_list'))->with('alertMessage', $result);
        } 
      }
      $itemdetails = array();
      $taxDetails= array();
    }
    // return redirect(route('sales_invoice_list'))->with('successMessage','EFRIS Invoice added successfully');
    // return view('EfrisInvoiceList.efris_invoice_list');
  }

    
        //get distrbuoter detials
       private function get_distrbutor_details($DTCode)
        {
         $get_dist =DB::table('tbl_distributor')  
         ->select('tbl_distributor.*')  
         ->where('tbl_distributor.DistributorCode','=', $DTCode)
         ->get()->first();                     
         return  $get_dist;
       }
    
     //end distrbuoter detials
    
     private function make_post($interfaceCode, $content,$dist_detials_hel=null)
                {  
                     //dd($dist_detials_hel->device_no);
                $deviceNo = $dist_detials_hel->device_no;
               // dd($deviceNo);
                $data =  $this->fetchData($dist_detials_hel);
                $aesKey =  $this->getAESKey($dist_detials_hel);
    
                $json_content = json_encode($content); //request to get
                // p($json_content);
                $isAESEncrypted = openssl_encrypt($json_content, "aes-128-ecb", $aesKey);
    
                if ($isAESEncrypted) {
                    $data['globalInfo']['interfaceCode'] = $interfaceCode;
                    $data['globalInfo']['deviceNo'] = $deviceNo;
                    $data['data']['content'] = $isAESEncrypted;
                    $data['data']['dataDescription']['codeType'] = "1";
                    $data['data']['dataDescription']['encryptCode'] = "2";

                    // read private key
                    $pkpath= "http://174.138.3.35/movit_soap/public/index.php".$dist_detials_hel->p_12;
               
                try {
                    $cert_store = file_get_contents($pkpath,true);
                } catch (Exception $e) {
                    Log::error($e->getMessage());
                }
                
              
                $isRead = openssl_pkcs12_read($cert_store, $cert_info, $dist_detials_hel->password_p12);
               // dd($pkpath,$dist_detials_hel->password_p12);
             

    
                    $privKey =  $cert_info['pkey'];
                    $isSigned = openssl_sign($isAESEncrypted, $signature, $privKey, OPENSSL_ALGO_SHA1);
                  
                    if ($isSigned) {
                        $b4signature = base64_encode($signature);
                       
                        // var_dump($b64signature); // var_dump
                        $data['data']['signature'] = $b4signature;
                       
                    }
                }
    
                $jsonresp = $this->postReq($data);            
                $resp = json_decode($jsonresp);
                 // dd($resp);
                $return_status = $resp->{'returnStateInfo'};
                $data = $resp->{'data'};
                $b64enc_content = $data->{'content'};
                if ($return_status->{'returnCode'} == '00' && $b64enc_content != "" &&  $data->{'dataDescription'}->{'zipCode'} == '1') {
                    $unzipped = base64_encode(gzdecode(base64_decode($b64enc_content)));             
                    // decrypt content
                    $content = openssl_decrypt($unzipped, "aes-128-ecb", $aesKey);
                 // dd($content);
                      return $content;
                    //return $return_status->{'returnMessage'};        
                } else if ($return_status->{'returnCode'} == '00' && $b64enc_content != "" &&  $data->{'dataDescription'}->{'zipCode'} == '0') {
                    $content = openssl_decrypt($b64enc_content, "aes-128-ecb", $aesKey);
                    return $content;
                    //return $return_status->{'returnMessage'};
                }else{
                    $content = openssl_decrypt($b64enc_content, "aes-128-ecb", $aesKey);        
                    return $return_status->{'returnMessage'};
                }
               /*  if ($return_status->{'returnCode'} == '00' & $b64enc_content != "") {
                    // decrypt content
                    $content = openssl_decrypt($b64enc_content, "aes-128-ecb", $aesKey);
                    //Log::emergency($content);
                    return $content;
                }
                $content = openssl_decrypt($b64enc_content, "aes-128-ecb", $aesKey);
    
                return $return_status->{'returnMessage'}; */
    
                }
    
                private function fetchData($dist_detials_hel=null)
                {
                date_default_timezone_set("Africa/Nairobi");
                    $get_tins = (isset($dist_detials_hel->GSTNumber) ? $dist_detials_hel->GSTNumber :'');
                return array("data" => array("content" => "", "signature" => "", "dataDescription" => array("codeType" => "0", "encryptCode" => "1", "zipCode" => "0")), "globalInfo" => array("appId" => "AP04", "version" => "1.1.20191201", "dataExchangeId" => "9230489223014123", "interfaceCode" => "T101", "requestTime" => date("Y-m-d H:i:s"), "requestCode" => "TP", "responseCode" => "TA", "userName" => "admin", "deviceMAC" => "FFFFFFFFFFFF", "deviceNo" => "", "tin" => "$get_tins", "brn" => "", "taxpayerID" => "1", "longitude" => "116.397128", "latitude" => "39.916527", "extendField" => array("responseDateFormat" => "dd/MM/yyyy", "responseTimeFormat" => "dd/MM/yyyy HH:mm:ss")), "returnStateInfo" => array("returnCode" => "", "returnMessage" => ""));
    
                }
    
                private function getAESKey($dist_detials_hel=null)
                {
                // GET AES KEY
                $data = $this->fetchData($dist_detials_hel);
                $deviceNo = $dist_detials_hel->device_no;
                $tin = $dist_detials_hel->GSTNumber;
                $brn = "";
                $dataExchangeId = $this->guidv4();
    
                $data['globalInfo']['interfaceCode'] = "T104";
                $data['globalInfo']['dataExchangeId'] = $dataExchangeId;
                $data['globalInfo']['deviceNo'] = $deviceNo;
                $data['globalInfo']['tin'] = $tin;
                $data['globalInfo']['brn'] = $brn;
    
                $resp = $this->postReq($data);
                  // dd($resp);
                $jsonresp = json_decode($resp); 
                $b64content = $jsonresp->{'data'}->{'content'};
                $content = json_decode(base64_decode($b64content, true)); 
                
                $b64passowrdDes = $content->{'passowrdDes'};
                $passowrdDes = base64_decode($b64passowrdDes); 
                // read private key
                $pkpath= "http://174.138.3.35/movit_soap/public/index.php".$dist_detials_hel->p_12; 
               
                try {
                    $cert_store = file_get_contents($pkpath,true);
                } catch (Exception $e) {
                    Log::error($e->getMessage());
                }
                $isRead = openssl_pkcs12_read($cert_store, $cert_info, $dist_detials_hel->password_p12);
               // dd($pkpath,$dist_detials_hel->password_p12);
             
                $privKey =  $cert_info['pkey'];
           
                $isDecrypted = openssl_private_decrypt($passowrdDes, $aesKey, $privKey, OPENSSL_PKCS1_PADDING); 
                return  base64_decode($aesKey);
    
                }
    
                private function guidv4($data = null)
                {
                // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
                $data = $data ?? random_bytes(16);
                assert(strlen($data) == 16); 
                // Set version to 0100
                $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
                // Set bits 6-7 to 10
                $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
                // Output the 36 character UUID.
                return vsprintf('%s%s-%s-%s-%s-%s%s', str_split(bin2hex($data), 4));
                }
    
                private function postReq($data)
                { 
                $url = 'https://efristest.ura.go.ug/efrisws/ws/taapp/getInformation'; 
                $curl = curl_init($url); 
                curl_setopt_array($curl, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => 'POST', CURLOPT_POSTFIELDS => json_encode($data), CURLOPT_HTTPHEADER => array('Content-Type: application/json'),)); 
                $rst = curl_exec($curl);
                curl_close($curl); 
                return $rst;
                }
    
                private function fetchUrl()
                {
                return "https://efristest.ura.go.ug/efrisws/ws/taapp/getInformation";
                }
    
           /*      public function getPrivKey($dist_detials_hel=null)
                { 
                // read private key
                $pkpath= url('').$dist_detials_hel->p_12;
               
                $cert_store = file_get_contents($pkpath);
                $isRead = openssl_pkcs12_read($cert_store, $cert_info, $dist_detials_hel->password_p12);
               // dd($pkpath,$dist_detials_hel->password_p12);
                return $cert_info['pkey'];
                } */
        
    
        

}
 
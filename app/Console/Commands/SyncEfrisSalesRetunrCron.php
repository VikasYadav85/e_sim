<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncEfrisSalesRetunrCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SyncEfrisSalesRetunr:SyncEfrisSalesRetunrs';

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
        $get_data = DB::table('tbl_sales_return_header')  
        ->leftJoin('tbl_customer', 'tbl_sales_return_header.CustCode', '=', 'tbl_customer.CustomerCode')          
            ->select('tbl_sales_return_header.*','tbl_customer.Address','tbl_customer.TINNumber','tbl_customer.CategoryCode5')  
            ->where('tbl_sales_return_header.inv_id','=', $id)
            ->get()->first();
           
            $get_details = DB::table('tbl_sales_return_details')             
            ->select('tbl_sales_return_details.*')  
            ->where('tbl_sales_return_details.header_id','=', $id)
            ->get()->all();
            //   dd($get_data,$get_details);
         $get_data_invoice = DB::table('tbl_sales_invoice_header')  
         ->leftJoin('tbl_customer', 'tbl_sales_invoice_header.CustCode', '=', 'tbl_customer.CustomerCode')  
            ->select('tbl_sales_invoice_header.*','tbl_customer.Phone','tbl_customer.City','tbl_customer.State','tbl_customer.Address','tbl_customer.TINNumber','tbl_customer.CategoryCode5')  
            ->where('tbl_sales_invoice_header.DocumentNumber','=', $get_data->SalesInvoiceNo)
            ->get()->first();
            
            $get_details_invoice = DB::table('tbl_sales_invoice_details') 
            ->leftJoin('tbl_products', 'tbl_sales_invoice_details.ItemCode', '=', 'tbl_products.ItemCode')  
            ->select('tbl_sales_invoice_details.*','tbl_products.ItemDescription as product_name', 'tbl_products.ItemCode as product_code','tbl_products.commodity_goods_id')  
            ->where('tbl_sales_invoice_details.header_id','=', $get_data_invoice->inv_id)
            ->get()->all();
           // dd($get_data,$get_details,$get_data_invoice,$get_details_invoice);
	
           $get_dists =DB::table('tbl_distributor')  
           ->select('tbl_distributor.*')  
           ->where('tbl_distributor.DistributorCode','=', $get_data->DTCode)
           ->get()->first(); 
          // dd($get_dists->device_no);
         // $devoice_nos = get_dis_device_no($get_dists->device_no);
      $dist_detials_hel = get_distrbutor_details($get_data->DTCode);

    if($get_data->TINNumber > 0 || $get_data->CategoryCode5=='B2B'){
     
      if($get_data->CategoryCode5=='B2B'){
          $byer_type = '0';
      }else{
          $byer_type = '1';
      }
      //dd($get_data->TINNumber , $get_data->CategoryCode5);
      $custmer_Upload =array("tin"=> "$get_data->TINNumber");
    
      $result = make_post('T119', $custmer_Upload,$dist_detials_hel);  
              // dd($result);
      $resp = json_decode($result);
      
  if($resp && $resp->{'taxpayer'} ){
      $string =  $resp->{'taxpayer'}; 

      $i=0;
		$final_unit_pr =0;
		$final_total =0;
      $uom_ura = ''; 
      $ret_unit_price = 0;
      $retu_disco =0;
      $ret_net_price =0;
      $ret_tax_price = 0;
      $ret_total_price = 0;
      $ret_qty =0;
      $ret_unit_pr =0;
      $total_price = 0;        
      $tax_price = 0;
      $net_price = 0;
      $ret_unit_pri1 = 0;
      $ret_prices =0;

		 foreach($get_details_invoice as $key => $value){		 
        
         $return_qty = DB::table('tbl_sales_return_details')                       
         ->select('tbl_sales_return_details.*')  
         ->where('tbl_sales_return_details.header_id','=', $id)
         ->where('tbl_sales_return_details.ItemCode','=', $value->ItemCode)
          ->first();
       // dd($value);
         if($value->IsFreeGood=='0' ){
        if(!is_object($return_qty)){
            $ret_qty = '0' ;  
        }else{
         $ret_qty = $return_qty->ItemQuantity > 0 ? $return_qty->ItemQuantity : '0' ; 
         $ret_unit_pr = round( $value->ItemPrice  + (0.01 * ($value->ItemPrice * $value->TaxPercentage1)),4); 
         $retu_disco = round( $value->TotalDiscountAmount  + (0.01 * ($value->TotalDiscountAmount * $value->TaxPercentage1)),2);  
         $ret_prices = ($ret_unit_pr)*($value->ItemQuantity);  
         $ret_unit_pri1 = ($ret_prices)-($retu_disco);
         if($retu_disco > 0){
            $ret_unit_price =round(($ret_unit_pri1) / ($value->ItemQuantity),4);
         }else{
            $ret_unit_price =round(($ret_unit_pri1) / ($value->ItemQuantity),4);
         }
         
          // dd($ret_unit_price,$ret_unit_pri1,$ret_prices,$retu_disco);
         $ret_total_price = round(($ret_unit_price)*($return_qty->ItemQuantity),2);        
         $ret_tax_price = round(($ret_total_price)-($ret_total_price)/1.18,2);
         $ret_net_price = round(($ret_total_price) - ($ret_tax_price),2);

         if($return_qty->UnitsOfMeasure=='CAR'){
            $uom_ura = 'CT';
        }
        if($return_qty->UnitsOfMeasure=='DZ'){
            $uom_ura = 'DZN' ;
        }
        if($return_qty->UnitsOfMeasure=='PC'){
            $uom_ura = 'PP' ; 
        }
        }
       }
        
         $get_commdity_code = DB::table('tbl_products')->select('tbl_products.commodity_goods_id')->where('tbl_products.itemCode','=', $value->ItemCode)->get()->first();
        if($value->IsFreeGood=='0'){     
     
      if($ret_qty=='0'){ 
      continue;
      }else{
         
		$goodsDetails[] =array("item"=> "$value->ItemDescription","itemCode"=> "$value->ItemCode","qty"=> "-$ret_qty","unitOfMeasure"=> "$uom_ura","unitPrice"=> "$ret_unit_price","total"=> "-$ret_total_price","taxRate"=> "0.18","tax"=> "-$ret_tax_price","orderNumber"=> "$i","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$get_commdity_code->commodity_goods_id"); 
      
      if($retu_disco > 0){
         $i= $i+2;
      }else{
         $i++;
      }
      }      		  
		 
      $total_price += $ret_total_price;        
      $tax_price += $ret_tax_price;
     // $net_price += $ret_net_price;

   }
		} 	
      
      $net_price = $total_price - $tax_price;
      
   
		  $current = Carbon::now();		 
       $taxDetails[] =  array("netAmount"=> "-$net_price","taxRate"=> "0.18","taxAmount"=> "-$tax_price","grossAmount"=> "-$total_price","taxCategoryCode"=>"01"); 
       $count = count($goodsDetails);
        $goodsUpload = array( "oriInvoiceId" => "$get_data_invoice->ura_invoiceId","oriInvoiceNo" => "$get_data_invoice->ura_invoiceNo","reasonCode" => "102","applicationTime" => "$current","invoiceApplyCategoryCode" => "101","currency" => "UGX","source" => "103", "remarks" => "testing","sellersReferenceNo" => "$get_data->DocumentNumber",
               "goodsDetails" => $goodsDetails, "taxDetails"=> $taxDetails,"summary" => array("netAmount"=> "-$net_price","taxAmount"=> "-$tax_price","grossAmount"=> "-$total_price","itemCount"=> "$count","modeCode"=> "0","qrCode"=> ""),"payWay"=> array( 0 =>array("paymentMode"=> "101","paymentAmount"=> "100.00","orderNumber"=> "a"),1 =>array("paymentMode"=> "101","paymentAmount"=> "100.00","orderNumber"=> "a")), "buyerDetails" => array("buyerTin"=> $string->{'tin'},"buyerMobilePhone"=> "","buyerLegalName"=> $string->{'legalName'},"buyerBusinessName"=> $string->{'businessName'},"buyerType" => $byer_type, "buyerCitizenship" => "Uganda", "buyerSector"=> "1"),"importServicesSeller"=> array("importInvoiceDate"=> "2023-07-17"),"basicInformation" =>array("operator"=> "aisino","invoiceKind"=> "1","invoiceIndustryCode"=> "102","branchId"=> "207300908813650312"));
 
                 //dd($goodsUpload );  
		  $result = make_post('T110', $goodsUpload,$dist_detials_hel);  
		   // dd($result);
	      $resp = json_decode($result); 
		   //  dd($resp);
	    	if(empty($resp->{'referenceNo'})=='null') { 
			$error_store=array
			(
			 'enterface_code'     => 'T110',
			 'error_massege'      => $result,
			 'tin_no'             => $dist_detials_hel->GSTNumber,
			);
			   DB::table('tbl_efris_log_dashboard')->insert($error_store); 
			  
			 return redirect(route('sales_return_list'))->with('alertMessage', $result);
		   }else
		   {
        
        DB::table('tbl_sales_return_header')
        ->where('tbl_sales_return_header.inv_id','=', $id)
		    ->update([
			'efris_return_refrence_no' => $resp->{'referenceNo'} 	,
      'efris_posted' => '1'		 
			]); 

			DB::table('tbl_sales_invoice_header')
		    ->where('ura_invoiceNo', $get_data->ura_invoiceNo)
		    ->update([
			'efris_return_code' => $resp->{'referenceNo'} 			 
			]); 
			 return redirect(route('sales_return_list'))->with('successMessage','EFRIS Credit Note Saved Successfully');
			
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
          DB::rollback();
          return redirect(route('sales_invoice_list'))->with('alertMessage','EFRIS Customer Tin Number not valid');
      }  

	}else{
      $i=0;
		$final_unit_pr =0;
		$final_total =0;
      $uom_ura = ''; 
      $ret_unit_price = 0;
      $retu_disco =0;
      $ret_net_price =0;
      $ret_tax_price = 0;
      $ret_total_price = 0;
      $ret_qty =0;
      $ret_unit_pr =0;
      $total_price = 0;        
      $tax_price = 0;
      $net_price = 0;
      $ret_unit_pri1 = 0;
      $ret_prices =0;

		 foreach($get_details_invoice as $key => $value){		 
        
         $return_qty = DB::table('tbl_sales_return_details')                       
         ->select('tbl_sales_return_details.*')  
         ->where('tbl_sales_return_details.header_id','=', $id)
         ->where('tbl_sales_return_details.ItemCode','=', $value->ItemCode)
          ->first();
       // dd($value);
         if($value->IsFreeGood=='0' ){
        if(!is_object($return_qty)){
            $ret_qty = '0' ;  
        }else{
         $ret_qty = $return_qty->ItemQuantity > 0 ? $return_qty->ItemQuantity : '0' ; 
         $ret_unit_pr = round( $value->ItemPrice  + (0.01 * ($value->ItemPrice * $value->TaxPercentage1)),2); 
         $retu_disco = round( $value->TotalDiscountAmount  + (0.01 * ($value->TotalDiscountAmount * $value->TaxPercentage1)),2);  
         $ret_prices = ($ret_unit_pr)*($value->ItemQuantity);  
         $ret_unit_pri1 = ($ret_prices)-($retu_disco);
         if($retu_disco > 0){
            $ret_unit_price =round(($ret_unit_pri1) / ($value->ItemQuantity),4);
         }else{
            $ret_unit_price =round(($ret_unit_pri1) / ($value->ItemQuantity),2);
         }
         
          // dd($ret_unit_price,$ret_unit_pri1,$ret_prices,$retu_disco);
         $ret_total_price = round(($ret_unit_price)*($return_qty->ItemQuantity),2);        
         $ret_tax_price = round(($ret_total_price)-($ret_total_price)/1.18,2);
         $ret_net_price = round(($ret_total_price) - ($ret_tax_price),2);

         if($return_qty->UnitsOfMeasure=='CAR'){
            $uom_ura = 'CT';
        }
        if($return_qty->UnitsOfMeasure=='DZ'){
            $uom_ura = 'DZN' ;
        }
        if($return_qty->UnitsOfMeasure=='PC'){
            $uom_ura = 'PP' ; 
        }
        }
       }
        
         $get_commdity_code = DB::table('tbl_products')->select('tbl_products.commodity_goods_id')->where('tbl_products.itemCode','=', $value->ItemCode)->get()->first();
        if($value->IsFreeGood=='0'){     
     
      if($ret_qty=='0'){ 
      continue;
      }else{
         
		$goodsDetails[] =array("item"=> "$value->ItemDescription","itemCode"=> "$value->ItemCode","qty"=> "-$ret_qty","unitOfMeasure"=> "$uom_ura","unitPrice"=> "$ret_unit_price","total"=> "-$ret_total_price","taxRate"=> "0.18","tax"=> "-$ret_tax_price","orderNumber"=> "$i","deemedFlag"=> "2","exciseFlag"=> "2","goodsCategoryId"=> "$get_commdity_code->commodity_goods_id"); 
      
      if($retu_disco > 0){
         $i= $i+2;
      }else{
         $i++;
      }
      }      		  
		 
      $total_price += $ret_total_price;        
      $tax_price += $ret_tax_price;
     // $net_price += $ret_net_price;

   }
		} 	
      
      $net_price = $total_price - $tax_price;
      
   
		  $current = Carbon::now();		 
       $taxDetails[] =  array("netAmount"=> "-$net_price","taxRate"=> "0.18","taxAmount"=> "-$tax_price","grossAmount"=> "-$total_price","taxCategoryCode"=>"01"); 
       $count = count($goodsDetails);
        $goodsUpload = array( "oriInvoiceId" => "$get_data_invoice->ura_invoiceId","oriInvoiceNo" => "$get_data_invoice->ura_invoiceNo","reasonCode" => "102","applicationTime" => "$current","invoiceApplyCategoryCode" => "101","currency" => "UGX","source" => "103", "remarks" => "testing","sellersReferenceNo" => "$get_data->DocumentNumber",
               "goodsDetails" => $goodsDetails, "taxDetails"=> $taxDetails,"summary" => array("netAmount"=> "-$net_price","taxAmount"=> "-$tax_price","grossAmount"=> "-$total_price","itemCount"=> "$count","modeCode"=> "0","qrCode"=> ""),"payWay"=> array( 0 =>array("paymentMode"=> "101","paymentAmount"=> "100.00","orderNumber"=> "a"),1 =>array("paymentMode"=> "101","paymentAmount"=> "100.00","orderNumber"=> "a")), "buyerDetails" => array("buyerTin"=> $get_data->TINNumber,"buyerMobilePhone"=> "","buyerLegalName"=> $get_data->CustName,"buyerBusinessName"=> $get_data->CustName,"buyerEmail"=> "","buyerType" => "1", "buyerCitizenship" => "Uganda", "buyerSector"=> "1"),"importServicesSeller"=> array("importInvoiceDate"=> "2022-12-29"),"basicInformation" =>array("operator"=> "aisino","invoiceKind"=> "1","invoiceIndustryCode"=> "102","branchId"=> "207300908813650312"));

                 //  dd($goodsUpload );  
		  $result = make_post('T110', $goodsUpload,$dist_detials_hel);  
		   // dd($result);
	      $resp = json_decode($result); 
		   //  dd($resp);
	    	if(empty($resp->{'referenceNo'})=='null') { 
			$error_store=array
			(
			 'enterface_code'     => 'T110',
			 'error_massege'      => $result,
			 'tin_no'             => $dist_detials_hel->GSTNumber,
			);
			   DB::table('tbl_efris_log_dashboard')->insert($error_store); 
			  
			 return redirect(route('sales_return_list'))->with('alertMessage', $result);
		   }else
		   {
        
        DB::table('tbl_sales_return_header')
        ->where('tbl_sales_return_header.inv_id','=', $id)
		    ->update([
			'efris_return_refrence_no' => $resp->{'referenceNo'} 	,
      'efris_posted' => '1'		 
			]); 

			DB::table('tbl_sales_invoice_header')
		    ->where('ura_invoiceNo', $get_data->ura_invoiceNo)
		    ->update([
			'efris_return_code' => $resp->{'referenceNo'} 			 
			]); 
			 return redirect(route('sales_return_list'))->with('successMessage','EFRIS Credit Note Saved Successfully');
			
		   }
   }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncEfrisProductDailyRunCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SyncEfrisProductDaily:SyncEfrisProductDailys';

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
        $get_data = DB::table('tbl_products') 
        ->select('tbl_products.*',
        'tbl_products.ItemCode',
        'tbl_products.ItemDescription',
        'tbl_products.Conversion as dzn_conversion',
        'tbl_products.Conversion2 as car_conversion',
        'tbl_products.BaseUOM',
        'tbl_products.SalesPrice',
        'tbl_products.PC_Conversion as pp_conversion',
        'tbl_products.UC_Conversion',
        'tbl_products.Conversion2',
        'tbl_products.Primary_RC',
        'tbl_products.Secondary_RC',
        'tbl_products.Unsorted_RC',
        'tbl_products.UOM1',
        'tbl_products.UOM2',
        'tbl_products.TaxGroupCode', 
        'tbl_products.efris_posted', 
        'tbl_products.DTCode', 
        'tbl_products.IsActive')  
       ->where('tbl_products.IsActive','=', '1')
        ->where('tbl_products.efris_posted','=', '0')       
        ->get();
        // dd($get_data);

        $operationType=0;
        $mult_price = 0;
        $mult_dzn_price =''; 
        $pieceMeasureUnit = '';
        $otherUnit ='';
        $pc_price =0;
        $packageScaled ='';
        $otherScaled ='';
        $dzn ='';
        foreach($get_data as $key=> $value){ 
            
            $get_dists =DB::table('tbl_distributor')  
            ->select('tbl_distributor.*')  
            ->get(); 
            
     foreach($get_dists as $get_distib){
          $get_distibutoer = explode(",",$value->DTCode); 
            $dist_detials_hel = get_distrbutor_details($get_distib->DistributorCode);
          $distibutoer_details = DB::table('tbl_distributor')
          ->whereIn('DistributorCode', $get_distibutoer)
          ->where('DistributorCode', $get_distib->DistributorCode)
          ->get()->first();
  
          if($distibutoer_details==null){ 
            $operationType='101'; 
          }else{
            $operationType='102'; 
            }
          
           $get_price = DB::table('tbl_pricing_plan') 
           ->select('tbl_pricing_plan.SalesPrice')  
           ->where('tbl_pricing_plan.ItemCode','=', $value->ItemCode)
              ->get()->first();
            //    dd(  $get_price );     
    if($get_price =='')
        {
            $error_store=array
            (
                'enterface_code'     => 'T130',
                'error_massege'      => 'Itme Price Null' .' '. $value->ItemCode,
                'tin_no'             => $dist_detials_hel->GSTNumber,
            );
                DB::table('tbl_efris_log_dashboard')->insert($error_store);  
                return redirect(route('products_list'))->with('alertMessage', 'This Item Price Null?'); 
          
        }else{
         $pc_price = round($get_price->SalesPrice,2);
          
    //    dd($pc_price);

       if($value->BaseUOM){
           $measureUnit = 'PP';
           }

       if($value->car_conversion){
        $pieceMeasureUnit = 'CT';
            }

            if($value->dzn_conversion > 0){
                $otherUnit = 'DZN';
                    }

            if($value->car_conversion){
                $packageScaledValue = $value->car_conversion;
                    }

                    if($value->dzn_conversion > 0){
                $packageScaled = $value->dzn_conversion;
                    }
                   
                  if($value->dzn_conversion > 0){
                        $otherScaled ='1';
                            }

       if($value->UOM2 =='CAR'){
        $mult_price = round(($pc_price * $value->car_conversion),2) ; 
             }else{
                $mult_price = round(($pc_price * $value->car_conversion),2) ; 
             }

        if($value->UOM1 =='DZ'){
        $mult_dzn_price = round(($pc_price * $value->dzn_conversion),2) ; 
              }else{
                $mult_dzn_price = round(($pc_price * 12),2) ; 
              }
       
     if($value->BaseUOM =='PC' && $value->car_conversion > 0 && $value->dzn_conversion > 0){
        $goodsUpload = array(0 => array("operationType" => "$operationType", "goodsName" => $value->ItemDescription, "goodsCode" =>  $value->ItemCode, "measureUnit" => $measureUnit, "unitPrice" => $pc_price , "currency" => "101", "commodityCategoryId" => "$value->commodity_goods_id", "haveExciseTax" => "102", "stockPrewarning" => "0", "havePieceUnit" => "101","pieceMeasureUnit" => $pieceMeasureUnit,"pieceUnitPrice" => "$mult_price","packageScaledValue" => $packageScaledValue,"pieceScaledValue" => "1", "haveOtherUnit" => "101", "goodsOtherUnits" => array(array("otherScaled" => $otherScaled,"otherUnit" => $otherUnit, "otherPrice" => "$mult_dzn_price", "packageScaled" => $packageScaled)))); 
        
           }else{ 
        $goodsUpload = array(0 => array("operationType" => "$operationType", "goodsName" => $value->ItemDescription, "goodsCode" =>  $value->ItemCode, "measureUnit" => $measureUnit, "unitPrice" => $pc_price , "currency" => "101", "commodityCategoryId" => "$value->commodity_goods_id", "haveExciseTax" => "102", "stockPrewarning" => "0", "havePieceUnit" => "101","pieceMeasureUnit" => $pieceMeasureUnit,"pieceUnitPrice" => "$mult_price","packageScaledValue" => $packageScaledValue,"pieceScaledValue" => "1", "haveOtherUnit" => "102", "goodsOtherUnits" => array())); 
      
        }       
       } 
    }
       $result = make_post('T130', $goodsUpload,$dist_detials_hel);
       // dd($result);  
      $resp = json_decode($result);
      if($result!="Partial failure!"){ 
          if(empty($resp)) { 
              $disti_code = explode(',',$get_data->DTCode);
              $final_dist = ($disti_code["0"]);
              $d = $value->DTCode;
              
                  DB::table('tbl_products')  
                  ->where('tbl_products.ItemCode','=', $value->ItemCode)
                 ->update(['efris_posted' => '1', 'DTCode' => $final_dist.','.$d]); 
                   // return redirect(route('products_list'))->with('successMessage','Synced item in EFRIS successfully');
             }   
      } 
      else{
          $error_store=array
          (
              'enterface_code'     => 'T130',
              'error_massege'      => $result .' '. $value->ItemCode,
              'tin_no'             => $dist_detials_hel->GSTNumber,
          );
              DB::table('tbl_efris_log_dashboard')->insert($error_store);  
             // return redirect(route('products_list'))->with('alertMessage', $result);
           }
    }
  
       
      
    
            //  return redirect(route('products_list'))->with('successMessage','Synced item in EFRIS successfully');

    }
}

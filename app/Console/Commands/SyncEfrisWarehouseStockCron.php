<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
 
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables; 
use App\Exports\RouteInvoiceExport; 
use Maatwebsite\Excel\Facades\Excel; 


class SyncEfrisWarehouseStockCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync_warehouse_stocks:sync_warehouse_stock';

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

        $current = Carbon::now()->format('Y-m-d');                          
        $warehouse_stock =DB::table('tbl_warehouse_stock')            
        ->select('tbl_warehouse_stock.*')  
        ->where('tbl_warehouse_stock.efris_posted','=','0') 
        ->get(); 
          dd($warehouse_stock);
        $pc_price = 0;
        foreach($warehouse_stock as $key=> $value){ 

            $dist_detials_hel = get_distrbutor_details($value->TenantCode);
           // dd($dist_detials_hel);
            $get_price = DB::table('tbl_pricing_plan') 
            ->select('tbl_pricing_plan.SalesPrice')  
            ->where('tbl_pricing_plan.ItemCode','=', $value->ItemCode)                    
             ->get()->first();
             
       if($get_price =='')
            { 
            $error_store=array
            (
            'enterface_code'     => 'T131',
            'error_massege'      => 'price is zero!' .''.$value->ItemCode,
             'tin_no'             => $dist_detials_hel->GSTNumber,
            );
             DB::table('tbl_efris_log_dashboard')->insert($error_store);  
             
           }else{  
            $pc_price = round($get_price->SalesPrice,2);             
            $itemdetails[] = array( "commodityGoodsId" => "","goodsCode" => "$value->ItemCode","measureUnit" => "PP","quantity" => "$value->StockQuantity","unitPrice" => "$pc_price","remarks" => "thanks","fuelTankId" => "","lossQuantity" => "10","originalQuantity" => "110");
            $goodsUpload = array("goodsStockIn" => array("operationType" => "101","supplierTin" => "","supplierName" => "Warehouse Stock","adjustType" => "","remarks" => "thanks","stockInDate" => "$current","stockInType" => "102","productionBatchNo" => "","productionDate" => "","branchId" => "","invoiceNo" => "","isCheckBatchNo" => "0","rollBackIfError" => "0","goodsTypeCode" => "101"),"goodsStockInItem" => array( array ( "commodityGoodsId" => "","goodsCode" => "$value->ItemCode","measureUnit" => "PP","quantity" => "$value->StockQuantity","unitPrice" => "$pc_price","remarks" => "thanks","fuelTankId" => "","lossQuantity" => "10","originalQuantity" => "110"))); 
              // dd($goodsUpload);
             $result = make_post("T131", $goodsUpload,$dist_detials_hel);		 
            
            $resp = json_decode($result); 
           // dd($resp);   
           if(empty($resp) && $result!="Partial failure!"){ 
               // dd($resp);
                DB::table('tbl_warehouse_stock')
                ->where('tbl_warehouse_stock.id', $value->id)
                ->update([
                    'efris_posted'=> '1'
                    ]); 
                 
            } else {
                $error_store=array
                (
                'enterface_code'     => 'T131',
                'error_massege'      => $result,
                'tin_no'             => $dist_detials_hel->GSTNumber,
                );
             DB::table('tbl_efris_log_dashboard')->insert($error_store);   
            }    
         }
            }  
        
    }
}

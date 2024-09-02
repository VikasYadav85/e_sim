<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Models\DistributorDetails;

class SyncEfrisCustomerCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SyncEfrisCustomer:SyncEfrisCustomers';

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
        ->select('tbl_customer.*','tbl_customer.TenantCode as DTCode')
        ->where('tbl_customer.efris_posted','0')
        ->Where('tbl_customer.TINNumber', '!=', '')
        ->get();
        dd($get_customer);
        foreach ($get_customer as $get_data)
        {

        $get_dists =DB::table('tbl_distributor')  
        ->select('tbl_distributor.*')  
        ->where('tbl_distributor.DistributorCode','=', $get_data->DTCode)
        ->get()->first(); 
        // dd($get_dists);
      // $devoice_nos = get_dis_device_no($get_dists->device_no);
   $dist_detials_hel = get_distrbutor_details($get_data->DTCode);
        //  dd($get_data); 
   if($get_data->CategoryCode5=='B2B' || $get_data->CategoryCode5=='B2C' || $get_data->CategoryCode5==''){
      
if($get_data->TINNumber > 0){
    $custmer_Upload =array("tin"=> "$get_data->TINNumber");
    // dd($get_data->TINNumber);
    $result = make_post('T119', $custmer_Upload,$dist_detials_hel);  
            // dd($result);
    $resp = json_decode($result);
    //  dd($resp);
        if($resp && $resp->{'taxpayer'} )
        {
            $string = $resp->{'taxpayer'} ;
            //dd(strtoupper($get_data->CustomerName),strtoupper($string->{'legalName'}));
            if(strcmp(strtoupper($get_data->CustomerName),strtoupper($string->{'legalName'}))==0){				 
        DB::table('tbl_customer')
        ->where('tbl_customer.cust_id', $get_data->cust_id )
        ->update([
            'efris_posted'=> '1'
            ]);					 
        //  return redirect(route('customer_list'))->with('successMessage','Customer Sync successfully');
         
        }else{
            $error_store=array
            (
             'enterface_code'     => 'T119',
             'error_massege'      => $result,
             'tin_no'             => $dist_detials_hel->GSTNumber,
            );
               DB::table('tbl_efris_log_dashboard')->insert($error_store);  
               DB::table('tbl_customer')
                    ->where('tbl_customer.cust_id', $get_data->cust_id )
                    ->update([
                        'CustomerName'=> $resp->{'taxpayer'}->{'legalName'} ,
                        'Address' => $resp->{'taxpayer'}->{'address'},
                        'Phone' => $resp->{'taxpayer'}->{'contactNumber'} ,
                       
                        'businessName' =>  $resp->{'taxpayer'}->{'businessName'} 
                        ]);                     
            //    return redirect(route('customer_list'))->with('alertMessage','Customer Name does not match from EFRIS Portal, We have stored correct one please try again');					 
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
             
                //  return redirect(route('customer_list'))->with('alertMessage','Customer Tin Number not valid');
             
                
            }
  } else{
    // return redirect(route('customer_list'))->with('alertMessage','Customer Tin Number not available');
  }
}else{
    // return redirect(route('customer_list'))->with('alertMessage','Customer Category not available');  
}

    }
}
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SyncEfrisGRNDailyRunCron extends Command
{
      /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SyncEfrisGRNDaily:SyncEfrisGRNDailys';

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
          $get_datas = DB::table('tbl_grn_header')
           ->select('tbl_grn_header.*', 'tbl_grn_header.TenantCode as DTCode')
           ->where('tbl_grn_header.efris_posted', '=', "0")                 
           ->get();
        
         //dd($get_datas );
              foreach($get_datas as $get_data)
                      {   
                  $get_data_details =DB::table('tbl_grn_details')
                  ->leftJoin('tbl_products', 'tbl_grn_details.ItemCode', '=', 'tbl_products.ItemCode')       
                  ->select('tbl_grn_details.*','tbl_products.ItemDescription', 'tbl_products.ItemCode as product_code')
                  ->where('tbl_grn_details.header_id', '=', $get_data->gr_id)
                  ->where('tbl_grn_details.efris_posted', '=','0')
                  ->get()->all();
                  $get_dists =DB::table('tbl_distributor')  
                  ->select('tbl_distributor.*')  
                  ->where('tbl_distributor.DistributorCode','=', $get_data->DTCode)
                  ->get()->first(); 
                    $dist_detials_hel = get_distrbutor_details($get_data->DTCode); 
                $itemdetails = []; // Initialize the $itemdetails array
                foreach ($get_data_details as $key => $value) {
                  $uom_ura = 'PP';
                  if ($value->BaseUOM == 'PC') {
                      $uom_ura = "PP";
                  }
                
              $count = count($itemdetails);
              $goodsUpload = array(
                  "goodsStockIn" => array(
                      "operationType" => "101",
                      "supplierTin" => "",
                      "supplierName" => "supplier GRN",
                      "adjustType" => "",
                      "remarks" => "",
                      "stockInDate" => "$current",
                      "stockInType" => "102",
                      "productionBatchNo" => "",
                      "productionDate" => "",
                      "branchId" => "",
                      "invoiceNo" => "",
                      "isCheckBatchNo" => "0",
                      "rollBackIfError" => "0",
                      "goodsTypeCode" => "101"
                  ),
                  "goodsStockInItem" => array ( array(
                      "commodityGoodsId" => "",
                      "goodsCode" => "$value->product_code",
                      "measureUnit" => "$uom_ura",
                      "quantity" => "$value->SupplierQuantity",
                      "unitPrice" => "$value->PurchasePrice",
                      "remarks" => "remark",
                      "fuelTankId" => "",
                      "lossQuantity" => "10",
                      "originalQuantity" => "110"
                  )));

              $result = $this->make_post("T131", $goodsUpload, $dist_detials_hel);
              $resp = json_decode($result);
              if ($resp > 0) {
                  DB::table('tbl_grn_header')
                      ->where('tbl_grn_header.DocumentNumber', $get_data->DocumentNumber)
                      ->where('tbl_grn_header.TenantCode', $get_data->DTCode) // Filter by the logged-in user's TenantCode
                      ->update(['efris_posted' => '1', 'URA_live_date' => $current]);
                  // Update efris_posted for all related details
                  DB::table('tbl_grn_details')
                  ->where('gr_det_id',$value->gr_det_id)
                      ->update([ 'efris_posted' => '1' ]);
              } else {
                  DB::table('tbl_grn_header')
                  ->where('tbl_grn_header.DocumentNumber', $get_data->DocumentNumber)
                  ->where('tbl_grn_header.TenantCode', $get_data->DTCode) // Filter by the logged-in user's TenantCode
                  ->update(['efris_posted' => '0' ]);
                  $error_store = array(
                      'enterface_code' => 'T131',
                      'error_massege' => $result,
                      'tin_no' => $dist_detials_hel->GSTNumber,
                  );
                  DB::table('tbl_efris_log_dashboard')->insert($error_store);
                }
             }
                   
         }
    }

  //start efris code
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
             //end efris code
 

}

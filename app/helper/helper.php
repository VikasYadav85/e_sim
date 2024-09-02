<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function p($array, $exit = true)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if ($exit) {
        exit();
    }
}

function get_dms_token(){
    $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com">
        <soapenv:Header/>
        <soapenv:Body>
        <rt6:GetToken>
            <rt6:TokenRequest>
                <rt6:DeveloperKey>XNAPP-MPLUGANDA-UAT</rt6:DeveloperKey>
                <rt6:UserName>XNAPP_MPLUGANDA_UAT_XI</rt6:UserName>
                <rt6:Password>uEGrcXy2i2vx9vx1</rt6:Password>
            </rt6:TokenRequest>
        </rt6:GetToken>
        </soapenv:Body>
        </soapenv:Envelope>';

        $response = get_dms_curl_header('GetToken',$xml_post_string);
        $dom=new \DOMDocument();

        $dom->loadXML($response);
        $tocken=$dom->getElementsByTagName('TokenID')->item(0)->nodeValue;
        return $tocken;
   
}

function get_dms_url(){

    $soapUrl = "https://uatxdintegration.vxceed.net/IntegrationService.svc?singleWsdl";
   
    return $soapUrl;
   
}

function get_central_url(){

    $soapUrl = "https://uatxcintegration.vxceed.net/XCService.svc?singleWsdl";

    return $soapUrl;
   
}


function get_dms_curl_header($method,$xml_post_string){

    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: http://rt6.vxceed.com/IIntegrationService/".$method, 
        "Content-length: ".strlen($xml_post_string),
    ); //SOAPAction: your op URL

   $url = get_dms_url();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


    $response = curl_exec($ch); 
    curl_close($ch);
    return $response;
   
}

function get_central_curl_header($method,$xml_post_string){

    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: http://xc.vxceed.com/IXCService/".$method, 
        "Content-length: ".strlen($xml_post_string),
    ); //SOAPAction: your op URL

   $url = get_central_url();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch); 
 
    curl_close($ch);
    return $response;
   
}

function get_central_token(){

    $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xc="http://xc.vxceed.com">
    <soapenv:Header/>
    <soapenv:Body>
       <xc:GetToken>
          <!--Optional:-->
          <xc:TokenRequest>
             <xc:DeveloperKey>XNAPP-MPLUGANDA-UAT</xc:DeveloperKey>
             <xc:UserName>XNAPP_MPLUGANDA_UAT_XI</xc:UserName>
             <xc:Password>uEGrcXy2i2vx9vx1</xc:Password>
          </xc:TokenRequest>
       </xc:GetToken>
    </soapenv:Body>
 </soapenv:Envelope>';

   $response= get_central_curl_header('GetToken',$xml_post_string);
  
    $dom=new \DOMDocument();

    $dom->loadXML($response);
    $tocken=$dom->getElementsByTagName('TokenID')->item(0)->nodeValue;
    return $tocken;
   
}
            //get distrbuoter detials
            function get_distrbutor_details($DTCode)
               {
                $get_dist =DB::table('tbl_distributor')  
                ->select('tbl_distributor.*')  
                ->where('tbl_distributor.DistributorCode','=', $DTCode)
                ->get()->first();                     
                return  $get_dist;
              }

            //end distrbuoter detials


// EFRIS CODE 
       
         function make_post($interfaceCode, $content,$dist_detials_hel=null)
            {  
                 //dd($dist_detials_hel->device_no);
            $deviceNo = $dist_detials_hel->device_no;
           // dd($deviceNo);
            $data =  fetchData($dist_detials_hel);
            $aesKey =  getAESKey($dist_detials_hel);

            $json_content = json_encode($content); //request to get
            // p($json_content);
            $isAESEncrypted = openssl_encrypt($json_content, "aes-128-ecb", $aesKey);

            if ($isAESEncrypted) {
                $data['globalInfo']['interfaceCode'] = $interfaceCode;
                $data['globalInfo']['deviceNo'] = $deviceNo;
                $data['data']['content'] = $isAESEncrypted;
                $data['data']['dataDescription']['codeType'] = "1";
                $data['data']['dataDescription']['encryptCode'] = "2";

                $privKey = getPrivKey($dist_detials_hel);
                $isSigned = openssl_sign($isAESEncrypted, $signature, $privKey, OPENSSL_ALGO_SHA1);
              
                if ($isSigned) {
                    $b4signature = base64_encode($signature);
                   
                    // var_dump($b64signature); // var_dump
                    $data['data']['signature'] = $b4signature;
                   
                }
            }

            $jsonresp = postReq($data);            
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

              function fetchData($dist_detials_hel=null)
            {
            date_default_timezone_set("Africa/Nairobi");
                $get_tins = (isset($dist_detials_hel->GSTNumber) ? $dist_detials_hel->GSTNumber :'');
            return array("data" => array("content" => "", "signature" => "", "dataDescription" => array("codeType" => "0", "encryptCode" => "1", "zipCode" => "0")), "globalInfo" => array("appId" => "AP04", "version" => "1.1.20191201", "dataExchangeId" => "9230489223014123", "interfaceCode" => "T101", "requestTime" => date("Y-m-d H:i:s"), "requestCode" => "TP", "responseCode" => "TA", "userName" => "admin", "deviceMAC" => "FFFFFFFFFFFF", "deviceNo" => "", "tin" => "$get_tins", "brn" => "", "taxpayerID" => "1", "longitude" => "116.397128", "latitude" => "39.916527", "extendField" => array("responseDateFormat" => "dd/MM/yyyy", "responseTimeFormat" => "dd/MM/yyyy HH:mm:ss")), "returnStateInfo" => array("returnCode" => "", "returnMessage" => ""));

            }

              function getAESKey($dist_detials_hel=null)
            {
            // GET AES KEY
            $data = fetchData($dist_detials_hel);
            $deviceNo = $dist_detials_hel->device_no;
            $tin = $dist_detials_hel->GSTNumber;
            $brn = "";
            $dataExchangeId = guidv4();

            $data['globalInfo']['interfaceCode'] = "T104";
            $data['globalInfo']['dataExchangeId'] = $dataExchangeId;
            $data['globalInfo']['deviceNo'] = $deviceNo;
            $data['globalInfo']['tin'] = $tin;
            $data['globalInfo']['brn'] = $brn;

            $resp = postReq($data);
              // dd($resp);
            $jsonresp = json_decode($resp); 
            $b64content = $jsonresp->{'data'}->{'content'};
            $content = json_decode(base64_decode($b64content, true)); 
            
            $b64passowrdDes = $content->{'passowrdDes'};
            $passowrdDes = base64_decode($b64passowrdDes); 
            // read private key
            $privKey = getPrivKey($dist_detials_hel); 
            $isDecrypted = openssl_private_decrypt($passowrdDes, $aesKey, $privKey, OPENSSL_PKCS1_PADDING); 
            return  base64_decode($aesKey);

            }

              function guidv4($data = null)
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

              function postReq($data)
            { 
            $url = 'https://efristest.ura.go.ug/efrisws/ws/taapp/getInformation'; 
            $curl = curl_init($url); 
            curl_setopt_array($curl, array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => 'POST', CURLOPT_POSTFIELDS => json_encode($data), CURLOPT_HTTPHEADER => array('Content-Type: application/json'),)); 
            $rst = curl_exec($curl);
            curl_close($curl); 
            return $rst;
            }

              function fetchUrl()
            {
            return "https://efristest.ura.go.ug/efrisws/ws/taapp/getInformation";
            }

              function getPrivKey($dist_detials_hel=null)
            { 
            // read private key
            $pkpath= url('').$dist_detials_hel->p_12;
           
            $cert_store = file_get_contents($pkpath);
            $isRead = openssl_pkcs12_read($cert_store, $cert_info, $dist_detials_hel->password_p12);
           // dd($pkpath,$dist_detials_hel->password_p12);
            return $cert_info['pkey'];
            }


//END EFRIS CODE

function ajax_response($status, $data, $errors, $msg, $status_code)
{
    return response(['status' => $status, 'data' => $data, 'message' => $msg, 'errors' => $errors, 'status_code' => $status_code]);
}



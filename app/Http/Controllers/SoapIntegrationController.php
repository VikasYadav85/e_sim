<?php

namespace App\Http\Controllers;

use App\Models\SoapIntegration;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Illuminate\Http\Request;

class SoapIntegrationController extends Controller
{

  
    public function index()
    {
       $token= get_dms_token();
       p($token);

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoapIntegration  $soapIntegration
     * @return \Illuminate\Http\Response
     */
    public function invoice_list()
    { 
        $token= get_dms_token();
        $soapUrl = "https://uatxdintegration.vxceed.net/IntegrationService.svc?singleWsdl";
        $xml_post_string ='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:rt6="http://rt6.vxceed.com">
        <soapenv:Header/>
        <soapenv:Body>
           <rt6:GetDMSSalesInvoiceC2>
              <!--Optional:-->
              <rt6:SaleInvoiceC2_Request>
                 <rt6:TokenID>'.$token.'</rt6:TokenID>
                 <rt6:PrincipleCode>MPLUGANDA</rt6:PrincipleCode>
                 <rt6:TenantCode>1000005858</rt6:TenantCode>
                 <rt6:PageNo>1</rt6:PageNo>
                 <rt6:StartDateTime>2023-05-10</rt6:StartDateTime>
                 <rt6:EndDateTime>2023-05-11</rt6:EndDateTime>
                 <!--Optional:-->
                 <rt6:PullDataForPrincipleManagedDT>N</rt6:PullDataForPrincipleManagedDT>
              </rt6:SaleInvoiceC2_Request>
           </rt6:GetDMSSalesInvoiceC2>
        </soapenv:Body>
     </soapenv:Envelope>';

        $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://rt6.vxceed.com/IIntegrationService/GetDMSSalesInvoiceC2", 
                "Content-length: ".strlen($xml_post_string),
            ); //SOAPAction: your op URL

           $url = $soapUrl;

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
       dd($response);
       curl_close($ch);

     $response1 = str_replace("<soap:Body>","",$response);
     $response2 = str_replace("</soap:Body>","",$response1);
  
     
     $parser = simplexml_load_string($response2);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoapIntegration  $soapIntegration
     * @return \Illuminate\Http\Response
     */
    public function edit(SoapIntegration $soapIntegration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoapIntegration  $soapIntegration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoapIntegration $soapIntegration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoapIntegration  $soapIntegration
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoapIntegration $soapIntegration)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        //$cliente = new \SoapClient("http://localhost/laravel-soap2/public/soap.wsdl");
        //print_r($cliente->__getFunctions());
        //$params = array("a" => 1, "b" => 2);
        //$params["a"] = 1.00; 
        //$params["b"] = 2.00;
        //$result = $cliente->__getTypes();
        //print_r($result);

        $curl = curl_init();
            
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://localhost/laravel-soap2/public/soap",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => 
          "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:oper=\"http://localhost/laravel-soap2/public/soap\">
          <soapenv:Header/>
          <soapenv:Body>
              <oper:getPerson>
                  
              </oper:getPerson>
          </soapenv:Body>
      </soapenv:Envelope>",
          CURLOPT_HTTPHEADER => array("content-type: text/xml"),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
           
            $doc = new \DOMDocument('1.0', 'utf-8');
            $doc->loadXML( $response );
            
            $XMLresults     = $doc->getElementsByTagName("SearchFlightAvailability33Response");
            print_r($XMLresults);exit;
            $output = $XMLresults->item(0)->nodeValue;
        }
        
    }
}

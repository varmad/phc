<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ClickatellService;
// use Clickatell\Rest;
// use Clickatell\ClickatellException;

class SendSmsController extends Controller
{
  public function index()
  {
    $clickatell = new ClickatellService();


    //
    // $to="[919618822244]";
    // $message="Hello";
    // $authToken="1U1MgMsNRhSVBHRc_gdrIw==";
    //
    // $ch = curl_init();
    //
    // curl_setopt($ch, CURLOPT_URL,            "https://api.clickatell.com/rest/message");
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_POST,           1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS,     "{\"text\":\"$message\",\"to\":$to}");
    // curl_setopt($ch, CURLOPT_HTTPHEADER,     array(
    //     "X-Version: 1",
    //     "Content-Type: application/json",
    //     "Accept: application/json",
    //     "Authorization: Bearer $authToken"
    // ));
    //
    // $result = curl_exec ($ch);
    // print_r($result);
    // exit;


    // Full list of support parameters can be found at https://www.clickatell.com/developers/api-documentation/rest-api-request-parameters/
    try {
        $result = $clickatell->sendSms('+919177541077' ,'Testing PHC usgin API morning 2nd time');


        echo "<pre>";
        print_r($result);
        exit;

          var_dump($result);exit;
        //return true
        foreach ($result['messages'] as $message) {
            var_dump($message);

            /*
            [
                'apiMsgId'  => null|string,
                'accepted'  => boolean,
                'to'        => string,
                'error'     => null|string
            ]
            */
        }

    } catch (ClickatellException $e) {
        // Any API call error will be thrown and should be handled appropriately.
        // The API does not return error codes, so it's best to rely on error descriptions.
        // var_dump($e->getMessage());

        return false;
    }

  }
}

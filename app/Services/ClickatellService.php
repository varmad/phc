<?php
namespace App\Services;

use Clickatell\Rest;
use Clickatell\ClickatellException;

class ClickatellService
{

  /**
    * @var clickatell
    */
    private $clickatell;

    public function __construct(){

      $this->clickatell = new \Clickatell\Rest();

    }

    public function sendSms($to, $message) {

      try {
        $results = $this->clickatell->sendMessage(['to' => [$to] ,'content' => $message]);

        return $results;

      } catch (ClickatellException $e) {
          // Any API call error will be thrown and should be handled appropriately.
          // The API does not return error codes, so it's best to rely on error descriptions.
          // var_dump($e->getMessage());
          return false;
      }

    }


}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
function send_sms($message = '' , $numbers = '') {
        // Authorisation details.
  $username = "mehargrepthor@gmail.com";
  /*"maheshbt8@gmail.com";*/
  $hash ="s92SI2uUsoo-FyBnEvzGTTHL1Wew5LKcSsK9xteqG0"; 
  /*"ecdce5eb4a21ed321e736e37bb6782f922eb68f812ede0e1281c0cae6fa655a6";*/
  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0";
  // Data for text message. This is the text message data.
  $sender = "TXTLCL"; // This is who the message appears to be from.
  /*$numbers = "910000000000"; // A single number or a comma-seperated list of numbers
  $message = "This is a test message from the PHP API script.";
  // 612 chars or less*/
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  /*$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;*/
  $data = "api_key=".$hash."&sender=".$sender."&numbers=".$numbers."&message=".$message;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  //echo $result;die;
  curl_close($ch);
        }
}

//https://api.textlocal.in/send/?apiKey=WZP8pxiSvDc-hkiwoYe2agXVNdb75LvnppDL9iYn51&sender=TXTLCL&numbers=918121815502&message=Test_message&test=0
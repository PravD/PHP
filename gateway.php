<?php
if(!defined('Auth')) {
   die('Direct access not permitted');
}
function sendMsg($mobile,$text,$debug=false){
          /*$url = "http://gatewayprovider?user=".$username."&password=".$password."&msg=".$myMsg."&no=".$receiver_no;*/
          /*http://203.129.203.243/blank/sms/user/urlsms.php?username=dealznmealz&pass=ml!0-9VD&senderid=DNMNGP&dest_mobileno=7888046988&msgtype=UNI&message=test&response=Y*/
        $url = "http://203.129.203.243/blank/sms/user/urlsms.php?username=dealznmealz&pass=ml!0-9VD&senderid=DNMNGP&dest_mobileno=$mobile&msgtype=UNI&message=".urlencode($text)."&response=Y";
        // create a new cURL resource
        /*
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // grab URL and pass it to the browser
        $resp = curl_exec($ch);
        if(isset($resp))//curl_exec($ch))
        {
         // echo "<script>alert('Message Sent to Your Mobile.');</script>";
        }
        // close cURL resource, and free up system resources
        curl_close($ch);
        return true;
        */
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        
        if ($debug) {
          echo "Response: <br><pre>" . $curl_scraped_page . "</pre><br>";
        }
        return($curl_scraped_page);

}
function smsgatewaycenter_com_Send($mobile, $sendmessage, $debug=false){
    global $smsgatewaycenter_com_user,$smsgatewaycenter_com_password,$smsgatewaycenter_com_url,$smsgatewaycenter_com_mask;
    $parameters = 'UserName='.$smsgatewaycenter_com_user;
    $parameters.= '&Password='.$smsgatewaycenter_com_password;
    $parameters.= '&Type=Individual';
    $parameters.= '&Language=English';
    $parameters.= '&Mask='.$smsgatewaycenter_com_mask;
    $parameters.= '&To='.urlencode($mobile);
    $parameters.= '&Message='.urlencode($sendmessage);
    $apiurl =  $smsgatewaycenter_com_url.$parameters;
    $ch = curl_init($apiurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    
    if ($debug) {
      echo "Response: <br><pre>" . $curl_scraped_page . "</pre><br>";
    }
    return($curl_scraped_page);
  }
?>
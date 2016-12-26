<?php
if(!defined('Auth')) {
   die('Direct access not permitted');
}
function send_mail($email,$subject,$comment){
  $admin_email = "do-not-reply@dealznmealz.com";
  //send email
  mail($email, "$subject", $comment, "From:" . $admin_email);
}
?>
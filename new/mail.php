<?php 	
require 'dbinfo.php';		
/*
	Purpose:Send the Activation mail to gmail which you have registered while registration
	Input:Email Address,Subject of the mail, and an random 32 bit activation key
	Output:Sends an activation mail to the users mail id 
	Note:this function is used for login activation,forgot password and change password also
*/
function mymail($email,$subject,$activate){	
  $msg = URL . "/activate.php?email={$email}&key={$activate}";
  $headers = 'From: rajkumararisetty143@gmail.com' . "\r\n";
  $headers .= "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  mail($email,$subject,$msg,$headers);
}
/*
	Just calling the above function
*/
function mymail1($email,$subject,$activate){
  mymail($email,$subject,$activate);
}
?>

<?php
require 'header.php';
require 'dbinfo.php';
session_start();
$email = $_GET['email'];	
$key = $_GET['key'];
if(isset($email) && isset($key)){	
	$query_activation_account="UPDATE reg SET activation='1' WHERE email_id='$email' AND act_com='$key'";
	$result_activation_account=mysqli_query($connection,$query_activation_account);
	if($result_activation_account){
		$_SESSION['conf_msg'] = "Your account is active now . You may now log in";
	} 
	else{
		$_SESSION['not_conf_msg'] = "Your account is now active. You may now log in";
	}
	header("Location: login.php");
}
else{
	$_SESSION['error_occured_in_activation']= "error occured";
}
require 'footer.php';
?>
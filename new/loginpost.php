<?php
session_start();
require 'dbinfo.php';
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	if($username == ""){
		$_SESSION['blank_user'] = "Username can't be blank";//if empty username
	}
	if($password == ""){
		$_SESSION['blank_pass'] = "Password can't be blank";//if empty password
	}
	else{
		$password = md5($password);
		$query1 = "SELECT id FROM reg where user_name='$username' AND password='$password' And activation='1'";
		$result = mysqli_query($connection, $query1);
		if($result && $rows = mysqli_fetch_assoc($result)){
			$_SESSION["id"] = $rows["id"];
			$_SESSION["username"] = $username;
			//header("Location: detail.php");
			}
		else {
			$query2="SELECT user_name FROM reg where user_name='$username' AND password='$password'";
		    $result1=mysqli_query($connection, $query2);
		    $rows1 = mysqli_fetch_assoc($result1);
		    if($rows1['user_name']){
				$_SESSION['wrong'] = "Not activated";//If not activated because of some issue
			}
			else{
				$_SESSION['wrong'] = "Wrong username and password";//If username or password is wrong
			}
		}
	}
	//$response["username"]= $username;
	echo json_encode($_SESSION);
 
?>
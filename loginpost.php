<?php
session_start();
require 'dbinfo.php';
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	if($username == "") {
		$_SESSION['blank_user'] = "Username can't be blank";//if empty username
	}
	if($password == "") {
		$_SESSION['blank_pass'] = "Password can't be blank";//if empty password
	}
	else {
		$password = md5($password);
		$query1 = "SELECT id,admin,first_name,user_type_id,timezone FROM reg where user_name='$username' AND password='$password' And activation='1'";
		$result = mysqli_query($connection, $query1);
		$rows = mysqli_fetch_assoc($result);
		if($rows['id']) {
			$_SESSION["id"] = $rows["id"];
			$_SESSION["admin"] = $rows["admin"];
			$_SESSION["username"] = $rows["first_name"];
			$_SESSION['role'] = $rows['user_type_id'];
			$_SESSION['timezone'] = $rows['timezone'];
			$_SESSION['action'] = "view";
			//header("Location: detail.php");
		}
		else {
			$query2="SELECT user_name FROM reg where user_name='$username' AND password='$password'";
		    $result1=mysqli_query($connection, $query2);
		    $rows1 = mysqli_fetch_assoc($result1);
		    if($rows1['user_name']){
				$_SESSION['wrong'] = "Not activated";//If not activated because of some issue
			}
			else {
				$_SESSION['wrong'] = "Wrong username and password";//If username or password is wrong
			}
		}//query else block ending
	}//post values checking else block ending
	//$response["username"]= $username;
	echo json_encode($_SESSION);				
?>
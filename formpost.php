<?php
require 'dbinfo.php';
require 'validate.php';
	$errors=array();//array for to show error messages
	$username = trim($_POST["username"]);
	$password  = md5(trim($_POST["password"]));//encrypting password
	$email = trim($_POST["email"]);
	$first_name = trim($_POST["first_name"]);
	$last_name = trim($_POST["last_name"]);
	$middle_name = trim($_POST["middle_name"]);
	$pno = trim($_POST["pno"]);
	$gender = trim($_POST["gender"]);
	$marital = trim($_POST["marital"]);
	$employer = trim($_POST["employer"]);
	$employement = trim($_POST["employement"]);
	$dob = trim($_POST["dob"]);
	$street = trim($_POST["street"]);
	$city = trim($_POST["city"]);
	$state = trim($_POST["state"]);
	$zip = trim($_POST["zip"]);
	$fax = trim($_POST["fax"]);
	$street1 = trim($_POST["street1"]);
	$city1 = trim($_POST["city1"]);
	$state1 = trim($_POST["state1"]);
	$zip1 = trim($_POST["zip1"]);
	$fax1 = trim($_POST["fax1"]);
	$comment = stripslashes(trim($_POST["text1"]));
	$check = trim($_POST["check"]);
	//POST values
	$target_dir = img_path;
	//image path where to store and retrive
	$target_file = $target_dir . basename($_FILES["img1"]["name"]);
	$img_var = basename($_FILES["img1"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
    	$errors["img"]="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	$uploadOk = 0;
	}
	if($uploadok == 1){
    		move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);
	}//uploading image
	$name_regular = array("first_name","last_name","middle_name");
	all_regular($name_regular);	//for regular message check	
	$name_fields_presence = array("username","password","email","first_name","last_name","dob","pno","employement","employer","street","city","state","zip","fax","street1","city1","state1","zip1","fax1","dob","text1");
	all_prestnt($name_fields_presence);	//function call to check all values are present or not in all array inputs
	$fields_max_length = array("username"=>20,"password"=>20,"first_name"=>20,"last_name"=>20,"pno"=>15);
	validate_max_lengths($fields_max_length);		//function call to check max length check all array inputs
	$fields_min_length = array("username"=>8,"password"=>8,"email"=>8,"pno"=>9);	
	validate_min_lengths($fields_min_length);//function call to check min length check all array inputs
	$name_fields_presence = array("username","password","email","first_name","last_name","pno","employement","employer","street","city","state","zip","fax","street1","city1","state1","zip1","fax1","dob");
	all_prestnt($name_fields_presence);
	if (!preg_match('/^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i', $email)){
		$errors["emailreg"] = " wrong" . ucfirst("email") .  " pattern ";
	}		//email format checking
	if($check==""){	
		$errors["check"] = ucfirst("check") . " needs to done to register ";
	}		//for email varification;
	$q1="SELECT id FROM reg where email_id='$email'";
	$res=mysqli_query($connection,$q1);
	if($rows=mysqli_fetch_assoc($res)){
		$errors["emailalready"] = ucfirst("email") . "already used";
	}//for username verification
	$q2="SELECT id FROM reg where user_name='$username'";
	$res2=mysqli_query($connection,$q2);
	$rows=mysqli_fetch_assoc($res2);
	if($rows['id']){
		$errors["usernamealready"] = ucfirst("username") . "already used";
	}
	$output=form_errors($errors);//end of validations

			echo json_encode($errors);
?>
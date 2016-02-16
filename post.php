<?php
require 'header.php';
require 'dbinfo.php';
require 'validate.php';
require 'mail.php';
session_start();
$errors=array();
if(isset($_POST["submit"])) {
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
	if (!preg_match('/^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i/', $email)){
		$errors["email"] = " wrong" . ucfirst("email") .  " pattern ";
	}//email format checking
	$name_regular = array("first_name","last_name","middle_name");
	all_regular($name_regular);	//for regular message check	
	$name_fields_presence = array("username","password","email","first_name","last_name","dob","pno","employement","employer","street","city","state","zip","fax","street1","city1","state1","zip1","fax1","dob","text1");
	all_prestnt($name_fields_presence);	//values are present or not
	$fields_max_length = array("username"=>20,"password"=>20,"first_name"=>20,"last_name"=>20,"pno"=>15);
	validate_max_lengths($fields_max_length);		//max length check
	$fields_min_length = array("username"=>8,"password"=>8,"email"=>8,"pno"=>9);	
	validate_min_lengths($fields_min_length);
	$name_fields_presence = array("username","password","email","first_name","last_name","pno","employement","employer","street","city","state","zip","fax","street1","city1","state1","zip1","fax1","dob");
	all_prestnt($name_fields_presence);
	if($check==""){	
		$errors["check"] = ucfirst("check") . " needs to done to register ";
	}		//for email varification;
	$q1="SELECT id FROM reg where email_id='$email'";
	$res=mysqli_query($connection,$q1);
	if($rows=mysqli_fetch_assoc($res)){
		$errors["email"] = ucfirst("email") . "already used";
	}//for username verification
	$q2="SELECT id FROM reg where user_name='$username'";
	$res2=mysqli_query($connection,$q2);
	if($rows=mysqli_fetch_assoc($res2)){
		$errors["username"] = ucfirst("username") . "already used";
	}
	$output=form_errors($errors);//end of validations
	if(!$output){
   				//creating new unique activation code
		$activate = md5(uniqid(rand(), true));
		$q="INSERT INTO reg (user_name, 
							password, 
							email_id, 
							first_name, 
							last_name, 
							middle_name, 
							ph_no, 
							gender, 
							marital, 
							employement, 
							employer, 
							street, 
							city, 
							state, 
							zip, 
							fax, 
							street1, 
							city1, 
							state1, 
							zip1, 
							fax1, 
							comment, 
							dob, 
							img, 
							check1,
							act_com)                
				VALUES ('$username',
					'$password', 
					'$email', 
					'$first_name', 
					'$last_name', 
					'$middle_name', 
					'$pno', 
					'$gender', 
					'$marital', 
					'$employement', 
					'$employer', 
					'$street', 
					'$city', 
					'$state', 
					'$zip', 
					'$fax', 
					'$street1', 
					'$city1', 
					'$state1', 
					'$zip1', 
					'$fax1', 
					'$comment', 
					'$dob', 
					'$img_var', 
					'$check',
					'$activate')";
		if (mysqli_query($connection, $q)) {	

			$subject = "Activation mail";
			$var1 = mymail1($email,$subject,$activate);				
			$_SESSION['active_msg'] = "Activation link sent to your mail";
			header("Location:login.php");
		} 
		else {
			?><div class="colo"><?php echo "Error: " . $q . "<br>" . mysqli_error($connection); ?></div><?php
		}
	}//error if block ending	
}// session if block ending
?>
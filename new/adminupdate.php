<?php
	require 'dbinfo.php';

			$respnse=array();
			$id=trim($_POST['id']);
			$username = trim($_POST["user_name"]);
			$email = trim($_POST["email_id"]);
			$first_name = trim($_POST["first_name"]);
			$last_name = trim($_POST["last_name"]);
			$middle_name = trim($_POST["middle_name"]);
			$pno = trim($_POST["phone"]);
			$employer = trim($_POST["employer"]);
			$employement = trim($_POST["employement"]);
			$dob = trim($_POST["dob"]);
			$gender= trim($_POST["gender"]);
			$marital=trim($_POST['marital']);
			$street = trim($_POST["street"]);
			$city = trim($_POST["city"]);
			$state = trim($_POST["state"]);
			$fax = trim($_POST["fax"]);
			$street1 = trim($_POST["street1"]);
			$city1 = trim($_POST["city1"]);
			$state1 = trim($_POST["state1"]);
			$fax1 = trim($_POST["fax1"]);
				if($_POST['oper'] == 'edit') {
				$q = "UPDATE reg SET 
					
					first_name='$first_name', 
					last_name='$last_name', 
					middle_name='$middle_name' 
					 WHERE id='$id'";
					$response['query']=$q;
					if($result=mysqli_query($connection, $q)) {
						$response['value']=$q;
					}
				}
				//$response['value']="i am here";
				else if($_POST['oper'] == 'del') {
					$response['value']="i am here";
					$string=$_POST['id'];
					$explode = explode(',', $string);
					foreach ($explode as $key){
						$arrIntegers[] = (int) $key;
					}
					$count=count($arrIntegers);
					$response['count']=$count;
					if ($count>1){
						$response['v']="i am inside";
						for($i=0; $i<$count; $i++){
							$response['array']=$arrIntegers[$i];
							$q = "DELETE FROM reg WHERE id='$arrIntegers[$i]'";
							mysqli_query($connection, $q);
						}
					}
					else {
						$q = "DELETE FROM reg WHERE id='$id'";
						$response['query']=$q;
						if($result=mysqli_query($connection, $q)){
							$response['value']=$q;
						}
					}
				}
				/*<?php

				$string = "1,2,3,4,5"; 
				$explode = explode(',', $string);
				foreach ($explode as $key)
				$arrIntegers[] = (int) $key;
				echo $arrIntegers[1];
				var_dump($arrIntegers);
?>*/
				/*else if($_POST['oper'] == 'del')
				{
					$q = "DELETE FROM reg WHERE id='$id'";
					$response['query']=$q;
					if($result=mysqli_query($connection, $q))
					{
						$response['value']=$q;
					}
				}*/
				echo json_encode($response);
?>

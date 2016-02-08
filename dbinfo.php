<?php
$db_username = "rajkumar";
$db_password = "rajkumar";
$db_database = "REGISTRATION";
$connection = mysqli_connect('localhost', $db_username, $db_password, $db_database);
if (!$connection) {	
	echo "problem<br/>";
	echo "Connection Problem";
}
//Change the path according to your project path
DEFINE('URL', 'http://localhost/project/Assignment1');
//Change the path according to your project path
DEFINE('img_path','/var/www/html/project/Assignment1/img/');
?>
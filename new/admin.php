<?php
	require 'header.php';
	session_start();
if($_SESSION['id']){
?>
<div id="agrid" ><table id="list_records"></table></div> 
<div id="perpage"></div>
<?php
}
else{
	header('Location: login.php');
}

	require 'footer.php';

?>
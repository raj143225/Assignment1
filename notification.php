<?php
	require 'header.php';
	
if($_SESSION['id']) {
	require 'acl.php';
?>
<div class="well">
	<center><h3><span class="label label-danger"><?php echo $_SESSION['acl_message'] .'-'. $_SESSION['username'];?></span></h3></center>
</div>
<?php
}
else {
	header('Location: login.php');
}
	require 'footer.php';
?>
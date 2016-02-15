<?php
	require 'header.php';
?>
	<div class="well">
		<center><h3><span class="label label-danger"><?php echo $_SESSION['acl_message'];?></span></h3></center>
<?php
		unset($_SESSION['acl_message']);
		$_SESSION['action'] = 'view';
?>
</div>
<?php
	require 'footer.php';
?>
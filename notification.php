<?php
	require 'header.php';
if($_SESSION['id']) {
	require 'acl.php';
	$path_parts = pathinfo($_SERVER['REQUEST_URI']);
	$resource = $path_parts['filename'];
?>
	<div class="well">
		<!--<center><h3><span class="label label-danger"><?php echo $_SESSION['acl_message'] .'-'. $_SESSION['username'];?></span></h3></center>-->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<nav class="navbar navbar-default" id="navigation">
				<ul  class="nav navbar-nav">
					<?php $privilegesAvailable = $_SESSION['privilegedInfo']['operations'];
							$privilegeToCheck = $resource. '-' . 'add';
							if((isset($privilegesAvailable[$resource . "-" ."all"]) &&
						        (true === $privilegesAvailable[$resource . "-" ."all"])) ||
						        (isset($privilegesAvailable[$privilegeToCheck]) &&
						        (true === $privilegesAvailable[$privilegeToCheck]))) { ?>
						        <li><a href="#">add</a></li> <?php
							    }
							  
							$privilegeToCheck = $resource. '-' . 'delete';
							if((isset($privilegesAvailable[$resource . "-" ."all"]) &&
						        (true === $privilegesAvailable[$resource . "-" ."all"])) ||
						        (isset($privilegesAvailable[$privilegeToCheck]) &&
						        (true === $privilegesAvailable[$privilegeToCheck]))) { ?>
								<li><a href="#">delete</a></li>
					<?php 	} ?>
				</ul>
			</nav>
		</div>
	</div>
<?php
}
else {
	header('Location: login.php');
}
	require 'footer.php';

?>
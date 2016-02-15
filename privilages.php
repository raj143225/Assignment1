<?php
	require 'header.php';
	require 'dbinfo.php';
	require 'class.php';
	require 'acl.php';
	session_start();
	if($_SESSION['id']) {
		$objName = new All_operaions();
	?>	
		<div class="col-lg-12 well">
			<center><label><h4>Roles<h4></label></center>
			<div class="row">
				<form class="form" id="form" action="privilegepost.php" method="post">
					<div class="col-sm-12 row">
						<div class="form-group">
							<label class="control-label col-sm-4"><center><h6>Select Roles</h6></center></label>
							<div class="col-sm-4">
								<select class="form-control" name="role" id="role_check">
									<option>Select</option>
									<?php 
										$query = "SELECT type,id FROM user_types";
										$result = mysqli_query($connection,$query);
										$val = array();
										while($row = mysqli_fetch_array($result)) {
											?> <option  value="<?php echo $row['id']; ?>" ><?php echo $row['type']; ?></option> <?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
				</form> 
			</div>
		</div>
		<div class="well" id="display" ></div>
	<?php
	}//if block ends here
	else {
		session_destroy();
		header("Location: login.php");
	}
	require 'footer.php';
?>
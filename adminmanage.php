<?php
	require 'header.php';
	require 'dbinfo.php';
	require 'class.php';
	require 'acl.php';
	session_start();
	$objName = new All_operaions();
	if($_SESSION['id']) {
?>	
	<div class="col-lg-12 well">
		<center><label><h4>Roles<h4></label></center>
		<div class="row">
			<form class="form" id="form" action="rolepost.php" method="post">
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Roles</h6></center></label>
						<div class="col-sm-4">
							<select class="form-control" name="role" id="role">
								<?php 
									$value = $objName->viewRoles();
									for($i=0; $i<count($value); $i++) {
									?> <option><?php echo $value[$i]; ?></option> <?php
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="delete" class="btn btn-sm btn-danger" name="delete" value="delete">Delete</button></center>	
						</div >	
					</div>
					
				</div>
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Add New Role</h6></center></label>
						<div class="col-sm-4">
							<input  type="text" name="type" id="type"/>
						</div>
						<div class="form-group col-sm-4">	
							<center><button  type="submit" id="add" class="btn btn-sm btn-info" name="add" value="add">Add</button></center>	
						</div >	
					</div>
				</div>
			</form> 
		</div>
	</div>
	<!--managing different roles-->
	<div class="col-lg-12 well">
		<center><label><h4>Operations<h4></label></center>
		<div class="row">
			<form class="form" id="form" action="rolepost.php" method="post">
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Operations</h6></center></label>
						<div class="col-sm-4">
							<select class="form-control" name="action" id="action">
								<?php 
									$value = $objName->viewOperation();
									for($i=0; $i<count($value); $i++) {
									?> <option><?php echo $value[$i]; ?></option> <?php
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="delete" class="btn btn-sm btn-danger" name="delete" value="delete">Delete</button></center>	
						</div >	
					</div>
				</div>
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Add new Action</h6></center></label>
					<div class="col-sm-4">
						<input  type="text" name="operation" id="operation"/>
					</div>
					<div class="form-group col-sm-4">	
						<center><button type="submit" id="add" class="btn btn-sm btn-info" name="add" value="add">Add</button></center>	
					</div >	
					</div>
				</div>
			</form> 
		</div>
	</div><!--operations-->
	<div class="col-lg-12 well">
		<center><label><h4>Resources<h4></label></center>
		<div class="row">
			<form class="form" id="form" action="rolepost.php" method="post">
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Resources</h6></center></label>
						<div class="col-sm-4">
							<select class="form-control" name="name" id="name">
								<?php 
									$value = $objName->viewResource();
									for($i=0; $i<count($value); $i++) {
									?> <option><?php echo $value[$i]; ?></option> <?php
									}
								?>
							</select>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="delete" class="btn btn-sm btn-danger" name="delete" value="delete">Delete</button></center>	
						</div >	
					</div>
				</div>
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Add new resource</h6></center></label>
						<div class="col-sm-4">
							<input type="text" name="recource" id="resource"/>
						</div>
						<div class="form-group col-sm-4">	
							<center><button type="submit" id="add" class="btn btn-sm btn-info" name="add" value="add">Add</button></center>	
						</div >	
					</div>
				</div>
				<div class="col-sm-12 row">	
					<div class="col-sm-3"></div>
					
						
				</div>	
			</form> 
		</div>
	</div>
		<!--operations adding and deleting-->
<?php
	}
	else {
		session_destroy();
		header("Location: login.php");
	}
	require 'footer.php';
?>
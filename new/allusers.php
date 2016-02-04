<?php
		require 'header.php';
		require 'dbinfo.php';
		require 'validate.php';
		session_start();
		if($_SESSION['id']){
			$query="SELECT user_name,email_id,admin FROM reg WHERE admin='0'";
			$result=mysqli_query($connection, $query);
	 		$table_counter=1;
	 		while($rows = mysqli_fetch_array($result)){
		 	?>
	 			<div class="col-lg-12 well">
					<form class='table form' action="useredit.php" method="post" id="<?php echo 'form' . $table_counter ;?>">
	 					<table>
	 						<tr>
	 							<div class="row">
		 							<td>
		 								<div class="col-sm-4 form-group">
		 									<span class="glyphicon glyphicon-user"></span>
		 									<label>Username</label>
		 									<input type="text" name="<?php echo 'column1' . $table_counter ;?>" id="<?php echo 'column1' . $table_counter ;?>" value="<?php echo $rows[0]; ?>">
		 								</div>
		 							</td>
		 							<td>
		 								<div class="col-sm-4 form-group">
		 									<span class="glyphicon glyphicon-envelope"></span>
		 									<label>Email_id</label>
		 									<input type="text" name="<?php echo 'column2' . $table_counter ;?>" id="<?php echo 'column2' . $table_counter ;?>" value="<?php echo $rows[1]; ?>">
		 								</div>
		 							</td>
		 							<td>
		 								<div class="col-sm-4 form-group">
		 									<span class="glyphicon glyphicon-user"></span>
		 									<label>Username</label>
		 									<input type="text" name="<?php echo 'column3' . $table_counter ;?>" id="<?php echo 'column3' . $table_counter ;?>" value="<?php echo $rows[2]; ?>">
		 								</div>
		 							</td>
	 							</div>
	 						</tr>
	 							<tr>
	 								<div class="col-sm-6 form-group">
	 									<td></td>
	 								</div>
	 								<div class="row">
			 							<td class="align-right">
			 								<div class="col-sm-4 form-group">
			 									<button type="submit" class="btn btn-danger" name="<?php echo 'delete' . $table_counter ;?>" id="<?php echo 'delete' . $table_counter ;?>" value="submit">Delete</button>
			 								</div>	
			 								<div class="col-sm-4 form-group">
			 									<button type="submit" class="btn btn-info" name="<?php echo 'update' . $table_counter ;?>" id="<?php echo 'update' . $table_counter ;?>" value="update">Update</button>
			 								</div>
			 							</td>
	 								</div>
	 							</tr>
	 					</table>
	 				</form>
	 			</div>
	 			<?php
				$table_counter++;
	 		}
		}
?>
<?php
		require 'footer.php';
?>
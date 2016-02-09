<?php
	require 'header.php';
	require 'dbinfo.php';
	require 'class.php';
	$objName = new All_operaions();
?>	
	<div class="col-lg-12 well">
		<center><label><h4>Roles<h4></label></center>
		<div class="row">
			<form class="form" id="form" action="privilages.php" method="post">
				<div class="col-sm-12 row">
					<div class="form-group">
						<label class="control-label col-sm-4"><center><h6>Roles</h6></center></label>
						<div class="col-sm-4">
							<select class="form-control" name="role" id="role">
								<option></option>
								<?php 
									$query = "SELECT type,id FROM user_types";
									$result = mysqli_query($connection,$query);
									$val = array();
									while($row = mysqli_fetch_array($result)) {
										?> <option value="<?php echo $row['id']; ?>" ><?php echo $row['type']; ?></option> <?php
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-12 row">		
					<div class="form-group col-sm-2">	
						<center><button type="submit" id="add" class="btn btn-lg btn-info" name="add" value="add">Add</button></center>	
					</div >		
				</div>	
			</form> 
		</div>
	</div>
<?php
	if($_POST['role'] && $_POST['add']) {
		$role = $_POST['role'];
		$operationResult =  mysqli_query($connection,"SELECT id, action FROM operations");
        while($row = mysqli_fetch_assoc($operationResult)) {
            $operationInfo[] = $row;
        }
        $query = "SELECT user_types_id,resources_id,operations_id FROM privileges WHERE user_types_id ='$role'";
		$privilegeResult =  mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($privilegeResult)) {

            $privileges[$row['user_types_id'].'-'.$row['resources_id'].'-'
            .$row['operations_id']] = true;
        }
        $user_type =  mysqli_query($connection,"SELECT type FROM user_types WHERE id = '$role'");
        while($row = mysqli_fetch_assoc($user_type)) {
            $user = $row['type'];
        }
        $resourceResult =  mysqli_query($connection,"SELECT id, name FROM resources");
        $outputTable = '<div class="well" >';
        $outputTable .= '<div class="heading" ><center><h4>'. $user .'</h4></center></div>';
        $outputTable .= '<table class="table"><tr><td>Resources</td><td>Privileges</td></tr>';
        while($resource = mysqli_fetch_assoc($resourceResult))
   		 {
        $outputTable .= '<tr class="info"><td>'.ucfirst($resource['name']).'</td><td>';
        foreach($operationInfo as $operation) {
        	$outputTable .='<input type="checkbox" '. (isset($privileges[$role.'-'.$resource["id"].'-'.$operation["id"]]) ? ' checked="checked" ' : '').'/> '.$operation['action'] .'&nbsp;&nbsp;&nbsp;';
        }
            $outputTable .= '</td></tr>';
        }
        $outputTable .= '</table>';
        $outputTable .= '</div >';
        echo $outputTable;
	}
	require 'footer.php';
?>
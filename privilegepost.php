<?php
    require 'dbinfo.php';
    if($_POST['role']) {
    $role = $_POST['role'];
    $operationResult =  mysqli_query($connection,"SELECT id, action FROM operations");
    while($row = mysqli_fetch_assoc($operationResult)) {
        $operationInfo[] = $row;
    }
    $query = "SELECT id,user_types_id,resources_id,operations_id FROM privileges WHERE user_types_id ='$role'";
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
    
    $outputTable = '<div class="heading" ><center><h4>'. $user .'</h4></center></div>';
    $outputTable .= '<table class="table"><tr><td>Resources</td><td>Privileges</td></tr>';
    while($resource = mysqli_fetch_assoc($resourceResult))
     {
    $outputTable .= '<tr class="info"><td>'.ucfirst($resource['name']).'</td><td>';
    foreach($operationInfo as $operation) {
        $outputTable .='<input type="checkbox" '. 'onchange="changePrivilege(this.checked, '. $role .','. $resource["id"] .', '.$operation["id"] .')" '. (isset($privileges[$role.'-'.$resource["id"].'-'.$operation["id"]]) ? ' checked="checked" ' : '').'/> '.$operation['action'] .'&nbsp;&nbsp;&nbsp;';
    }
        $outputTable .= '</td></tr>';
    }
    $outputTable .= '</table>';
    $output = array();
    $output['display'] = $outputTable;
    //echo $outputTable;
    echo json_encode($output);
    }
    //for privileges display for the each type of user
    if($_POST['roles'] && $_POST['resource_id'] && $_POST['operation_id']) {
        $role = $_POST['roles'];
        $resource_id = $_POST['resource_id'];
        $operation_id = $_POST['operation_id'];
        $result = $_POST['result'];
        if($result === "true") {   
            $query = "INSERT INTO privileges (user_types_id,resources_id,operations_id) VALUES('$role','$resource_id','$operation_id')";
            $result =  mysqli_query($connection,$query);
            $out['add'] = "added";
        }
        if($result === "false") {   
            $query1 = "DELETE FROM privileges WHERE user_types_id = '$role'AND resources_id = '$resource_id' AND operations_id='$operation_id'";
            $result1 =  mysqli_query($connection,$query1);
            $out['query1'] = "deleted";
        }
        echo json_encode($out);
    }
?>
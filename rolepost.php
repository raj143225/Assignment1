<?php
require 'dbinfo.php';
if($id=$_POST['id']) {
     $a = array();
    $role=$_POST['role'];
    $querys="SELECT id FROM user_types where type='$role'";
    $results=mysqli_query($connection, $querys);
    if($rows = mysqli_fetch_assoc($results))
    {
        $type_id=$rows['id'];
    }
    
    $update_query="UPDATE reg SET user_type_id = '$type_id' WHERE id='$id'";
    $resultss=mysqli_query($connection, $update_query);   
    if($resultss)
    {
    	header("Location: role.php");
    }
    echo json_encode($a);
}
?>
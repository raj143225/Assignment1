<?php
require 'dbinfo.php';
require 'class.php';
$objName = new All_operaions();
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
if($_POST['add']=="add" && $type=$_POST['type'])
{
    $result= $objName->addRole($type);
    header('Location: adminmanage.php');  
}
if($_POST['delete']=="delete" && $type=$_POST['role'])
{
   
   $result= $objName->deleteRole($type);
    header('Location: adminmanage.php');  
}
//for roles addition and deletion
if($_POST['add']=="add" && $operation=$_POST['operation'])
{
    $result= $objName->addOperation($operation);
    header('Location: adminmanage.php');  
}
if($_POST['delete']=="delete" && $action=$_POST['action'])
{
   
   $result= $objName->deleteOperation($action);
    header('Location: adminmanage.php');  
}
//for operations addition and deletion
if($_POST['add']=="add" && $resource=$_POST['recource'])
{
    $result= $objName->addResource($resource);
    header('Location: adminmanage.php');  
}
if($_POST['delete']=="delete" && $name=$_POST['name'])
{
   $result= $objName->deleteResource($name);
    header('Location: adminmanage.php');  
}
?>
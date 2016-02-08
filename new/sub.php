<?php 
require 'dbinfo.php';
	if($_POST['nd_'] && $_POST['id'])
	{
	$id=$_POST['id'];
	$responce->val=$id;
	$sql = "SELECT * FROM reg WHERE id = $id"; 
	$result = mysqli_query($connection,$sql);
	$i=0;
	while($row = mysqli_fetch_assoc($result)) {
	$responce->rows[$i]['id']=$row['id'];
	$responce->rows[$i]['cell']=array($row['street'],$row['city']
									,$row['state'],$row['fax'],$row['street1']
									,$row['city1'],$row['state1'],$row['fax1']
									);
	$i++;
	}
}
echo json_encode($responce);
?>
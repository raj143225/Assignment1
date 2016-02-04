<?php 
require 'dbinfo.php';
$page = $_POST['page']; 
$limit = $_POST['rows']; 
$sidx = $_POST['sidx']; 
$sord = $_POST['sord']; 

if(!$sidx) $sidx =1; 
$query = "SELECT COUNT(*) AS count FROM reg";
$result = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($result); 

$count = $row['count']; 
if( $count > 0 && $limit > 0) { 
    $total_pages = ceil($count/$limit); 
} else { 
    $total_pages = 0; 
} 
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0; 

$sql = "SELECT * FROM reg ORDER BY $sidx $sord LIMIT $start , $limit"; 
$result = mysqli_query($connection,$sql );

$i=0;
while($row = mysqli_fetch_assoc($result)) {
	$responce->rows[$i]['id']=$row['id'];
	$responce->rows[$i]['cell']=array($row['id'],$row['first_name']
								,$row['last_name'],$row['middle_name']
								,$row['dob']
								,$row['email_id'],$row['employement']
								,$row['employer'],$row['gender']
								,$row['marital'],$row['ph_no']
								,$row['img']
								,$row['street'],$row['city']
								,$row['state'],$row['fax']
								,$row['street1'],$row['city1']
								,$row['state1'],$row['fax1']
								,$row['comment']);
	$i++;
}
echo json_encode($responce);
?>
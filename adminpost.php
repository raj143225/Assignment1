<?php 
require 'dbinfo.php';
$page = $_POST['page']; 
$limit = $_POST['rows']; 
$sidx = $_POST['sidx']; 
$sord = $_POST['sord']; 
$search_field = $_POST['searchField'];
$search_string = $_POST['searchString'];
if(!$sidx) $sidx =1; 
$query = "SELECT COUNT(*) AS count FROM reg";
$result = mysqli_query($connection, $query); 
$row = mysqli_fetch_assoc($result); 
$count = $row['count']; 
if( $count > 0 ) { 
    $total_pages = ceil($count/$limit); 
} else { 
    $total_pages = 0; 
} 
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0; 
if($search_string && $search_field) {
	$sql = "SELECT * FROM reg WHERE $search_field= '$search_string' AND admin = '0' ORDER BY $sidx $sord LIMIT $start , $limit";
	$resultt = mysqli_query($connection,$sql);
	$rowss=mysqli_fetch_assoc($resultt);
	//$responce['valuesss']=$rowss['id'];
	if(!$rowss['id']) {
		$responce['not_found']= "True";
	}
}
else {
	$sql = "SELECT * FROM reg WHERE admin = '0'  ORDER BY $sidx $sord LIMIT $start , $limit"; 
}
$result = mysqli_query($connection,$sql );
$i=0;
while($row = mysqli_fetch_assoc($result)) {
	if($row['dob'] == '0000-00-00') {
			$row['dob'] = null;
		}
	$responce->rows[$i]['id']=$row['id'];
	$responce->rows[$i]['cell']=array($row['id'],$row['first_name']
									,$row['last_name'],$row['middle_name']
									,$row['dob']
									,$row['email_id'],$row['employement']
									,$row['employer'],$row['gender']
									,$row['marital'],$row['ph_no']
									);
	$i++;
}
echo json_encode($responce);
?>
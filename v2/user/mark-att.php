<?php
	include 'scripts/db-connect.php';
	$mprId=$_POST['mprId'];
	$city=$_POST['city'];
	$sql = "INSERT INTO `attendance`(mprId, status, updated_at) VALUES ('$mprId', '$city', 'Now()')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	
	mysqli_close($conn);
?>
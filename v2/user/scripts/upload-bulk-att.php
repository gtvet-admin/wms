<?php
include ('dbcon.php');
$cen=$_SESSION["cen_id"];
$trade = $_REQUEST['trade'];
$mpr = $_POST["mpr"];
$status = 'P';
$dt = date("d-m-Y");
$tmstmp = date('y/m/d h:i:s a');
$query = "INSERT INTO `attendance`(mprId, status, dt, updated_at) VALUES ('".$mpr."','".$status."','".$dt."','".$tmstmp."')"; 
$result = mysqli_query($con, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
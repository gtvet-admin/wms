<?php
include ('dbcon.php');
date_default_timezone_set("Asia/Kolkata");
$pr=$_REQUEST["pr"];
$ab=$_REQUEST["ab"];
$lv=$_REQUEST["lv"];
$drp=$_REQUEST["id"];
$dt=date("d-m-Y");
$att_tmstmp=date('y/m/d h:i:s a');
//$query = "INSERT INTO `attendance_logs`(cen_id, trade, ttl_count, ttl_pr, dt, tmstmp) VALUES ('".$cen."','".$mpr."','".$status."','".$status."','".$dt."','".$tmstmp."')";
$query = "UPDATE `certs` SET `estatus`= '1', `etmstmp`= '$att_tmstmp', `status`= '$dt'  WHERE id = '$drp'";
$result = mysqli_query($con, $query);
//var_dump($result);
//exit;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
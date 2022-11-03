<?php
include ('dbcon.php');
date_default_timezone_set("Asia/Kolkata");
$pr=$_REQUEST["pr"];
$ab=$_REQUEST["ab"];
$lv=$_REQUEST["lv"];
$drp=$_REQUEST["drp"];
$dt=date("d-m-Y");
$att_tmstmp=date('y/m/d h:i:s a');
//$query = "INSERT INTO `attendance_logs`(cen_id, trade, ttl_count, ttl_pr, dt, tmstmp) VALUES ('".$cen."','".$mpr."','".$status."','".$status."','".$dt."','".$tmstmp."')";
$query = "UPDATE `attendance_logs` SET `ttl_pr`='$pr', `ttl_ab`= '$ab', `ttl_lv`= '$lv', `ttl_drp`= '$ab' , `att_status`= 'Locked', `att_tmstmp`= '$att_tmstmp' WHERE dt = '$dt'";
$result = mysqli_query($con, $query);
//var_dump($result);
//exit;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
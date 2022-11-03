<?php
include ('dbcon.php');
$cen=$_REQUEST["pr_abn_no"];
date_default_timezone_set("Asia/Kolkata");
$date = date("d.m.y h:i:s a");
$query = "UPDATE `btch_1` SET `cnf_tmstmp`='$date', `cnf_status`= 'Yes' WHERE pr_abn_no = '$cen'"; 
$result = mysqli_query($con, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
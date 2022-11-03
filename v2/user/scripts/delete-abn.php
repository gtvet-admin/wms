<?php
include ('dbcon.php');
$cen=$_REQUEST["pr_abn_no"];
$query = "DELETE FROM `btch_1` WHERE pr_abn_no = '$cen'"; 
$result = mysqli_query($con, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
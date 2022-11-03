<?php
include ('dbcon.php');
$cen=$_REQUEST["id"];
$query = "DELETE FROM `btch_2` WHERE id = '$cen'"; 
$result = mysqli_query($con, $query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
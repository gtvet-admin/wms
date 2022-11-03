<?php
$con = mysqli_connect("localhost","gtvet-flexi-mou","GTVET@2022","gtvet-flexi-mou");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  date_default_timezone_set('Asia/Kolkata');
?>
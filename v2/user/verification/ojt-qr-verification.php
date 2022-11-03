<html>
<head>
<title>Staffing QR Verification</title>
<style>#customers {  font-family: Arial, Helvetica, sans-serif;  border-collapse: collapse;  width: 100%;}#customers td, #customers th {  border: 1px solid #ddd;  padding: 8px;}#customers tr:nth-child(even){background-color: #f2f2f2;}#customers tr:hover {background-color: #ddd;}#customers th {  padding-top: 12px;  padding-bottom: 12px;  text-align: left;  background-color: #1561bb;  color: white;}</style>
<?php include ('../scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$mpr = $_REQUEST['mprId'];
$dt = date("d-m-Y");
$query ="SELECT * FROM certs WHERE lernern_id = '$mpr'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$course_name = $row['lern_course'];
$cnt = $row['cnt'];
$sts = $row['att_status'];
$lern = $row['lernern_id'];
$cert_no = $row['cert_no'];
$ind = $row['industry'];
$start = $row['cou_strt_dt'];
$end = $row['cou_end_dt'];
$id = $row['id'];
$loc = $row['loc'];
?>
</head>
<body>
<center><img src="https://gtetonline.com/flexi-mou/gtvet/user/assets/img/logo.png"style="width: 275px;"/></center>
</br><center><h1>Staffing QR Verification</h1></center></br><table id="customers">  
<tr><th>Certificate No.</th><td><?=$cert_no;?><?=$id;?></td></tr>  
<tr><th>Lernern ID</th><td><?=$lern;?></td></tr>  
<tr><th>Name of the Trainee</th><td><?=$fname;?> <?=$lname;?></td></tr>  
<tr><th>Industry</th><td><?=$ind;?></td></tr>
  <tr><th>Location</th><td><?=$loc;?></td></tr>  
  <tr><th>Program</th><td>On Job Training</td></tr> 
  <tr><th>Course</th><td>NEEM </td></tr> 
  <tr><th>Start Date</th><td><?=$start;?></td></tr>
  <tr><th>End Date</th><td><?=$end;?></td></tr>
  <tr><th>Certificate Status</th><td>Valid</td></tr>
</body>
</html>

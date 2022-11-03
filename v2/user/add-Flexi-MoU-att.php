<?php

    //Start Session
    session_start();

    //Connect to the Database
    include "scripts/db-connect.php";

    //Declare Variables
    $role = "";
	$scheme = "";
    $org_name ="";
    $cen_id = "";
    $ro_email="";

    //check if session is already set

    if(!isset($_SESSION['bazooka'])) { //If yes

        //Redirect to dashboard
        header('Location:login.php');


    } else {

        //get data from Session
        $ro_email = $_SESSION['bazooka'];
        $scheme = $_SESSION['scheme'];
		$role = $_SESSION['role'];
        $org_name = $_SESSION['org_name'];
        $cen_id = $_SESSION['cen_id'];

  

    if($role == "IP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($role == "TP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($scheme == "CM") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	
	if($scheme == "Flexi-MoU") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($scheme == "NAPS") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($scheme == "NEEM") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	
  }
    //get Toast Message
    $message = "";

    if (isset($_GET['message'])) { //if message exists in GET

        $message = $_GET['message']; //Set the Variable with GET message

    }
	
	$date = date("d-m-Y");
	$day = date("l");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexi MoU - GTVET</title>

    <!--favicon -->
    <link rel="icon" href="cutm.ico" type="image/x-icon"/>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!--Icons css-->
    <link rel="stylesheet" href="assets/css/icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.css" />

    <!--Style css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--mCustomScrollbar css-->
    <link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

    <!--gallery css-->
    <link rel="stylesheet" href="assets/plugins/gallery/main.css">

    <!--Sidemenu css-->
    <link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

    <!--Morris css-->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!--Chartist css-->
    <link rel="stylesheet" href="assets/plugins/chartist/chartist.css">
    <link rel="stylesheet" href="assets/plugins/chartist/chartist-plugin-tooltip.css">

    <!--Data List-->
    <link rel="stylesheet" href="assets/plugins/Datatable/css/dataTables.bootstrap4.css">

</head>

<body class="app ">

<!--<div id="spinner"></div>-->

<div id="app">
    <div class="main-wrapper" >

        <!-- Header Starts -->
        <?php include "common/header.php"; ?>
        <!-- Header Ends -->

        <!-- Menu Starts -->
        <?php

        //Select Navbar as per the role
        if($role == "IP") {

            include "scripts/navbar-ip.php";

        }
		elseif($role == "TP") {

            include "scripts/navbar-tp.php";

        }
		elseif($role == "CM") {

            include "scripts/navbar-cm.php";

        }
	$trade = $_REQUEST['trade'];	 
        ?>
        <!-- Menu Ends -->

        <!-- Main Container Starts-->

        <div class="row app-content">
            <div class="col-12">
			                <div class="card-header">
                   
                    <center>
                        <h4>Attendance Status For <?=$trade;?></h4>
                        <!--                            <p>Owner/Director/MD/CMD/Managing Trustee</p>-->
                    </center>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
<table >
<?php
$cen_id = $_SESSION['cen_id'];
include ('scripts/dbcon.php'); 
$result ="SELECT *, COUNT(cen_id) as total, COUNT(CASE WHEN emp_status = 'Dropped Out' THEN '1' ELSE NULL END) as dropouts, COUNT(CASE WHEN emp_status = 'Continuing' THEN 1 ELSE NULL END) as approved FROM btch_2 WHERE cen_id='$cen_id' AND lern_course = '$trade' AND emp_status != 'Dropped Out'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Total Candidates Enrolled</th><th>Total Attendance Marked</th><th>Total Unbilled Attendance</th></tr></thead>";
             while($row = mysqli_fetch_array($result))  { 
echo "<tr><td><a style='color:#1a9aa7' href='view-all-batch.php?scheme=DDUGKY'>".$row["total"]."</a></td><td><a style='color:#1a9aa7' href='view-approved-batch.php?scheme=DDUGKY'>".$row["approved"]."</a></td><td><a style='color:#1a9aa7' href='view-pending-batch.php?scheme=DDUGKY'></a></td></tr>";
}
    echo "</div></table>";
} else {
    echo "<center><h4>No Centres in Queue For Approval</h4></center>";
}
mysqli_close($con);
?>
</table>
               <!--Tab Ends -->
                </div>
                
            </div>
                <div class="card">
                    <div class="card-header">
                        <center><h4>Mark Attendance For <?=$trade;?></h4></center>
                    </div>
                    <div class="card-body">
                        <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];$trade = $_REQUEST['trade'];
$result ="SELECT *, ((COUNT(CASE WHEN emp_status = 'Continuing' THEN 1 ELSE NULL END))) as total FROM btch_2 where cen_id ='$cen_id' AND lern_course = '$trade' AND emp_status != 'Dropped Out' GROUP BY cen_id";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Centre UID</th><th>Centre Name</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  {
		switch ($role) {
			case "IP":
			   $rle=  "<table class='table table-bordered mb-0'><tr>
		<center><td>Generate UBN</td></center>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='generate-ubn.php'>Generate</a></center></td></td></tr>
		<tr><centre><td>Add / Upload Batch</td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-excel.php'>Add</a></center></td></td></tr>
		<tr><td>Add Candidate Photos</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-photo.php'>Upload</a></center></td></td></tr>
		<tr><td>Add ID Proofs</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-id-proofs.php'>Upload</a></center></td></td></tr>
		<tr><centre><td>Data Correction</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-corr.php'>Edit</a></center></td></td></tr>
		<tr><centre><td>Data Verification</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>Verify</a></center></td></td></tr>";
				break;
				
				case "TP":
			   $rle= "<table class='table table-bordered mb-0'><tr>
		<center><td>Generate UBN</td></center>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='generate-ubn.php'>Generate</a></center></td></td></tr>
		<tr><centre><td>Add / Upload Batch</td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-excel.php'>Add</a></center></td></td></tr>
		<tr><td>Add Candidate Photos</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-photo.php'>Upload</a></center></td></td></tr>
		<tr><td>Add ID Proofs</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-id-proofs.php'>Upload</a></center></td></td></tr>
		<tr><centre><td>Data Correction</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-corr.php'>Edit</a></center></td></td></tr>
		<tr><centre><td>Data Verification</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>Verify</a></center></td></td></tr>";
				break;
				
				case "CM":
			   $rle= "<table class='table table-bordered mb-0'><tr>
		<tr><centre><td>Mark Attendance For Today - $day, ($date) </td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-can-att.php?ttl=".$row['total']."&trade=$trade'>Add</a></center></td></td></tr>
		";
				break;

			default:
				$rle= "User";
	}  
        echo "<tr><td>".$row["cen_id"]."</td><td>$org_name</td></tr></table>
		$rle
		";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>Your Data has not been Approved! Please Contact Admin</h4></center>";
}
mysqli_close($con);
?>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4>Weekly Attendance</h4></center>
                    </div>
                    <div class="card-body">
                        <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$result ="SELECT * FROM  attendance where cen_id ='$cen_id' GROUP BY dt ORDER BY `attendance`.`dt` DESC";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Date</th><th>Last Updated On</th><th>Action</th></thead>";
      while($row = mysqli_fetch_array($result))  {
		switch ($role) {
			case "IP":
			   $rle=  "<table class='table table-bordered mb-0'><tr>
		<center><td>Generate UBN</td></center>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='generate-ubn.php'>Generate</a></center></td></td></tr>
		<tr><centre><td>Add / Upload Batch</td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-excel.php'>Add</a></center></td></td></tr>
		<tr><td>Add Candidate Photos</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-photo.php'>Upload</a></center></td></td></tr>
		<tr><td>Add ID Proofs</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-id-proofs.php'>Upload</a></center></td></td></tr>
		<tr><centre><td>Data Correction</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-corr.php'>Edit</a></center></td></td></tr>
		<tr><centre><td>Data Verification</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>Verify</a></center></td></td></tr>";
				break;
				
				case "TP":
			   $rle= "<table class='table table-bordered mb-0'><tr>
		<center><td>Generate UBN</td></center>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='generate-ubn.php'>Generate</a></center></td></td></tr>
		<tr><centre><td>Add / Upload Batch</td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-excel.php'>Add</a></center></td></td></tr>
		<tr><td>Add Candidate Photos</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-photo.php'>Upload</a></center></td></td></tr>
		<tr><td>Add ID Proofs</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-id-proofs.php'>Upload</a></center></td></td></tr>
		<tr><centre><td>Data Correction</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-batch-corr.php'>Edit</a></center></td></td></tr>
		<tr><centre><td>Data Verification</td></centre>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>Verify</a></center></td></td></tr>";
				break;
				
				case "CM":
			   $rle= "<tr><td><centre>Attendance For - ".$row["dt"]." </centre></td><td><centre>".$row["updated_at"]."</centre></td><td><center><a class='btn-sm btn-block btn-warning' href='view-can-att.php?dt=".$row["dt"]."'>View</a></centre></td></td></tr>
		";
				break;

			default:
				$rle= "User";
	}  
        echo "$rle";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>Your Data has not been Approved! Please Contact Admin</h4></center>";
}
mysqli_close($con);
?>

                    </div>
                </div>
            </div>
        <!-- Main Container Ends  -->


        <!-- Footer starts -->
        <?php include "common/footer.php"; ?>
        <!-- Footer Ends -->

    </div>
</div>

<!--Jquery.min js-->
<script src="assets/js/jquery.min.js"></script>

<!--popper js-->
<script src="assets/js/popper.js"></script>

<!--Tooltip js-->
<script src="assets/js/tooltip.js"></script>

<!--Bootstrap.min js-->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Jquery.nicescroll.min js-->
<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

<!--Scroll-up-bar.min js-->
<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

<!--mCustomScrollbar js-->
<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!--Sidemenu js-->
<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

<!--Jquery.knob js-->
<script src="assets/plugins/othercharts/jquery.knob.js"></script>

<!--Jquery.sparkline js-->
<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

<!--othercharts js-->
<script src="assets/js/othercharts.js"></script>

<!-- Chart.js -->
<script src="assets/plugins/Chart.js/dist/Chart.bundle.js"></script>

<!--Morris js-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/morris/raphael.min.js"></script>

<!-- ECharts -->
<script src="assets/plugins/echarts/echarts.js"></script>

<!-- Chartist.js -->
<script src="assets/plugins/chartist/chartist.js"></script>

<!--Scripts js-->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/dashboard5.js"></script>
<script src="assets/js/sparkline.js"></script>
<!-- Ion Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.js"></script>

<!--gallery js-->
<script src="assets/plugins/gallery/main.js"></script>

<!--DataTables js-->
<script src="assets/plugins/Datatable/js/jquery.dataTables.js"></script>
<script src="assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>

<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
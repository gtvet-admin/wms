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
	$spoc_code="";

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
        $spoc_code = $_SESSION['spoc_code'];
		
		

  

    if($role == "IP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "TP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "CM") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "LD") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    }
	if($scheme == "Flexi-MoU") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($scheme == "NAPS") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	elseif($scheme == "NEEM") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

    } 
	
  }
    //get Toast Message
    $message = "";

    if (isset($_GET['message'])) { //if message exists in GET

        $message = $_GET['message']; //Set the Variable with GET message

    }
	switch ($role) {
			case "IP":
			   $rle=  "Admin";
				break;
				
				case "TP":
			   $rle= "Training Partner";
				break;
				
				case "CM":
			   $rle= "Onsite - Trainer";
				break;
				
				case "LD":
			   $rle= "L&amp;D - Trainer";
				break;

			default:
				$rle= "User";
	}
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
		 
        ?>
        <!-- Menu Ends -->

        <!-- Main Container Starts-->

        <div class="row app-content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4>Flexi MoU - GTVET - Exams</h4></center>
                    </div>
                    <div class="card-body">
                        <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$result ="SELECT * FROM  onboarding where cen_id ='$cen_id'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'>";
      while($row = mysqli_fetch_array($result))  {
		switch ($role) {
			case "IP":
			   $rle=  "<table class='table table-bordered mb-0'><tr>
		<center><td>Add Exam Schedule</td></center>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>Add</a></center></td></td></tr>
		<tr><centre><td>Upload Marks</td>
		<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-exams-excel.php'>Upload</a></center></td></td></tr>";
				break;
				
				case "CM":
			   $rle=  "<table class='table table-bordered mb-0'><tr>
			   <center><td>1. Eligible Candidates</td></center>
			   <td><center><a class='btn-sm btn-block btn-warning btn-upload' href='view-elg-trn.php'>View</a></center></td></td></tr>
			   <tr><centre><td>2. Exam Centre Infrastructure Checklist</td>
			   <td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-exam-centre.php'>Add</a></center></td><td><center><a class='btn-sm btn-block btn-warning btn-upload' href='view-all-Flexi-MoU-infra.php'>View</a></center></td></tr>
				<tr><td>3. View Exam Schedule</td>
				<td><center><a class='btn-sm btn-block btn-warning btn-upload' href=''>View</a></center></td></tr>
				<tr><td>4. Exam Admit Cards</td>
				<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='view-admit-cards.php'>View</a></center></td></tr>
				<tr><td>5. Internal Assessment Marks Upload</td>
				<td><center><a class='btn-sm btn-block btn-warning btn-upload' href='add-exams-excel.php'>Upload</a></center></td></tr>";
				break;
				
				case "CM":
			   $rle= "<table class='table table-bordered mb-0'><tr>
			   
			   <tr></tr>";
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
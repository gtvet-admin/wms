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

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amasy - Organisation Details</title>

    <!--favicon -->
    <link rel="icon" href="cutm.ico" type="image/x-icon"/>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <!--Icons css-->
    <link rel="stylesheet" href="assets/plugins/icons.css">
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

    <!--DataTables css-->
    <link rel="stylesheet" href="assets/plugins/Datatable/css/dataTables.bootstrap4.css">

</head>

<?php
//Load body with js function if the message is not null
if ($message != "") {

    echo "<body class='app' onload='toast();'>";

} else {

    echo "<body class='app'>";

}
?>

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

        <div class="app-content">

<?php
error_reporting(E_ALL);
include 'scripts/dbcon.php';
$row_roll=mysqli_fetch_array(mysqli_query($con,"SELECT max(id) as ref_id FROM onboarding"));
$incr_id2=$row_roll['ref_id']+1;
$ctr_id="".$incr_id2;
?>

   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>View Fees &amp; Charges Details</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                        
                            <div class="col-lg-12">
                                   <div class="table-responsive">
												<table >
												
 <?php 
include ('scripts/dbcon.php');
$center_id = $_REQUEST['cen_id'];
$query = "SELECT * FROM ip_details WHERE cen_id= '$center_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

?>
               
               </table>
               <!--Tab Ends -->
                </div> <br>
                                    <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">GTVET IP ID / Client ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['cen_id']; ?>"readonly>
                                        </div>
                                    </div><div class="form-group row">
                                        <label class="col-md-3 col-form-label">Service Charge (INR) p.m.</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['serv_chrgs']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">GT Share (%) of Service Charge</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['gt_share']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Partner Share (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['partnr_share']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Training Fee (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['training_fees']; ?>"readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">SC+TF Bucket</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_add" value="<?php echo $row['sc_bckt']; ?>"readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">WC Insurer</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_distt" value="<?php echo $row['wc_ins']; ?>"readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Premium Amount (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_city" value="<?php echo $row['pr_amt']; ?>"readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">PPE Charges (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_state" value="<?php echo $row['ppe_charges']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Insurance Charges (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_state" value="<?php echo $row['ins_charges']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Charges (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_state" value="<?php echo $row['sup_charges']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">BD Charges (INR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_state" value="<?php echo $row['bd_charges']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Avg Attrition Rate (per month)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_state" value="<?php echo $row['avg_att']; ?>"readonly>
                                        </div>
                                    </div>
                                </div>
					</ul> 
                    <!--Tab Ends -->
                    <input type="hidden" class="form-control" value="<?=$cen_id ?>" name="cen_id" disabled="disabled">
                    <input type="hidden" class="form-control" value="Waiting For Go Letter" name="cen_status" disabled="disabled">
                <input type="hidden" name="tmstmp" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("y/m/d h:i:s a");?>" />
                <div class="submit mt-3 mb-3">
                                                   <!-- <input type="submit" name="submit" class="btn btn-primary btn-block" value="Proceed For Go Ahead Letter Upload">-->
												</div>
		</form>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
        <!-- Assessor Profile Ends  -->


        <!-- Footer starts -->
        <?php include "common/footer.php"; ?>
        <!-- Footer Ends -->

    </div>
</div>

<!--Toast Message Script Starts -->
<div id="snackbar"><?= $message; ?></div>
<script>
    function toast() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
    }
</script>
<!--Toast Message Script Endss-->

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
<script src="assets/assets/js/scripts.js"></script>
<script src="assets/assets/js/dashboard5.js"></script>
<script src="assets/assets/js/sparkline.js"></script>
<!-- Ion Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.js"></script>

<!--gallery js-->
<script src="assets/plugins/gallery/main.js"></script>

<!--DataTables js-->
<script src="assets/plugins/Datatable/js/jquery.dataTables.js"></script>
<script src="assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>
</body>
</html>
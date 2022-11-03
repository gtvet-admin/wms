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
    <title>GTVET</title>

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

        <div class="app-content">
<?php
include 'scripts/dbcon.php';
if(isset($_POST['save_mul']))
{		
	{
$role = $_POST["role"];
$cen_id = $_POST["cen_id"];
$scheme = 'Flexi-MoU';
$org_name = $_POST["org_name"];
$ro_email = $_POST["ro_email"];
$pc_name = $_POST["pc_name"];
$pc_desig = 'Supervisor';
$pc_mob = $_POST["pc_mob"];
$pc_alt_mob = $_POST["pc_mob"];
$pc_email = $_POST["pc_email"];
$pay_sts = $_POST["pay_sts"];
$status = $_POST["status"];
$password = $_POST["password"];
$tmstmp = $_POST["tmstmp"];
 	

		$qry="INSERT INTO `onboarding`(`role`, `scheme`, `cen_id`, `org_name`, `ro_email`, `pc_name`, `pc_desig`, `pc_mob`, `pc_alt_mob`, `pc_email`, `password`, `pay_sts`, `status`, `tmstmp`) VALUES('".$role."','".$scheme."','".$cen_id."','".$org_name."','".$ro_email."','".$pc_name."','".$pc_desig."','".$pc_mob."','".$pc_alt_mob."','".$pc_email."','".$password."','".$pay_sts."','".$status."','".$tmstmp."')";
		$sql = mysqli_query($con, $qry);
		//var_dump($qry);
		//exit;
	}

	if($sql)
	{
		?>
        <script>
		alert('Records was sucessfully inserted !!!"');
	    //window.location.href='payment.php?cen_id=<?php echo $cen_id ?>';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('error while inserting , TRY AGAIN');
		</script>
        <?php
	}
}
?>
<?
$cen_id = $_SESSION['cen_id'];
?>
<?php 
include ('scripts/dbcon.php');
$id = $_REQUEST['cen_code'];
$query = "SELECT * FROM cen_list WHERE cen_code= '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

?>
   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Assign User Role For Training Partners</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#institute_details" role="tab" aria-controls="home" aria-selected="true">Training Partner Details</a>
                            </li>
                            
                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Centre GTVET UID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="cen_id" value="<?php echo $row['cen_code']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Training Partner Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="org_name" value="<?php echo $row['cen_name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Role</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="role" value="">
											<option value="">Not Selected</option>
											<option value="TP">Training Partner</option>
											<option value="CM">On-Site Supervisor</option>
											</select>
                                        </div>
                    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="ro_email">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pc_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="pc_mob">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Alternate Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="pc_alt_mob">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Email Id</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="pc_email">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Status</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="role_status" value="">
											<option value="">Not Selected</option>
											<option value="TP">Active</option>
											<option value="CM">InActive</option>
											</select>
                                        </div>
                    
                                    </div>
                                    </div>
                                </div>
                    </ul>
                    <!--Tab Ends -->
                    <input type="hidden" class="form-control" value="GTVET@2022" name="password">
					<input type="hidden" class="form-control" value="Approved" name="pay_sts">
					<input type="hidden" class="form-control" value="Approved" name="status">
                <input type="hidden" name="tmstmp" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("d/m/y h:i:s a");?>" />
                <div class="submit mt-3 mb-3">
                                                    <input type="submit" name="save_mul" class="btn btn-primary btn-block" value="Assign User">
												</div>
												
		</form>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>

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
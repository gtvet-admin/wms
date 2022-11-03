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
    
if(isset($_POST['submit']))
{		
	{
$id = $_REQUEST['id'];
$mprId = $_POST["mprId"];
$snaId = $_POST["snaId"];
$candidateName= $_POST["candidateName"];
$fathersName= $_POST["fathersName"];
$mothersName= $_POST["mothersName"];
$dob = $_POST["dob"];
$sector_name = $_POST["sector_name"];
$sector_code = $_POST["sector_code"];
$course = $_POST["course"];
$module = $_POST["module"];
$trainingStartDate = $_POST["trainingStartDate"];	
$trainingEndDate = $_POST["trainingEndDate"];

		$sql="UPDATE `btch_2` SET `mprId` ='".$mprId."', `snaId` ='".$snaId."', `candidateName` ='".$candidateName."', `fathersName` ='".$fathersName."', `mothersName` ='".$mothersName."', `dob` ='".$dob."', `sector_name` ='".$sector_name."', `sector_code` ='".$sector_code."', `course` ='".$course."', `module` ='".$module."', `trainingStartDate`= '".$trainingStartDate."', `trainingEndDate`= '".$trainingEndDate."' WHERE id ='$id'";
		$sql = mysqli_query($con, $sql);  
	}

	if($sql)
	{
		?>
        <script>
		alert('Trainee Data was Sucessfully Updated !!!');
		window.location.href='$_SERVER['PHP_SELF']';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Error while submitting , TRY AGAIN');
		</script>
        <?php
	}
}
?>
<?
$cen_id = $_SESSION['cen_id'];
?>
   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Add Trainee Details</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#institute_details" role="tab" aria-controls="home" aria-selected="true"></a>
                            </li>
                            
                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Trainee ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mprId" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Trainee Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="candidateName">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Father Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="fathersName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Mother Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mothersName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Gender</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="gender" value="">
											<option value="">Not Selected</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Female">Others</option>
											</select>
                                        </div>
                    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email Id</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Guardian Mobile No.</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="gmobile">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Qualification</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="qual">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Passing year</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="passing_year">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Account Available?</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bank_acc">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="b_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="acc_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="b_acc_no">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Branch Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="br_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">IFSC Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ifsc">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Proof Type</label>
                                        <div class="col-md-4">
											
                                            <select class="form-control" name="gender" value="">
											<option value="">Not Selected</option>
											<option value="Adhaar Card">Adhaar Card</option>
											<option value="PAN Card">PAN Card</option>
											</select>
                                        </div>
                    
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Proof Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="id_proof_num">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="per_add" ></textarea>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">State</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_state">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">District</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_distt">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Pin Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Duration</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Session</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin">
                                        </div>
                                    </div>

                                    </div>
                                </div>
                    </ul>
                    <!--Tab Ends -->
                    <input type="hidden" class="form-control" value="<?php echo $cen_id ?>" name="cen_id">
                <input type="hidden" name="tmstmp" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("y/m/d h:i:s a");?>" />
                <div class="submit mt-3 mb-3">
                                                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Record">
												</div>
												<div class="submit mt-3 mb-3">
                                                   <a class="btn btn-primary btn-block" href="edit-batch-corr.php?pr_abn_no=<?php echo $abn;?>">Go To Previous Page</a>
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
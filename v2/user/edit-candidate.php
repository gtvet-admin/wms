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
 <?php 
include ('scripts/dbcon.php');
$mprId = $_REQUEST['mprId'];
$query = "SELECT * FROM btch_2 WHERE mprId= '$mprId'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$abn = $row['ubn_no'];

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
                        <h4>Edit Trainee Details</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Trainee ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mprId" value="<?php echo $row['mprId']; ?>" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Trainee Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="candidateName" value="<?php echo $row['fname']; ?>&nbsp;<?php echo $row['mname']; ?>&nbsp;<?php echo $row['lname']; ?>" autocomplete="off" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Father Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="fathersName" value="<?php echo $row['fathersName']; ?>" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Mother Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mothersName" value="<?php echo $row['mothersName']; ?>" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Gender</label>
                                        <div class="col-md-4">
											<?php $gender = trim( strtolower($row['gender']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($gender== "") echo "selected"; ?>>Not Selected</option>
											<option value="Male" <?php if($gender== "male") echo "selected"; ?>>Male</option>
											<option value="Female" <?php if($gender== "female") echo "selected"; ?>>Female</option>
											</select>
                                        </div>
                    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Religion</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="religion" value="<?php echo $row['religion']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email Id</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Guardian Mobile No.</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="gmobile" value="<?php echo $row['gmobile']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Annual Income</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ann_incme" value="<?php echo $row['ann_incme']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Qualification</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="qual" value="<?php echo $row['qual']; ?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Passing year</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="passing_year" value="<?php echo $row['passing_year']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Account Available?</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bank_acc" value="<?php echo $row['bank_acc']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="b_name" value="<?php echo $row['b_name']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="acc_name" value="<?php echo $row['acc_name']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="b_acc_no" value="<?php echo $row['b_acc_no']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Branch Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="br_name" value="<?php echo $row['br_name']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">IFSC Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ifsc" value="<?php echo $row['ifsc']; ?>">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Proof Type</label>
                                        <div class="col-md-4">
											<?php $id_proof = trim( strtolower($row['id_proof_type']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($id_proof== "") echo "selected"; ?>>Not Selected</option>
											<option value="Adhaar Card" <?php if($id_proof== "adhaar-card") echo "selected"; ?>>Adhaar Card</option>
											<option value="PAN Card" <?php if($id_proof== "pan-card") echo "selected"; ?>>PAN Card</option>
											</select>
                                        </div>
                    
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Proof Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="id_proof_num" value="<?php echo $row['id_proof_num']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ID Proof Image</label>
                                        <div class="col-md-9">
                                            <img src="http://127.0.0.1/gtvet/<?php echo $row['id_proof_url']; ?>" style="width:250px; height:200px ">
											</br><a href="<?php echo $row['id_proof_url']; ?>" target="_blank">View</a>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="per_add" readonly><?php echo $row['per_add']; ?></textarea>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">State</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_state" value="<?php echo $row['per_state']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">District</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_distt" value="<?php echo $row['per_distt']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Pin Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['per_pin']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Permanent Address Proof Image</label>
                                        <div class="col-md-9">
                                            <img src="http://127.0.0.1/gtvet/<?php echo $row['per_proof_url']; ?>" style="width:250px; height:200px ">
											</br><a href="<?php echo $row['per_proof_url']; ?>" target="_blank">View</a>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Passing Certificate Proof Image</label>
                                        <div class="col-md-9">
                                            <img src="http://127.0.0.1/gtvet/<?php echo $row['pass_cert_url']; ?>" style="width:250px; height:200px ">
											</br><a href="<?php echo $row['pass_cert_url']; ?>" target="_blank">View</a>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Bank Proof Image</label>
                                        <div class="col-md-9">
                                            <img src="http://127.0.0.1/gtvet/<?php echo $row['bank_proof_url']; ?>" style="width:250px; height:200px ">
											</br><a href="<?php echo $row['bank_proof_url']; ?>" target="_blank">View</a>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Learning Programme</label>
                                        <div class="col-md-4">
											<?php $lern_prog = trim( strtolower($row['lern_prog']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($lern_prog== "") echo "selected"; ?>>Not Selected</option>
											<option value="Adhaar Card" <?php if($lern_prog== "adhaar-card") echo "selected"; ?>>Demo Programme 1</option>
											<option value="PAN Card" <?php if($lern_prog== "pan-card") echo "selected"; ?>>Demo Programme 2</option>
											</select>
                                        </div>
                    
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['lern_course']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Duration</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cou_dur']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Course Session</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cou_sess']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Employment Status</label>
                                        <div class="col-md-9">
											<?php $emp_status = trim( strtolower($row['emp_status']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($emp_status== "") echo "selected"; ?>>Not Selected</option>
											<option value="Yes" <?php if($emp_status== "yes") echo "selected"; ?>>Yes</option>
											<option value="No" <?php if($emp_status== "no") echo "selected"; ?>>No</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Employment Status Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['emp_sts_dt']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Employee Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['emp_code']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Company Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cmp_name']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Company Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cmp_add']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Company State</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cmp_state']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Company Location</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cmp_loc']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Client ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['cl_id']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Date of Joining</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['yoj']; ?>/<?php echo $row['moj']; ?>/<?php echo $row['doj']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Designation</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['desig']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Sector</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['sector']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Specialization</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['specs']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Currently Monthly Salary</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['mnth_sal']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">UAN</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['uan']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ESIC</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['esic']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Work Experience</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['work_exp']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Contract Staff</label>
                                        <div class="col-md-9">
                                            <?php $con_staff  = trim( strtolower($row['con_staff']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($con_staff== "") echo "selected"; ?>>Not Selected</option>
											<option value="Yes" <?php if($con_staff== "yes") echo "selected"; ?>>Yes</option>
											<option value="No" <?php if($con_staff== "no") echo "selected"; ?>>No</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Registered under NEEM</label>
                                        <div class="col-md-9">
                                            <?php $reg_neem  = trim( strtolower($row['reg_neem']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($reg_neem== "") echo "selected"; ?>>Not Selected</option>
											<option value="Yes" <?php if($reg_neem== "yes") echo "selected"; ?>>Yes</option>
											<option value="No" <?php if($reg_neem== "no") echo "selected"; ?>>No</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Registered under NAPS</label>
                                        <div class="col-md-9">
                                            <?php $reg_naps  = trim( strtolower($row['reg_naps']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($reg_naps== "") echo "selected"; ?>>Not Selected</option>
											<option value="Yes" <?php if($reg_naps== "yes") echo "selected"; ?>>Yes</option>
											<option value="No" <?php if($reg_naps== "no") echo "selected"; ?>>No</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Registered under Flexi-MoU</label>
                                        <div class="col-md-9">
                                            <?php $reg_flexi  = trim( strtolower($row['reg_flexi']) ); ?>
                                            <select class="form-control" name="gender" value="">
											<option value="" <?php if($reg_flexi== "") echo "selected"; ?>>Not Selected</option>
											<option value="Yes" <?php if($reg_flexi== "yes") echo "selected"; ?>>Yes</option>
											<option value="No" <?php if($reg_flexi== "no") echo "selected"; ?>>No</option>
											</select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">NEEM Portal ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['reg_neem_no']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">NAPS Portal ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['reg_naps_no']; ?>"readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Flexi-MoU Portal ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="per_pin" value="<?php echo $row['reg_flexi_no']; ?>"readonly>
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
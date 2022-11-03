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
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "TP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "CM") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

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

			default:
				$rle= "User";
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

            
            <?php 
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$query = "SELECT * FROM `onboarding` WHERE cen_id= '$cen_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$pass = $row['password'];
$opass = substr_replace($pass, str_repeat('*', strlen($pass)-4), 1, -4);
       
?>
        <div class="row app-content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4>Change Password</h4></center>
                    </div>
                    <div class="card-body">
                        <form method="post" action="scripts/change-password.php">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Current Password</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$opass;?>"  readonly>
                                    </div>
                                </div><div class="form-group row">
                                    <label class="col-md-3 col-form-label"></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?=$cen_id;?>"  readonly>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-3 col-form-label">New Password</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="password" name="password" onkeyup='check();' required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="example-email">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="confirm_password" id="confirm_password"  onkeyup='check();' required>
                                </div>
                                </div>
                                <center><span id="message" style="font-family: 'Ubuntu Mono'; font-size: 24px;"></span></center>
                                <center><input type="submit" class="btn btn-primary btn-block btn-flat" id="submit" value="Update Password"></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container Ends  -->


        <!-- Footer starts -->
        <?php include "common/footer.php"; ?>
        <!-- Footer Ends -->

   <div id="snackbar"><?= $message; ?></div>
<script>
    function toast() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
    }
</script>
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
<script>
    $(function(e) {
        $('#example').DataTable();
    } );

    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Characters matched.';
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Characters are different.';
            document.getElementById('submit').disabled = true;
        }
    }
</script>
</body>
</html>
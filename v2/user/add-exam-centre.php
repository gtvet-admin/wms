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
		alert('Exam Centre Data was Sucessfully Created !!!');
		window.location.href='add-exam-infra.php?cen_code=<?=$cen_code;?>';
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
                        <h4>Add Exam Centre Details - Step - 1</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">

                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Exam Centre ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mprId" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Exam Centre Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="candidateName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Full Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="4" cols="50" name="mobile"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Authorized Person Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Authorized Person Mobile No.</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" pattern="[0-9]{10}" minlength="10" maxlength="10" name="gmobile">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Authorized Person Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="qual">
                                        </div>
                                    </div>
									
									
									</div>
                                </div>
                    </ul>
                    <!--Tab Ends -->
                    <input type="hidden" class="form-control" value="<?php echo $cen_id ?>" name="cen_id">
                <input type="hidden" name="tmstmp" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("y/m/d h:i:s a");?>" />
                <div class="submit mt-3 mb-3">
                                                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create Record">
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
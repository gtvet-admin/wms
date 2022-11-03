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
		<title>DGT :: Flexi MoU</title>

		<!--Favicon -->
		<link rel="icon" href="cutm.ico" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">
        <link href="assets/js/selectstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<style>
@charset "UTF-8";
/* CSS Document * Varun Dewan 2019 */


.drop {
  position: relative;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.drop.open {
  z-index: 100;
}
.drop.open .drop-screen {
  z-index: 100;
  display: block;
}
.drop.open .drop-options {
  z-index: 200;
  max-height: 200px;
}
.drop.open .drop-display {
  z-index: 200;
  border-color: #000;
}
.drop select {
  display: none;
}
.drop .drop-screen {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  opacity: 0;
  display: none;
  z-index: 1;
}
.link {
  text-align: center;
  margin: 20px 0px;
  color:#000;
}
.drop .drop-display {
  position: relative;
  padding: 0px 20px 5px 5px;
  width: 100%;
  background: #FFF;
  z-index: 1;
  margin: 0px;
  font-size: 16px;
  min-height: 58px;
}
.drop .drop-display:hover:after {
  opacity: 0.75;
}
.drop .drop-display:after {
  font-family: 'Material Icons';
  content: "\e5c6";
  position: absolute;
  right: 10px;
  top: 12px;
  font-size: 24px;
  color: #000;
}
.drop .drop-display .item {
  position: relative;
  display: inline-block;
  border: 2px solid #333;
  margin: 5px 5px -4px 0px;
  padding: 0px 25px 0px 10px;
  overflow: hidden;
  height: 40px;
  line-height: 36px;
}
.drop .drop-display .item .btnclose {
  color: #000;
  position: absolute;
  font-size: 16px;
  right: 5px;
  top: 10px;
  cursor: pointer;
}
.drop .drop-display .item .btnclose:hover {
  opacity: 0.75;
}
.drop .drop-display .item.remove {
  -webkit-animation: removeSelected 0.2s, hide 1s infinite;
  animation: removeSelected 0.2s, hide 1s infinite;
  -webkit-animation-delay: 0s, 0.2s;
  animation-delay: 0s, 0.2s;
}
.drop .drop-display .item.add {
  -webkit-animation: addSelected 0.2s;
   animation: addSelected 0.2s;
}
.drop .drop-display .item.hide {
  display: none;
}
.drop .drop-options {
  background: #000;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
  position: absolute;
  width: 100%;
  max-height: 0px;
  overflow-y: auto;
  transition: all 0.25s linear;
  z-index: 1;
}
.drop .drop-options a {
  display: block;
  height: 40px;
  line-height: 40px;
  padding: 0px 20px;
  color: white;
  position: relative;
  max-height: 40px;
  transition: all 1s;
  overflow: hidden;
}
.drop .drop-options a:hover {
  background: #5bc7e7;
  cursor: pointer;
}
.drop .drop-options a.remove {
  -webkit-animation: removeOption 0.2s;
          animation: removeOption 0.2s;
  max-height: 0px;
}
.drop .drop-options a.add {
  -webkit-animation: addOption 0.2s;
          animation: addOption 0.2s;
}
.drop .drop-options a.hide {
  display: none;
}
@-webkit-keyframes pop {
  from {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes pop {
  from {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
           transform: scale(1);
  }
}
@-webkit-keyframes removeOption {
  from {
    max-height: 40px;
  }
  to {
    max-height: 0px;
  }
}
@keyframes removeOption {
  from {
    max-height: 40px;
  }
  to {
    max-height: 0px;
  }
}
@-webkit-keyframes addOption {
  from {
    max-height: 0px;
  }
  to {
    max-height: 40px;
  }
}
@keyframes addOption {
  from {
    max-height: 0px;
  }
  to {
    max-height: 40px;
  }
}
@-webkit-keyframes removeSelected {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  to {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
}
@keyframes removeSelected {
  from {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  to {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
}
@-webkit-keyframes addSelected {
  from {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes addSelected {

 from {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@-webkit-keyframes hide {
  from, to {
    max-height: 0px;
    max-width: 0px;
    padding: 0px;
    margin: 0px;
    border-width: 0px;
  }
}
@keyframes hide {
  from, to {
    max-height: 0px;
    max-width: 0px;
    padding: 0px;
    margin: 0px;
    border-width: 0px;
  }
}

#hidden_div {
    display: none;
}
</style>

</style>
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
    include 'scripts/dbcon.php';
    
if(isset($_POST['submit']))
{		
	{
$id = $_REQUEST['cen_code'];
$name = $_POST["spoc_name"];
$mob = $_POST["spoc_mob"];	
$email = $_POST["spoc_email"];

		$sql="UPDATE `cen_list` SET `spoc_name` ='".$name."', `spoc_mob`= '".$mob."', `spoc_email`= '".$email."' WHERE cen_code ='$id'";
		$sql = mysqli_query($con, $sql);  
	}

	if($sql)
	{
		?>
        <script>
		alert('SPOC Record was sucessfully updated !!!');
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
$id = $_REQUEST['cen_code'];
$query = "SELECT * FROM cen_list a INNER JOIN cou_ass b ON a.cen_code = b.cen_code WHERE a.cen_code= '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

?>
<?php
include 'scripts/dbcon.php';
$row_roll=mysqli_fetch_array(mysqli_query($con,"SELECT max(id) as ref_id FROM cen_list"));
$incr_id2=$row_roll['ref_id']+1;
$itc_id="0".$incr_id2;
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
                        <h4>Add ITC Details</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post" id="foo_form">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC UID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="<?php echo $cen_id ?>-<?=$itc_id;?>" autocomplete="off" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" autocomplete="off" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"  autocomplete="off">
                                        </div>
                                    </div>
									
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC SPOC Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="spoc_name" autocomplete="off">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC SPOC Contact No</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="spoc_mob" autocomplete="off">
                                        </div>
										<div class="col-md-3">
                                            <input type="button" value="Verify" class="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC SPOC Email ID</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="spoc_email" autocomplete="off">
                                        </div>
										<div class="col-md-3">
                                            <input type="button" value="Verify" class="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">ITC Courses Alloted</label>
                                        <div class="col-md-9">   
                                        <select id="myMulti" class="form-control" required>
                                                <option value="">Select Course</option>
                                                <?php
				                                 include 'scripts/db-connect.php';
                                                //Get all the states
						                        $itp_code = $_GET['itc_code'];
                                                $getSchemeDataQuery = "SELECT * FROM `cou_ass` WHERE tp_code = '$itp_code' GROUP BY cou_code";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0) {
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
                                                        <option value="<?=$getSchemeData['cou_name'];?> (<?=$getSchemeData['cou_code'];?>)"><?=$getSchemeData['cou_name'];?> (<?=$getSchemeData['cou_code'];?>)</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
				   							</select>
                                    </div>
									</div>
                                    </div>
                                </div>
                    </ul>
					<div class="submit mt-3 mb-3">
                                                    <input disabled="disabled"type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Record">
												</div>
                    <!--Tab Ends -->
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
<script src="assets/js/jquery.min.js"></script>
<!--Jquery.min js-->

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
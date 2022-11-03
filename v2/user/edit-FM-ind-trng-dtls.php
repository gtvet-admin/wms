<?php

    //Start Session
    session_start();

    //Connect to the Database
    include "scripts/db-connect.php";

    //Declare Variables
    $username = "";
    $role = "";
    $org_name ="";
    $id = "";
    $cen_id="";

    //check if session is already set
    if(!isset($_SESSION['bazooka'])) { //If yes

        //Redirect to dashboard
        header('Location:login.php');


    } else {

        //get data from Session
        $username = $_SESSION['bazooka'];
        $role = $_SESSION['scheme'];
        $org_name = $_SESSION['org_name'];
        $id = $_SESSION['id'];
		$cen_id = $_SESSION['cen_id'];

    }

    if($role = "DDUGKY") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);

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
        if($role == "DDUGKY") {

            include "scripts/navbar-ddugky.php";

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
$center_id = $_POST["center_id"];
$cen_pr_id = $_POST["cen_pr_id"];	
$cen_name = $_POST["cen_name"];

		$sql="UPDATE `centers` SET `center_id` ='".$center_id."', `cen_pr_id`= '".$cen_pr_id."', `cen_name`= '".$cen_name."' WHERE id ='$id'";
		$sql = mysqli_query($con, $sql);  
	}

	if($sql)
	{
		?>
        <script>
		alert('Project Record was sucessfully updated !!!');
		window.location.href='view-all-projects.php';
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
$id = $_REQUEST['id'];
$query = "SELECT * FROM centers WHERE id= '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

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
                        <h4>Edit Project Details</h4>
                    </center>
                </div>
                <div class="card-body">

                    <!--Tab Starts -->
                    <form method="post">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#institute_details" role="tab" aria-controls="home" aria-selected="true">Edit Project Details</a>
                            </li>
                            
                            <div class="col-lg-12">
                                   <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Center ID (As Per MPR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="center_id" value="<?php echo $row['center_id']; ?>" autocomplete="off" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">   
                                        <label class="col-md-3 col-form-label">Scheme</label>
                                        <div class="col-md-9">
                                                <?php
                                                //Get all the states
                                                $getSchemeDataQuery = "SELECT * FROM `onboarding` WHERE cen_id ='$cen_id'";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0) {
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
                                                        <input type="text" name="scheme" class="form-control" value="<?=$getSchemeData['scheme'];?>" readonly>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Project ID (As Per MPR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="<?php echo $row['cen_pr_id']; ?>" autocomplete="off" name="cen_pr_id" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Name of The Center (As Per MPR)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="<?php echo $row['cen_name']; ?>" autocomplete="off" name="cen_name" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">PRN No.</label>
                                        <div class="col-md-9">
                                            <?php
                                                //Get all the states
                                                $getSchemeDataQuery = "SELECT * FROM `onboarding` WHERE cen_id ='$cen_id'";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0) {
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
                                                        <input type="text" name="prn" class="form-control" value="<?=$getSchemeData['prn'];?>" readonly>
                                                        <?php
                                                    }
                                                }
                                                ?>
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
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
	$name="";
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
        $name = $_SESSION['name'];
        $spoc_code = $_SESSION['spoc_code'];

  

    if($role == "IP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['pc_name'];

    } 
	elseif($role == "TP") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `spoc_code` = '$spoc_code'";
        $selectUserQueryResult = $conn->query($selectUserQuery);
		$Data = $selectUserQueryResult->fetch_assoc();
        $name = $Data['spoc_name'];

    } 
	elseif($scheme == "CM") {

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

?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GTVET</title>

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
		elseif($role == "LD") {

            include "scripts/navbar-ld.php";

        }
		 
        ?>
        <!-- Menu Ends -->

        <div class="app-content">
            <?php 
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$query = "SELECT * FROM notice WHERE status= '1'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$notice = $row['text'];
?>
<section class="section">
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-20 text-white">
                <div class="card-body text-center profile-bg" style="background: linear-gradient(rgba(1,0,0,0.9),rgba(0,0,0,0.5)), url(assets/img/assessor-profile/background/exam-paper.jpg) center;">
                    <div class="text-center">
                        <div class="userprofile social">
                            <div class="userpic"> <img src="assets/img/assessor-profile/user.png" alt="" class="userpicimg"> </div>
                            <h2>Welcome Onboard!</h2>
                            <h3 class="username"><?=$name;?></h3>
							</br>
							<?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM opt_scheme where cen_id ='$cen_id' GROUP BY scheme_name";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<h3>Your Opted Programmes are";
      while($row = mysqli_fetch_array($result))  { 
        echo " ".$row['scheme_name'].", ";
    }
    echo "";
} else {
    echo "";
}
?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               
                <div class="card-header">
                   
                    <center>
                        <h4>Notice / Updates For You <?=$name;?></h4>
                        <!--                            <p>Owner/Director/MD/CMD/Managing Trustee</p>-->
                    </center>
                </div>
                <div class="card-body">
                   <div class="card-header">
										<marquee><h2 style="color: #ff8f51"><?php echo $notice ?></h2></marquee>	
										</div>             
            </div>
        </div>
    </div>
</div>
        <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               
                <div class="card-header">
                   
                    <center>
                        <h4>Particulars of the ITC (Industry Training Centres)</h4>
                        <!--                            <p>Owner/Director/MD/CMD/Managing Trustee</p>-->
                    </center>
                </div>
                <div class="card-body">
                   <div class="card-header">
											
										</div>
                    <div class="table-responsive">
												<table >
               <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$result ="SELECT * FROM onboarding where cen_id ='$cen_id' GROUP BY cen_id";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0 text-nowrap'><thead><tr class='bg-primary'><th>GTVET UID</th><th>ITC Name</th><th>Contact Person</th><th>Contact Email ID</th><th>Contact Mobile No</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
        echo "<tr><td>".$row["cen_id"]."</td><td>".$row["org_name"]."</td><td>".$row["pc_name"]."</td><td>".$row["pc_email"]."</td><td>".$row["pc_mob"]."</td></tr>";
    }
    echo "</div></table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin!</h4></center>";
}
mysqli_close($con);
?>
               
               </table>
               <!--Tab Ends -->
                </div>
                
            </div>
        </div>
    </div>
</div>
        <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               
                <div class="card-header">
                   
                    <center>
                        <h4>Summary for <?=$rle;?> Candidates</h4>
                        <!--                            <p>Owner/Director/MD/CMD/Managing Trustee</p>-->
                    </center>
                </div>
                <div class="card-body">
                   <div class="card-header">
											
										</div>
                    <div class="table-responsive">
<table >
<?php
include ('scripts/dbcon.php');
$scheme = $_SESSION['scheme']; 
$result ="SELECT *, COUNT(cen_id) as total, COUNT(CASE WHEN emp_status = 'Dropped Out' THEN '1' ELSE NULL END) as dropouts, COUNT(CASE WHEN emp_status = 'Continuing' THEN 1 ELSE NULL END) as approved FROM btch_2 WHERE cen_id='$cen_id'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Total Candidates Enrolled</th><th>Total Certified</th><th>Total Trained</th><th>Total Dropouts</th></tr></thead>";
             while($row = mysqli_fetch_array($result))  { 
echo "<tr><td><a style='color:#1a9aa7' href='view-all-batch.php?scheme=DDUGKY'>".$row["total"]."</a></td><td>0</td><td><a style='color:#1a9aa7' href='view-approved-batch.php?scheme=DDUGKY'>".$row["approved"]."</a></td></td><td><a style='color:#1a9aa7' href='view-rejected-batch.php?scheme=DDUGKY'>
".$row["dropouts"]."</a></td></tr>";
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
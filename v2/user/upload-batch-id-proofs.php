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
    <title>Flexi-Mou - GTVET</title>

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
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$query = "SELECT * FROM `btch_1` WHERE cen_id= '$cen_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$prabn = $row['ubn_no'];
       
?>

   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Upload ID Proofs of Candidates</h4>
                    </center>
                </div>
                <div class="card-body">
                                      
            <?php
include ('scripts/dbcon.php');
$prabn = $_REQUEST['cen_id'];
$result ="SELECT *, mprId as mpr, (CASE WHEN bank_proof_url = 'pdf.png' THEN 'Photo Not Uploaded' ELSE 'Uploaded' END) as bnk,(CASE WHEN per_proof_url = 'pdf.png' THEN 'Photo Not Uploaded' ELSE 'Uploaded' END) as per, (CASE WHEN pass_cert_url = 'pdf.png' THEN 'Photo Not Uploaded' ELSE 'Uploaded' END) as pass FROM btch_2 WHERE cen_id ='$prabn' AND emp_status = 'Continuing'";
$result=mysqli_query($con,$result);
$i=1;
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table id= 'example' class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Sl No.</th><th>Candidate ID</th><th>Candidate Name</th><th>Father Name</th><th>Permanent Address Proof</th><th>Passing Certificate</th><th>Bank Proof</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
	  $mprId = $row['mprId'];
          $per_btn="";
		  
		  switch ($row['per']) {
			case "Photo Not Uploaded":
			   $per_btn=  "<td><p style='color:red;'>Not Uploaded</p><a href='upload-batch-id-proofs-peradd.php?mprId=".$row['mpr']."'>Upload Now</a></td>";
				break;
				
				case "Batch Freezed":
			   $per_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Batch Freeze</a></td>";
				break;
				
				case "Uploaded":
			   $per_btn= "<td><p style='color:green;'>Yes</p><a href='".$row['per_proof_url']."'>View</a></td>";
				break;

			default:
				$per_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Contact Admin</a></td>";
		  } 
		  
		  $pass_btn="";
		  
		  switch ($row['pass']) {
			case "Photo Not Uploaded":
			   $pass_btn=  "<td><p style='color:red;'>Not Uploaded</p><a href='upload-batch-id-proofs-qual.php?mprId=".$row['mpr']."'>Upload Now</a></td>";
				break;
				
				case "Batch Freezed":
			   $pass_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Batch Freeze</a></td>";
				break;
				
				case "Uploaded":
			   $pass_btn= "<td><a style='color: green;'>Yes</a></br><a href='".$row['pass_cert_url']."'>View</a></td>";
				break;

			default:
				$pass_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Contact Lead Co-ordinator </a></td>";
		  } 
		  
		  $bnk_btn="";
		  
		  switch ($row['bnk']) {
			case "Photo Not Uploaded":
			   $bnk_btn=  "<td><p style='color:red;'>Not Uploaded</p><a href='upload-batch-id-proofs-bnk.php?mprId=".$row['mpr']."'>Upload Now</a></td>";
				break;
				
				case "Batch Freezed":
			   $bnk_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Batch Freeze</a></td>";
				break;
				
				case "Uploaded":
			   $bnk_btn= "<td><a style='color: green;'>Yes</a></br><a href='".$row['bank_proof_url']."'>View</a></td>";
				break;

			default:
				$bnk_btn= "<td style='background-color:blue;'><a style='color: #fff;'>Contact Lead Co-ordinator </a></td>";
		  } 
          
        echo "<tr><td>".$i."</td><td>".$row['mpr']."</td><td>".$row["fname"]."&nbsp;".$row["mname"]."&nbsp;".$row["lname"]."</td><td>".$row["fathersName"]."</td>$per_btn$pass_btn$bnk_btn</tr>";
    $i++;
	}
	
    echo "</div></table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin For!</h4></center>";
}
mysqli_close($con);
?>
         

        </tbody>
    </table>
                          
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

<!--Jquery.min js-->

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
<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>
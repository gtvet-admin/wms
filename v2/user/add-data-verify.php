<?php

    //Start Session
    session_start();

    //Connect to the Database
    include "scripts/db-connect.php";

    //Declare Variables
    $role = "";
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
        $role = $_SESSION['scheme'];
        $org_name = $_SESSION['org_name'];
        $cen_id = $_SESSION['cen_id'];

  

    if($role == "DDUGKY") {

        //Get User Information from database
        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";
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

        <!-- Main Container Starts-->

        <div class="row app-content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4>Your Batches Pending For Data Verification</h4></center>
                    </div>
                    <div class="card-body">
                  
                    <br/>
                   <h5>Steps to Verify Batch.</h5>
                         
                         <li>1. If you See The Batch Status Tab as "No".</li>
                         <li>2. Kindly Verify the Batch By Clicking "View and Verify"</li>
                         <li>3. Please check all the Data Filled By You Through Excel Sheet and Photo of the Candidate.</li>
                         <li>4. Click on the Confirm Batch Button on the Top of Batch.</li>
                         <li style="color:red">Please Note: If Batch Confirm Status Tab is "No" and is not confirmed by you, CUTM is not liable and will not be able to do assessment in any case or manner.</li>
                         
                         <li>You are done!</li>
                    
                </div>
                    <div class="card-body">
                        <section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];					
$result ="SELECT *, (CASE WHEN b.photo = 'no-image.png' THEN 'Photo Not Uploaded' WHEN a.cnf_status = 'No' THEN 'Batch Not Verified' ELSE 'Batch Data Freezed' END) as phto FROM btch_1 a INNER JOIN btch_2 b ON a.pr_abn_no = b.pr_abn_no INNER JOIN course c ON a.cen_pr_id = c.cen_pr_id where a.cen_id ='$cen_id' GROUP BY a.pr_abn_no ";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
		
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>ABN No.</th><th>Photo Uploaded Status</th><th>Batch Confirm Status</th><th>Verify &amp; Confirm</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
		  $verify_btn="";
		  
		  switch ($row['phto']) {
			    case "Photo Not Uploaded":
			   $verify_btn=  "<td style='background-color: yellow;'><a style='color: #000;'href='upload-batch-photo.php?pr_abn_no=".$row["pr_abn_no"]."'>Upload Photo First</a></td>";
				break;
				
				case "Batch Not Verified":
			   $verify_btn=  "<td style='background-color: #00ff14;'><a style='color: #000;' href='view-verify-batch.php?pr_abn_no=".$row["pr_abn_no"]."'>View & Verify</a></td>";
				break;

			default:
				$verify_btn= "<td style='background-color: blue;'><a style='color: #fff;'>Batch Data Freezed</a></td>";
		  }
		  
        echo "<tr><td>".$row["pr_abn_no"]."</td><td>".$row["phto"]."</td><td>".$row["cnf_status"]."</td>".$verify_btn."</tr>";
    }
    echo "</div></table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin!</h4></center>";
}
mysqli_close($con);
?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container Ends  -->


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

<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
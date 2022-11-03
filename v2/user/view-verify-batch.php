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
                        <center><h4>Your Batches Pending For Verification / Payments</h4></center>
                    </div>
                    <div class="card-body">
                       <?php
include ('scripts/dbcon.php');
$cen_id = $_REQUEST['pr_abn_no'];					
$result ="SELECT *, count(DISTINCT b.id) as ttl_stud, count(DISTINCT b.id)*800 as ttl_amt FROM  btch_1 a INNER JOIN btch_2 b ON a.pr_abn_no = b.pr_abn_no where a.pr_abn_no ='$cen_id'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
		
    echo "<table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Batch Confirmation Status</th><th>Date / Time</th><th>&nbsp;</th>";
      while($row = mysqli_fetch_array($result))  { 
        echo "<tr><td>".$row["cnf_status"]."</td><td>".$row["cnf_tmstmp"]."</td><td><a href='scripts/btch-tmstmp.php?pr_abn_no=".$row["pr_abn_no"]."' onclick='return checkReject()'><button class='btn-sm btn-block btn-success btn-upload'>Confirm Batch</button></a></td></tr>";
    }
    echo "</table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin!</h4></center>";
}
mysqli_close($con);
?>
                        <?php
include ('scripts/dbcon.php');
$prabn = $_REQUEST['pr_abn_no'];					
$result ="SELECT * FROM btch_2 where pr_abn_no ='$prabn'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
		
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>SL No.</th><th>MPR ID</th><th>SNA ID</th><th>Candidate Photo</th><th>Name</th><th>Father Name</th><th>Mother Name</th><th>DOB</th><th>Gender</th><th>Religion</th><th>Category</th><th>Nationality</th><th>Gen Qual.</th><th>Address</th><th>State</th><th>District</th><th>City</th><th>Pincode</th><th>Mobile</th><th>Email</th><th>Sector Name</th><th>Sector Code</th><th>Course Name</th><th>Course Code</th><th>Adhaar No</th><th>Class Start Date</th><th>Class End Date</th><th>No. of Training Hours</th><th>No. of OJT Hours</th><th>Total No of Hours</th><th>Total No of Days</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
        echo "<tr><td>".$row["id"]."</td><td>".$row["mprId"]."</td><td>".$row["snaId"]."</td><td>"."<img src='https://od.cutmams.in/120/".$row['photo']."' width='100' height='120'/>"."</td><td>".$row["candidateName"]."</td><td>".$row["fathersName"]."</td><td>".$row["mothersName"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["religion"]."</td><td>".$row["category"]."</td><td>".$row["nationality"]."</td><td>".$row["generalQualification"]."</td><td>".$row["address"]."</td><td>".$row["state"]."</td><td>".$row["district"]."</td><td>".$row["city"]."</td><td>".$row["pinCode"]."</td><td>".$row["mobile"]."</td><td>".$row["email"]."</td><td>".$row["sector_name"]."</td><td>".$row["sector_code"]."</td><td>".$row["course"]."</td><td>".$row["module"]."</td><td>".$row["uid"]."</td><td>".$row["trainingStartDate"]."</td><td>".$row["trainingEndDate"]."</td><td>".$row["trainingHours"]."</td><td>".$row["ojtHours"]."</td><td>".$row["totalHours"]."</td><td>".$row["totalDays"]."</td></tr>";
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
<script language="JavaScript" type="text/javascript">
function checkReject(){
    return confirm('Are you sure want to Confirm Batch <?=$prabn?>, Once Confirmed You Wont be able to make any changes!');
}
</script>
<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
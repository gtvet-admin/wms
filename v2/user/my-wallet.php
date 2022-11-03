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
                        <center><h4>Wallet Details</h4></center>
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
$result ="SELECT *, count(b.pr_abn_no) as ttl_stud FROM btch_1 a INNER JOIN btch_2 b ON a.pr_abn_no = b.pr_abn_no where a.cen_id ='$cen_id' GROUP BY a.cen_id ";
 
$result=mysqli_query($con,$result);
$totalamt = 0;
    if ($result->num_rows > 0) {

    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0 '><thead><tr class='bg-primary'><th>Amasy ID</th><th>Centre Name</th><th>Amount Paid For Total Candidates</th><th>Total Amount Paid Till Date</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
		  
		  switch ($role) {
    case "CORPORATES":
            $amount = $row['ttl_stud'] * 800;
            $gst = 18;
            $amount += $amount*($gst/100);
        break;
    case "DDUGKY":
        $amount = $row['ttl_stud'] * 800;
        break;
    default:
         $amount = $row['ttl_stud'] * 800;
}

$totalamt += $amount;
 


        echo "<tr><td>".$row["cen_id"]."</td><td>".$row["cen_name"]."</td><td>".$row["ttl_stud"]."</td><td>".'₹'.''.$totalamt."</td></tr>";
    }
    echo "</div></table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin!</h4></center>";
}
mysqli_close($con);
?>                   <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];					
$result ="SELECT *, count(b.pr_abn_no) as ttl_stud FROM btch_1 a INNER JOIN btch_3 b ON a.pr_abn_no = b.pr_abn_no where a.cen_id ='$cen_id' GROUP BY a.cen_id ";
 
$result=mysqli_query($con,$result);
$totalamt = 0;
    if ($result->num_rows > 0) {

    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0 '><thead><tr class='bg-primary'><th>Amasy ID</th><th>Centre Name</th><th>No. of Candidate Assessed</th><th>Total Amount Used Till Date</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
		  
		  switch ($role) {
    case "CORPORATES":
            $amount = $row['ttl_stud'] * 800;
            $gst = 18;
            $amount += $amount*($gst/100);
        break;
    case "DDUGKY":
        $amount = $row['ttl_stud'] * 800;
        break;
    default:
         $amount = $row['ttl_stud'] * 800;
}

$totalamt += $amount;
 


        echo "<tr><td>".$row["cen_id"]."</td><td>".$row["cen_name"]."</td><td>".$row["ttl_stud"]."</td><td>".'₹'.''.$totalamt."</td></tr>";
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
<section class="section">
<div class="row">
    <div class="col-lg-12">
        <div class="card"><div class="card-header">
           <center><h4>Recent Transactions</h4></center> </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];					
$result ="SELECT *, count(b.pr_abn_no) as ttl_stud FROM btch_1 a INNER JOIN btch_2 b ON a.pr_abn_no = b.pr_abn_no where a.cen_id ='$cen_id' GROUP BY b.pr_abn_no ";
 
$result=mysqli_query($con,$result);
$totalamt = 0;
    if ($result->num_rows > 0) {

    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0 '><thead><tr class='bg-primary'><th>Amasy ID</th><th>Centre Name</th><th>Batch Amount</th><th>Total Amount Paid</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
		  
		  switch ($role) {
    case "CORPORATES":
            $amount = $row['ttl_stud'] * 800;
            $gst = 18;
            $amount += $amount*($gst/100);
        break;
    case "DDUGKY":
        $amount = $row['ttl_stud'] * 800;
        break;
    default:
         $amount = $row['ttl_stud'] * 800;
}

$totalamt += $amount;
$amtused   = $amount-$amount;
 


        echo "<tr><td>".$row["cen_id"]."</td><td>".$row["cen_name"]."</td><td>".'₹'.''.$amount."</td><td>".'₹'.''.$totalamt."</td></tr>";
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

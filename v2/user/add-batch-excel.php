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
    <title>Flexi MoU - GTVET</title>

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

        <!-- Main Container Starts-->

        <div class="row app-content">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <center><h4>Your List of Approved Centers </h4></center>
                         
                    <div class="card-body">
                         <h5>Steps to upload bulk upload file method.</h5>
                         <div align="right"><a href="assets/Student-Enrollment-Format.csv" class="btn-sm btn-social btn-success m-b-5"><i class="fa fa-file-excel-o"></i> Download Excel Template</a></center>
                    </div>
                         <li>1. Download Sample Template From The Link Provided Above.</li>
                         <li>2. Fill in the file with appropriate data (No Fields Should Be Left Blank).</li>
                         <li>3. Click Upload.</li>
                         <li>4. You will be redirected to uploading page.</li>
                         <li>5. Click Upload Button and Upload File and Wait For The Message "Data uploaded Sucessfully".</li>
                         <li>You are done!</li>                     
                         <li style="color: red">Please Note: Avoid using any whitespaces and Special Character in fields, which may result of non-importing of CSV File.</li>
                    </div>
                    <div class="card-body">
                         <section class="section">
    
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
               
                <div class="card-header">
                   
                    <center>
                        <h4>Particulars of the All Trainee Uploaded</h4>
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
$sql ="SELECT *, COUNT(cen_id) as ttl_cnt, COUNT(CASE WHEN ubn_no != 'NULL' THEN '0' ELSE NULL END) as ttl_btch , COUNT(CASE WHEN ubn_no = 'NULL' THEN '1' ELSE NULL END) as ttl_unass FROM btch_2 where cen_id ='$cen_id'";
$result=mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>ITC Name</th><th>Total Trainee Uploaded</th><th>Total Trainee Assigned</th><th>Total Trainee Un-assigned</th><th>View Trainee</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
 
        echo "<tr><td>".$row["org_name"]."</td><td>".$row["ttl_cnt"]."</td><td>".$row["ttl_btch"]."</td><td>".$row["ttl_unass"]."</td><td><a href='view-batch-excel.php?cen_id=".$row["cen_id"]."'>View</a></td></tr>";
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
                        <h4>Add / Upload Trainee</h4>
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
$sql ="SELECT *, (CASE WHEN status != 'Approved' THEN 'Uploaded' ELSE 'Not Uploaded' END) as status FROM onboarding where cen_id ='$cen_id'";
$result=mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
        
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>ITC Name</th><th>Add Trainee</th><th>Upload Excel</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
 $abn="";
		  switch ($row['status']) {
			case "Uploaded":
			   $abn=  "<td style='background-color: blue;'><a style='color: #fff;' >Batch Freezed</a></td><td style='background-color: blue;'><a style='color: #fff;' >Batch Freezed</a></td>";
				break;
				
				default:
				    $abn= "<td style='background-color:#ebf8a4;'><a style='color: #000;' href='add-candidate.php?cen_id=".$row["cen_id"]."'>Add </a></td><td style='background-color:#4caf50;'><a style='color: #fff;' href='upload-batch-excel.php?cen_id=".$row["cen_id"]."'>Upload File</a></td>";
			}
        echo "<tr><td>".$row["org_name"]."</td>$abn</tr>";
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
<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
<script language="JavaScript" type="text/javascript">
function checkReject(){
    return confirm('Are you sure want to Delete Batch <?=$prabnno;?>, Once Deleted You Wont be able to see the Generated ABN again!');
}
</script>
</body>
</html>
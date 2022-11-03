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
  <?php

if(isset($_POST) && !empty($_FILES['image']['name'])){
   $valid_extensions = array('jpeg', 'jpg', 'png', 'PNG', 'JPG'); // valid extensions
   $filepath = 'scripts/uploads/DroppedcandidatePhotos/'; 
   $img = $_FILES['image']['name'];
   $tmp = $_FILES['image']['tmp_name'];
   $mprId = $_POST['mprId'];
   $image_name = "";
   list($txt, $ext) = explode(".", $img); // alternative $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  
   $image_name = $mprId.".".$ext;

   // Validate File extension
   if(in_array($ext, $valid_extensions)) 
   
   { 
       
      $filepath=$filepath.$image_name;
      if(move_uploaded_file($tmp,$filepath)){
		  
   
          
		  include 'scripts/dbcon.php';
		  $mprId = $_POST['mprId'];
		  
		 $sql="UPDATE `btch_2` SET dropped_photo ='$filepath' WHERE mprId = '$mprId'";
		  //var_dump($_POST);
		  //exit;
		$sql = mysqli_query($con, $sql); 
		
		// Compress image

		  
      }else{
         echo "Failed to upload image on server";
      }
   }else 
   {
      echo 'Please upload valid image';
   }
}else{
   echo "Please select image to upload";
}



?>
  
   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Edit Dropped out Candidates</h4>
                    </center>
                </div>
                <div class="card-body">
                                      
            <?php
include ('scripts/dbcon.php');
$trade = $_REQUEST['trade'];
$dt = date("d-m-Y");
$qry ="SELECT *, b.status as sts, a.mprId as mpr FROM btch_2 a LEFT JOIN attendance b ON a.mprId = b.mprId where a.cen_id ='$cen_id' AND a.lern_course = '$trade' AND a.emp_status = 'Dropped Out'  GROUP BY a.mprId";
$result=mysqli_query($con,$qry);
//var_dump($qry);
//exit;
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table id='example' class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Candidate ID</th><th>Candidate Name</th><th>Father Name</th><th>Current Status</th><th>Mark Attendance</th><th>Action</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  {
			$mpr = $row["mpr"];
		  
          $phto_btn="";
		  
		  switch ($row['sts']) {
			case "P":
			   $phto_btn=  "";
				break;
				
				case "Ab":
			   $phto_btn= "";
				break;
				
				case "L":
			   $phto_btn= "";
				break;
				case "D":
			   $phto_btn= "";
				break;

			default:
				$phto_btn= "";
		  } 
		  
		  switch ($row['sts']) {
			case "P":
			   $rle=  "<tr style='background-color:#90EE90; color: #000!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td >Present</td><td><form action=''  method='post'><input type='hidden' name='new' value='1' /><select name='status'><option value= '' >Select</option><option value= 'P' selected>Present</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mprId' type='hidden' value='".$row['mpr']."'></td><td><button class='btn-sm btn-block btn-warning btn-upload'>Update</button></form></td></tr>";
				break;
				
				case "Ab":
			   $rle= "<tr style='background-color:#FF6347; color: #fff!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td >Absent</td><td><form action='' method='post'><input type='hidden' name='new' value='1' /><select name='status'><option value= '' >Select</option><option value= 'P' >Present</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mprId' type='hidden' value='".$row['mpr']."'></td><td><button class='btn-sm btn-block btn-warning btn-upload'>Update</button></form></td></tr>";
				break;
				
				case "L":
			   $rle= "<tr style='background-color:#F0E68C; color: #000!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td>Leave</td><td><form action='' method='post'><input type='hidden' name='new' value='1' /><select name='status'><option value= '' >Select</option><option value= 'P' >Present</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mprId' type='hidden' value='".$row['mpr']."'></td><td><button class='btn-sm btn-block btn-warning btn-upload'>Update</button></form></td></tr>";
				break;
				
				case "D":
			   $rle= "<tr style='background-color:#CD853F; color: #fff!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td>Dropout</td><td><form action='' method='post'><input type='hidden' name='new' value='1' /><select name='status'><option value= '' >Select</option><option value= 'P' >Present</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mprId' type='hidden' value='".$row['mpr']."'></td><td><button class='btn-sm btn-block btn-warning btn-upload'>Update</button></form></td></tr>";
				break;

			default:
				//$rle= "<tr style='background-color:#9370DB; color: #fff!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td>No Attendance Marked</td><td><form action='' method='post'><input type='hidden' name='new' value='2' /><select name='status'><option value= '' >Select</option><option value= 'P' selected>Present</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mpr' type='hidden' value='".$row['mpr']."'></td><td><button class='btn-sm btn-block btn-primary btn-upload'>Add</button></form></td></tr>";
				$rle=  "<tr style='background-color:#CD853F; color: #000!important;'><td>".$row["mpr"]."</td><td>".$row["fname"]." ".$row["mname"]." ".$row["lname"]."</td><td>".$row["fathersName"]."</td><td >".$row["emp_status"]."</td><td><form action=''  method='post'><input type='hidden' name='new' value='2' /><select name='status'><option value= '' >Select</option><option value= 'Ab' >Absent</option><option value= 'L' >Leave</option><option value= 'D' >Dropout</option></select><input name='mprId' type='hidden' value='$mpr'></td><td><button class='btn-sm btn-block btn-warning btn-upload'>Update</button></form></td></tr>";
				
	}
          
        echo "$rle$phto_btn";
		
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
<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
</body>
</html>
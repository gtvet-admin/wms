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
    <title>GTVET :: FLEXI-MoU</title>

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
                        <center><h4>Add Exam Infrastructure Details</h4></center>
                    </div>
                    <div class="card-body">
					                    <div class="card-body">
                        <?php
include ('scripts/dbcon.php');
$cen_id = $_SESSION['cen_id'];
$result ="SELECT * FROM  onboarding a INNER JOIN btch_2 b ON a.cen_id = b.cen_id where a.cen_id ='$cen_id' GROUP BY b.lern_course";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>ITC UID</th><th>ITC Name</th><th>Trade</th><th>Location</th><th>Status</th><th>Action</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
        echo "<tr><td>".$row["cen_id"]."</td><td>".$row["org_name"]."</td><td>".$row["lern_course"]."</td><td>".$row["ro_city"]."</td><td>".$row["status"]."</td><td><a href='add-".$scheme."-att.php?center_id=".$row["cen_id"]."&trade=".$row["lern_course"]."'>View</a></tr>
		";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>No Data Found!</h4></center>";
}
mysqli_close($con);
?>
                    </div>
                         <section class="section">
    
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                   <div class="card-header">
											
										</div>
                   <?php
include ('scripts/dbcon.php');
$prabn = $_SESSION['spoc_code'];
$result ="SELECT *,
(CASE WHEN f1 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file1, 
(CASE WHEN f2 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file2, 
(CASE WHEN f3 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file3, 
(CASE WHEN f4 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file4, 
(CASE WHEN f5 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file5,
(CASE WHEN f6 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file6,
(CASE WHEN f7 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file7, 
(CASE WHEN f8 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file8, 
(CASE WHEN f9 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file9, 
(CASE WHEN f10 = 'no-image.png' THEN 'Photo Not Uploaded' ELSE 'Photo Uploaded' END) as file10, 
FROM exm_cen_list WHERE spoc_code ='$prabn'";
$result=mysqli_query($con,$result);
$f1="Internet";
$f11="Minimum 100mbps (Lease Line)";
$f2="PCs (Desktop)";
$f22="1 PC per candidate";
$f3="CCTV";
$f33="Mandatory";
$f4="Printer";
$f44="Mandatory";
$f5="Bio-metric";
$f55="Preferable";
$f6="Sitting capacity per shift";
$f66="As per PCs";
$f7="Power Backup";
$f77="Mandatory (As per PCs)";
$f8="Exam Undertaking (To be Duly Filled and Signed + Stamped)";
$f88="<a href='#'>Download Sample</a>";
$f9="Exam Tools Requirement List (To be Duly Filled and Signed + Stamped)";
$f99="<a href='#'>Download Industrial Fitter</a></br></br><a href='#'>Download Industrial Electrician</a></br></br><a href='#'>Download Automotive Manufacturing &amp; Technician</a>";
$f10="Other Supporting Docs";
$f101="<a style='color:red;'>Only (.zip) file formats allowed</a>";
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Sl No.</th><th>Facilities</th><th>Minimum Required</th><th>Image</th><th>Status</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
          
		$a="";
		  switch ($row['file1']) {
			case "Photo Not Uploaded":
			   $a= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $a=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$a= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$b="";
		  switch ($row['file2']) {
			case "Photo Not Uploaded":
			   $b= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $b=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$b= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$c="";
		  switch ($row['file3']) {
			case "Photo Not Uploaded":
			   $c= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $c=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$c= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$d="";
		  switch ($row['file4']) {
			case "Photo Not Uploaded":
			   $d= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $d=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$d= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$e="";
		  switch ($row['file5']) {
			case "Photo Not Uploaded":
			   $e= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $e=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$e= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$f="";
		  switch ($row['file6']) {
			case "Photo Not Uploaded":
			   $f= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $f=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$f= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$g="";
		  switch ($row['file7']) {
			case "Photo Not Uploaded":
			   $g= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $g=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$g= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		  $h="";
		  switch ($row['file8']) {
			case "Photo Not Uploaded":
			   $h= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $h=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$h= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		$i="";
		  switch ($row['file9']) {
			case "Photo Not Uploaded":
			   $i= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $i=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$i= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
		  $j="";
		  switch ($row['file10']) {
			case "Photo Not Uploaded":
			   $j= "<td>Yes</td><td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td style='background-color:green;'><a style='color: #fff;'>Photo Uploaded</a></td>";
				break;
				case "Photo Uploaded":
			   $j=  "<td>"."<img src='".$row['f1']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='mprId' type='hidden' value='".$row['mprId']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td>";
			   break;
			default:
				$j= "<td>N.A</td><td style='background-color:blue;'><a style='color: #fff;'></a></td>";
		  }
          
        echo "	<tr><td>1</td><td>$f1</td><td>$f11</td>$a</tr>
				<tr><td>2</td><td>$f2</td><td>$f22</td>$b</tr>
				<tr><td>3</td><td>$f3</td><td>$f33</td>$c</tr>
				<tr><td>4</td><td>$f4</td><td>$f44</td>$d</tr>
				<tr><td>5</td><td>$f5</td><td>$f55</td>$e</tr>
				<tr><td>6</td><td>$f6</td><td>$f66</td>$f</tr>
				<tr><td>7</td><td>$f7</td><td>$f77</td>$g</tr>
				<tr><td>8</td><td>$f8</td><td>$f88</td>$h</tr>
				<tr><td>9</td><td>$f9</td><td>$f99</td>$i</tr>
				<tr><td>9</td><td>$f10</td><td>$f101</td>$j</tr>
		";
    }
    echo "</div></table>";
} else {
    echo "<center><h4>Data Not Uploaded! Please contact Admin For!</h4></center>";
}
mysqli_close($con);
?>
               
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


<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-upload").click(function(){
            $(".form-horizontal").ajaxForm({target: '.preview'}).submit();
        });
    }); 
</script>
</body>
</html>
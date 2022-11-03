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

        <div class="app-content">
           <?php
      $cen_id = $_SESSION['cen_id'];
    //Declare Variables    //Get Center List Information from database
    $selectTrainingCenterQuery = "SELECT * FROM `centers` WHERE  `cen_status` ='Approved' AND cen_id ='$cen_id'";
//$selectTrainingCenterQuery = "SELECT * FROM `training_centers` WHERE `trainingPartnerId` = '$id' AND `status` ='Approved'";
    $selectTrainingCenterQueryResult = $conn->query($selectTrainingCenterQuery);

    //check if there is any data or not
    if ($selectTrainingCenterQueryResult->num_rows > 0) {
        $dataStatus = true;
    }

    //Redirect to id page if no data exits
    if(!$dataStatus) {
        $message = "Please add a center to proceed. If already added please wait for State Approval.";
    }

?>
<?php
include ('scripts/dbcon.php');
$center_id = $_GET['center_id'];
$query = "SELECT *, c.id as pr_id FROM centers a INNER JOIN state b on a.opr_state = b.name INNER JOIN scheme c on a.scheme=c.name WHERE a.center_id= '$center_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$state = $row['code'];
$vtp = substr($row['cen_id'],7,3);
$prid = $row['pr_id'];
$opr_state = $row['opr_state'];
$cen_name = $row['cen_name'];
$center_id = $row['center_id'];

?>
<?php
    include 'scripts/dbcon.php';
    
if(isset($_POST['submit']))
{		
	{
$cen_id = $_POST["cen_id"];	
$cen_name = $_POST["cen_name"];
$cen_pr_id = $_POST["cen_pr_id"];
$pr_as_dt = $_POST["pr_as_dt"];
$pr_crcode = $_POST["pr_crcode"];
$pr_btchid = $_POST["pr_btchid"];
$pr_abn_no = $_POST["pr_abn_no"];
$pr_btchno = $_POST["pr_btchno"];
$regd_id = $_POST["regd_id"];

		$sql="INSERT INTO `btch_1`(`cen_id`, `cen_name`, `cen_pr_id`, `pr_as_dt`, `pr_crcode`, `pr_btchid`, `pr_abn_no`, `pr_btchno`, `regd_id`) VALUES('".$cen_id."','".$cen_name."','".$cen_pr_id."','".$pr_as_dt."','".$pr_crcode."','".$pr_btchid."','".$pr_abn_no."','".$pr_btchno."','".$regd_id."')";
	//var_dump($_POST);
	//exit;
		$sql = mysqli_query($con, $sql);  
	}

	if($sql)
	{
		?>
        <script>
		alert('Batch Record was sucessfully submitted !!!');
		window.location.href='add-batch-excel.php';
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

<section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Generate UBN For Flexi-MoU Batches</h4>
                    </center>
                    
                </div>
                <div class="card-body">
                    <?php
                    //Check if there is any centers added or not
                    if ($dataStatus) {
                    ?>
                        <form method="post">
                            <div>
                                <div class="tab-pane fade show active" id="institute_details" role="tabpanel" aria-labelledby="home-tab2">
                                    <div class="col-lg-12">
                                       <div class="form-group row">
                                            <label class="col-md-3 col-form-label">State of Operation</label>
                                            <div class="col-md-9">
                    <input type="text" class="form-control" autocomplete="off" name="opr_state" value="<?=$opr_state; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Select Centre Name</label>
                                            <div class="col-md-9">
                                             <input type="text" class="form-control" autocomplete="off" name="cen_name" value="<?=$cen_name; ?>" readonly>          
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Batch UID</label>
                                            <div class="col-md-9">
                                                   <input type="text" class="form-control" autocomplete="off" value="GT22522" readonly/>
                                            </div>
                                        </div>
                                       <!----<div class="form-group row">
                                            <label class="col-md-3 col-form-label">On-Job Training (OJT) Start Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" autocomplete="off" name="ojt_dt" required>
                                            </div>
                                        </div>--->
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Batch Commencement Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="pr_as_dt" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Select Course </label>
                                            <div class="col-md-9">
                                                <select class="form-control" autocomplete="off" id="text_2" name="pr_crcode" value="" onkeyup="this.value = this.value.toUpperCase();" required>
                                                <option value="">Choose Course</option>
                                                <?php
				                                 include 'scripts/db-connect.php';
                                                //Get all the states
						                        $center_id = $_GET['center_id'];
                                                $getSchemeDataQuery = "SELECT * FROM `course` WHERE center_id = '$center_id' GROUP BY cou_code";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0) {
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
                                                        <option value="<?=$getSchemeData['cou_code'];?>"><?=$getSchemeData['cou_sec'];?> - <?=$getSchemeData['cou_name'];?> (<?=$getSchemeData['cou_code'];?>) </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
				   							</select>
                                            </div>
                                        </div>
                                          
                                           <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Batch No</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" autocomplete="off" id="text_3" name="pr_btchno" value="00" >
                                            </div>
                                        </div>                             
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">UBN No.</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="text_4" name="pr_abn_no" value="" readonly>
                                            </div>
                                            
                                        </div>
                                        <input type="hidden" id="text_1" value="GT22522<?php echo $prid ?><?php echo $state ?><?php echo $vtp ?>">
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-md-3 col-form-label">Total Candidates</label>-->
<!--                                            <div class="col-md-9">-->
<!--                                                <input type="text" class="form-control" name="totalCandidates" required>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <input type="hidden" value="<?php echo $vtp;?>">
                            <input type="hidden" name="cen_id" value="<?php echo $cen_id;?>">
                            <input type="hidden" name="regd_id" value="321<?php echo $state;?>1">
                            
                            <center><input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Save"></center>
                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
					}
					?>
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
$("#text_1").keyup(function() {
    $("#text_4").val($("#text_1").val() + "" + $("#text_2").val());
})

/* INPUT TEXT_1 AND TEXT_2 VALUE TO TEXT_3 ON TEXT_1 AND TEXT_2 KEYUP*/    
$("#text_2").keyup(function(){
    $("#text_4").val($("#text_1").val() + "" + $("#text_2").val());
})
    
/* HOW CAN I  DETECT IF TEXT_3 WAS CHANGED? IF TEXT_3 VALUE CHANGED, IT MUST BE INPUTTED TO TEXT_4*/
$("#text_3").keyup(function(){
    $("#text_4").val($("#text_1").val() + "" + $("#text_2").val() + "" +$("#text_3").val());
})
</script>

</body>
</html>
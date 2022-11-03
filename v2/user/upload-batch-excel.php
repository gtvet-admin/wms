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
$cen_id = $_SESSION['cen_id'];
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
    <link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet">

    <!--Chartist css-->
    <link rel="stylesheet" href="assets/plugins/chartist/chartist.css">
    <link rel="stylesheet" href="assets/plugins/chartist/chartist-plugin-tooltip.css">
    <link href="http://demos.codexworld.com/includes/css/bootstrap.css" rel="stylesheet">

    <!--DataTables css-->
    <link rel="stylesheet" href="assets/plugins/Datatable/css/dataTables.bootstrap4.css">

     <style>    
.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
    border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<style>
.outer-scontainer {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

.outer-scontainer table {
	border-collapse: collapse;
	width: 100%;
}

.outer-scontainer th {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.outer-scontainer td {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
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
include 'scripts/dbcon.php';
$row_roll=mysqli_fetch_array(mysqli_query($con,"SELECT max(id) as ref_id FROM btch_2"));
$incr_id2=$row_roll['ref_id']+1;
$mprId="GT22522".$cen_id.$incr_id2;
?>
<?php
    include "scripts/dbcon.php";

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        $row = 1;
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            if($row == 1){ $row++; continue; }
            $sqlInsert = "INSERT INTO `btch_2`(`fname`, `gender`, `category`, `religion`, `dob`, `mobile`, `email`, `fathersName`, `mothersName`, `gmobile`, `ann_incme`, `qual`, `passing_year`, `bank_acc`, `b_name`, `acc_name`, `b_acc_no`, `br_name`, `ifsc`, `cen_id`) VALUES ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "','" . $column[15] . "','" . $column[16] . "','" . $column[17] . "','" . $column[18] . "','" . $column[19] . "','" . $cen_id . "')";
            $result = mysqli_query($con, $sqlInsert);
            //var_dump($sqlInsert);
//exit;
            if (! empty($result)) {
                $type = "success";
                $message = "Candidate CSV Data Imported Sucessfully";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
                 }
        }
    }
}
?>
<!-- Display status message -->


   <section class="section">
    <div class="row ">

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h4>Upload Batch Excel (CSV) File</h4>
                    </center>
                </div>
                <div class="card-body">
              <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                  
                                                <input type="hidden" class="form-control" id="text_2" name="cen_id" value="<?php echo $cen_id ?>" >
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Upload Filed Excel file :</label>
                                            <div class="col-md-9">
                                                 <input type="file" name="file"
                        id="file" accept=".csv">
            
                                            </div>
                                        </div>
                                        
        <input type="submit" id="submit" name="import"
                        class="btn btn-primary btn-block btn-flat" value="Import CSV"></br></br>
                        <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div></br></br>
    </form>
    
        </tbody>
    </table>
	</br>
	</br>
	<div class="card-header">
                    <center>
                        <h4>Data Uploaded</h4>
                    </center>
                </div>
		</br>
			</br>
               <div style='overflow:auto;'><table id='example' class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
				<th>Candidate ID</th>
                <th>Full Name</th>
                <th>Gender</th>
				<th>Category</th>
				<th>Religion</th>
				<th>DOB</th>
				<th>Email Address</th>
				<th>Father Name</th>
				<th>Mother Name</th>
				<th>Gaurdian's Contact No.</th>
				<th>Annual Family Income</th>
				<th>Highest Qualification</th>
				<th>Passing Year</th>
				<th>Bank Account</th>
				<th>Bank Name</th>
				<th>Account Holder Name</th>
				<th>Account No.</th>
				<th>Branch Name</th>
				<th>IFSC Code</th>
				<th>UBN No.</th>
				
            </tr>
        </thead>
        <tbody>
         <?php
            $sqlSelect = "SELECT * FROM btch_2 WHERE cen_id = '$cen_id'";
            $result = mysqli_query($conn, $sqlSelect);
            
            if (mysqli_num_rows($result) > 0) {
                ?>
                <?php
                
                while ($row = mysqli_fetch_array($result)) {
                    ?>
            <tr>
				<td><?php echo $row['mprId']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['category']; ?></td>
				<td><?php echo $row['religion']; ?></td>
				<td><?php echo $row['dob']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['fathersName']; ?></td>
				<td><?php echo $row['mothersName']; ?></td>
				<td><?php echo $row['gmobile']; ?></td>
				<td><?php echo $row['ann_incme']; ?></td>
				<td><?php echo $row['qual']; ?></td>
				<td><?php echo $row['passing_year']; ?></td>
				<td><?php echo $row['acc_name']; ?></td>
				<td><?php echo $row['bank_acc']; ?></td>
				<td><?php echo $row['b_name']; ?></td>
				<td><?php echo $row['b_acc_no']; ?></td>
				<td><?php echo $row['br_name']; ?></td>
				<td><?php echo $row['ifsc']; ?></td>
				<td><?php echo $row['ubn_no']; ?></td>
				
				
            </tr>
        <?php
                }
                ?>
        </tbody>
           <?php } ?>
    </table></div>
</div>           
            </div>
        </div>
    </div>
    <a href="upload-batch-photo.php?ubn_no=<?php echo $ubn_no;?>"><input  name="import" 
                        class="btn btn-primary btn-block btn-flat" value="Proceed to Photo Upload"></a></br></br>
</section>
        </div>
        <!-- Assessor Profile Ends  -->


       

    </div>
</div>
 <!-- Footer starts -->
        <?php include "common/footer.php"; ?>
        <!-- Footer Ends -->
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
<script>
    $(function(e) {
        $('#example').DataTable();
    } );
</script>
<!--DataTables js-->
<script src="assets/plugins/Datatable/js/jquery.dataTables.js"></script>
<script src="assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>
</body>
</html>
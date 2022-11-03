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
        if($role == "DDUGKY") {

            include "scripts/navbar-ddugky.php";

        } 
		 
        ?>
        <!-- Menu Ends -->

        <div class="app-content">
           
        <?php 
include ('scripts/dbcon.php');
$centerid= $_SESSION['cen_id'];
$query = "SELECT * FROM `centers` WHERE center_id= '$centerid'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$centerid = $row['center_id'];
?>
<?php       

if(isset($_POST) && !empty($_FILES['image']['name'])){
   $valid_extensions = array('jpeg', 'jpg', 'png' , 'JPG'); // valid extensions
   $filepath = 'scripts/uploads/goAheadsletter/'; 
   $img = $_FILES['image']['name'];
   $tmp = $_FILES['image']['tmp_name'];

   list($txt, $ext) = explode(".", $img); // alternative $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  
   $image_name = time().".".$ext;

   // Validate File extension
   if(in_array($ext, $valid_extensions)) 
   { 
      $filepath=$filepath.$image_name;
      if(move_uploaded_file($tmp,$filepath)){
         
		  include 'scripts/dbcon.php';
		  
		  $centerid = $_POST['center_id'];
		  
		$sql="UPDATE `centers` SET go_ahead ='$filepath', cen_status ='Pending' WHERE center_id = '$centerid'";
		$sql = mysqli_query($con, $sql); 
		  //var_dump($_POST);
		  //exit;
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
                        <h4>Upload Photo</h4>
                    </center>
                </div>
                <div class="card-body">
                                      
            <?php
include ('scripts/dbcon.php');
$centerid = $_REQUEST['center_id'];
$result ="SELECT * FROM centers WHERE center_id ='$centerid'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<div style='overflow:auto;'><table class='table table-bordered mb-0'><thead><tr class='bg-primary'><th>Center ID</th><th>Center Name</th><th>Photo</th><th>Upload Photo</th></tr></thead>";
      while($row = mysqli_fetch_array($result))  { 
        echo "<tr><td>".$row["center_id"]."</td><td>".$row["cen_name"]."</td><td>"."<img src='https://od.cutmams.in/120/".$row['go_ahead']."' width='100' height='120'/>"."</td><td><form action='' enctype='multipart/form-data'  method='post'><input type='file' name='image' /><input name='center_id' type='hidden' value='".$row['center_id']."'></br><button class='btn-sm btn-block btn-primary btn-upload'>Upload</button></form></td></tr>";
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
</body>
</html>
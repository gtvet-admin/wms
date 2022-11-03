
<?php

    //Start Session
    session_start();

    //Connect to the Database
    include "db-connect.php";

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
  <?php 
include ('dbcon.php');
$ubn = $_REQUEST['mprId'];
$query = "SELECT * FROM btch_2 WHERE mprId= '$ubn'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$cen_id = $row['cen_id'];
        
?>


<!DOCTYPE html>
<html>
<head>
    <title><?php echo $name." Admit Card";?></title>
</head>
<style>
    

.card img{
    background-repeat: no-repeat;
 width: 760px;
    height: 450px;
}
    h4 span{
        font-size: 45px;
    }


.backside img{
    background-repeat: no-repeat;
              width: 760px;
    height: 450px;
}


    .ican-img{
      position: absolute;
    top: 15px;
    left: 650px;

    }
    .ican-img img{
                background-repeat: no-repeat;
    width: 110px;
    height: 110px;
    border-radius: 10px;
    }

     .qr-code{
        position: absolute;
        top: 130px;
    left: 605px;

    }
    .qr-code img{
           background-repeat: no-repeat;
    width: 140px;
    height: 140px;
    
    }

    .sign{
    position: absolute;
	top: 238px;
    left: 592px;

    }
    .sign img{
    background-repeat: no-repeat;
    width: 67px;
    height: 67px;
    
    }

    .iso{
    position: absolute;
        top: 357px;
    left: 543px;
}

    
    .iso img{
    background-repeat: no-repeat;
    width: 89px;
    height: 89px;
    
    }

    .barcode{
        position: absolute;
    top: 419px;
    left: 351px;

    }
    .barcode img{
              background-repeat: no-repeat;
    width: 377px;
    height: 33px;
    
    }

    .stamp-img{
       
  position: absolute;
        top: 90px;
    left: -39px;

    }

    .stamp-img img{
           background-repeat: no-repeat;
    background-size: contain;
        width: 172px;
    height: 172px; 
    }
    .name-user{
           position: absolute;
    top: 185px;
    left: 246px;
    color: #2e2d73;
    font-size: 23px;
    font-family: sans-serif;
    font-weight: 500;
    }

    .name-user span{
        font-size: 35px;
    }
    .uid{
       position: absolute;
    color: #271769;
    font-size: 20px;
    font-family: sans-serif;
    font-weight: 600;
    margin: 0px;
    top: 255px;
    left: 336px;
    }
    .area{
          position: absolute;
    color: #271769;
    font-size: 20px;
    font-family: sans-serif;
    font-weight: 600;
    margin: 0px;
    top: 213px;
    left: 336px;
}
    
    .validity{
        position: absolute;
    color: #271769;
    font-size: 20px;
    font-family: sans-serif;
    font-weight: 600;
    margin: 0px;
    top: 296px;
    left: 336px;
    }
    .uid1{
         position: absolute;
    left: 322px;
    top: 418px;
    color: #2e2d73;
    font-size: 24px;
    font-family: sans-serif;
    font-weight: 600;
    margin: 0px;
    }
    .member{
        margin: 0px;
        padding: 0px;
        font-size: 16px;
        color: red;
        position: relative;
        
        font-weight: 600;
    }

    .cell{
        margin: 0px;
        padding: 0px;
        font-size: 16px;
        color: red;
        position: relative;
        
        font-weight: 500;
    }
    .clear-both{
        clear:both;
    }
</style>
<body onload="print();">


<div class="card">
    <img src="../assets/img/formats/admit-card-format.png">
    <div class="ican-img">
        <img src="<?php echo 'profile_pic/'.$profile_pic; ?>">
        <div class="stamp-img">  
           
        </div>
        </div>
        <div class="qr-code">  
         </div>
   

<div>
    <h4 style="position: absolute;
    top: 305px;
    left: -53px !important;
    padding-left: 247px;
    color: #271769;
    font-size: 20px !important;
    font-family: sans-serif !important;
    font-weight: 600;"><br>
        <p class="member"></p>
        <p class="cell"><?php 
          if (!empty($cell)) {
              echo "(".$cell.")";
          }
         ?></p>
    </h4>
    </div>
    <p class="uid"> </p>
    <p class="area"> </p>
    <p class="validity"> </p>
    
</div>
</body>
</html>
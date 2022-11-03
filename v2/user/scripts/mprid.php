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

  

    
	
  }

include ('dbcon.php');
date_default_timezone_set("Asia/Kolkata");
$mpr=$_REQUEST["mprId"];
$id=$_REQUEST["id"];
$dt=date("d-m-Y");
$query = "UPDATE `btch_2` SET `mprId`='$mpr', gen_dt = '$dt' WHERE id = '$id'";
$result = mysqli_query($con, $query);
//var_dump($result);
//exit;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
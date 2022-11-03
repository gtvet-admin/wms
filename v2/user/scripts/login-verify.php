<?php

    //Start Session
    session_start();

    //check if session is already set
    if(isset($_SESSION['bazooka'])) { //If yes

        //Redirect to dashboard
        header('Location:index.php');


    }
    //Connect to the Database
    include "db-connect.php";

    //Declare Variables
    $password = "";
	$spoc_code = "";
    $role = "";
	$scheme = "";
    $org_name= "";
    $ro_email = "";
    $name="";
    $username="";

    //Get data from POST
    if (isset( $_POST['username'])) {

        $username = $_POST['username'];

    }

    if (isset( $_POST['password'])) {

        $password = $_POST['password'];

    }

    if (isset( $_POST['role'])) {

        $role = $_POST['role'];

    }
$sanitized_username = mysqli_real_escape_string($db, $username);
$sanitized_password = mysqli_real_escape_string($db, $password);

    if($role == "IP") { //If the role is Training Partner

        //verify the credentials
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `ro_email` = '$username' AND `password` = '$password' AND `pay_sts` = 'Approved' AND `status` = 'Approved' ";
        $selectUserQueryResult = $conn->query($selectUserQuery);

        //Fetch User data from the Database
        $getUserData = $selectUserQueryResult->fetch_assoc(); //Fetching the whole row
        $org_name = $getUserData['org_name']; //Get the name
        $scheme = $getUserData['scheme']; //Get the role
        $id = $getUserData['id']; //Get the ID
		$ro_email = $getUserData['ro_email']; //Get the ID
        $cen_id = $getUserData['cen_id']; //Get the ID
		$spoc_code = $getUserData['spoc_code']; //Get the ID
		$name = $getUserData['pc_name']; //Get the ID

		
    }

		elseif($role == "TP") { //If the role is Training Partner

        //verify the credentials
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `ro_email` = '$username' AND `password` = '$password' AND `pay_sts` = 'Approved' AND `status` = 'Approved' ";
        $selectUserQueryResult = $conn->query($selectUserQuery);

        //Fetch User data from the Database
        $getUserData = $selectUserQueryResult->fetch_assoc(); //Fetching the whole row
        $org_name = $getUserData['org_name']; //Get the name
        $scheme = $getUserData['scheme']; //Get the role
        $id = $getUserData['id']; //Get the ID
		$ro_email = $getUserData['ro_email']; //Get the ID
        $cen_id = $getUserData['cen_id']; //Get the ID
		$spoc_code = $getUserData['spoc_code']; //Get the ID
		$name = $getUserData['pc_name'];
		
    }
	
	elseif($role == "CM") { //If the role is Training Partner

        //verify the credentials
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `ro_email` = '$username' AND `password` = '$password' AND `pay_sts` = 'Approved' AND `status` = 'Approved' ";
        $selectUserQueryResult = $conn->query($selectUserQuery);

        //Fetch User data from the Database
        $getUserData = $selectUserQueryResult->fetch_assoc(); //Fetching the whole row
        $org_name = $getUserData['org_name']; //Get the name
        $scheme = $getUserData['scheme']; //Get the role
        $id = $getUserData['id']; //Get the ID
		$ro_email = $getUserData['ro_email']; //Get the ID
        $cen_id = $getUserData['cen_id']; //Get the ID
		$spoc_code = $getUserData['spoc_code']; //Get the ID
		$name = $getUserData['pc_name'];
		
    }
	
	elseif($role == "LD") { //If the role is Training Partner

        //verify the credentials
        $selectUserQuery = "SELECT * FROM `login_creds` WHERE `ro_email` = '$username' AND `password` = '$password' AND `pay_sts` = 'Approved' AND `status` = 'Approved' ";
        $selectUserQueryResult = $conn->query($selectUserQuery);

        //Fetch User data from the Database
        $getUserData = $selectUserQueryResult->fetch_assoc(); //Fetching the whole row
        $org_name = $getUserData['org_name']; //Get the name
        $scheme = $getUserData['scheme']; //Get the role
        $id = $getUserData['id']; //Get the ID
		$ro_email = $getUserData['ro_email']; //Get the ID
        $cen_id = $getUserData['cen_id']; //Get the ID
		$spoc_code = $getUserData['spoc_code']; //Get the ID
		$name = $getUserData['pc_name'];
		
    }
		else { // If the role is not of anything except Training Partner Redirect him/her to Login page

        //redirect to login page
        header('Location: login.php?message=Please Select the Proper Role');

    }

    //check if the data matches
    if ($selectUserQueryResult->num_rows > 0) { //Match Found and Verified

        //Set Session
        $_SESSION['bazooka'] = $ro_email;
        $_SESSION['scheme'] = $scheme;
		$_SESSION['role'] = $role;
        $_SESSION['org_name'] = $org_name;
        $_SESSION['id'] = $id;
		$_SESSION['cen_id'] = $cen_id;
		$_SESSION['name']=$name;
		$_SESSION['spoc_code']=$spoc_code;
		
		
        if($ro_email != "") {
            $_SESSION['ro_email'] = $ro_email;
        }

        //Redirect the User to the Dashboard
        header('Location:../index.php?message=Login Successful, Welcome To GTVET Training Management Module');

    } else { //No Match Found

        //Redirect the User to the Login Page
        header('Location:../login.php?message=Login Failed, Please Check Login Status or Contact Admin');

    }


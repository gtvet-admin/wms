<?php

    //Connect to the Database
    include "../db-connect.php";

    //PHP Mailer
    require 'phpmailer/mail.php';

    //Set Timezone to IST
    date_default_timezone_set('Asia/Kolkata');

    //Declare Variables
    $verificationIDFromMail = "";
    $email = "";
    $verificationID = "";
    $lastUpdatedOn = date('d-m-Y H:i');
    $generatedPassword = "";
    $name = "";

    //Update variables from the GET Method
    if (isset($_GET['verificationID'])) {

        $verificationIDFromMail = $_GET['verificationID'];//Set the data from GET

    }

    if (isset($_GET['email'])) {

        $email = $_GET['email'];//Set the data from GET

    }

    //Get Data from the table to verify the user
    $getUserDataQuery = "SELECT * FROM `training_partner_details` WHERE `email` LIKE '$email'";
    $getUserDataResult = $conn->query($getUserDataQuery);

    if($getUserDataResult->num_rows > 0) { //User Exists

        //Get the verificationID from the table
        $getUserData = $getUserDataResult->fetch_assoc(); //Fetching the whole row
        $verificationID = $getUserData['verificationID']; //Get the verificationID
        $name= $getUserData['name']; //Get the verificationID

        //match verificationID with the obtained verificationID
        if($verificationIDFromMail == $verificationID) { //Verification ID Matched

            //Generate Password
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {

                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];

            }
            $generatedPassword =  implode($pass); //turn the array into a string

            //Update Email to Verified
            $updateUserDataQuery = "UPDATE `training_partner_details` SET `password` = '$generatedPassword', `emailVerified`='Yes',`verificationID`='',`lastUpdatedOn`='$lastUpdatedOn' WHERE `email` LIKE '$email'";
            $updateUserDataResult = $conn->query($updateUserDataQuery);

            if ($updateUserDataResult) { //if update successful

                //Shoot Email with Username and Password

                $mail->From = 'webmaster-dgt@dgt.gov.in';
                $mail->FromName = "DGT Service Desk"; // Name to indicate where the email came from when the recipient received
                $mail->AddAddress($email);
                $mail->AddCC("anuj@gramtarang.org.in");
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // send as HTML
                $mail->Subject = "Industry Training Partner Approval"; //used for mail subject
                $emailBody = file_get_contents('itp-approval.php');//get the contents of the HTML Page
                $emailBody = str_replace("InsertLinkHere", "http://164.100.117.162/fleximou/login.php", $emailBody); //Now Replace the string with URL
                $emailBody = str_replace("InsertNameHere", "$name", $emailBody); //Now Replace the string with Name
                $emailBody = str_replace("InsertUserNameHere", "$email", $emailBody); //Now Replace the string with Username
                $emailBody = str_replace("InsertPasswordHere", "$generatedPassword", $emailBody); //Now Replace the string with Password
                $mail->Body = html_entity_decode($emailBody);


                if($mail->Send())
                {

                    header('Location: ../login.php?message=Application Sucessfully Submitted, Please Wait for Approval From DGT');

                } else {

                    $mailError = $mail->ErrorInfo;
                    header('Location: ../login.php?message=Email Verification Failed, Please try back in sometime.');
                }

                //Redirect them to Login Page to Register Center Portal
                header('Location: ../login.php?messgae= Please check Your Mail For Username and Password');

            }

        } else { //if Update Fails

            //Redirect them to Login Portal with the error message
            header('Location: ../login.php?message=Email Verification Failed Due to Server Issue, Please try back in sometime.');


        }


    } else { //User Doesn't Exists

        //Redirect to the Trainer on-boarding form and ask to register
        header('Location: ../trainer-partner-onboarding.php?message= Please Register Yourself before verifying');

    }
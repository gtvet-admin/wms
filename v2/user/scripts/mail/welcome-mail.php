<?php
require_once('phpmailer/class.phpmailer.php');

include ('../dbcon.php');
$code = $_REQUEST['tp_code'];
$query = "SELECT * FROM onboarding where cen_id ='$code'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$name = $row['org_name'];
$email= $row['ro_email'];
$generatedPassword = $row['password'];

$mail= new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Host = 'sg2plzcpnl479136.prod.sin2.secureserver.net';
$mail->Port = '465';                  // set the SMTP port for the GMAIL server
$mail->Username   = "no-reply@gtetonline.com";  // GMAIL username
$mail->Password   = "BH~199hcH7Ed";            // GMAIL password
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Industry Training Partner Approval"; //used for mail subject
$message = file_get_contents('username-password.php');//get the contents of the HTML Page
$message = str_replace("InsertLinkHere", "http://164.100.117.162/fleximou/login.php", $message); //Now Replace the string with URL
$message = str_replace("InsertNameHere", "$name", $message); //Now Replace the string with Name
$message = str_replace("InsertUserNameHere", "$email", $message); //Now Replace the string with Username
$message = str_replace("InsertPasswordHere", "$generatedPassword", $message); //Now Replace the string with Password
                
$mail->setFrom("webmaster-dgt@dgt.gov.in", "DGT Service Desk");
$mail->addReplyTo("webmaster-dgt@dgt.gov.in", "DGT Service Desk");

$mail->AddAddress($email);
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->Body = $message;

if($mail->Send())
        {
        echo "<script> alert('Email sent successfully! You can login now..'); </script>.";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../../login.php">';
        exit;
        }  
        else  
        {  
        echo "<div align=center style=\"color:#FF0000; font-family: 'Times New Roman', Times, serif; font-size: 26px;\"> Cannot send mail. $mail->ErrorInfo. </div>";  
        }
       
?>
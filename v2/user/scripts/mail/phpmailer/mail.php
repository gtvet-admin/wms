<?php

    //mail service start
    include("class.phpmailer.php"); //Include PHP mailer
    include("class.smtp.php"); // Include SMTP Service

    $mail = new PHPMailer(); //PHP mailer Object Created
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Mailer = "smtp";
    $mail->Host = "relay.nic.in"; // specify main and backup server // Twinbrothers SMTP server Name "gains.lathalinuxcloud.com";
    $mail->Port = 25; // set the port to use
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "webmaster-dgt@dgt.gov.in"; // your SMTP username or your gmail username
    $mail->Password = "'webmaster@DGT1"; // your SMTP password or your gmail password
    $mail->SMTPDebug =0;
    $mail->SMTPSecure = 'ssl';
	$mail->setFrom( 'webmaster-dgt@dgt.gov.in','DGT Service Desk');
    $mail->addReplyTo('webmaster-dgt@dgt.gov.in', 'DGT Service Desk');


    $from = "webmaster-dgt@dgt.gov.in"; // Reply to this email

    $password='webmaster@DGT1';

    $pass=$password;


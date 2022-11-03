<?php    //Start Session    session_start();    //Connect to the Database    include "scripts/db-connect.php";    //Declare Variables    $role = "";	$scheme = "";    $org_name ="";    $cen_id = "";    $ro_email="";    //check if session is already set    if(!isset($_SESSION['bazooka'])) { //If yes        //Redirect to dashboard        header('Location:login.php');    } else {        //get data from Session        $ro_email = $_SESSION['bazooka'];        $scheme = $_SESSION['scheme'];		$role = $_SESSION['role'];        $org_name = $_SESSION['org_name'];        $cen_id = $_SESSION['cen_id'];      if($role == "IP") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 	elseif($role == "TP") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 	elseif($scheme == "CM") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `onboarding` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 		if($scheme == "Flexi-MoU") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 	elseif($scheme == "NAPS") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 	elseif($scheme == "NEEM") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } elseif($scheme == "Staffing") {        //Get User Information from database        $selectUserQuery = "SELECT * FROM `opt_scheme` WHERE `cen_id` = '$cen_id'";        $selectUserQueryResult = $conn->query($selectUserQuery);    } 	}  }    //get Toast Message    $message = "";    if (isset($_GET['message'])) { //if message exists in GET        $message = $_GET['message']; //Set the Variable with GET message    }?>
<html>
    <head>
        <style>
            #background{
                position:absolute;
                z-index:0;
                background:white;
                display:block;
                min-height:50%;
                min-width:50%;
                color:yellow;
            }

            #content{
                position:absolute;
                z-index:1;
            }

            #bg-text
            {
                color:lightgrey;
                font-size:120px;
                
            }
			
			.block-border{
	display: block;
	padding: 0 px;
}
.inline-border{
	border-image-repeat: repeat
} 
        </style>
        <link rel="stylesheet" href="../../css/jquery-ui.css">
        <style>

            @font-face {
                font-family: myFirstFont;
                src:url(file:///C|/xampp/htdocs/projects/fonts/west.TTF);


            }
            .certificateStyle {
                font-family: Calibri, Calibri Light, Times New Roman;
                font-size:72px;
                margin-bottom:1%;
				font-style: italic;
            }
            .fixedText
            {
                font-family: Calibri, Calibri Light, Times New Roman;
                font-style: italic;
                font-size:40px;
				text-align: center;
				line-height: 130%;
            }
            input[type="text"]
            {
                background: transparent;
                border: none;
                font-size:16px;
                font-weight:500;
                text-transform:uppercase;
                text-align:center;


            }
            .details
            {
                background: transparent;
                border: none;
                font-size:37px;
                line-height: 50px;
                text-align:center;

            }
			

			@media print {

    html, body {
      
	  width:100%;
      margin: 0 !important; 
      padding: 0 !important;
      height:100vh;
	  overflow: hidden;
    }

}


        </style>
        <script>

            function infofun()

            {

                //document.getElementById('info').style.display="none";
                document.getElementById('info2').style.display="none";

            }

        </script>
    </head>
    <body id="html-content-holder">
    
    <div style="-webkit-print-color-adjust:exact; width: 100%;">
        <div style='margin:3%;'><img src="img/Certificate-Staffing.png" style="width: 1360px; height: 960px;"/>
		<div style='border-style: groove;margin:0.5%; border-color: #0000FF;'>
		<div style="margin:2.5%;">
                    <div style="line-height:250%;">
                        <div style="margin-top:2%"></div>
                        <table width="90%"><tr><td style="width:30%; float: left;"><img src="https://amasy.cutmams.in/assets/img/logo.png" style="height: 220px;width: 150px;margin-left: 50px;"></td>
                        <td style="width: 30% float: center;"><img src="https://amasy.cutmams.in/assets/img/brand/mord-skill.png" style="height: 250px;width: 500px;margin-left: 30%;"></td>
                        <td style="width: 50%; float: right;"><img src='https://amasy.cutmams.in/assets/img/DDU-GKY.png' style='height: 220px;width: 230px;margin-left: 50%;'></td></tr></table>
                        <center>
                            <div style="margin-top:1%"></div>
                            
                                <div style='font-family: Calibri, Calibri Light, Times New Roman; font-style: italic; font-size:65px; text-align: center; line-height: 130%; color:#0000FF;'>Certificate of Appreciation</div>                                
                            <div style="margin-top:1%"></div>
                            <div class="fixedText">This is to certify that</div>
                            <div style='font-size:34px;text-transform:uppercase;font-weight:600; color:#0000FF;'> </div>							<div class="fixedText" >Son / Daughter of </br><b><div style="text-transform: uppercase;"></div></b></div>
                            <div class="fixedText" style="display:inline">Registration No.</div>
                            <div class="details" style="display:inline; "><b>321041102446</b></div></br>
                            <div class="fixedText" style="display:inline">has successfully cleared the assessment for the job role of</div></br>
                            <div class="details" style="display:inline;"><b> (  )</b></div></br>
                            <div class="fixedText" style="display:inline">with</div> 
                                <div class='details' style='display:inline; color:#0000FF;'><b> D Grade</b></div>                                <br/>
                                <div class="details" style="display:inline; font-family: Calibri, Calibri Light, Times New Roman; font-style: italic">confirming to National Skill
                                Qualification Framework level - 4 <br/> under <b> Deen Dayal Upadhyaya Grameen Kaushalya Yojana</b><br/>
									at <b>Don Bosco Tech Society</b></div>
                            </div>
                        </center>

                    </div>
                    <br>
                    <div style="padding-top:2%"></div>
                    <table width="90%"><tr><td style="width:58%; margin-left: 5%; float: left;padding-top: 8%;"><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https%3A%2F%2Fbr.cutmams.in%2F104%2Fqr-verification.php?mprId=&choe=UTF-8' height='125px;' width='125px'/><br/>Certificate no : CUDDUGKY321041102446<br/>
                     Date :2022-06-30</td>
                        <td style="width:30%; padding-top: 8%; float: center; height: 130px;width: 300px; margin-left: 25%;"></td>
                        <td style="; float: right; margin-right: -30%;"><strong>
                                <img src="https://amasy.cutmams.in/assets/img/sb-sign.png" width="150px;" style="margin-left: 10%;"/><br/><center>National Head</center><center>Skill Assessment and Certification
							</center></strong></td></tr></table>
                    <br/>
                </div>
                <div style="vertical-align: bottom; font-size: 14px;">
<center>Centurion University of Technology &amp; Management, Awarding Body Vide Gazette Notification.F.43001/02/2013-NSDA</center>
           </center>
           </div>
            </div>
        </div>
        
    </body>
</html>
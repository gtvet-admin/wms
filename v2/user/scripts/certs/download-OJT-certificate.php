<?php
    //Start Session
    session_start();
    //Connect to the Database
    include "../db-connect.php";
    //Declare Variables
    $role = "";
	$scheme = "";
    $org_name ="";
    $cen_id = "";
    $ro_email="";
    //check if session is already set
    if(!isset($_SESSION['bazooka'])) { //If yes
        //Redirect to dashboard
        header('Location:../../login.php');
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
<?php include ('../dbcon.php');
$cen_id = $_SESSION['cen_id'];
$mpr = $_REQUEST['mprId'];
$dt = date("d-m-Y");
$query ="SELECT * FROM certs WHERE cen_id='$cen_id' AND mprId = '$mpr'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$lname = $row['lname'];
$cnt = $row['cnt'];
$sts = $row['att_status'];
$lern = $row['lernern_id'];
$cert_no = $row['cert_no'];

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $cert_no; $fname; $lname;?></title>
</head>
<style>

@font-face {
  font-family: 'AddingtonCF-Bold-Italic';
  src: url('fonts/AddingtonCF-BoldItalic.ttf')  format('truetype'), /* Safari, Android, iOS */
  
}
@font-face {
  font-family: 'AddingtonCF-Regular';
  src: url('fonts/AddingtonCF-Regular.ttf')  format('truetype'), /* Safari, Android, iOS */
  
}
@font-face {
  font-family: 'AddingtonCF-Bold';
    src: url('fonts/AddingtonCF-Bold.ttf')  format('truetype'), /* Safari, Android, iOS */
  
}
@font-face {
  font-family: 'AddingtonCF-ExtraBold';
    src: url('fonts/AddingtonCF-ExtraBold.ttf')  format('truetype'), /* Safari, Android, iOS */
  
}
.card img{    
background-repeat: no-repeat;
 width: 1196px;
 height: 850px;
 }    
h4 span{     
	font-size: 45px;
    }   
.ican-img{      
	position: absolute;
    top: 430px;
    left: 255px;
    }
	.ican-img2{      
	position: absolute;
    top: 390px;
    left: 255px;
    }
.certi-no{      
	position: absolute;
    top: 810px;
    left: 110px;
    }
.course-name{      
	position: absolute;
    top: 325px;
    left: 255px;
    }
.comp-cc{      
	position: absolute;
    top: 470px;
    left: 255px;
    }
.write-up{      
	position: absolute;
    top: 505px;
    left: 255px;
    }	
.regi-no{      
	position: absolute;
    top: 825px;
    left: 110px;
    }
.dat-iss{      
	position: absolute;
    top: 840px;
    left: 110px;
    }	
.top-heading{      
	position: absolute;
    top: 145px;
    left: 545px;
    }    
.ican-img img{
	background-repeat: no-repeat;
    width: 110px;
    height: 110px;
    border-radius: 10px;
    }     
.qr-code{
	position: absolute;
	top: 666px;
    left: 110px;
    }    
.qr-code img{
	background-repeat: no-repeat;
    width: 100px;
    height: 100px;
    }        
	.stamp-img{
		position: absolute;
        top: 250px;
		left: -95px;
		}    
	.stamp-img img{
		background-repeat: no-repeat;
		background-size: contain;
        width: 172px;
		height: 172px;
		}    
	.name-user{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 46px;
		font-family: sans-serif;
		font-weight: 500;
		}
		.name-user span{ 
	font-size: 35px;
    }
.cert-no{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 26px;
		font-family: sans-serif;
		font-weight: 500;
		}
.cname{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 26px;
		font-family: sans-serif;
		font-weight: 500;
		}
.comp{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 26px;
		font-family: sans-serif;
		font-weight: 500;
		}
.write{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 26px;
		font-family: sans-serif;
		font-weight: 500;
		}
.reg-no{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 46px;
		font-family: sans-serif;
		font-weight: 500;
		}

.date-issue{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-family: sans-serif;
		font-weight: 500;
		}		
.heading-t1{
		position: relative;
		top: -45px;
		left: 0px;
		color: #636363;
		font-size: 46px;
		font-family: sans-serif;
		font-weight: 600;
	
		}    
	.heading-t1 span{ 
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
  
	.clear-both{
        clear:both;
		}
</style>            


<?php include ('../dbcon.php');
$cen_id = $_SESSION['cen_id'];
$mpr = $_REQUEST['mprId'];
$dt = date("d-m-Y");
$query ="SELECT * FROM certs WHERE lernern_id = '$mpr'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$course_name = $row['lern_course'];
$cnt = $row['cnt'];
$sts = $row['att_status'];
$lern = $row['lernern_id'];
$cert_no = $row['cert_no'];
$ind = $row['industry'];
$start = $row['cou_strt_dt'];
$end = $row['cou_end_dt'];
$id = $row['id'];
$sch = $row['lern_prog'];
//var_dump($row);
//exit;
switch ($row['lern_course']) {
			case "Workplace Statutory Compliance":
			   $rle=  "<p style='font-family: AddingtonCF-Regular; font-size:16px; text-align: left; line-height: 50%; font-weight: 600; color:#636363;'>Competencies Covered:</p>
<li style='font-family: AddingtonCF-Regular; font-size:16px; text-align: left; line-height: 100%; font-weight: 600; color:#636363;'> Understanding of statutory benefits for workers</li>
<li style='font-family: AddingtonCF-Regular; font-size:16px; text-align: left; line-height: 100%; font-weight: 600; color:#636363;'> Employee Provident Fund</li>
<li style='font-family: AddingtonCF-Regular; font-size:16px; text-align: left; line-height: 100%; font-weight: 600; color:#636363;'> Employee's State Insurance Scheme</li>";
				break;
				
				case "Industrial Safety":
			   $rle= "<div style='font-family: AddingtonCF-Regular; color:#636363; font-size:16px; text-align: left; font-weight: 600; margin-top: -45px; line-height: 140%;'>For successful completion of the online module on <a style='color: #1792b9;font-size: 18px;'>Industrial Safety,</a> delivered </br>as a part of the Industrial Fitter Flexi-MoU Curriculum.</div>";
				break;
				
			default:
				$rle= "No Course Selected";
	}

?>
<?
switch ($sch) {
	case "NEEM":
	$scheme= "<br/> undergone On the Job Training as a part of National Employability Enhancement Scheme</br> (NEEM)";
	break;
	
	case "Flexi-MoU":
	$scheme= "undergone On the Job Training as a part of Flexi MoU Scheme";
	break;
	
	default:
	$scheme= "No Scheme Selected";
}
?>
<body onload="">
<div class="card">
<img src="img/OJT-3.png">
<div class="top-heading">
	<p style='font-family: AddingtonCF-ExtraBold; font-size:35px; text-align: center; line-height: 50%;  font-weight: 600;' class="heading-t1"><a style="color:#1792b9;"></a></p>
	</div>    
<div class="ican-img">
	<p style='font-family: AddingtonCF-Bold; font-size:18px; text-align: center; line-height: 50%; color:#1792b9; font-weight: 600;' class="name-user">Industry Partner: <?=$ind;?> </p>
	</div>
	<div class="ican-img2">
	<p style='font-family: AddingtonCF-Bold; font-size:18px; text-align: center; line-height: 50%; color:#1792b9; font-weight: 600;' class="name-user">Trade : <?=$course_name;?> </p>
	</div>
	<div class="comp-cc">
	<p style='font-family: AddingtonCF-Regular; font-size:18px; text-align: left; line-height: 50%; font-weight: 600; color:#1792b9;' class="comp">OJT Start Date: <?=$start;?> | OJT End Date: <?=$end;?></p>
	</div>
<div class="course-name">
	<p style='font-family: AddingtonCF-Regular; font-size:18px; text-align: left; line-height: 50%; font-weight: 600; line-height: 125%;' class="cname">This is to certify that <?=$fname;?> <?=$mname;?> <?=$lname;?> bearing Lernern ID : <?=$mpr;?></br> has  <?=$scheme;?> as per details given below</br></br><strong></strong></p>
	</div>

	<div class="write-up">
	<p style='font-family: AddingtonCF-Regular; font-size:18px; text-align: left; line-height: 50%; font-weight: 900; line-height: 125%;' class="write">During the course of training the trainee has been taught and assessed on different job <br/> specific competencies by Lernern, an EdTech startup incubated at Centurion University <br/> of Technology &amp; Management.<br/><br/>Be skilled, be empowered! 
</p>
	</div>
<div class="stamp-img"></div>	
	</div>        
	<div class="qr-code">
	<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https%3A%2F%2Fgtetonline.com%2Fflexi-mou%2Fgtvet%2Fuser%2Fverification%2Fojt-qr-verification.php?mprId=<?=$mpr;?>&choe=UTF-8' height='75px;' width='75px'/>
         </div>
<div class="certi-no">
	<p style='font-family: AddingtonCF-Regular; font-size:12px; text-align: center; line-height: 50%; font-weight: 600; color:#000;' class="cert-no">Certificate Sr.No : <?=$cert_no;?><?=$id;?></p>
	</div>
<div class="regi-no">
	<p style='font-family: AddingtonCF-Regular; font-size:12px; text-align: center; line-height: 50%; font-weight: 600; color:#000;' class="reg-no">Reg. No : <?=$lern;?></p>
	</div>
<div class="dat-iss">
	<p style='font-family: AddingtonCF-Regular; font-size:12px; text-align: center; line-height: 50%; font-weight: 600; color:#000;' class="date-issue">Date of Issue : <?=$dt;?></p>
	</div>	
		 </div>
		 </div>
		 </body>
		 </html>
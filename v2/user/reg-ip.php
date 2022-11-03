<?php
error_reporting(E_ALL);
include 'scripts/dbcon.php';
$row_roll=mysqli_fetch_array(mysqli_query($con,"SELECT max(id) as ref_id FROM onboarding"));
$incr_id2=$row_roll['ref_id']+1;
$unq_id="GT22520".$incr_id2;
?>

<?
include 'scripts/dbcon.php';
$row_vtp=mysqli_fetch_array(mysqli_query($con,"SELECT max(id) as vtp FROM onboarding"));
$incr_id3=$row_vtp['vtp']+1;
$vtp_id="".$incr_id3;

?>
<?php
include 'scripts/dbcon.php';
if(isset($_POST['save_mul']))
{		
	{
$role = 'IP';
$cen_id = $_POST["cen_id"];
$scheme = $_POST["scheme"];
$tp_code = $_POST["tp_code"];
$org_name = $_POST["org_name"];
$doi = $_POST["doi"];
$ro_add = $_POST["ro_add"];
$ro_distt = $_POST["ro_distt"];
$ro_city = $_POST["ro_city"];		
$ro_state = $_POST["ro_state"];
$ro_pin = $_POST["ro_pin"];
$ro_mob = $_POST["ro_mob"];
$ro_email = $_POST["ro_email"];
$hr_name = $_POST["hr_name"];
$hr_desig = 'HR';
$hr_mob = $_POST["hr_mob"];
$pc_email = $_POST["pc_email"];
$pay_sts = $_POST["pay_sts"];
$status = $_POST["status"];
$password = $_POST["password"];
$tmstmp = $_POST["tmstmp"];
$cou_name = $_POST["cou_name"]; 	
$client = $_POST["client"]; 	
$model = $_POST["model"]; 	
$mode = $_POST["mode"]; 	
$tpi_name = $_POST["tpi_name"]; 	
$req_headcount = $_POST["req_headcount"]; 	

		$qry="INSERT INTO `onboarding`(`role`, `scheme`, `tp_code`, `cen_id`, `org_name`, `doi`, `ro_add`, `ro_distt`, `ro_city`, `ro_state`, `ro_pin`, `ro_mob`, `ro_email`, `hr_name`, `hr_desig`, `hr_mob`, `pc_email`, `password`, `pay_sts`, `status`, `tmstmp`) VALUES('".$role."','".$scheme."','".$tp_code."','".$cen_id."','".$org_name."','".$doi."','".$ro_add."','".$ro_distt."','".$ro_city."','".$ro_state."','".$ro_pin."','".$ro_mob."','".$ro_email."','".$hr_name."','".$hr_desig."','".$hr_mob."','".$pc_email."','".$password."','".$pay_sts."','".$status."','".$tmstmp."')";
		$qry1="INSERT INTO `course`(`cen_id`, `org_name`, `cou_name`, `cou_code`, `cou_sec`) VALUES ('".$cen_id."','".$org_name."','".$cou_name."')";
		$qry2="INSERT INTO `ip_details`(`cen_id`, `client`, `stipend_model`, `mode`, `tpi_name`, `req_headcount`) VALUES ('".$cen_id."','".$client."','".$model."','".$mode."','".$tpi_name."','".$req_headcount."')";
		$sql = mysqli_query($con, $qry);
		$sql1 = mysqli_query($con, $qry1);
		$sql2 = mysqli_query($con, $qry2);
		
	}

	if($sql)
	{
		?>
        <script>
		alert('Records was sucessfully inserted !!!"');
	    window.location.href='payment.php?cen_id=<?php echo $cen_id ?>';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('error while inserting , TRY AGAIN');
		</script>
        <?php
	}
}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Onboarding Registration Page</title>
		<!--favicon -->
		<link rel="icon" href="cutm.ico" type="image/x-icon"/>
		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">
		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">
		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">
		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript">
    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "1" ? "block" : "none";
		var dvPassport2 = document.getElementById("dvPassport2");
        dvPassport2.style.display = ddlPassport.value == "2" ? "block" : "none";
    }
</script>
<style>
		/* Latest compiled and minified CSS included as External Resource*//* Optional theme *//*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/ body {    margin-top:30px;}.stepwizard-step p {    margin-top: 0px;    color:#666;}.stepwizard-row {    display: table-row;}.stepwizard {    display: table;    width: 100%;    position: relative;}.stepwizard-step button[disabled] {    /*opacity: 1 !important;    filter: alpha(opacity=100) !important;*/}.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {    opacity:1 !important;    color:#bbb;}.stepwizard-row:before {    top: 14px;    bottom: 0;    position: absolute;    content:" ";    width: 100%;    height: 1px;    background-color: #ccc;    z-index: 0;}.stepwizard-step {    display: table-cell;    text-align: center;    position: relative;}.btn-circle {    width: 30px;    height: 30px;    text-align: center;    padding: 6px 0;    font-size: 12px;    line-height: 1.428571429;    border-radius: 15px;}	.app-content {		margin-left: 0px!important;	}.drop {  position: relative;  -webkit-user-select: none;     -moz-user-select: none;      -ms-user-select: none;          user-select: none;}.drop.open {  z-index: 100;}.drop.open .drop-screen {  z-index: 100;  display: block;}.drop.open .drop-options {  z-index: 200;  max-height: 200px;}.drop.open .drop-display {  z-index: 200;  border-color: #000;}.drop select {  display: none;}.drop .drop-screen {  position: fixed;  width: 100%;  height: 100%;  top: 0px;  left: 0px;  opacity: 0;  display: none;  z-index: 1;}.link {  text-align: center;  margin: 20px 0px;  color:#000;}.drop .drop-display {  position: relative;  padding: 0px 20px 5px 5px;  width: 100%;  background: #FFF;  z-index: 1;  margin: 0px;  font-size: 16px;  min-height: 58px;}.drop .drop-display:hover:after {  opacity: 0.75;}.drop .drop-display:after {  font-family: 'Material Icons';  content: "\e5c6";  position: absolute;  right: 10px;  top: 12px;  font-size: 24px;  color: #000;}.drop .drop-display .item {  position: relative;  display: inline-block;  border: 2px solid #333;  margin: 5px 5px -4px 0px;  padding: 0px 25px 0px 10px;  overflow: hidden;  height: 40px;  line-height: 36px;}.drop .drop-display .item .btnclose {  color: #000;  position: absolute;  font-size: 16px;  right: 5px;  top: 10px;  cursor: pointer;}.drop .drop-display .item .btnclose:hover {  opacity: 0.75;}.drop .drop-display .item.remove {  -webkit-animation: removeSelected 0.2s, hide 1s infinite;  animation: removeSelected 0.2s, hide 1s infinite;  -webkit-animation-delay: 0s, 0.2s;  animation-delay: 0s, 0.2s;}.drop .drop-display .item.add {  -webkit-animation: addSelected 0.2s;   animation: addSelected 0.2s;}.drop .drop-display .item.hide {  display: none;}.drop .drop-options {  background: #000;  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);  position: absolute;  width: 100%;  max-height: 0px;  overflow-y: auto;  transition: all 0.25s linear;  z-index: 1;}.drop .drop-options a {  display: block;  height: 40px;  line-height: 40px;  padding: 0px 20px;  color: white;  position: relative;  max-height: 40px;  transition: all 1s;  overflow: hidden;}.drop .drop-options a:hover {  background: #5bc7e7;  cursor: pointer;}.drop .drop-options a.remove {  -webkit-animation: removeOption 0.2s;          animation: removeOption 0.2s;  max-height: 0px;}.drop .drop-options a.add {  -webkit-animation: addOption 0.2s;          animation: addOption 0.2s;}.drop .drop-options a.hide {  display: none;}@-webkit-keyframes pop {  from {    -webkit-transform: scale(0);            transform: scale(0);  }  to {    -webkit-transform: scale(1);            transform: scale(1);  }}
@keyframes pop {  from {    -webkit-transform: scale(0);            transform: scale(0);  }  to {    -webkit-transform: scale(1);           transform: scale(1);  }}@-webkit-keyframes removeOption {  from {    max-height: 40px;  }  to {    max-height: 0px;  }}@keyframes removeOption {  from {    max-height: 40px;  }  to {    max-height: 0px;  }}@-webkit-keyframes addOption {  from {    max-height: 0px;  }  to {    max-height: 40px;  }}@keyframes addOption {  from {    max-height: 0px;  }  to {    max-height: 40px;  }}@-webkit-keyframes removeSelected {  from {    -webkit-transform: scale(1);            transform: scale(1);  }  to {    -webkit-transform: scale(0);            transform: scale(0);  }}@keyframes removeSelected {  from {    -webkit-transform: scale(1);            transform: scale(1);  }  to {    -webkit-transform: scale(0);            transform: scale(0);  }}@-webkit-keyframes addSelected {  from {    -webkit-transform: scale(0);            transform: scale(0);  }  to {    -webkit-transform: scale(1);            transform: scale(1);  }}@keyframes addSelected {
 from {    -webkit-transform: scale(0);            transform: scale(0);  }  to {    -webkit-transform: scale(1);            transform: scale(1);  }}@-webkit-keyframes hide {  from, to {    max-height: 0px;    max-width: 0px;    padding: 0px;    margin: 0px;    border-width: 0px;  }}@keyframes hide {  from, to {    max-height: 0px;    max-width: 0px;    padding: 0px;    margin: 0px;    border-width: 0px;  }}#hidden_div {    display: none;}</style>
		
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				<nav class="navbar navbar-expand-lg main-navbar">
					<a class="header-brand" href="http://amasy.cutmams.in">
					<img src="assets/img/logo-white.png" style="height: 50px" class="header-brand-img" alt="  Asta-Admin  logo">
					</a>
					<form class="form-inline mr-auto">
						
                        <div class=" form-inline mr-auto horizontal" id="headerMenuCollapse">
							<div class="d-none d-lg-block">
								
						    </div>
						</div>
					</form>
				</nav>

				
				<div class="app-content">
					<div class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Registration</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Industry Partner Onboarding Application</li>
							<li class="ml-auto d-md-flex d-none">
							</li>
                        </ol>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-warning btn-circle">1</a>
                <p><small>Accept T&amp;C</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Course &amp; Model Details</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Company Details</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Other Details</small></p>
            </div>
        </div>
    </div>
    
      <form method="post"> 
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading"> 
                 <h3 class="panel-title">Section - 1 - Accept T&amp;C</h3>
            </div>
            <div class="panel-body">
                
                 <div class="form-group">
                                                <label class="col-xs-3 control-label">PLEASE READ THE INSTRUCTIONS CAREFULLY BEFORE PROCEEDING.</label>
                                                <div class="col-xs-9">
                                                    <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                                        <h6 style="color: darkred;">Gram Tarang Vocational Education Training</h6>
                                                        <hr/>
                                                        <p><strong>Industry Partner on Boarding Application:</strong></p>
                                                        <p>
                                                            INSTRUCTIONS TO THE APPLICANT

                                                            <br/>1.	Kindly go through the form thoroughly before filling it up.
                                                            <br/>2.	It may be noted that the ‘Applicant’ here refers to the main promoter/ partner who would run the day to day operations of the proposed Training Centre.
                                                            <br/>3.	This application should be filled in English language only, either by typing or in block letters with black ink.
                                                            <br/>4.	All the financial information should be mentioned INR.
                                                            <br/>5.	Multiple locations may be applied for an applicant must fill separate application form for each proposed Training Centre.
                                                            <br/>6.	Please strike off the headings not relevant to your application.
                                                            <br/>7.	Please attach documentary proofs as mentioned in the application form. Documentary proof requirement may be different for different establishments.
                                                            <br/>
                                                        </p>

                                                        <p>
                                                            <strong>ELIGIBILITY</strong><br/>
                                                            Following applicants are eligible to apply:<br/>

                                                            <br/>1. Training Institutes set up/ affiliated by Government:
                                                            <br/>2. Any educational/ training institute fulfilling any of the following criteria: it is/ TP of SEEKHO AUR KAMAO/ TP of State Funded Programme
                                                            <br/>3. Institutes approved under any Central Government skill training Schemes
                                                            <br/>4. Training delivery partners already affiliated to NSDC as non-funding partners.
                                                            <br/>5. Colleges/ Institutes affiliated to a university set up by Central or State/ UT government or recognized by University Grants Commission.
                                                            <br/>6. Schools / Institutes approved by Central or State Boards of Secondary Education (or equivalent) or Boards of Technical Education.
                                                            <br/>7. Any other institute set up by Central or State/ UT government/ Corporates/ CSR Trust/ International Institution.
                                                            <br/>8. In future, if the registration/affiliation of the institute is cancelled for any reason by the respective accrediting/registering/governing authority, then its registration as a training partner of CUTM would also stand cancelled.
                                                            <br/>
                                                            <br/>Training Institutes set up by Corporate:
                                                            <br/>1. Any educational/ training institute fulfilling any of the following criteria:
                                                            <br/>2. Institutes owned/ promoted by corporate
                                                            <br/>3. Institutes managed/ run by corporate Company/ Firm/ Society/ Trust
                                                            <br/>5. Any of the above fulfilling any of the following criteria:
                                                            <br/>5. An organization providing training under Apprentices Act, 1961 for last one year from the date of submission of the application in their own or rented premises.
                                                            <br/>5. An organization registered in India, conducting business in the domain of skill development & training, having Permanent Income Tax Account Number (PAN) and Service Tax Registration Number and audited accounts of statements at least for last one year.
                                                            <br/>
                                                            <br/>ON BOARDING PROCEDURE
                                                            <br/>1. All Training Partners  are required to submit duly filled in and signed application in the prescribed form along with prescribed application fee
                                                            <br/>2. All supporting documents, as given in the application form shall be submitted along with the application form
                                                            <br/>3. Application may be submitted by online and after submission the acknowledgement with Imported documents will seal and sign. The Same then will be submitted by post, courier or by hand for further action
                                                            <br/>4. Applicant may apply for more than one center through separate application forms.
                                                            <br/>5. Application will be processed at two levels:
                                                            <br/>6. Documentation level
                                                            <br/>7. Centre Verification
                                                            <br/>8. Agreement /MoU
                                                            <br/>9. AMASYS portal Login approval
                                                            <br/>
                                                            <br/>APPLICATION FORM For On Boarding
                                                            <br/>Application form for Registration/Affiliation/ Accreditation as a Training Partner/Assessment & Certification may be access at https;//cutmams.in
                                                            <br/>
                                                            <br/>EVALUATION OF APPLICATION
                                                            <br/>
                                                            <br/>1. CUTM shall evaluate all applications received, within a period of seven days from the date of receipt of the application.
                                                            <br/>2. CUTM may call for additional information, if required.
                                                            <br/>3. CUTM or its representative(s) may investigate the correctness of the information provided by the applicant.
                                                            <br/>4. The applicant may be called for a personal meeting/ interview with CUTM.
                                                            <br/>
                                                            <br/>APPLICATION FEE
                                                            <br/>
                                                            <br/>The applicant must submit a non-refundable process fees of Rs.1000.00 through Online mode.
                                                            <br/>EVALUATION OF TRAINING CENTRE
                                                            <br/>1. On completion of the requirements for Affiliation/ Accreditation, the applicant shall apply for evaluation of the training center.
                                                            <br/>2. CUTM expects training partner to have requisite infrastructure. This infrastructure may      be owned/leased/organized by training partner.
                                                            <br/>3. CUTM or representative(s) nominated by CUTM shall arrange to evaluate the training center.
                                                            <br/>4. Fees payable against evaluation charges shall be non- refundable.
                                                            <br/>
                                                            <br/>
                                                        </p>

                                                    </div>
                                                </div>
                                                <a href="" target="_blank">Open Document in the new tab</a>
                                            </div>
                                            <div class="checkbox">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" checked disabled="" required>
                                                    <label for="checkbox-1" class="custom-control-label">I/We Agree with the terms and conditions</label>
                                                </div>
                                            </div>
                
                
            </div>
        </div>
        </br>
		</br>
		</br>
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Section - 2 - Programme &amp; Model Detail</h3>
            </div>
			</br></br>
            <div class="panel-body">
               <div class="form-group row">
                    <label class="col-md-3 col-form-label">Programme</label>
					<div class="col-md-9">
                    <select class="form-control" name="scheme" id="myMulti">

                                                <?php
				                                 include 'scripts/db-connect.php';
                                                //Get all the states
                                                $getSchemeDataQuery = "SELECT * FROM `scheme` ORDER BY id";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0)
													{
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
														
                                                        <option value="<?=$getSchemeData['value'];?>"><?=$getSchemeData['name'];?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
				   </select>
                </div></div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Name of The Industry</label>
					<div class="col-md-9">
                    <input maxlength="200" type="text" required="required" class="form-control" name="org_name" placeholder="Enter Industry Name" />
                </div></div>
					<div class="form-group row">
                    <label class="col-md-3 col-form-label">Date of MoU Signed</label>
					<div class="col-md-9">
                    <input type="date" required="required" name="doi"class="form-control" placeholder="Enter Date of MoU Agreement" />
                </div></div>
					<div class="form-group row">
                    <label class="col-md-3 col-form-label">Course Name</label>
					<div class="col-md-9">
                    <select class="form-control" name="cou_sec">
					<option value="" selected>--Select--</option>
                    <option value="Industrial Fitter">Industrial Fitter</option>
                   	<option value="Industrial Electrician">Industrial Electrician</option>
                   	<option value="Lather Machine">Lather Machine</option>
                   	<option value="Automotive Manufacturing Technician">Automotive Manufacturing Technician</option>
                   	<option value="Welding Technician">Welding Technician</option>
				   </select>
                </div></div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Client of</label>
					<div class="col-md-9">
                    <select name="client" class="form-control" required>
                   	<option value="" selected>--Select--</option>
                   	<option value="CUTM">CUTM</option>
                   	<option value="GTET">GTET</option>
					<option value="GTVET">GTVET</option>
                   	</select>
                </div></div>
					<div class="form-group row">
                    <label class="col-md-3 col-form-label">Model</label>
					<div class="col-md-9">
                    <select name="model" class="form-control" required>
                   	<option value="" selected>--Select--</option>
                   	<option value="P&C">Pay &amp; Collect</option>
                   	<option value="C&P">Collect &amp; Pay</option>
                   	</select>
				</div></div>
                                <br/><br/>
                
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Section - 3 - Company Details</h3>
            </div>
			</br>
			</br>
            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Registered Address*</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="ro_add"></textarea>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">District</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ro_distt">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">City</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ro_city">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">State</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="ro_state">
					<option value="" selected>--Select--</option>
                                                <?php
				                                 include 'scripts/db-connect.php';
                                                //Get all the states
                                                $getSchemeDataQuery = "SELECT name FROM `state`";
                                                $getSchemeDataResult = $conn->query($getSchemeDataQuery);
                                                if ($getSchemeDataResult->num_rows > 0)
													{
                                                    while ($getSchemeData = $getSchemeDataResult->fetch_assoc()){
                                                        ?>
														
                                                        <option value="<?=$getSchemeData['name'];?>"><?=$getSchemeData['name'];?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
				   </select>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Pin Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ro_pin">
                                        </div>
                                    </div>
                                    
                                </br>
			</br></br>
			</br>
								<div class="panel-heading">
                 <h4 class="panel-title">HR Details</h4>
            </div>
			</br>
			</br>
								<div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">HR Name*</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="hr_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">HR Mobile Number*</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="hr_mob">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-md-3 col-form-label">HR Email*</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="email" name="hr_email">
                                        </div>
                                    </div>
                                    
                                </div>
</div>
                            </div>
                            <br/><br/>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Section - 4 - Channel Partner Details</h3>
            </div>
            <div class="panel-body">
                            <center>
                                <h5>Details </h5>
                                <br/>
                                <br/>
                            </center>
                            <div class="row">
                                <div class="col-lg-12">
								<div class="form-group row">
                    <label class="col-md-3 col-form-label">Source</label>
					<div class="col-md-9">
                    <select name="mode" class="form-control" id="ddlPassport" onchange = "ShowHideDiv()" required>
                   	<option value="" selected>--Select--</option>
                   	<option value="1">Direct</option>
                   	<option value="2">Training Partner Institution</option>
                   	</select>
				</div></div>
				</div>
				<div id="dvPassport" style="display: none"  class="col-lg-12">
								<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Regional Head Name</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
										</div>
										</div>
										<div class="form-group row">
										<label class="col-md-3 col-form-label">Regional Head Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
										</div>
										<div class="form-group row">
										<label class="col-md-3 col-form-label">Regional Head Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
										</div>
										<div class="form-group row">
										<label class="col-md-3 col-form-label">Supervisor Name</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
										</div>
										<div class="form-group row">
										<label class="col-md-3 col-form-label">Supervisor Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
										</div>
										<div class="form-group row">
										<label class="col-md-3 col-form-label">Supervisor Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                        </div>
                                    </div>
									<div id="dvPassport2" style="display: none" class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">TPI Name</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">TPI Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">TPI Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Name</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-md-3 col-form-label">Supervisor Email ID</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="tpi_name">
                                        </div>
                                    </div>
									

                            </div>
                            <br/><br/>
                            <input type="hidden" name="tmstmp" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("y/m/d h:i:s a");?>" />
                            <input type="hidden" name="cen_id" value="<?php echo $unq_id; ?>" />
                            <input type="hidden" name="tp_code" value="<?php echo $unq_id; ?>" />
                            <input type="hidden" name="pay_sts" value="Pending" />
                            <input type="hidden" name="password" value="GTVET@2022" />
                            <input type="hidden" name="status" value="Under Process" />
                            
                <input type="submit" name="save_mul" value="Submit For Review" class="btn btn-primary nextBtn pull-right"" />
            </div>
        </div>
    </form>
</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<footer class="main-footer">
					<div class="text-center">
						Copyright &copy; 2022 GTVET. Designed &amp; Developed By<a href=""> GTVET I.T Team</a>
					</div>
				</footer>

			</div>
		</div>



		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>
		<script  src="assets/js/multiselect.js"></script>

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

		<!--Othercharts js-->
		<script src="assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
	</body>
	
</html>
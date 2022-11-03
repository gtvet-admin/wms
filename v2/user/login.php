<?php

    //Start Session
    session_start();

    //check if session is already set
    if(isset($_SESSION['bazooka'])) { //If yes

        //Redirect to dashboard
        header('Location:index.php');

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
		<title>GTVET</title>

		<!--Favicon -->
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
        <link href="assets/js/selectstyle.css" rel="stylesheet" type="text/css">
        <style>
			.blink{

	}
	span{
		color: white;
		animation: blink 1s linear infinite;
	}
@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}
}
		</style>
	</head>

    <?php
    //Load body with js function if the message is not null
    if ($message != "") {

        echo "<body class='bg-light' onload='toast();'>";

    } else {

        echo "<body class='bg-light'>";

    }
    ?>
		<div id="app">
			<section class="section section-2">
                <div class="container">
                <center><h4 style="color: red"></h4></center>
               
                	<div class="row">
						<div class="single-page single-pageimage " data-image-src="https://scontent.fbbi2-1.fna.fbcdn.net/v/t1.0-9/304619_384451124961758_1320913655_n.jpg?_nc_cat=107&_nc_ht=scontent.fbbi2-1.fna&oh=538e2381c328a1e199a6719571f9e79b&oe=5C9010D3">
							<div class="row">
							    
								<div class="col-lg-12 col-xl-12">
									<div class="login-sec">
										<div class=" text-center card mb-0">
											<form id="login" class="card-body" tabindex="500" method="POST" action="scripts/login-verify.php">
												<h4 class="mb-3">Welcome User</h4>
												<div class="">
													<div class="form-group">
                                                        <input type="email" class="form-control" id="exampleInputEmail1" value="Your email" name="username" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
													</div>
													<div class="form-group">
														<input type="password" class="form-control" id="exampleInputPassword1" value="Password" name="password" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
													</div>
													<div class="form-group">
														<select name="role" placeholder="Select Your Scheme" data-search="true" class="form-control"required>
                                                         <option value="">Select Role</option>  
														  <option value="IP">Admin</option>
														  <option value="CM">On-Site Trainer</option>
														  <option value="TP">Regional Managers</option>
														  <option value="CRC">Candidate Registration Centre (CRC)</option>
														  <option value="LD">L&amp;D Team</option>
														</select>
													</div>
													<div class="checkbox">
														<div class="custom-checkbox custom-control">
															<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" checked disabled="">
															<label for="checkbox-1" class="custom-control-label">Keep Me signed in</label>
														</div>
													</div>
												</div>
												<div class="submit mt-3 mb-3">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Login" >
												</div>
												<p class="mb-2"><a href="forgot.php">Forgot Password</a></p>
												<p class="mb-2"><a href="check_status.php">Check Login Status</a></p>
<!--												<p class="text-dark mb-0">Don't have account?<a href="register.php" class="text-primary ml-1">Sign Up</a></p>-->
                                                <br/>
                                                <p>Don't have an account? Please click below link to register yourself </p>
                                                <p class="text-dark mb-0"><a href="reg-ip.php" class="text-primary ml-1">Industry Partner Onboarding Application</a></p>
                                                <br/>
												<p>GTVET Lernern On-Site Trainer Management Android App </p>
												<p class="mb-2"><a href="https://gtetonline.com/flexi-mou/gtvet/user/api/gtvet-lerern.apk"><img style="width: 200px;" src="assets/img/download-android-app.png"/></a></p>
												
										    </form>
									    </div>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</section>
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

		<script src="assets/js/moment.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
		
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="assets/js/selectstyle.js"></script>

	</body>
</html>
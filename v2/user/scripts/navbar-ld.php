<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
                <img alt="image" src="assets/img/assessor-profile/user.png" class=" avatar-md rounded-circle">
                <span class="ml-2 d-lg-block">
                    <span class="text-dark app-sidebar__user-name mt-5"><?php echo $org_name ;?></span><br>
                    <span class="text-muted app-sidebar__user-name text-sm">L&amp;D Trainer</span>
                </span>
            </a>
        </div>
    </div>
    <ul class="side-menu">
        <!-- Menu For Training Partner Starts -->
<!--        <li>-->
<!--            <a class="side-menu__item" href="add-training-center.php"><i class="side-menu__icon fa fa-flask"></i><span class="side-menu__label">Organisation Details</span></a>-->
<!--        </li>-->
<!---->
<!--        <li class="slide">-->
<!--            <a class="side-menu__item"  href="index.php"><i class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Organisation Promoter</span></a>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <a class="side-menu__item" href="enlist-training-center.php"><i class="side-menu__icon fa fa-flask"></i><span class="side-menu__label">Enlist Your Training Center</span></a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a class="side-menu__item" href="verify-training-center.php"><i class="side-menu__icon fa fa-flask"></i><span class="side-menu__label">Verify & Pay</span></a>-->
<!--        </li>-->


        <li>
            <a class="side-menu__item" href="index.php"><span class="side-menu__label">Dashboard</span></a>
        </li>
		<li class="slide">
		
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Training Delivery</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="#" class="slide-item">Add Region</a></li>			
				<li><a href="#" class="slide-item">Add Industry</a></li>			
				<li><a href="#" class="slide-item">Add Program</a></li>			
				<li><a href="#" class="slide-item">Add Course</a></li>			
				<li><a href="#" class="slide-item">Add Batch</a></li>
			</ul>
        </li>
			    
		
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Attendance Management</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu"> 		
		<li><a href="#" class="slide-item">Gooru</a></li>			
		<li><a href="#" class="slide-item">Online</a></li>			
		<li><a href="#" class="slide-item">Offline</a></li>			
		<li><a href="#" class="slide-item">Assessment</a></li>        
		
		</ul>
		</li>
		
		
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Content Management</span><i class="angle fa fa-angle-right"></i></a>
            
        </li>
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Utilization</span><i class="angle fa fa-angle-right"></i></a>
			
        </li> 
		<li class="slide">            
		<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Reports</span><i class="angle fa fa-angle-right"></i></a>			        
		</li>
		
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Profile Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="change-password.php" class="slide-item">Change Password</a></li>
            </ul>
        </li>
    </ul>
</aside>
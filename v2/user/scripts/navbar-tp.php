<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <a class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" href="#">
                <img alt="image" src="assets/img/assessor-profile/user.png" class=" avatar-md rounded-circle">
                <span class="ml-2 d-lg-block">
                    <span class="text-dark app-sidebar__user-name mt-5"><?php echo $name ;?></span><br>
                    <span class="text-muted app-sidebar__user-name text-sm">Regional Manager</span>
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
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Attendance Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
			
                <?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM opt_scheme where spoc_code ='$spoc_code' GROUP BY scheme_name";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "";
      while($row = mysqli_fetch_array($result))  { 
        echo "<li><a href='view-all-".$row["scheme_name"]."-att.php' class='slide-item'>".$row["scheme_name"]." Batch Details</a></li>";
    }
    echo "";
} else {
    echo "";
}
?>            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Batch Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
			
                <?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM opt_scheme where spoc_code ='$spoc_code' GROUP BY scheme_name";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "";
      while($row = mysqli_fetch_array($result))  { 
        echo "<li><a href='view-all-".$row["scheme_name"]."-btch.php' class='slide-item'>".$row["scheme_name"]." Batch Details</a></li>";
    }
    echo "";
} else {
    echo "";
}
?>            </ul>
        </li>
<!--        <li>-->
<!--            <a class="side-menu__item" href="#"><span class="side-menu__label">Contact Support Team</span></a>-->
<!--        </li>-->
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Student Credentials</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
			
                <?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM opt_scheme where spoc_code ='$spoc_code' GROUP BY scheme_name";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "";
      while($row = mysqli_fetch_array($result))  { 
        echo "<li><a href='view-all-trnscrpt.php?scheme=".$row["scheme_name"]."' class='slide-item'>".$row["scheme_name"]." Docs</a></li>";
    }
    echo "";
} else {
    echo "";
}
?>            </ul>
        </li>
		<li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Exam Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
			
                <?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM opt_scheme where spoc_code ='$spoc_code' GROUP BY scheme_name";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "";
      while($row = mysqli_fetch_array($result))  { 
        echo "<li><a href='add-".$row["scheme_name"]."-exams.php' class='slide-item'>".$row["scheme_name"]." Exams Details</a></li>";
    }
    echo "";
} else {
    echo "";
}
?>            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Profile Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="change-password.php" class="slide-item">Change Password</a></li>
            </ul>
        </li>
    </ul>
</aside>
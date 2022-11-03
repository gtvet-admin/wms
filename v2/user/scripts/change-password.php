<?php
include 'dbcon.php';
if(isset($_POST['submit']))
{		
	{
		$id = $_SESSION['cen_id'];
		$passw = $_POST["confirm_password"]; 
		$sql1="UPDATE `onboarding` SET `password`='$passw' WHERE cen_id ='$id'";
		$sql = mysqli_query($con, $sql1); 
	}
	if($sql)
	{
		?>
        <script>
		alert('Password was Sucessfully Updated !!!');
		window.location.href='$_SERVER['PHP_SELF']';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Error while submitting , TRY AGAIN');
		</script>
        <?php
	}
}
?>
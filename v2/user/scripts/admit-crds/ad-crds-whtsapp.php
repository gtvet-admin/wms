<?php 
include ('../dbcon.php');
$abn = $_REQUEST['roll'];
$yr = $_REQUEST['yr'];
$shft = $_REQUEST['shift']; 
$date = $_REQUEST['date']; 
 $query = "SELECT * FROM exam_elg_trn where roll_no ='$abn'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$tname = $row['tname'];
$fname = $row['f_name'];
$trade = $row['trade'];
$mobile = $row['mob'];
$dob = $row['dob'];
$app = $row['appr'];
$usr = substr_replace($mobile, str_repeat('X', strlen($mobile)-5), 2, -3);

?>
<?php 
include ('../dbcon.php');
$code = $_REQUEST['code'];
$yr = $_REQUEST['yr'];
$query = "SELECT * FROM exm_cen_list where cen_code ='$code'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$ename = $row['cen_name'];
$eadd = $row['cen_add'];
$cen_code = $row['cen_code'];
?>
 <?php
    include 'scripts/dbcon.php';
    
if(isset($_POST['submit']))
{		
	{
$abn = $_REQUEST['pr_abn_no'];
$cen_id = $_POST["cen_id"];	
$center_id = $_POST["center_id"];
$cen_pr_id = $_POST["cen_pr_id"];
$cen_name = $_POST["cen_name"];
$cou_name = $_POST["cou_name"];
$cou_code = $_POST["cou_code"];
$cou_sec = $_POST["cou_sec"];

		$sql="INSERT INTO `invoice`(`cen_id`, `cen_name`, `pr_abn_no`, `ttl_stud`, `amount`, `inv_no`) VALUES('".$cen_id."','".$cen_name."','".$pr_abn_no."','".$ttl_stud."','".$amount."','".$inv_no."')";
	//var_dump($_POST);
	//exit;
		$sql = mysqli_query($con, $sql);  
	}

	if($sql)
	{
		?>
        <script>
		alert('Batch Record was sucessfully submitted !!!');
		window.location.href='assesmet-invoice.php?pr_abn_no ='$abn'';
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
<?php
function numberTowords($num)
{ 

$ones = array(
0 =>"ZERO", 
1 => "ONE", 
2 => "TWO", 
3 => "THREE", 
4 => "FOUR", 
5 => "FIVE", 
6 => "SIX", 
7 => "SEVEN", 
8 => "EIGHT", 
9 => "NINE",
10 => "TEN", 
11 => "ELEVEN", 
12 => "TWELVE", 
13 => "THIRTEEN", 
14 => "FOURTEEN", 
15 => "FIFTEEN", 
16 => "SIXTEEN", 
17 => "SEVENTEEN", 
18 => "EIGHTEEN", 
19 => "NINETEEN",
"014" => "FOURTEEN" 
); 
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY", 
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND",
"MILLION", 
"BILLION", 
"TRILLION",
"QUARDRILLION" 
); /* limit t quadrillion */
$num = number_format($num,2,".",",");
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return $rettxt; 
} 


$birth_date = $dob;
$new_birth_date = explode('-', $birth_date);
$year = $new_birth_date[0];
$month = $new_birth_date[1];
$day  = $new_birth_date[2];
$birth_day=numberTowords($day);
$birth_year=numberTowords($year);
$monthNum = $month;
$dateObj = DateTime::createFromFormat('!m', $monthNum);//Convert the number into month name
$monthName = strtoupper($dateObj->format('F'));

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script>
        function printpage() {

            //Get the print button and put it into a variable
            

            //Print the page content
            window.print();

            
        }

    </script>
<style>
td{
	 font-weight: 700;
	 font-size : 14px;
}
</style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                <table style="width: 100%;">
                <tr>
           		<td style="float:left;"><img width="200px" src="../../assets/img/dgt-logo.png" alt="gtvetlogo"></td>
                <th style="text-align: center;line-height: 0px;"><h2 style='margin-left: -15%;'><b>All India Trade Test (AITT)</b></h2></br>
				<h6 style='margin-left: -15%;'><b>Online Computer Based Test (CBT)</b></h6></br>
				<h6 style="color:red; margin-left: -15%;"><b>Flexi MoU under Craftsmen Training Scheme (CTS)</b></h6></br>
				<h6 style='margin-left: -15%;'><b>Directorate General of Training</b></h6></br>
				<h6 style='margin-left: -15%;'><b>Ministry of Skill Development &amp; Entrepreneurship</b></h6></br>
				<h6 style='margin-left: -15%;'><b>Governement of India</b></h6></br>
				</th>
           		<td style="float:right;"><img style="width:125px" src="../../assets/img/cutm-logo.png" alt="cutmlogo"></td>
           		</tr>
           		</table style="width: 100%;">
            <table class='table table-bordered mb-0'>
                <tr width="100%">
                    <td width="33%"><b style="color: #19467d;">Exam Centre :</b><b> <br/><br/><?=$ename;?> ,</br><?=$eadd;?></b><br/><br/>
					<b style="color: #19467d;">Centre Code :</b><b> <?=$cen_code;?></b> </td>
					<td width="33%">
					<center><img style="width:125px" src="../uploads/candidatePhotos/<?=$mobile;?>.png" alt="traineephoto"></center>
					</td>
					<td width="33%">
					<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https%3A%2F%2Fgtetonline.com%2Fflexi-mou%2Fgtvet%2Fuser%2Fscripts%2Fadmit-crds%2Fad-crds-verify.php&choe=UTF-8' height='200px;' width='200px'/>

					</td>
                </tr>
				<tr>
                    <td width="50%">
                        <b style="color: #19467d;">Trainee's Name :</b><b> <?=$tname;?></b>
                    </td>
					<td width="50%">
                        <b style="color: #19467d;">Roll No:</b><b>  <?=$abn;?></b> 
                    </td>
				</tr>
				<tr>
                    <td width="50%" >
                        <b style="color: #19467d;">Father's Name :</b><b> <?=$fname;?></b>
                    </td>
					<td width="50%" >
					<b style="color: #19467d;">Registered Mobile No :</b><b> <?=$usr;?></b>
					</td>
				</tr>
				<tr>
                    <td width="50%" >
                         <b style="color: #19467d;">Appearing :</b><b> <?=$app;?></b> 
                    </td>
					<td width="50%">
                        <b style="color: #19467d;">Trade :</b><b> <?=$trade;?></b> 
                    </td>
				</tr>
				<tr width="100%">
                    <td>
                        <b style="color: #19467d;">Date of Birth :</b><b> <?=$dob;?> <br/>(<?=$birth_day;?> <?=$monthName;?> <?=$birth_year;?>)</b> 
                    </td>
					<td>
					 
				</tr>
				<br/>
            </table>
			<br/>
			<center><b><h5 style="color: #19467d;">CBT (Computer Based Test) Schedule For Year : <?=$yr;?></b></h3>
			<br/>
			<?php
include ('scripts/dbcon.php');
$result ="SELECT * FROM  exam_schedule where yr ='$yr' AND shift = '$shft' AND dt='$date' AND type ='CBT'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'><tr>
                    <th style='color: #19467d;'>Sl No</th>
                    <th style='color: #19467d;'>Paper</th>
                    <th style='color: #19467d;'>Shift</th>
                    <th style='color: #19467d;'>Subject</th>
                    <th style='color: #19467d;'>Day</th>
                    <th style='color: #19467d;'>Date</th>
                    <th style='color: #19467d;'>Time</th>
					
                </tr>";
      while($row = mysqli_fetch_array($result))  {
		switch ($row['yr']) {
			case "1":
			   $rle=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				case "2":
			   $rle=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				
				default:
				$rle= "User";
	}  
        echo "$rle";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>Your Data has not been Approved! Please Contact Admin</h4></center>";
}
?>
            <br/>
			<center><b><h5 style="color: #19467d;">Practical Schedule For Year : <?=$yr;?></b></h3>
			<br/>
			<?php
include ('scripts/dbcon.php');
$yr = $_REQUEST['yr'];
$shft = $_REQUEST['shift']; 
$date = $_REQUEST['date']; 
$result ="SELECT * FROM  exam_schedule where yr ='$yr' AND shift = 'First' AND dt='25-09-2022' AND type ='Practical'";
$result=mysqli_query($con,$result);
    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'><tr>
                    <th style='color: #19467d;'>Sl No</th>
                    <th style='color: #19467d;'>Paper</th>
                    <th style='color: #19467d;'>Shift</th>
                    <th style='color: #19467d;'>Subject</th>
                    <th style='color: #19467d;'>Day</th>
                    <th style='color: #19467d;'>Date</th>
                    <th style='color: #19467d;'>Time</th>
					
                </tr>";
      while($row = mysqli_fetch_array($result))  {
		switch ($row['yr']) {
			case "1":
			   $rle1=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				case "2":
			   $rle1=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				
				default:
				$rle1= "User";
	}  
        echo "$rle1";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>Your Data has not been Approved! Please Contact Admin</h4></center>";
}
?>
            <br/>
			<center><b><h5 style="color: #19467d;">Engineering Drawing (E.D) Schedule For Year : <?=$yr;?></b></h3>
			<br/>
			<?php
$yr = $_REQUEST['yr'];
$shft = $_REQUEST['shift']; 
$date = $_REQUEST['date']; 
$result ="SELECT * FROM  exam_schedule where yr ='$yr' AND shift = 'Second' AND dt='25-09-2022' AND type ='E.D'";
$result=mysqli_query($con,$result);

    if ($result->num_rows > 0) {
    echo "<table class='table table-bordered mb-0'><tr>
                    <th style='color: #19467d;'>Sl No</th>
                    <th style='color: #19467d;'>Paper</th>
                    <th style='color: #19467d;'>Shift</th>
                    <th style='color: #19467d;'>Subject</th>
                    <th style='color: #19467d;'>Day</th>
                    <th style='color: #19467d;'>Date</th>
                    <th style='color: #19467d;'>Time</th>
					
                </tr>";
      while($row = mysqli_fetch_array($result))  {
		switch ($row['yr']) {
			case "1":
			   $rle=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				case "2":
			   $rle=  "<tr>
                        <td>01</td>
                        <td>".$row["ppr"]."</td>
                        <td>".$row["shift"]."</td>
                        <td>".$row["sub"]."</td>
                        <td>".$row["day"]."</td>
                        <td>".$row["dt"]."</td>
                        <td>".$row["time"]."</td>
                    </tr>";
				break;
				
				default:
				$rle= "User";
	}  
        echo "$rle";
		}
    echo "</div></table>";
} else {
    echo "<center><h4>Your Data has not been Approved! Please Contact Admin</h4></center>";
}
mysqli_close($con);
?>
            <br/>
                </tbody>
            </table>
            <table style="float: left;">
            <tr>
            <td style="float: left;">
            Note:</br>
			1. <b>This admit card is valid for Flexi MoU Computer Based Test (CBT) conducted by DGT, MSDE, Govt. of India.</b></br>
			2. The Examination Centre Address on this hall ticket might be changed, Please confirm with the Supervisor / Centre Manager at least two days before the examination.</br>
			3. Please carry a valid Govt identity proof along with this hall ticket to the examination centre(s).</br>
			4. Please ensure that you report to the centre at least 45 minutes prior of the examination time.</br>
			5. For any error in the hall ticket, please contact to the Supervisor / Centre Manager. Any hand written / correction will not be entertained.
            
            </td>
            </tr>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div><br>
</div>
	</body>

</html>

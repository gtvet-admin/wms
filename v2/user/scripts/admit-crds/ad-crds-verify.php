<?php 
include ('../dbcon.php');
$abn = $_REQUEST['roll'];
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

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                <table style="width: 100%;">
                <tr>
           		<td style="float:left;"><img width="200px" src="../../assets/img/dgt-logo.png" alt="gtvetlogo"></td>
                <th style="text-align: center;line-height: 0px;"><h2>All India Trade Test (AITT)</h2></br>
				<h6>Online Computer Based Test (CBT)</h6></br>
				<h6 style="color:red;">Flexi MoU under Craftsmen Training Scheme (CTS)</h6></br>
				<h6>Directorate General of Training</h6></br>
				<h6>Ministry of Skill Development &amp; Entrepreneurship</h6></br>
				<h6>Governement of India</h6></br>
				
				</th>
                
           		<td style="float:right;"><img style="width:150px" src="../../assets/img/cutm-logo.png" alt="amasylogo"></td>
           		</tr>
           		</table>
				<table style="width: 100%;">
                <tr>
           		<br/>
				<br/>
				<br/>
				<br/>
                <th style="text-align: center;line-height: 0px;"><h1>Admit Card Verified</h1><br/>				
				</th>

           		</tr>
           		</table>
            <br/>
            
        </div>
        <div class="col-md-1"></div>
    </div><br>
</div>
	</body>

</html>

<?php 
include ('../dbcon.php');
$abn = $_REQUEST['mprId'];
 $query = "SELECT * FROM rcpts where lernern_id ='$abn'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$today = $row['cen_id'];
$date = '08/08/2022';
$m= date('m');
$y= date('y');
$invoice_id = "GTVET/".$today."/".$m."/".$y."/".$row['id'];
$sch=$row['lern_prog'];
$to='31/07/2022';
$from='01/07/2022';
$amount = '500';
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
function convertToIndianCurrency($amount) {
    $no = round($amount);
    $decimal = round($amount - ($no = floor($amount)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $amount = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($amount) {
            $plural = (($counter = count($str)) && $amount > 9) ? '' : null;            
            $str [] = ($amount < 21) ? $words[$amount] . ' ' . $digits[$counter] . $plural : $words[floor($amount / 10) * 10] . ' ' . $words[$amount % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
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
        <div class="col-md-1"></div>
        <div class="col-md-10">
                 <table style="width: 100%;">
                 <tr>
           		<td style="float:left;"><img width="100px" src="../../assets/img/gtvet_1.png" alt="gtvetlogo"></td>
           		<td style="float:right; margin-top: 50px;"><img width="150px" src="../../assets/img/logo-color.png" alt="amasylogo"></td>
           		</tr>
           		</table>
            <br/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2" style="text-align: center">RECIEPT</th>
                </tr>
				<tr>
				<th colspan="2" style="text-align: center">Gram Tarang Technical Vocational Education & Training (GTVET) <br/>
                        382, 100 Feet Rd, Ghitorni, New Delhi, Delhi, Pin: 110030</th>
				</tr>
                <tr>
                    <th>Reciept No:     <?=$invoice_id;?> </th>
                    <th>Date:   <?php echo $date; ?> </th>
                </tr>
                </thead>
                <tbody>
				 <tr>
                    <td colspan="2">
                        <b>Recieved With Thanks From</b> 
                    </td>
                </tr>
                <tr>
                    <td width="100%">
                        Trainee Name:&nbsp;<?php echo $row['fname'];?><br/>
                        Regd ID:&nbsp;<?php echo $row['lernern_id'];?><br/>
                    </td>
                </tr>

                </tbody>
            </table>
            <br/>
            <br/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Particulars</th>
                    <th>Duration</th>
                    <th>Fees(₹)</th>
                    <th>Amount</th>
                </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>01</td><!--Serial Number -->
                        <td><b>Education Fees:</b>&nbsp;<?php echo $row['cen_name'];?><br/>
                            Under <?=$sch;?> Scheme.
                            
                        </td>
                        <td>
                            <?php echo $from;?> - <?php echo $to;?>
                        </td>
                        <td>
                            <?php
							switch ($sch) {
    case "CORPORATES":
            echo "₹800 + 18% GST";
        break;
    case "NAI MANZIL":
        echo "₹1000";
        break;
	case "NULM":
        echo "₹1000";
        break;								
	case "SEEKHO AUR KAMAO":
        echo "₹1000";
        break;
    default:
         echo "₹500";
}
                            ?>
                        </td>
                        <td>
                        <?php echo"₹". number_format((float)$amount , 2, '.', ''); ?>
                        </td>

                    </tr>
<!--                    --><?php
//                    $amount += $am;
//                    $sl_no++;
//                } ?>
                <tr>
                    <td colspan="4" style="text-align: right">
                        <b>Total(Including All Taxes)</b>
                    </td>
                    <td>
                        <?php echo"₹". number_format((float)$amount, 2, '.', ''); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <b>Total Amount In Words:</b> <?php echo convertToIndianCurrency($amount); ?>

                    </td>
                </tr>
                </tbody>
            </table>
            <br/>

           
                </tbody>
            </table>
            <table style="float: right;">
            <tr>
            <td style="float: right;">
            For Gram Tarang Technical Vocational Education & Training (GTVET)
            
            </td>
            </tr>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div><br>
</div>
	</body>

</html>

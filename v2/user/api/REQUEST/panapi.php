<?php
include ('../scripts/dbcon.php');
//var_dump($_POST);
$pan_no = $_POST['pan_no'];
$epic_no = $_POST['epic_no'];

$response['status'] =1;
$response['message'] ="success";
if(isset($_POST['request']) && $_POST['request']=='check'){
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://testapi.karza.in/v2/pan",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"consent\":\"Y\",\"pan\":\"$pan_no\"}",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "x-karza-key: vN5ojXUenlY3QSzX"
      ),
    ));
    
    $result = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    $response['status'] =1;
    if ($err) {
        $response['status'] =0;
      $response['message'] = "cURL Error #:" . $err;
    } else {
      $response['data']=$result;
      
      
      $result_array = json_decode($result, true);
      if($result_array['status-code']==101){
          
              
         
      }
      //var_dump($result_array);
    }
}else{
    if(isset($_POST['pan_json_data']) && $_POST['pan_json_data']!=null){
      
      
        $result_array=json_decode($_POST['pan_json_data'], true);
        //var_dump($result_array);
        $query="update cust_details2 set ";
        
        $pan_name = $result_array['result']['name'];
        
        $pan_status = 1;
        $pan_timestamp = time();
        
        $query.=" pan_no='$pan_no' ";
        $query.=", pan_name='$pan_name' ";
        $query.=", pan_status='$pan_status' ";
        $query.=", pan_timestamp='$pan_timestamp' ";
        
        $query .=" where epic_no='$epic_no'";
        
        $mresult = mysqli_query($con, $query);
        if(!$mresult){
          $response['status'] =0;
          $response['message']="Failed To Update Database";
        }
    }else{
        $response['status']=0;
        $response['message']="Please check your PAN No and Try Again!!!";
    }
}
echo json_encode($response);

?>
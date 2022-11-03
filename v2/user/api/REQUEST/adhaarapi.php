<?php
session_start();
include ('../scripts/dbcon.php');
//var_dump($_POST);
$cust_code=$_SESSION['cust_code'];
$response['status'] =1;
$response['message'] ="success";
if(isset($_POST['request']) && $_POST['request']=='check'){
    $epic_no = $_POST['epic_no'];
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://testapi.karza.in/v2/voter",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"consent\":\"Y\",\"epic_no\":\"$epic_no\"}",
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
    //insert into database
    //var_dump($_POST);
    //var_dump();
    if(isset($_POST['epic_json_data']) && $_POST['epic_json_data']!=null){
        
        //var_dump(json_decode($_POST['epic_json_data']));
        
        $result_array=json_decode($_POST['epic_json_data'], true);
        $epic_no = $result_array['result']['epic_no'];
          $select_query="select * from cust_details where epic_no='$epic_no'";
          $select_result = mysqli_query($con, $select_query);
          if($select_result->num_rows>0){
              $response['message']="Already Inserted Into Database";
          }else{
              $query="insert into cust_details2(cust_code, epic_no, vid_name, vid_name_hi, vid_rln_name, vid_rln_name_hi, vid_rln_type, vid_gender, vid_age, vid_dob, vid_house_no, vid_distt, vid_state, vid_status, vid_timestamp)";
              
              $epic_no = $result_array['result']['epic_no'];
              $vid_name = $result_array['result']['name'];
              $vid_name_hi = $result_array['result']['name_v1'];
              $vid_rln_name = $result_array['result']['rln_name'];
              $vid_rln_name_hi = $result_array['result']['rln_name_v1'];
              $vid_rln_type = $result_array['result']['rln_type'];
              $vid_gender = $result_array['result']['gender'];
              $vid_age = $result_array['result']['age'];
              $vid_dob = $result_array['result']['dob'];
              $vid_house_no = $result_array['result']['house_no'];
              $vid_distt = $result_array['result']['district'];
              $vid_state = $result_array['result']['state'];
              $vid_status = 1;
              $vid_timestamp = time();
              
              $query.=" values('$cust_code', '$epic_no','$vid_name','$vid_name_hi','$vid_rln_name','$vid_rln_name_hi','$vid_rln_type','$vid_gender','$vid_age','$vid_dob','$vid_house_no','$vid_distt','$vid_state','$vid_status','$vid_timestamp')";
              
              $mresult = mysqli_query($con, $query);
              if(!$mresult){
                  $response['status'] =0;
                  $response['message']="Failed To Insert Into Database";
              }
          }
          
    }else{
        $response['status']=0;
        $response['message']="Please check your EPIC No and Try Again!!!";
    }
}
echo json_encode($response);

?>
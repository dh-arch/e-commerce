
<?php
include 'connection.php';

header('Content-Type: application/json');
$headers = apache_request_headers();  print_r($headers);

if(isset($headers['Authorization'])){
    $jwttoken= $headers['Authorization'];   print_r($jwttoken);
  
    $detoken= explode('.',$jwttoken);  //print_r($detoken);

    $token= json_decode(base64_decode($detoken[1]));  // print_r($token);
 
    $unique_id= $token->unique_id;   
    $uid= $token->uid; 
    $name= $token->name;  

    $data= array('error' => 'false', 'message' => 'token get', 'unique_id' => $unique_id );
    echo json_encode($data);
}
else{
    $data= array('error' => 'true', 'message' => 'token is failed');
    echo json_encode($data);
}
?>
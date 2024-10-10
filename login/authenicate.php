<?php
include 'connection.php';
session_start();

$headers= apache_request_headers();  print_r($headers);
$id= $_SESSION['user_id'];  print_r($id);

$sql= "select * from `signupdata` where `id`='$id'";  print_r($sql);
$result= mysqli_query($conn, $sql);
if($result){
    $row= mysqli_fetch_assoc($row);

    $token= $row['token'];  print_r($token);

    if(isset($headers['Authorization'])){
        $headers= ['Authorization'];
        $match= array();
        if(preg_match($headers, $match)){
            if($match[1]){
                $token= $match[1];  print_r($token);

                $data= array('error' => 'false', 'message' => 'token verify successfully', 'token' => $token);
                echo json_encode($data);
            }
            else{
                $data= array('error' => 'true', 'message' => 'Unauthorized no token provide');
                echo json_encode($data);
            }
        }
    }
}


?>
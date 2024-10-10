<?php
include 'connection.php';
$headers = apache_request_headers();

if(isset($_POST['password']) && isset($_POST['conpassword']) && isset($headers['Authorization'])){
    $pwd= $_POST['password'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $conpwd= $_POST['conpassword'];
    $conpassword= password_hash($_POST['conpassword'], PASSWORD_DEFAULT); 

    $verifytoken= $headers['Authorization'];    

    $detoken= explode('.', $verifytoken);

    $token= json_decode(base64_decode($detoken[1]));  // print_r($token);

    $email= $token->email;
    $otp= $token->otp;

    if($pwd === $conpwd){
    
        $sql= "select * from `signupdata` where `email`='$email'";  // print_r($sql);
        $result= mysqli_query($conn,$sql);
        if($result == true){
            $sql= "update `signupdata` set `password`='$password', `conpassword`='$conpassword' where `email`='$email'";  // print_r($sql);
            $result= mysqli_query($conn,$sql);

            if($result == true){
                $data= array('error' => 'false', 'message' => 'password update successfully');
                echo json_encode($data);
            }
            else{
                $data= array('error' => 'true', 'message' => 'password update unsuccessfully');
                echo json_encode($data);
            }
        }
        else{
            $data= array('error'=> 'true', 'message'=> 'email is invalid');
            echo json_encode($data);
        }
    }
    else{
        $data= array('error' => 'true', 'message'=> 'password and confirm password not matched');
        echo json_encode($data);
    }
}
else{
    $data= array('error'=> 'true', 'message'=>'password and confirm password is invalid');
    echo json_encode($data);
}
?>

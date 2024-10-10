<?php
session_start();
include 'connection.php';
use Respect\Validation\Validator as v;

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];   // print_r($email);
    $pwd= $_POST['password'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);   // print_r($password);  

    $query = "SELECT * FROM `signupdata` WHERE `email`='$email'";   // print_r($query);  
    $result=mysqli_query($conn, $query); 
    if ($result == true) {
        $row= mysqli_fetch_assoc($result);  

        $id= $row['id'];   
        $dbemail= $row['email'];  
        $hash= $row['password'];  // print_r($hash);  

        if(password_verify($pwd, $hash)) {

            $sql= "select * from `signupdata` where `password`='$password'";   //print_r($sql);
            $result= mysqli_query($conn, $sql);
            if($result == true){
                 
                $headers = ['alg'=>'HS256','typ'=>'JWT'];
                $headers_encoded = base64_encode(json_encode($headers));  
                
                $payload = ['sub'=>'1234567890',  'id'=>$id ,'email'=>$dbemail, 'password'=>$hash ];   
                $payload_encoded = base64_encode(json_encode($payload));  // print_r($payload_encoded);
                 
                $key = 'secret';
                $token = hash_hmac('SHA256',"$headers_encoded.$payload_encoded",$key);  // print_r($token);
                    
                $jwttoken= $headers_encoded.".".$payload_encoded.".".$token;   // print_r($jwttoken);
                
                $sql= "update `signupdata` set `token`='$jwttoken' where `id`=$id";   // print_r($sql);
                $result= mysqli_query($conn, $sql);
                if($result == true){
                    $_SESSION['login']= 'yes';
                    $_SESSION['user_id']= $id;  // print_r($_SESSION['user_id']);
                    $_SESSION['email']= $dbemail;
 
                    $data= array('error' => 'false', 'message' => 'login successfully', 'token' => $jwttoken);
                    echo json_encode($data);
                }
                else{
                    $data= array('error' => 'true', 'message' => 'login unsuccessfully');
                    echo json_encode($data);
                }
                
            }
            else{
                $data= array('error' => 'true', 'message' => 'password is invalid');
                echo json_encode($data);
            }
        }
        else{
            $data= array('error'=> 'true', 'message'=>'password invalid');
            echo json_encode($data);
        }

    } else {
        $data= array('error' => 'true', 'message' => 'email is invalid');
        echo json_encode($data);
    }
}
else{
    $data= array('error' => 'true', 'message' => 'email and password is invalid');
    echo json_encode($data);
}

?>
<?php
include 'connection.php';
header('Content-Type: application/json');
$headers = apache_request_headers();

if(isset($_POST['otp']) && isset($headers['Authorization'])){
    $otp= $_POST['otp'];    
    $jwttoken= $headers['Authorization'];   // print_r($jwttoken);
  
    $detoken= explode('.',$jwttoken);  //print_r($detoken);

    $token= json_decode(base64_decode($detoken[1]));  // print_r($token);

    $id= $token->id; 
    $email= $token->email;  
    $decodeotp= $token->otp;   

    if($otp === $decodeotp){

        $sql= "select * from `signupdata` where `email`='$email'";   // print_r($sql);
        $result= mysqli_query($conn, $sql);
        if($result == true){
            
            // $otpmatch= preg_match($otp, $dbotp);   print_r($otpmatch);
            $row= mysqli_fetch_assoc($result);
            $dbotp= $row['otp'];  

            $otpsql= "select `otp`='$otp' from `signupdata` where `email`='$email'";  // print_r($otpsql);
            $otpresult= mysqli_query($conn, $otpsql);
            
            if($otpresult == true){

                //build the headers
                $headers = ['alg'=>'HS256','typ'=>'JWT'];
                $headers_encoded = base64_encode(json_encode($headers)); 

                //build the payload
                $payload = ['sub'=>'1234567890',  'email'=>$email, 'otp'=>$decodeotp];   
                $payload_encoded = base64_encode(json_encode($payload)); 

                //build the signature
                $key = 'secret';
                $token = hash_hmac('SHA256',"$headers_encoded.$payload_encoded",$key);     

                $verifytoken= $headers_encoded.".".$payload_encoded.".".$token;   // print_r($verifytoken);

                $data= array('error' => 'false', 'message' => 'otp verify successfully', 'verifytoken' => $verifytoken);
                echo json_encode($data);
            
            }
            else{
                $data= array('error' => 'true', 'message' => 'otp verify unsuccessfully');
                echo json_encode($data);
            }
        }
        else{
            $data= array('error' => 'true', 'message' => 'email is invalid');
            echo json_encode($data);
        }
    }
    else{
        $data= array('error'=> 'true', 'message'=> 'otp is invalid');
        echo json_encode($data);
    }

}
else{
    $data= array('error' => 'true', 'message' => 'otp is invalid');
    echo json_encode($data);
}
?>
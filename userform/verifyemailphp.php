<?php
include 'connection.php';  

// include '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  

$mail = new PHPMailer();

$mail->isSMTP();                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'csanghani58@gmail.com';                 // SMTP username
$mail->Password = 'uljxhwqkwpxruivp';                           // SMTP password
$mail->Port = 587; 

if(isset($_POST['email'])){ 
    $email= $_POST['email'];    //  print_r($email);

    // $matches= preg_match($email, $email);  print_r($matches);

    $query= "select * from `signupdata` where `email`='$email'";   // print_r($query);
    $result=mysqli_query($conn,$query);   
    if ($result == true) {
        $row= mysqli_fetch_assoc($result);   
        $uid= $row['id'];   // print_r($id);
        $dbemail= $row['email'];  // print_r($dbemail);

        // $matches= preg_match($dbemail, $email);   print_r($matches); 

        function generateotp($length = 4) {
            $otp = "";
            for ($i = 0; $i < $length; $i++) {
                $otp .= rand(0, 9);
            }
            return $otp;   
        }
        $otp = generateotp(4);   // print_r($otp); 

        $sql= "update `signupdata` set `otp`= '$otp' where `id`='$uid'";   // print_r($sql);
        $result= mysqli_query($conn,$sql);
        if($result){
            $mail->From = 'csanghani58@gmail.com';
            $mail->addAddress('dhruvi.artbees@gmail.com');
            $mail->Subject = 'OTP Verification';
            $mail->Body =  $otp;

            if(!$mail->send()) {
                $data= array('error' => 'true', 'message' => 'faild to otp generate $ sent');
                echo json_encode($data);
            } else {

                // build the headers
                $headers = ['alg'=>'HS256','typ'=>'JWT'];
                $headers_encoded = base64_encode(json_encode($headers)); 

                //build the payload
                $payload = ['sub'=>'1234567890', 'id'=>$uid, 'email'=>$email, 'otp'=>$otp];   
                $payload_encoded = base64_encode(json_encode($payload)); 

                //build the signature
                $key = 'secret';
                $token = hash_hmac('SHA256',"$headers_encoded.$payload_encoded",$key);    // print_r($otptoken); 

                $otptoken= $headers_encoded.".".$payload_encoded.".".$token; 

                $data= array('error' => 'false', 'message' => 'otp generated & sent successsfully', 'token' => $otptoken);
                echo json_encode($data);
            }
        }
        else{
            $data= array('error' => 'true', 'message' => 'otp is invalid');
            echo json_encode($data);
        }

    }
    else{
        $data= array('error' => 'true', 'message' => 'email is invalid');
        echo json_encode($data);
    }

}
else{
    $data= array('error'=> 'true', 'message'=> 'email is invalid');
    echo json_encode($data);
}

?>
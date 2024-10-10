<?php
include 'connection.php';
session_start();

use Respect\Validation\Validator as v;

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['password'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobileno=$_POST['mobileno'];
    $pwd= password_hash($_POST['password'], PASSWORD_DEFAULT);
    // $pwd= $_POST['password'];

    $sql="insert into `signupdata` (`firstname`,`lastname`,`email`,`mobileno`,`password`,`conpassword`,`token`,`otp`)values('$fname','$lname','$email','$mobileno','$pwd','','','')";   //  print_r($sql);

    if ($conn->query($sql) === TRUE) {
        header('location:login.php');
            $data=array('error' => 'false', 'message'=>"signup successfully");
            echo json_encode($data);
    } else {
        $data=array('error' => 'true', 'message'=>"Record not inserted");
        echo json_encode($data);
    }
    
    $conn->close();
    
}
else{
    $data= array('error' => 'true', 'message' => 'all field required');
    echo json_encode($data);
}

?>
<?php
include 'connection.php';

if(isset($_SESSION['login'])){
}
else{
   
    session_start();
    // session_unset();

    // unset($_SESSION['login']); //loginajax.php
    // unset($_SESSION['user_id']);
    $email= $_SESSION['email'];  
    $uid= $_SESSION['user_id'];  

    $sql= "update `signupdata` set `token`= '' where `id`='$uid'";  // print_r($sql);
    $result= mysqli_query($conn,$sql);
    if($result){ 
        session_unset();
        unset($_SESSION['login']); //loginajax.php
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);

        header('location: login.php');

        $data=array('error'=> 'false', 'message'=>"logout successfully");
        echo json_encode($data);
    }
    else{
        $data=array('error'=> 'true','message'=>"logout unsuccessfully");
        echo json_encode($data);
    }
}
?>
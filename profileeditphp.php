
<?php 
include 'connection.php';
session_start();

$uid= $_SESSION['user_id'];  print_r($uid);

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobileno'])){
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $mobileno= $_POST['mobileno'];

    $sql= "update `signupdata` set `firstname` = '$firstname', `lastname`= '$lastname', `email`= '$email', `mobileno`= '$mobileno' where `id`='$uid'";
    $result= mysqli_query($conn, $sql);
    if($result === true){
        $data= array('error' => 'false', 'message' => 'user data update successfully');
        echo json_encode($data);
    }
    else{
        $data= array('error' => 'true', 'message' => 'user data not update');
        echo json_encode($data);
    }
}
?>
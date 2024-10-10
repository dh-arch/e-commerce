<?php
include 'connection.php';


// if (isset($_POST['unique_id']) && isset($_POST['uid']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['address']) && isset($_POST['pincode']) && isset($_POST['state']) && isset($_POST['city'])) {

$unique_id = $_POST['unique_id']; // print_r($unique_id);
$uid = $_POST['uid']; // print_r($uid);
$firstname = $_POST['firstname'];  // print_r($firstname); // $_SESSION['user']=$name; // print_r($_SESSION['user']);
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobileno'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$city = $_POST['city'];

$dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
$current_date = $dateTime->format('Y-m-d H:i:s');

$status = 'placed';

if ($status == 'placed') {

    $sql = "insert into `address` (`unique_id`,`uid`,`firstname`,`lastname`,`email`,`mobileno`,`address`,`pincode`,`city`,`state`,`status`,`current_date`)values('$unique_id','$uid','$firstname','$lastname','$email','$mobile','$address','$pincode','$city','$state','$status','$current_date')";
    // print_r($sql);
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo 1;
        $data = array('error' => 'false', 'message' => 'address added successfully', 'unique_id' => $unique_id);
        echo json_encode($data);
    } else {
        // echo 0;
        $data = array('error' => 'true', 'message' => 'address not added');
        echo json_encode($data);
    }
}
// } else {
//     $data = array('error' => 'true', 'message' => 'all filed is reqquired');
//     echo json_encode($data);
// }

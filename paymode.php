<?php
include 'connection.php';

if (isset($_POST['uid']) && isset($_POST['name']) && isset($_POST['paytype']) && isset($_POST['unique_id'])) {

    $uid = $_POST['uid']; // print_r($uid);
    $name = $_POST['name'];
    $paytype = $_POST['paytype'];
    $unique_id = $_POST['unique_id'];

    $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
    $current_date = $dateTime->format('Y-m-d H:i:s');

    $currentDateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));

    // Clone the current date and add 6 days
    $lastDate = clone $currentDateTime;
    $lastDate->modify("+6 day");

    // Output the last date (Day 6) 
    $delivery_date = $lastDate->format('Y-m-d H:i:s');

    $sql = "insert into `paymode` (`unique_id`,`uid`,`name`,`paymode`,`current_date`, `delivery_date`)values('$unique_id','$uid','$name','$paytype','$current_date','$delivery_date')";  // print_r($sql);
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $_SESSION['paymode'] = $paytype;     // print_r($_SESSION['paymode']);
 
        $data = array('error' => 'false', 'message' => 'pay mode added successfully');
        echo json_encode($data);
    } else {
        $data = array('error' => 'true', 'message' => 'pay mode not added');
        echo json_encode($data);
    }
} else {
    $data = array('error' => 'true', 'message' => 'all field required');
    echo json_encode($data);
}

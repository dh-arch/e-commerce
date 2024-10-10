
<?php
include 'connection.php';

$unique_id = $_POST['unique_id'];

$dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
$current_date = $dateTime->format('Y-m-d H:i:s');

$sql = "update `address` set `unique_id`= '$unique_id', `current_date`= '$current_date' ";  // print_r($sql);
$result = mysqli_query($conn, $sql);
if ($result == true) {
    $data = array('error' => 'false', 'message' => 'add address successfully', 'unique_id' => $unique_id);
    echo json_encode($data);
} else {
    $data = array('error' => 'true', 'message' => 'not address added');
    echo json_encode($data);
}
?>
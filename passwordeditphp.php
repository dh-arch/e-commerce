<!-- $2y$10$R9IY7Jw4RjOFoQSsGuxy3.IciScpXmTdil6QMjHDlI.ofcIlPiG3W -->
 
<?php
include 'connection.php';
session_start();

$uid = $_SESSION['user_id'];   // print_r($uid);

$headers = apache_request_headers();

if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['conpassword']) && isset($headers['Authorization'])) {
    $oldpass = $_POST['oldpassword'];  // print_r($oldpass);
    $oldpassword = password_hash($_POST['oldpassword'], PASSWORD_DEFAULT);
    // print_r($oldpassword);

    $newpass = $_POST['newpassword'];  //print_r($newpass);
    $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);   // print_r($newpassword);

    $conpass = $_POST['conpassword'];
    $conpassword = password_hash($_POST['conpassword'], PASSWORD_DEFAULT);  // print_r($conpassword);

    $jwttoken = $headers['Authorization'];

    $detoken = explode('.', $jwttoken);  //print_r($detoken);

    $token = json_decode(base64_decode($detoken[1]));  // print_r($token);

    $id = $token->id;
    $email = $token->email;
    $password = $token->password;
    // print_r($password);

    if ($newpass === $conpass) {

        if (password_verify($oldpass, $password)) {

            $sql = "update `signupdata` set `password`='$newpassword', `conpassword`='$conpassword' where `id`='$uid'";
            $result = mysqli_query($conn, $sql);
            if ($result === true) {
                $data = array('error' => 'false', 'message' => 'password & conpassword update');
                echo json_encode($data);
            } else {
                $data = array('error' => 'true', 'message' => 'password & conpassword not update');
                echo json_encode($data);
            }

            $data = array('error' => 'false', 'message' => 'oldpassword & password are matched');
            echo json_encode($data);
        } else {
            $data = array('error' => 'true', 'message' => 'oldpassword & password are not matched');
            echo json_encode($data);
        }

        $data = array('error' => 'false', 'message' => 'newpassword & conpassword are matched');
        echo json_encode($data);
    } else {
        $data = array('error' => 'true', 'message' => 'newpassword & conpassword are not matched');
        echo json_encode($data);
    }
}

?>
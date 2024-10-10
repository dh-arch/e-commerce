<?php

session_start();

include ('../config/config.php');

if(isset($_GET['type']) && $_GET['type'] == 'changePassword'){
    if (isset($_POST["old_password"])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_SESSION['email'];
        $sql = "select * from admin where email='$email' AND password='$old_password'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
            if ($new_password == $confirm_password) {
                $update = "update admin set password='$new_password' WHERE email='$email' ";
                $updateData = mysqli_query($con, $update);
                if($updateData){
                    $Data = array(
                        'error' => false,
                        'data' => null,
                        'msg' => 'Password Changed Successfully'
                    );
                } else {
                    $Data = array(
                        'error' => true,
                        'data' => null,
                        'msg' => 'Something Wrong'
                    );
                }
            } else {
                $Data = array(
                    'error' => true,
                    'data' => null,
                    'msg' => 'New Password and Confirm Password Both not match!!'
                );
            }
        } else {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Invalid Old Password'
            );
        }
        echo json_encode($Data);
    }
} else {
    $Data = array(
        'error' => true,
        'data' => null,
        'msg' => 'Something Wrong'
    );
    echo json_encode($Data);
}

?>
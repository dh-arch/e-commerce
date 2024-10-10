<?php

session_start();

include ('../config/config.php');
//include ('../common_helper/common_helper.php');


if(isset($_GET['type']) && $_GET['type'] == 'login'){
    if (isset($_POST["email"])) {
        $email = $_POST['email'];  print_r($email);
        $password = $_POST['password'];   print_r($password);
        $sql = "select * from admin where email='$email'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) { 
            if ($password == $admin[0]['password']) {
                $_SESSION['email'] = $email;
                $Data = array(
                    'error' => false,
                    'data' => null,
                    'msg' => 'Login successfully'
                );
            } else {
                $Data = array(
                    'error' => true,
                    'data' => null,
                    'msg' => 'Password not match!!'
                );
            }
        } else {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Email not found'
            );
        }
        echo json_encode($Data);
    }
} else if(isset($_GET['type']) && $_GET['type'] == 'logout'){
    session_destroy();
    header("Location: ../admin/login.php");
    exit;
} else if(isset($_GET['type']) && $_GET['type'] == 'sendForgotEmail'){
    if (isset($_POST["email"])) {
        $email = $_POST['email'];
        $sql = "select * from admin where email='$email'";
        $admin = mysqli_query($con, $sql);
        $admin = mysqli_fetch_all($admin, MYSQLI_ASSOC);
        if ($admin) {
/*            $message = '<a href="<?= BASE_URL ?>admin/">Click Here</a> to Reset Password';*/
//            if(send_email('prince.artbees@gmail.com', $email, 'Forgot Password', $message)){
                $_SESSION['forgotEmail'] = $email;
                $Data = array(
                    'error' => false,
                    'data' => null,
                    'msg' => 'Email Send Successfully'
                );
//            } else {
//                $Data = array(
//                    'error' => true,
//                    'data' => null,
//                    'msg' => 'Something Wrong'
//                );
//            }
        } else {
            $Data = array(
                'error' => true,
                'data' => null,
                'msg' => 'Email not found'
            );
        }
        echo json_encode($Data);
    }
} else if(isset($_GET['type']) && $_GET['type'] == 'forgotPassword'){
    if (isset($_SESSION['forgotEmail'])) {
        $email = $_SESSION['forgotEmail'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        if($new_password == $confirm_password){
            $update = "update admin set password='$new_password' WHERE email='$email' ";
            $updateData = mysqli_query($con, $update);
            if($updateData){
                unset($_SESSION['forgotEmail']);
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
                'msg' => 'Both Password are not match'
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
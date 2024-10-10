
<?php

session_start();

include '../config/config.php';

if (isset($_GET['type']) && $_GET['type'] == 'addadvertise') {
    if (isset($_POST['subcategory']) && isset($_POST['heading'])) {
        $subcategory = $_POST['subcategory'];
        $heading = $_POST['heading'];

        $targetDirectory = "../assets/images/product/adverties-images/";
        $files = $_FILES['uploadfile'];
        // print_r($files);
        $file_name = $_FILES['uploadfile']['name'];
        $file_size = $_FILES['uploadfile']['size'];
        $file_tmp = $_FILES['uploadfile']['tmp_name'];
        $file_type = $_FILES['uploadfile']['type'];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $folder = $targetDirectory . $file_name;

        if (move_uploaded_file($file_tmp, $folder)) {
            $data = array(
                'error' => 'false',
                'message' => 'image upload successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'image not upload',
                'data' => null
            );
        }

        $sql = "insert into `admin_adverties` (`subcategory`,`image`,`heading`) values ('$subcategory','$file_name','$heading')";
        // print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'advertise added successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'advertise not added',
                'data' => null
            );
        }
        echo json_encode($data);
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'editadvertise') {
    if (isset($_POST['subcategory']) && isset($_POST['heading'])) {
        $id = $_POST['id'];
        $subcategory = $_POST['subcategory'];
        $heading = $_POST['heading'];

        $targetDirectory = "../assets/images/product/adverties-images/";
        $files = $_FILES['uploadfile'];
        // print_r($files);
        $file_name = $_FILES['uploadfile']['name'];  // print_r($file_name);
        $file_size = $_FILES['uploadfile']['size'];
        $file_tmp = $_FILES['uploadfile']['tmp_name'];
        $file_type = $_FILES['uploadfile']['type'];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $folder = $targetDirectory . $file_name;
        // print_r($folder);

        // print_r($_POST['image']);
        unlink($targetDirectory . $_POST['image']);

        if (move_uploaded_file($file_tmp, $folder)) {
            $data = array(
                'error' => 'false',
                'message' => 'image upload successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'image not upload',
                'data' => null
            );
        }

        $sql = "update `admin_adverties` set `subcategory`='$subcategory', `image`='$file_name', `heading`='$heading' where `id`='$id'";
        print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'advertise updated successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'advertise not updated',
                'data' => null
            );
        }
        echo json_encode($data);
    }
} else if (isset($_GET['type']) && $_GET['type'] == 'deleteadvertise') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $image = $_POST['image'];
        // print_r($image);

        $targetDirectory = "../assets/images/product/adverties-images/";
        unlink($targetDirectory . $image);

        $sql = "delete from `admin_adverties` where `id`='$id'";
        // print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'advertise deleted successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'advertise not deleted',
                'data' => null
            );
        }
        echo json_encode($data);
    }
}

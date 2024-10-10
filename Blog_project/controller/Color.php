<?php

session_start();

include('../config/config.php');

if (isset($_GET['type']) && $_GET['type'] == 'addcategory') {

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
        // print_r($category);

        $targetDirectory = "../assets/images/product/category-images/";
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

        $sql = "insert into `admin_category` (`category`,`image`) values ('$category','$file_name')";
        print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'category added successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'category not added',
                'data' => null
            );
        }
    } else {
        $data = array(
            'error' => 'true',
            'message' => 'category not found',
            'data' => null
        );
    }
    echo json_encode($data);
} elseif (isset($_GET['type']) && $_GET['type'] == 'getcategoryDetails') {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "select * from `admin_category` where `id`='$id'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'get category details successfully',
                'data' => $result[0]
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'not get category details',
                'data' => null
            );
        }
        echo json_encode($data);
    }
} elseif (isset($_GET['type']) && $_GET['type'] == 'editcategory') {

    if (isset($_POST['id']) && isset($_POST['category'])) {

        $targetDirectory = "../assets/images/product/category-images/";
        $files = $_FILES['uploadfile'];
        // print_r($files);
        $file_name = $_FILES['uploadfile']['name'];  // print_r($file_name);
        $file_size = $_FILES['uploadfile']['size'];
        $file_tmp = $_FILES['uploadfile']['tmp_name'];
        $file_type = $_FILES['uploadfile']['type'];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $folder = $targetDirectory . $file_name;
        // print_r($folder);

        unlink($targetDirectory . $_POST['image']); // print_r($_POST['image']);

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

        $id = $_POST['id'];
        $category = $_POST['category'];

        $sql = "update `admin_category` set `category`='$category', `image`='$file_name' where `id`='$id'";   // print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'category details update successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'category details not update',
                'data' => null
            );
        }
        echo json_encode($data);
    }
} elseif (isset($_GET['type']) && $_GET['type'] == 'deletecategory') {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        // print_r($id);
        $category = $_POST['category'];
        $image = $_POST['image'];

        $targetDirectory = "../assets/images/product/category-images/";
        unlink($targetDirectory . $image);

        $sql = "delete from `admin_category` where `id`='$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'category delete successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'category not delete',
                'data' => null
            );
        }
        echo json_encode($data);
    }
}


// sub category 

if (isset($_GET['type']) && $_GET['type'] == 'addsubcategory') {
    if (isset($_POST['category']) && isset($_POST['subcategory'])) {
        $category = $_POST['category'];
        // print_r($category);
        $subcategory = $_POST['subcategory'];
        // print_r($subcategory);

        $targetDirectory = "../assets/images/product/subcategory-images/";
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

        $sql = "insert into `admin_subcategory` (`category`, `subcategory`, `image`) values ('$category', '$subcategory', '$file_name')";
        print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'sub category added successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'sub category not added',
                'data' => null
            );
        }
    }
} elseif (isset($_GET['type']) && $_GET['type'] == 'editsubcategory') {
    if (isset($_POST['id']) && isset($_POST['category']) && isset($_POST['subcategory'])) {
        $id = $_POST['id'];
        $category = $_POST['category'];
        // print_r($category);
        $subcategory = $_POST['subcategory'];
        // print_r($subcategory);

        $targetDirectory = "../assets/images/product/subcategory-images/";
        $files = $_FILES['uploadfile'];
        // print_r($files);
        $file_name = $_FILES['uploadfile']['name'];
        $file_size = $_FILES['uploadfile']['size'];
        $file_tmp = $_FILES['uploadfile']['tmp_name'];
        $file_type = $_FILES['uploadfile']['type'];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $folder = $targetDirectory . $file_name;

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

        $sql = "update `admin_subcategory` set `category`='$category', `subcategory`='$subcategory', `image`='$file_name' where `id`='$id'";
        print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'sub category update successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'sub category not update',
                'data' => null
            );
        }
    }
} elseif (isset($_GET['type']) && $_GET['type'] == 'deletesubcategory') {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        // print_r($id);
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
        $image = $_POST['image'];

        $targetDirectory = "../assets/images/product/subcategory-images/";
        unlink($targetDirectory . $image);

        $sql = "delete from `admin_subcategory` where `id`='$id'";
        // print_r($sql);
        $result = mysqli_query($con, $sql);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'product delete successfully',
                'data' => null
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'product not delete',
                'data' => null
            );
        }
        echo json_encode($data);
    }
}


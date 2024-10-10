<?php

session_start();

include('../config/config.php');

if (isset($_GET['type']) && $_GET['type'] == 'addproduct') {

    $targetDirectory = "../assets/images/product/product-images/";
    $files = $_FILES['uploadfile'];
    $uploadedFiles = array();
    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['uploadfile']['name'][$key];
        $file_size = $_FILES['uploadfile']['size'][$key];
        $file_tmp = $_FILES['uploadfile']['tmp_name'][$key];
        $file_type = $_FILES['uploadfile']['type'][$key];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowedExtensions)) {
            $uniqueName = uniqid() . '.' . $imageFileType;
            $targetFile = $targetDirectory . $uniqueName;

            if (move_uploaded_file($file_tmp, $targetFile)) {
                array_push($uploadedFiles, $uniqueName);

                // $uploadedFiles[]= array($targetFile);
                // print_r($uploadedFiles);

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
        }
    }

    // $color = $_POST['color'];      //formdata
    // print_r($color);

    isset($_POST['color']) ? $color = $_POST['color'] : $color = '';

    // $color = (isset($_POST['color'])) ? $_POST['color'] : '';      //formdata

    if ($_POST['freesize'] == 'add size') {
        if (isset($_POST['size']) && isset($_POST['quantity'])) {
            $prsize = $_POST['size'];
            // print_r($prsize);

            $size = array();
            foreach ($prsize as $option) {
                $size[] = $option;
            }
            // print_r($size);

            $quantity = $_POST['quantity'];
            // print_r($quantity);

            $arr = array();
            for ($i = 0; $i < count($size); $i++) {
                $sizes = $size[$i];
                // print_r($sizes);
                $qty = $quantity[$i];
                // print_r($qty);
                $arr[$sizes] = $qty;
                // print_r($arr[$sizes] = $qty);
            }
            // print_r($arr);

            $qty = array();
            foreach ($arr as $val) {
                $qty[] = $val;
            }
            // print_r($qty);

        }
    } else {
        $qty = $_POST['freeqty'];
        // print_r($qty);
        $size = 'Free Size';
    }

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    // $producttype = isset($_POST['producttype']) ? $_POST['producttype'] : '';  print_r($producttype);
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $discount = $_POST['discount'];
    $offer = $_POST['offer'];
    $delivery = $_POST['delivery'];

    (isset($_POST['delivery']) == 'free delivery') ? $payment_charge = '' : $payment_charge = $_POST['deliverycharge'];

    (isset($_POST['delivery']) == 'pay to charge') ? $payment_charge = $_POST['deliverycharge'] : $payment_charge = '';

    $soldby = $_POST['soldby'];
    $description = $_POST['description'];
    $product_date = $_POST['productdate'];
    $outofstock_date = $_POST['outofstockdate'];

    $sql = "insert into `productdata` (`image`,`color`,`size`,`quantity`,`category`,`subcategory`,`price`,`mrp`,`discount`,`offer`,`delivery`,`payment_charge`,`soldby`,`description`,`product_date`,`outofstock_date`) values ('" . json_encode($uploadedFiles) . "','" . json_encode($color) . "','" . json_encode($size) . "','" . json_encode($qty) . "','$category','$subcategory','$price','$mrp','$discount','$offer','$delivery','$payment_charge','$soldby','$description','$product_date','$outofstock_date')";
    print_r($sql);

    $result = mysqli_query($con, $sql);
    if ($result) {
        $data = array(
            'error' => 'false',
            'message' => 'data added successfully',
            'data' => null
        );
    } else {
        $data = array(
            'error' => 'true',
            'message' => 'data not added',
            'data' => null
        );
    }
    echo json_encode($data);
} elseif (isset($_GET['type']) && $_GET['type'] == 'getproductDetails') {

    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $sql = "select * from `productdata` where `id`='$pid'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);  // print_r($result);
        if ($result) {
            $data = array(
                'error' => 'false',
                'message' => 'get data successfully',
                'data' => $result[0]
            );
        } else {
            $data = array(
                'error' => 'true',
                'message' => 'something wrong',
                'data' => null
            );
        }
        echo json_encode($data);
    }
} elseif (isset($_GET['type']) && $_GET['type'] == 'editproduct') {

    $pid = $_POST['pid'];

    $targetDirectory = "../assets/images/product/product-images/";
    $files = $_FILES['uploadfile'];
    $uploadedFiles = array();
    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['uploadfile']['name'][$key];
        // print_r($file_name);
        $file_size = $_FILES['uploadfile']['size'][$key];
        $file_tmp = $_FILES['uploadfile']['tmp_name'][$key];
        $file_type = $_FILES['uploadfile']['type'][$key];
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowedExtensions)) {
            $uniqueName = uniqid() . '.' . $imageFileType;
            $targetFile = $targetDirectory . $file_name;

            if (move_uploaded_file($file_tmp, $targetFile)) {

                array_push($uploadedFiles, $file_name);
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
        }
    }

    // Delete old images if they exist
    if (!empty($_POST['image'])) {
        $oldImages = is_array($_POST['image']) ? $_POST['image'] : [$_POST['image']];
        foreach ($oldImages as $oldImage) {
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    }

    // $color = $_POST['color'];      //formdata
    // print_r($color);

    isset($_POST['color']) ? $color = $_POST['color'] : $color = '';

    // $color = (isset($_POST['color'])) ? $_POST['color'] : '';      //formdata

    if ($_POST['freesize'] == 'add size') {
        if (isset($_POST['size']) && isset($_POST['quantity'])) {
            $prsize = $_POST['size'];
            // print_r($prsize);

            $size = array();
            foreach ($prsize as $option) {
                // $size[] = $option;
            }
            // print_r($size);

            $quantity = $_POST['quantity'];
            // print_r($quantity);

            $arr = array();
            for ($i = 0; $i < count($size); $i++) {
                $sizes = $size[$i];
                // print_r($sizes);
                $qty = $quantity[$i];
                // print_r($qty);
                $arr[$sizes] = $qty;
                // print_r($arr[$sizes] = $qty);
            }
            // print_r($arr);

            $qty = array();
            foreach ($arr as $val) {
                $qty[] = $val;
            }
            // print_r($qty);

        }
    } else {
        $qty = $_POST['freeqty'];
        // print_r($qty);
        $size = 'Free Size';
    }

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $producttype = $_POST['producttype'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $discount = $_POST['discount'];
    $offer = $_POST['offer'];
    $delivery = $_POST['delivery'];

    (isset($_POST['delivery']) == 'free delivery') ? $payment_charge = '' : $payment_charge = $_POST['deliverycharge'];

    (isset($_POST['delivery']) == 'pay to charge') ? $payment_charge = $_POST['deliverycharge'] : $payment_charge = '';

    $soldby = $_POST['soldby'];
    $description = $_POST['description'];
    $product_date = $_POST['productdate'];
    $outofstock_date = $_POST['outofstockdate'];

    $sql = "update `productdata` set `image`= '" . json_encode($uploadedFiles) . "', `color`= '" . json_encode($color) . "', `size`= '" . json_encode($size) . "', `quantity` = '" . json_encode($qty) . "', `category`='$category', `subcategory`='$subcategory', `price`='$price', `mrp`='$mrp', `discount`='$discount', `offer`='$offer', `delivery`='$delivery', `payment_charge`='$payment_charge', `soldby`='$soldby', `description`='$description', `product_date`= '$product_date', `outofstock_date`='$outofstock_date' where `id`='$pid' ";
    print_r($sql);

    $result = mysqli_query($con, $sql);
    if ($result) {
        $data = array(
            'error' => 'false',
            'message' => 'data update successfully',
            'data' => null
        );
    } else {
        $data = array(
            'error' => 'true',
            'message' => 'data not update',
            'data' => null
        );
    }
    echo json_encode($data);
} elseif (isset($_GET['type']) && isset($_GET['type']) == 'deleteproduct') {

    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        // print_r($pid);

        $sql = "delete from `productdata` where `id`='$pid'";
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

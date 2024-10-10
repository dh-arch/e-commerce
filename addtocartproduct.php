<?php
include 'connection.php';

session_start();

if (isset($_SESSION['login'])) {
    if (isset($_POST['pid'])) {
        $uid = $_SESSION['user_id']; //loginajax.php
        $pid = $_POST['pid'];
        // print_r($pid);

        $size = $_POST['size'];
        // print_r($size);
        $quantity = $_POST['quantity'];
        // print_r($quantity);

        $category = $_POST['category'];
        // print_r($category);

        $subcategory = $_POST['subcategory'];
        // print_r($subcategory);

        function generateuniqueid($length = 3)
        {
            $unique_id = "";
            for ($i = 0; $i < $length; $i++) { 
                $unique_id .= rand(0, 9);
            }
            return $unique_id;
        }
        $unique_id = generateuniqueid(3);

        $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
        $current_date = $dateTime->format('Y-m-d H:i:s');
        // print_r($current_date);  

        // Check if the product is already in the addtocart
        $sql = "SELECT * FROM `addtocartproduct` WHERE  user_id = $uid AND product_id = $pid";   // print_r($sql);
        $result = mysqli_query($conn, $sql);
        if ($result === true) {
            $data = array('error' => 'true', 'message' => 'Product is already in the addtocart');
            echo json_encode($data);
        } else {
            $insertsql = "INSERT INTO `addtocartproduct` (`unique_id`,`user_id`,`product_id`,`size`,`quantity`,`category`, `subcategory`) VALUES ('$unique_id', '$uid','$pid','$size','$quantity','$category','$subcategory')";  // print_r($insertsql);

            // $_SESSION['unique_id'] = $unique_id; 

            if (mysqli_query($conn, $insertsql)) {
                $data = array('error' => 'false', 'message' => 'Product added to addtocart successfully', 'unique_id' => $unique_id);
                echo json_encode($data);
            } else {
                $data = array('error' => 'true', 'message' => 'Product not added addtocart');
                echo json_encode($data);
            }
        }
    } else { 
        $data = array('error' => 'true', 'message' => 'product_id and user_id are required');
        echo json_encode($data);
    }
} else {
    $data = array('error' => 'true', 'message' => 'user not login');
    echo json_encode($data);
}

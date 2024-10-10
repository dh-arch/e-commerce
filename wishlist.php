<?php
include 'connection.php';

session_start();

if(isset($_SESSION['login'])){
    if (isset($_POST['pid'])) {
        $uid = $_SESSION['user_id']; //loginajax.php
        $pid = $_POST['pid'];  // print_r($pid);
        // Check if the product is already in the wishlist
        $sql = "SELECT * FROM wishlist WHERE  user_id = $uid AND product_id = $pid";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insertsql = "INSERT INTO wishlist (user_id,product_id) VALUES ( $uid,$pid)";
            if (mysqli_query($conn, $insertsql)) {
                // $_SESSION['status']="Product added to wishlist successfully";
                $data= array('error' => 'false', 'message' => 'product added to wishlist successfully');
                echo json_encode($data);
            } else {
                // $_SESSION['status']="Error: " . $sql . "<br>" . mysqli_error($conn);
                $data= array('error' => 'false', 'message' => 'product added not wishlist');
                echo json_encode($data);
            }
        } else {
            // $_SESSION['status']="Product is already in the wishlist";
            $data= array('error' => 'false', 'message' => 'product is already in the wishlist');
            echo json_encode($data);
        }
    } else {
        // $_SESSION['status']="Error: product_id and user_id are required";
        $data= array('error' => 'false', 'message' => 'product_id and user+id are required');
        echo json_encode($data);
    } 
}
else{
    // $_SESSION['status']="<h3>not login</h3>";
    $data= array('error' => 'false', 'message' => 'user not login');
    echo json_encode($data);
}
?>
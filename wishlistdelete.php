<?php
include 'connection.php';

// $uid = $_SESSION['user_id']; //loginajax.php
if(isset($_POST['pid'])){
    $pid=$_POST['pid'];   // print_r($pid);

    $sql="delete from `wishlist` where product_id=$pid";  // print_r($query);
    $result=mysqli_query($conn,$sql); // print_r($result);

    if($result == true){
        $data= array('error' => 'false', 'message' => 'product delete in wishlist successfully');
    }
    else{
        $data= array('error' => 'true', 'message' => 'product not delete in wishlist');
    }
}
?>
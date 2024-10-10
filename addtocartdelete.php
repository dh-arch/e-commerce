<?php
include 'connection.php';

// $uid = $_SESSION['user_id']; //loginajax.php
if(isset($_GET['pid'])){
    $pid=$_GET['pid']; // print_r($pid);
 
    $sql="delete from `addtocartproduct` where `product_id`='$pid'";  // print_r($sql); 

    $result=mysqli_query($conn,$sql); // print_r($result);
    if($result){
        $data= array('error' => 'false', 'message' => 'product delete in addtocart successfully');
    }
    else{
        $data= array('error' => 'true', 'message' => 'product not delete in addtocart');
    }
}
?>    
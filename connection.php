<?php


$servername="localhost";
$root="root";
$password="";
$dbname="dbshopping";

$conn=new mysqli($servername,$root,$password,$dbname);
if($conn){
    // echo "connected";
}
else{
    echo "failed";
}


?>


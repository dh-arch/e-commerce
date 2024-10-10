<?php

session_start();

include ('../config/config.php');

if(isset($_POST['pid'])){
    $pid= $_POST['pid'];  print_r($pid);
}
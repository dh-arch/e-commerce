<?php
include 'connection.php';

session_start();
$unique_id = $_SESSION['unique_id'];
// print_r($unique_id);

if (isset($_GET['type']) && $_GET['type'] == 'PlaceOrder') {
    $status = $_GET['type'];

    if (isset($_POST['pidarry'])) {
        $pidarry = $_POST['pidarry'];
        // print_r($pidarry);

        foreach ($pidarry as $key => $value) {
            $uid = $value['uid'];
            // print_r($uid);
            $pid = $value['pid'];
            // print_r($pid);
            $name = $value['name'];
            // print_r($name);
            $email = $value['email'];
            // print_r($email);
            $image = $value['image'];
            // print_r($image);
            $size = $value['size'];
            // print_r($size);
            $quantity = $value['quantity'];
            // print_r($quantity);
            $category = $value['category'];
            // print_r($category);
            $subcategory = $value['subcategory'];
            // print_r($subcategory);
            $totalprice = $value['totalprice'];
            // print_r($totalprice);
            $grandtotal = $value['grandtotal'];
            // print_r($grandtotal);
            $paymode = $value['paymode'];
            // print_r($mode);
            $mobileno = $value['mobileno'];
            // print_r($mobileno);
            $address = $value['address'];
            // print_r($address);

            $sql = "select * from `address` where `unique_id`='$unique_id' and `uid`='$uid'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $billing_address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $pincode = $row['pincode'];
            }

            $order_id = strtoupper(uniqid());

            $invoice_id = 'INV-' . strtoupper(uniqid());

            $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
            $current_date = $dateTime->format('Y-m-d H:i:s');

            $currentDateTime = new DateTime();

            // // Clone the current date and add 6 days
            $lastDate = clone $currentDateTime;
            $lastDate->modify("+6 day");

            // Output the last date (Day 6)
            $delivery_date = $lastDate->format('Y-m-d');

            $sql = "insert into `payment` (`unique_id`,`uid`,`pid`,`name`,`email`,`mobileno`,`address`,`image`,`category`,`subcategory`,`quantity`,`totalprice`,`grandtotal`,`status`,`transaction-id`,`paymode`,`order_id`,`ordertype`,`length`,`breadth`,`height`,`weight`,`orderid`,`shipment_id`,`current_date`,`delivery_date`,`ordercancel_date`)values('$unique_id','$uid','$pid','$name','$email','$mobileno','$address','$image','$category','$subcategory','$quantity','$totalprice','$grandtotal','$status','','$paymode','$order_id','','0','0','0','0','','','$current_date','$delivery_date','')";
            // print_r($sql);

            $result = mysqli_query($conn, $sql);
            if ($result == true) {
                echo 1;

                $sql = "select * from productdata where id= $pid";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $dbsize =  json_decode($row['size']);
                    // print_r($dbsize);
                    $dbquantity = json_decode($row['quantity']);
                    // print_r($dbquantity);

                    $arr = array();
                    for ($i = 0; $i < count($dbsize); $i++) {
                        if ($dbsize[$i] == $size) {
                            $qty = $dbquantity[$i];
                            // print_r($qty);

                            $updateqty[$i] = $qty - $quantity;
                            // print_r($updateqty[$i]);

                            $arr[$i] = $updateqty[$i];
                            // print_r($arr[$i]);
                        } else {
                            $arr[$i] = $dbquantity[$i];
                        }
                    }

                    $updatesql = "update `productdata` set `quantity`= '" . json_encode($arr) . "' where id='$pid' ";
                    // print_r($updatesql);
                    $updateresult = mysqli_query($conn, $updatesql);
                    if ($updateresult) {
                        echo 1;
                    } else {
                        echo 0;
                    }
                }

                // delete product on addtocart page
                // $s = "delete `addtocartproduct`,`addtocart` from addtocartproduct inner join addtocart where addtocartproduct.user_id=addtocart.user_id and addtocartproduct.user_id='$uid'";
                // // print_r($s);
                // $result = mysqli_query($conn, $s);
                // if ($result == true) {

                //     // echo 1;
                // } else {
                //     echo 0;
                // }

            } else {
                echo 0;
            }
        }
    }
}


// if (isset($_GET['type']) && $_GET['type'] == 'success') {

//     $status = $_GET['type'];

//     if (isset($_POST['quantity']) && isset($_POST['totalprice']) && isset($_POST['grandtotal']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobileno']) && isset($_POST['address']) && isset($_POST['paymode'])) {

//         $uid = $_POST['uid']; // print_r($uid);
//         $quantity = $_POST['quantity']; // print_r($quantity);
//         $totalprice = $_POST['totalprice']; // print_r($totalprice);
//         $grandtotal = $_POST['grandtotal'];  // print_r($grandtotal);
//         $name = $_POST['name'];  // print_r($name);
//         $email = $_POST['email']; // print_r($email);
//         $mobileno = $_POST['mobileno'];  // print_r($mobileno);
//         $address = $_POST['address'];   // print_r($address);
//         $paymode = $_POST['paymode']; // print_r($paymode);

//         // $q = "select * from `addtocart`";
//         // $result = mysqli_query($conn, $q);
//         // $row = mysqli_fetch_assoc($result);
//         // // $uid=$_SESSION['user_id'];    print_r($uid);
//         // $image = $row['image'];
//         // // print_r($image);
//         // $uid = $row['user_id'];
//         // $pid = $row['product_id'];
//         // $totalprice = $row['totalprice'];
//         // $grandtotal = $row['grandtotal'];   // print_r($grandtotal);
//         // $category = $row['category'];
//         // $quantity = $row['quantity'];

//         $sql = "select * from `paymode` where `unique_id`= '$unique_id'";
//         $result = mysqli_query($conn, $sql);
//         while ($row = mysqli_fetch_assoc($result)) {
//             $delivery_date = $row['delivery_date'];
//         }

//         function generateotp($length = 6)
//         {
//             $order_id = "";
//             for ($i = 0; $i < $length; $i++) {
//                 $order_id .= rand(0, 9);
//             }
//             return $order_id;
//         }
//         $order_id = generateotp(6);

//         $currentDate = new DateTime();

//         // Clone the current date and add 6 days
//         $lastDate = clone $currentDate;
//         $lastDate->modify("+6 day");

//         $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
//         $current_date = $dateTime->format('Y-m-d H:i:s');

//         // Output the last date (Day 6)
//         $delivery_date = $lastDate->format('Y-m-d');

//         $sql = "insert into `payment` (`unique_id`,`uid`,`pid`,`name`,`email`,`mobileno`,`address`,`image`,`category`,`quantity`,`totalprice`,`grandtotal`,`status`,`transaction-id`,`paymode`,`order_id`,`invoice_id`,`current_date`,`delivery_date`,`ordercancel_date`)values('$unique_id','$uid','$pid','$name','$email','$mobileno','$address','$image','$category','$quantity','$totalprice','$grandtotal','$status','','$paymode','$order_id','','$current_date','$delivery_date','')";
//         print_r($sql);

//         // $result = mysqli_query($conn, $sql);
//         // if ($result == true) {

//         //     $s = "delete `addtocartproduct`,`addtocart` from addtocartproduct inner join addtocart where addtocartproduct.user_id=addtocart.user_id and addtocartproduct.user_id='$uid'";
//         //     print_r($s);
//         //     $result = mysqli_query($conn, $s);
//         //     if ($result == true) {

//         //         $_SESSION['order_id'] = $order_id;    // print_r($_SESSION['order_id']);

//         //     } else {
//         //         echo 0;
//         //     }
//         // } else {
//         //     echo 0;
//         // }
//     } else {
//         echo 0;
//     }
// }

<?php
include 'connection.php';
require 'vendor/autoload.php';
// require_once 'vender/stripe/stripe-php/init.php';

session_start();

use Dompdf\Dompdf;
use Dompdf\Options;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();                                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'csanghani58@gmail.com';                 // SMTP username
$mail->Password = 'uljxhwqkwpxruivp';                           // SMTP password
$mail->Port = 587;


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true); // For remote images


// $stripe = new \Stripe\StripeClient('sk_test_51Q5NWT07hyYPS9jwP4zzfL0ffIXPqTMQ8WJHQNiqou5q8kwX2wyc8zEyQNA6KmQ6SSnvW8PklcP6sWABpiewcr2P00YymEeY3E');

// $uid = $_SESSION['user_id'];    // print_r($uid);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$unique_id = $_SESSION['unique_id'];
// print_r($unique_id);


if (isset($_GET['type']) && $_GET['type'] == 'PlaceOrder') {
    $status = $_GET['type'];


    if (isset($_POST['pidarry'])) {
        $pidarry = $_POST['pidarry'];
        // print_r($pidarry);

        // $transaction_id = $_POST['stripeToken'];
        // print_r($transaction_id);  // print_r($token);
        // $paymode = $_POST['stripeTokenType'];   // print_r($paymode);  // print_r($stripetokentype);
        // $email = $_GET['stripeEmail'];   // print_r($stripeemail);

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
            $size= $value['size'];
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

            $sql = "select * from `paymode` where `unique_id`= '$unique_id'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $delivery_date = $row['delivery_date'];
            }

            $order_id = strtoupper(uniqid());

            // function generateorderid($length = 6)
            // {
            //     $order_id = "";
            //     for ($i = 0; $i < $length; $i++) {
            //         $order_id .= rand(0, 9);
            //     }
            //     return $order_id;
            // }
            // $order_id = generateorderid(6);

            $invoice_id = 'INV-' . strtoupper(uniqid());

            $transaction_id = strtoupper(uniqid());

            $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
            $current_date = $dateTime->format('Y-m-d H:i:s');

            $currentDateTime = new DateTime();

            // // Clone the current date and add 6 days
            $lastDate = clone $currentDateTime;
            $lastDate->modify("+6 day");

            // Output the last date (Day 6)
            $delivery_date = $lastDate->format('Y-m-d');

            $sql = "insert into `payment` (`unique_id`,`uid`,`pid`,`name`,`email`,`mobileno`,`address`,`image`,`category`,`subcategory`,`quantity`,`totalprice`,`grandtotal`,`status`,`transaction-id`,`paymode`,`order_id`,`ordertype`,`length`,`breadth`,`height`,`weight`,`orderid`,`shipment_id`,`current_date`,`delivery_date`,`ordercancel_date`)
            values
            ('$unique_id','$uid','$pid','$name','$email','$mobileno','$address','$image','$category','$subcategory','$quantity','$totalprice','$grandtotal','$status','$transaction_id','$paymode','$order_id','','0','0','0','0','','','$current_date','$delivery_date','')";
            print_r($sql);

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


// if (isset($_GET['type']) && $_GET['type'] == 'payment') {
//     $status = $_GET['type'];

//     $sql = "select * from `addtocart` where `unique_id`='$unique_id'";
//     $result = mysqli_query($conn, $sql);
//     while ($row = mysqli_fetch_assoc($result)) {
//         $image = $row['image'];
//         // print_r($image);
//         $uid = $row['user_id'];
//         $pid = $row['product_id'];
//         print_r($pid);
//         $totalprice = $row['totalprice'];
//         $grandtotal = $row['grandtotal'];   // print_r($grandtotal);
//         $category = $row['category'];
//         $subcategory = $row['subcategory'];
//         $quantity = $row['quantity'];

//         $unique_id = $row['unique_id'];
//         print_r($unique_id);

//         // $name=$_SESSION['name'];   print_r($name);
//         $stripeemail = $_POST['stripeEmail'];  // print_r($stripeemail);

//         $sql = "select * from `address` where unique_id='$unique_id'";
//         $result = mysqli_query($conn, $sql);
//         while ($row = mysqli_fetch_assoc($result)) {
//             $name = $row['firstname'];   // print_r($name); 
//             $email = $row['email'];   // print_r($email);
//             $mobileno = $row['mobileno'];   // print_r($mobileno);
//             $address = $row['address'];   // print_r($address);
//         }

//         $transaction_id = $_POST['stripeToken'];   // print_r($transaction_id);  // print_r($token);
//         $paymode = $_POST['stripeTokenType'];   // print_r($paymode);  // print_r($stripetokentype);
//         $stripeemail = $_POST['stripeEmail'];   // print_r($stripeemail);

//         // $itemPrice = $price; // print_r($itemPrice);

//         $currency = "inr"; // print_r($currency);

//         $sql = "select * from `paymode` where `unique_id`= '$unique_id'";
//         $result = mysqli_query($conn, $sql);
//         while ($row = mysqli_fetch_assoc($result)) {
//             $delivery_date = $row['delivery_date'];
//         }

//         function generateorderid($length = 6)
//         {
//             $order_id = "";
//             for ($i = 0; $i < $length; $i++) {
//                 $order_id .= rand(0, 9);
//             }
//             return $order_id;
//         }
//         $order_id = generateorderid(6);

//         $invoice_id = 'INV-' . strtoupper(uniqid());

//         $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
//         $current_date = $dateTime->format('Y-m-d H:i:s');

//         $currentDateTime = new DateTime();

//         $sql = "insert into `payment` (`unique_id`,`uid`,`pid`,`name`,`email`,`mobileno`,`address`,`image`,`category`,`subcategory`,`quantity`,`totalprice`,`grandtotal`,`status`,`transaction-id`,`paymode`,`order_id`,`ordertype`,`length`,`breadth`,`height`,`weight`,`orderid`,`shipment_id`,`current_date`,`delivery_date`,`ordercancel_date`)values('$unique_id','$uid','$pid','$name','$stripeemail','$mobileno','$address','$image','$category','$subcategory','$quantity','$totalprice','$grandtotal','$status','$transaction_id','$paymode','$order_id','','0','0','0','0','','','$current_date','$delivery_date','')";
//         print_r($sql);
//     }


//     // $lastDate = clone $currentDateTime;
//     // $lastDate->modify("+6 day");
//     // $delivery_date = $lastDate->format('Y-m-d');



//     // $result = mysqli_query($conn, $sql);
//     // if ($result == true) {

//     //     $sql = "select * from `productdata` where `id` = '$pid'";
//     //     $result = mysqli_query($conn, $sql);
//     //     while ($row = mysqli_fetch_assoc($result)) {
//     //         $qty = $row['quantity'];
//     //         // print_r($qty);
//     //     }

//     //     // delete product on addtocart page
//     //     $s = "delete `addtocartproduct`,`addtocart` from addtocartproduct inner join addtocart where addtocartproduct.user_id=addtocart.user_id and addtocartproduct.user_id='$uid'";
//     //     // print_r($s);
//     //     $result = mysqli_query($conn, $s);
//     //     if ($result == true) {

//     //         // build the headers
//     //         $headers = ['alg' => 'HS256', 'typ' => 'JWT'];
//     //         $headers_encoded = base64_encode(json_encode($headers));

//     //         //build the payload
//     //         $payload = [
//     //             'sub' => '1234567890',
//     //             'unique_id' => $unique_id,
//     //             'uid' => $uid,
//     //             'pid' => $pid,
//     //             'name' => $name,
//     //             'email' => $stripeemail,
//     //             'mobileno' => $mobileno,
//     //             'address' => $address,
//     //             'image' => $image,
//     //             'category' => $category,
//     //             'totalprice' => $totalprice,
//     //             'grandtotal' => $grandtotal,
//     //             'status' => $status,
//     //             'paymode' => $paymode,
//     //             'order_id' => $order_id,
//     //             'current_date' => $current_date,
//     //             'delivery_date' => $delivery_date
//     //         ];
//     //         $payload_encoded = base64_encode(json_encode($payload));

//     //         //build the signature
//     //         $key = 'secret';
//     //         $token = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $key);    // print_r($otptoken); 

//     //         $ordertoken = $headers_encoded . "." . $payload_encoded . "." . $token;

//     //         $data = array('error' => 'false', 'message' => 'product delete in addtocart page', 'ordertoken' => $ordertoken);
//     //         // echo json_encode($data);

//     //         $redirectUrl = 'ordersuccess.php';
//     //         $redirectUrlWithToken = $redirectUrl . '?ordertoken=' . urlencode($ordertoken);
//     //         header('Location: ' . $redirectUrlWithToken);
//     //         exit;

//     //         // header('location: ordersuccess.php');

//     //     } else {
//     //         $data = array('error' => 'true', 'message' => 'product not delete in addtocart page');
//     //     }
//     // } else {
//     //     $data = array('error' => 'true', 'message' => 'payment has Failed');
//     // }
//     // echo json_encode($data);
// }

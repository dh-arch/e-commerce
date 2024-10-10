<?php
include 'connection.php';
session_start();

if (isset($_GET['type']) && $_GET['type'] == 'pending') {
    $status = $_GET['type'];
    if (isset($_POST['pidarry']) && isset($_POST['gtarry'])) {
        $pidarry = $_POST['pidarry'];  // print_r($pidarry);
        $gtarry = $_POST['gtarry'];

        function generateuniqueid($length = 3)
        {
            $unique_id = "";
            for ($i = 0; $i < $length; $i++) {
                $unique_id .= rand(0, 9);
            }
            return $unique_id;
        }
        $unique_id = generateuniqueid(3);

        foreach ($pidarry as $key => $value) {
            $uid = $value['uid'];  // print_r($uid);
            $pid = $value['pid'];   // print_r($pid);
            $image = $value['image'];  // print_r($image); 
            $category = $value['category'];   // print_r($category);
            $subcategory = $value['subcategory'];   // print_r($subcategory);
            $size = $value['size'];   // print_r($size);
            $qty = $value['qty'];  // print_r($qty);
            $price = $value['price'];   //  print_r($price);
            $totalprice = $value['totalprice'];  // print_r($totalprice);
            $delivery = $value['delivery'];
            print_r($delivery);
            // $payment_charge = $value['payment_charge'];
            // print_r($payment_charge);
            $soldby = $value['soldby'];   // print_r($soldby);

            (isset($value['delivery']) == 'free delivery') ? $payment_charge = '' : $payment_charge = $value['payment_charge'];

            (isset($value['delivery']) == 'pay to charge') ? $payment_charge = $value['payment_charge'] : $payment_charge = '';

            foreach ($gtarry as $key => $value) {
                $grandtotal = $value['grandtotal'];   // print_r($grandtotal);

                $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
                $current_date = $dateTime->format('Y-m-d H:i:s');

                $status = 'cart';
                if ($status == 'cart') {

                    $sql = "insert into `addtocart` (`unique_id`,`user_id`,`product_id`,`image`,`category`,`subcategory`,`size`,`quantity`,`price`,`totalprice`,`grandtotal`,`delivery`,`payment_charge`,`soldby`,`status`,`current_date`)values('$unique_id','$uid','$pid','$image','$category','$subcategory','$size','$qty','$price','$totalprice','$grandtotal','$delivery','$payment_charge','$soldby','$status','$current_date')";
                    print_r($sql);

                    // $result = mysqli_query($conn, $sql);
                    // if ($result) {

                    //     $query = "insert into `cart` (`unique_id`,`user_id`,`product_id`,`image`,`category`,`subcategory`,`size`,`quantity`,`price`,`totalprice`,`grandtotal`,`delivery`,`payment_charge`,`soldby`,`status`,`current_date`)values('$unique_id','$uid','$pid','$image','$category','$subcategory','$size','$qty','$price','$totalprice','$grandtotal','$delivery','$payment_charge','$soldby','$status','$current_date')";
                    //     // print_r($query);
                    //     $result = mysqli_query($conn, $query);
                    //     if ($result) {

                    //         $_SESSION['unique_id'] = $unique_id;   // print_r($_SESSION['unique_id']);

                    //         echo 1;
                    //     } else {
                    //         echo 0;
                    //     }
                    // } else {
                    //     echo 0;
                    // }

                } else {
                    echo 0;
                }
            }
        }
    } else {
        echo 0;
    }
}

<?php
include 'connection.php';
include 'header.php';

// $headers = apache_request_headers();

// if(isset($headers['Authorization'])){
//     $jwttoken= $headers['Authorization'];   // print_r($jwttoken);

//     $detoken= explode('.',$jwttoken);  //print_r($detoken);

//     $token= json_decode(base64_decode($detoken[1]));  // print_r($token);

//     $unique_id= $token->unique_id;   
//     $uid= $token->uid; 
//     $name= $token->name;  

//     $data= array('error' => 'false', 'message' => 'token get', 'unique_id' => $unique_id );
//     echo json_encode($data);
// }
// else{
//     $data= array('error' => 'true', 'message' => 'token is failed');
//     echo json_encode($data);
// }

$uid = $_SESSION['user_id'];   // print_r($uid);

?>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/logo.png" type="">

    <title> Feane </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/paydetail.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        .staus {
            border-radius: 20px;
            padding: 5px 10px;
            background-color: greenyellow;
            opacity: 10px;
        }

        .status_after {
            border-radius: 20px;
            padding: 5px 10px;
            background-color: red;
            opacity: 20px;
        }

        @media (max-width: 575px) {
            .card {
                font-size: 14px;
            }

            .order-detail {
                font-size: 14px;
            }

            .item {
                display: grid;
            }

        }
    </style>

</head>

<body>

    <?php

    // $unique_id= $_GET['unique_id'];   print_r($unique_id);
    $unique_id = $_SESSION['unique_id'];
    // print_r($unique_id);

    $sql = "select * from `payment` where `unique_id`= '$unique_id'";
    // $sql = "select * from cart, payment where cart.product_id=payment.pid"; //join query
    $result = mysqli_query($conn, $sql);   // print_r($result);
    while ($row = mysqli_fetch_assoc($result)) {
        // print_r($unique_id);
        $pid = $row['pid'];
        // print_r($pid);
        $image = $row['image'];
        // print_r($image);

        $name = $row['name'];  // print_r($name);
        $paymode = $row['paymode'];    // print_r($paymode);
        $order_id = $row['order_id'];  // print_r($order_id);
        $category = $row['category'];
        $image = $row['image'];
        // print_r($image);
        $totalprice = $row['totalprice'];
        $grandtotal = $row['grandtotal'];
        $quantity = $row['quantity'];
        $status = $row['status'];
        $current_date = $row['current_date'];
        $delivery_date = $row['delivery_date'];

        $dbunique_id = $row['unique_id'];
        // print_r($dbunique_id);

        if ($unique_id == $dbunique_id) {

            $sql = "select * from `cart` where `unique_id`= '$unique_id'";
            // $sql = "select * from cart, payment where cart.product_id=payment.pid"; //join query
            $result = mysqli_query($conn, $sql);   // print_r($result);
            while ($row = mysqli_fetch_assoc($result)) {
                $soldby = $row['soldby'];
                // print_r($soldby);
            }

            if ($paymode == 'cash') {
    ?>

                <div class="container wow animate__animated animate__fadeInLeft" id="element" style="margin-top: 75px ; margin-bottom: 40px;">
                    <form action="paysubmit.php?type=success" method="POST" id="payment-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 d-lg-grid d-md-grid px-4 gap-4">
                                <?php
                                // $sql = "SELECT addtocart.id, addtocart.unique_id, addtocart.user_id, addtocart.product_id, addtocart.image, addtocart.category, addtocart.subcategory, addtocart.quantity, addtocart.price, productdata.mrp, productdata.discount, productdata.offer, addtocart.grandtotal, addtocart.soldby, addtocart.delivery, addtocart.payment_charge FROM addtocart
                                //  LEFT JOIN productdata ON productdata.id = addtocart.product_id 
                                //  WHERE unique_id= '$unique_id' ";

                                $sql = "SELECT payment.id, payment.uid, payment.pid, payment.name, payment.email, payment.mobileno, payment.address, payment.image, payment.category, payment.subcategory, payment.quantity, payment.price, payment.mrp, payment.discount, payment.offer, FROM payment 
                                WHERE unique_id = '$unique_id'";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    print_r($row['image']);
                                ?>

                                <?php } ?>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- <div class="card my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-7 m-auto" style="margin: 0 auto;">
                                <div class="right border">
                                    <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                    <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $pid; ?>">
                                    <div class="d-flex pt-2">
                                        <div style="border-radius:200px; height:35px; width:35px; background: #23c767; ">
                                            <i class="checkmark pt-1" style="color: #fff; display: flex; justify-content: center;
                                        align-items: center; ">✓</i>
                                        </div> &nbsp;
                                        <p class="align-items-center fw-bold pt-2" style="font-weight: bold; "> Thank you for shopping with us ! </p>
                                    </div>

                                    <hr>

                                    <div class="header pb-2">Order Summary</div>
                                    <?php
                                    $sql = "select * from `payment`,`cart` where payment.unique_id=cart.unique_id";
                                    $result = mysqli_query($conn, $sql);   // print_r($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $delivery = $row['delivery'];
                                    }
                                    $sql = "select * from `payment` where `unique_id`= '$unique_id'";
                                    $result = mysqli_query($conn, $sql);   // print_r($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="d-grid justify-content-center align-self-center p-2">
                                            <div class=" d-flex pt-2">
                                                <p style="20px;"> Order id : &nbsp;&nbsp; <?php echo $order_id; ?> </p>
                                            </div>
                                            <div class=" d-flex pt-2">
                                                <p> Estimated Delivery by <?php echo $delivery_date; ?> </p>
                                            </div>
                                            <div> Sold By : <?php echo $soldby; ?> </div>
                                        </div>

                                        <div class="row item d-flex justify-content-center align-self-center py-4">
                                            <div class=" col-5 align-self-center lh-lg">
                                                <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                            </div>
                                            <div class="col-5 lh-lg" style="display: grid; justify-content: end; align-self: center; line-height:30px;">
                                                <div class="text-right">
                                                    <b><?php $category; ?></b>
                                                </div>
                                                <div class=" text-right ">
                                                    <?php echo $totalprice; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                                <div class="text-right">Qty: <?php echo $quantity; ?> </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-6 align-self-center ">
                                            <div class="col text-left lh-lg" style="line-height: 30px;">
                                                <div>
                                                    Delivery
                                                </div>
                                                <div>
                                                    <b> Total to pay </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg" style="line-height: 30px;">
                                                <div class="">
                                                    <?php echo $delivery; ?>
                                                </div>
                                                <div class="">
                                                    <?php echo $grandtotal; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <?php
                                    $sql = "select * from `address` where `firstname`='$name'";   // print_r($sql);
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>

                                        <div class="col item d-grid justify-content-center align-self-center">
                                            <div class="row col-6  ">
                                                <div class="col text-left lh-lg" style="line-height: 30px;">
                                                    <div class="" style="font-weight: bold;">
                                                        delivery address
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="col text-left lh-lg" style="line-height: 30px; padding: 0;">
                                                    <div class="firstname">
                                                        <?php echo $row['firstname']; ?>
                                                    </div>
                                                    <div class="address"><?php echo $row['address']; ?>, &nbsp;
                                                        <?php echo $row['city'] ?> ,
                                                        <?php echo $row['state'] ?> ,
                                                        <?php echo $row['pincode'] ?>
                                                    </div>
                                                    <div class="mobileno">
                                                        <?php echo $row['mobileno']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-6 align-self-center ">
                                            <div class="col text-left lh-lg" style="line-height: 30px;">
                                                <div>
                                                    paymode
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg" style="line-height: 30px;">
                                                <div class="">
                                                    <?php echo $paymode; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="btn-box row item d-flex justify-content-center align-self-center ">
                                        <div class="col-12 d-flex justify-content-center align-self-center">
                                            <button style="padding: 9px 45px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; " class="btn"> Continue Shopping </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            <?php } elseif ($paymode == 'card') { ?>

                <div class="container wow animate__animated animate__fadeInLeft" id="element" style="margin-top: 75px ; margin-bottom: 40px;">
                    <form id="payment-form" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6 d-lg-grid d-md-grid px-4 gap-4 wow animate__animated animate__fadeInLeft">
                                <?php
                                $sql = "SELECT addtocart.id, addtocart.unique_id, addtocart.user_id, addtocart.product_id, addtocart.image, addtocart.category, addtocart.subcategory, addtocart.quantity, addtocart.price, productdata.mrp, productdata.discount, productdata.offer, addtocart.grandtotal, addtocart.soldby, addtocart.delivery, addtocart.payment_charge FROM addtocart
                        LEFT JOIN productdata ON productdata.id = addtocart.product_id 
                        WHERE unique_id= '$unique_id' ";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_id = $row['product_id'];
                                ?>
                                    <div class="row border border-1 border-slate-300 rounded p-4">
                                        <input type="hidden" class="image" id="image" name="image" value="<?php echo $row['image']; ?>">
                                        <input type="hidden" class="quantity" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>">
                                        <input type="hidden" class="totalp" id="totalp" value="<?php echo $row['grandtotal']; ?>">
                                        <input type="hidden" id="uid" class="uid" name="uid" value="<?php echo $row['user_id']; ?>">
                                        <input type="hidden" id="pid" class="pid" name="pid" value="<?php echo $row['product_id']; ?>">
                                        <input type="hidden" id="name" class="name" name="name" value="<?php echo $name; ?>">
                                        <input type="hidden" id="email" class="email" name="email" value="<?php echo $email; ?>">
                                        <input type="hidden" id="category" class="category" name="category" value="<?php echo $row['category']; ?>">
                                        <input type="hidden" id="mode" class="mode" name="mode" value="<?php echo $mode; ?>">


                                        <div class="address d-none">
                                            <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $pincode; ?>
                                        </div>

                                        <div class="mobileno d-none">
                                            <?php echo $mobileno; ?>
                                        </div>

                                        <div class="d-grid">
                                            <div class="col-12">
                                                <p style="color: #333; font-size: 15px;">
                                                    Estimated Delivery by <?php echo $delivery_date; ?>
                                                </p>
                                            </div>
                                            <div class="d-flex">
                                                <div class="col-3">
                                                    <img class="img-fluid " src="./Blog_project/assets/images/product/product-images/<?php echo $row['image']; ?>" style="width: 100px; height: 100px; border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39); justify-content: center; align-items: center;">
                                                </div>
                                                <div class="col-9">
                                                    <div class="subcategory my-2" style="color: #333; font-size: 19px; font-weight: bold;">
                                                        <?php echo $row['subcategory']; ?>
                                                    </div>
                                                    <div style="font-size: 16px;">
                                                        <i class="fa-solid fa-indian-rupee-sign "></i> <span class="price" style="color: #000;"> <?php echo $row['price']; ?> </span> &nbsp;&nbsp;
                                                        <del> <span class="" style="color: #000;"><?php echo $row['mrp']; ?></span> </del> &nbsp;&nbsp;
                                                        <span style="color: #000;"><?php echo $row['discount']; ?>&nbsp;<i class="fa-thin fa-percent"></i></span>
                                                    </div>
                                                    <div class="text-" style="color: #333; font-size: 15px;">
                                                        <?php echo $row['offer']; ?>
                                                    </div>
                                                    <?php
                                                    $ischeck = $row['delivery'] == 'Free Delivery' ? 'd-flex' : 'd-none';
                                                    ?>
                                                    <!-- free delivery -->
                                                    <div class="col-12 d-flex " style="font-size: 16px;">
                                                        <input id="delivery" name="delivery" class="delivery text-center" style=" width: 105px; height: 39px; border: none; background-color: #fff; color: slategrey; font-size: 15px; font-weight: 500;" value="<?php echo $row['delivery']; ?>" readonly>
                                                        <input style="width: 40px; border: none !important; background-color: #fff !important;" value="<?php echo $row['payment_charge']; ?>" <?= $ischeck ?> <?= $ischeck == false ? 'd-none' : 'd-flex'; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>

                            <div class="col-6 px-4 wow animate__animated animate__fadeInRight">

                                <?php
                                $sql = "select * from `addtocart` where unique_id= '$unique_id'"; // print_r($sql);
                                $result = mysqli_query($conn, $sql); // print_r($result); 
                                while ($row = mysqli_fetch_array($result)) {
                                    $grandtotal = $row['grandtotal'];
                                }

                                ?>
                                <div class="paymode row item d-flex justify-content-center align-self-center py-4 border border-1 border-slate-300 rounded">
                                    <h4> Payment Details </h4>
                                    <div class="d-grid pt-3">
                                        <div class="price-detail lh-lg " style="padding: 20px;">

                                            <div class="col-12 d-flex text">
                                                <div class="col-6">Total Price </div>
                                                <div class="col-6 col text-right">
                                                    <span id="" class="" style="color: #000;">
                                                        <?php echo $grandtotal; ?>
                                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                                    </span>
                                                    <input type="hidden" class="totalprice" id="totalprice" value="<?php echo $grandtotal ?>">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex text">
                                                <div class="col-6 ">Total Discount </div>
                                                <div class="col-6 col text-right">
                                                    <span id="" class="" style="color: #000;"> 5
                                                        <i class="fa-solid fa-percent"></i>
                                                    </span>
                                                    <input type="hidden" class="discount" id="discount" value="5">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12 d-flex text">
                                                <div class="col-6"> Total To Pay </div>
                                                <div class="col-6 text-right " style="color: #000;">
                                                    <input class="totalpay" id="totalpay" style="width: 40px; border: none !important; background-color: #fff !important;" value="">
                                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                                </div>
                                            </div>

                                            <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="pk_test_51Q5NWT07hyYPS9jwF5pWBH4amoHaC4qdWgOUGLt3jAPx9Wrk9hOSWvXNYZoYWpPlBbSAU4XHjRQPUkPFIy7YyftM002ZogGleG"
                                                data-currency="inr">
                                                // pk_test_51PBfpgLkGTnmsxChSNvHD5Dae8EYOF4hplQmPKlnR63IBThgbsnuYUCslUfQIcZwx6ZpBzCotFUWPTm69eBYCalg00ZXFAmk4J
                                            </script>
                                            <script>
                                                document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                            </script>

                                            <div class="btn-box row item flex justify-content-center align-self-center ">
                                                <div class="col-5 d-flex justify-content-center">
                                                    <button class="btn"> Order </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- <div class="card my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-7 m-auto" style="margin: 0 auto;">
                                <div class="right border">
                                    <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                    <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $pid; ?>">
                                    <div class="d-flex pt-2">
                                        <div style="border-radius:200px; height:35px; width:35px; background: #23c767; ">
                                            <i class="checkmark pt-1" style="color: #fff; display: flex; justify-content: center;
                                        align-items: center; ">✓</i>
                                        </div> &nbsp;
                                        <p class="align-items-center fw-bold pt-2" style="font-weight: bold; "> Thank you for shopping with us ! </p>
                                    </div>

                                    <hr>

                                    <div class="header pb-2">Order Summary</div>
                                    <?php
                                    $sql = "select * from `payment`,`cart` where payment.unique_id=cart.unique_id";
                                    $result = mysqli_query($conn, $sql);   // print_r($result);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $delivery = $row['delivery'];
                                    ?>
                                        <div class="d-grid justify-content-center align-self-center p-2">
                                            <div class=" d-flex pt-2">
                                                <p style="20px;"> Order id : &nbsp;&nbsp; <?php echo $row['order_id']; ?> </p>
                                            </div>
                                            <div class=" d-flex pt-2">
                                                <p> Estimated Delivery by <?php echo $delivery_date; ?> </p>
                                            </div>
                                            <div> Sold By : <?php echo $row['soldby']; ?> </div>
                                        </div>

                                        <div class="row item d-flex justify-content-center align-self-center py-4">
                                            <?php
                                            $sql = "select * from `payment` where `unique_id`='$unique_id'";
                                            $result = mysqli_query($conn, $sql);   // print_r($result);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <div class=" col-5 align-self-center lh-lg">
                                                    <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                                </div>
                                                <div class="col-5 lh-lg" style="display: grid; justify-content: end; align-self: center; line-height:30px;">
                                                    <div class="text-right">
                                                        <b><?php $category; ?></b>
                                                    </div>
                                                    <div class=" text-right ">
                                                        <?php echo $totalprice; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                    </div>
                                                    <div class="text-right">Qty: <?php echo $quantity; ?> </div>
                                                </div>
                                        </div>

                                        <hr>
                                <?php }
                                        } ?>


                                <div class="row item d-flex justify-content-center align-self-center">
                                    <div class="row col-6 align-self-center ">
                                        <div class="col text-left lh-lg" style="line-height: 30px;">
                                            <div>
                                                Delivery
                                            </div>
                                            <div>
                                                <b> Total to pay </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div class="">
                                                <?php echo $delivery; ?>
                                            </div>
                                            <div class="">
                                                <?php echo $grandtotal; ?>
                                                <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <?php
                                $sql = "select * from `address` where `firstname`='$name'";   // print_r($sql);
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <div class="col item d-grid justify-content-center align-self-center">
                                        <div class="row col-6  ">
                                            <div class="col text-left lh-lg" style="line-height: 30px;">
                                                <div class="" style="font-weight: bold;">
                                                    delivert address
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="col text-left lh-lg" style="line-height: 30px; padding: 0;">
                                                <div class="firstname">
                                                    <?php echo $row['firstname']; ?>
                                                </div>
                                                <div class="address"><?php echo $row['address']; ?>, &nbsp;
                                                    <?php echo $row['city'] ?> ,
                                                    <?php echo $row['state'] ?> ,
                                                    <?php echo $row['pincode'] ?>
                                                </div>
                                                <div class="mobileno">
                                                    <?php echo $row['mobileno']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                                <hr>

                                <div class="row item d-flex justify-content-center align-self-center">
                                    <div class="row col-6 align-self-center ">
                                        <div class="col text-left lh-lg" style="line-height: 30px;">
                                            <div>
                                                paymode
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div class="">
                                                <?php echo $paymode; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="btn-box row item d-flex justify-content-center align-self-center ">
                                    <div class="col-12 d-flex justify-content-center align-self-center">
                                        <button style="padding: 9px 45px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; " class="btn"> Continue Shopping </button>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->

            <?php } ?>

    <?php }
    } ?>

    <?php
    include 'footer.php';
    ?>
</body>


<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>
    let ordertoken = localStorage.getItem('ordertoken');
    console.log(ordertoken);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "orderdetail.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Response from PHP script
        }
    };
    xhr.send("ordertoken=" + encodeURIComponent(ordertoken));


    $(document).ready(function() {
        $('.btn').click(function() {
            window.location.href = "http://localhost/feane-1.0.0/index.php";
        })

    })
</script>
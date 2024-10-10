<?php
include 'connection.php';
include 'header.php';
// session_start();

$uid = $_SESSION['user_id'];   // print_r($uid);
// print_r($_SESSION['order_id']);

// print_r($_SESSION['paymode']);
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

    $dateTime = new DateTime('now', new DateTimeZone('Asia/kolkata'));
    $currentdate = $dateTime->format('Y-m-d H:i:s');
    // print_r($currentdate);

    $pid = $_GET['pid'];
    // print_r($pid);

    // $sql = "select * from cart, payment where cart.product_id=payment.pid"; //join query
    $sql = "select * from `cart` where `user_id`='$uid'";
    $result = mysqli_query($conn, $sql);   // print_r($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $unique_id = $row['unique_id'];   // print_r($unique_id);

        $pid = $row['product_id'];  // print_r($pid);
        $image = $row['image'];
        // print_r($image);

        $paymode = $row['status'];    // print_r($paymode);
        $soldby = $row['soldby'];
        // $order_id = $row['order_id'];  // print_r($order_id);
        // $category = $row['category'];
        // $totalprice = $row['totalprice'];
        // $grandtotal = $row['grandtotal'];
        // $quantity = $row['quantity'];
        // $delivery = $row['delivery'];
        $status = $row['status'];
        // $current_date = $row['current_date'];
        // $delivery_date = $row['delivery_date'];
        // $invoice_id = $row['invoice_id'];

    ?>
        <div class="card my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-7 m-auto" style="margin: 0 auto;">

                        <?php
                        $pid = $_GET['pid'];
                        $sql = "select * from `payment` where `pid`='$pid'";  // print_r($sql);
                        $result = mysqli_query($conn, $sql);   // print_r($result);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // print_r($row['image']);
                            $name = $row['name'];
                            $paymode = $row['paymode'];
                            // print_r($pid);
                        ?>

                            <div class="right border">
                                <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $pid; ?>">

                                <div class="header pb-4">Order Summary</div>

                                <div class="row item d-grid justify-content-center align-self-center pt-1">
                                    <div class="row col-10 align-self-center ">
                                        <div class="col text-left">
                                            <div>
                                                <input type="hidden" class="orderid" value="<?php echo $row['order_id']; ?>" >
                                                <p> Order Id : &nbsp;&nbsp; <?php echo $row['order_id']; ?> </p>
                                                <p class=" "> Sold To : <?php echo $row['name']; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 " style="display: flex; justify-content: end; align-self: center;">
                                    </div>
                                </div>

                                <div class=" d-grid justify-content-center align-self-center pt-2 pl-3 order-detail" style="font-size: 15px;">
                                    <p>
                                        Order Placed <?php echo $row['current_date']; ?>
                                    </p>
                                    <p>
                                        Estimated Delivery By <?php echo $row['delivery_date']; ?>
                                    </p>
                                    <p class=""> Sold By : <?php echo $soldby; ?> </p>
                                </div>

                                <div class="row item d-flex justify-content-center align-self-center py-4">
                                    <div class=" col-5 align-self-center lh-lg">
                                        <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                    </div>
                                    <div class="col-6 lh-lg" style="display: grid; justify-content: end; align-self: center; line-height:30px;">
                                        <div class="text-right">
                                            <b><?php $row['category']; ?></b>
                                        </div>
                                        <div class="  text-right">
                                            <?php echo $row['totalprice']; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                        </div>
                                        <div class="text-right">Qty: <?php echo $row['quantity']; ?> </div>
                                    </div>
                                </div>


                                <div class="row item d-flex justify-content-center align-self-center pt-1">
                                    <div class="row col-6 align-self-center ">
                                        <div class="col text-left">
                                            <div class="canceldiv ">
                                                Order Cancel
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right ">
                                            <div>
                                                <button style="padding: 9px 35px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; border: none;" class="cancelbtn " id="<?php echo $pid; ?>"> Cancel </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row item d-flex justify-content-center align-self-center">
                                    <div class="row col-7 align-self-center lh-lg" style="line-height: 30px;">
                                        <div class="col text-left">
                                            <div>
                                                <b> Total To Pay </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div>
                                                <?php echo $row['grandtotal']; ?>
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
                                                    Delivert Address
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

                                <div class="card px-2">

                                    <div class="row px-3">
                                        <div class="col ">
                                            <ul class="" id="progressbar">
                                                <li class="step0 active " id="step1">PLACED</li>
                                                <li class="step0 active text-center" id="step2">SHIPPED</li>
                                                <li class="step0  text-muted text-right" id="step3">DELIVERED</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer  bg-white px-sm-3 pt-sm-4 px-0">
                                        <div class="row text-center  ">
                                            <div class="col my-auto  ">
                                                <h5 class="trackbtn" id="<?php echo $unique_id; ?>">Track</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row item d-flex justify-content-center align-self-center ">
                                    <div class="row col-6 align-self-center lh-lg" style="line-height: 30px;">
                                        <div class="col text-left">
                                            <div>
                                                Order Status
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6" style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div>
                                                <?php
                                                if ($status === 'successed') { ?>
                                                    <span class='status successed badge badge-success' id="<?php echo $status; ?>" style="border-radius: 20px; padding: 5px 10px; opacity: 30px;">
                                                        <?php echo $status; ?>
                                                    </span>
                                                <?php } elseif ($status === 'canceled') { ?>
                                                    <span class='status canceled badge badge-danger' id="<?php echo $status; ?>" style="border-radius: 20px; padding: 5px 10px; opacity: 50px;">
                                                        <?php echo $status; ?>
                                                    </span>
                                                <?php } else { ?>
                                                    <span class='status badge badge-info' id="<?php echo $status; ?>" style="border-radius: 20px; padding: 5px 10px; opacity: 30px;">
                                                        pending
                                                    </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <hr>

                                <div class="row item d-flex justify-content-center align-self-center">
                                    <div class="row col-6 align-self-center lh-lg" style="line-height: 30px;">
                                        <div class="col text-left">
                                            <div>
                                                Paymode
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div class="paymode">
                                                <?php echo $paymode; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="line">

                                <div class="row item d-flex justify-content-center align-self-center">
                                    <div class="row col-10 align-self-center lh-lg" style="line-height: 30px;">
                                        <div class="col text-left">
                                            <!-- <p class="date" ><?php echo $current_date; ?></p> -->
                                            <div class="invoicedownload" id="<?php echo $unique_id; ?>" style="cursor:pointer;">
                                                Download Invoice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 " style="display: grid; justify-content: end; align-self: center;">
                                        <div class="col text-right lh-lg" style="line-height: 30px;">
                                            <div class="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    <?php } ?>

</body>

<?php
include 'footer.php';
?>

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
    $(document).ready(function() {

        $('.trackbtn').click(function() {

            let unique_id= $(this).attr('id');
            console.log(unique_id);

            $.ajax({
                url: 'trackorder.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    unique_id : unique_id
                },
                success: function(data) {
                    if (data.error == true) {
                        console.log(data.message);
                    } else {
                        console.log(data.message);
                        // window.location.href = 'ordercancel.php';
                    }
                }
            })

        })

        $('.cancelbtn').click(function(e) {
            e.preventDefault();

            let pid = $(this).attr('id');
            console.log(pid);

            let orderid= $('.orderid').val();
            console.log(orderid);

            $.ajax({
                url: 'myordercancelphp.php?type=cancel',
                method: 'POST',
                dataType: 'json',
                data: {
                    pid: pid,
                    orderid: orderid
                },
                success: function(data) {
                    if (data.error == true) {
                        console.log(data.message);
                    } else {
                        // window.location.href = 'ordercancel.php';
                    }
                }
            })
        })

        // let getstatus = $('.status').attr('id');
        // console.log(getstatus);

        // if (getstatus === 'canceled') {
        //     $('.canceldiv').hide();
        //     $('.cancelbtn').hide();
        //     $('.deliverydate').hide();
        //     $('.line').hide();
        //     $('.invoicedownload').hide();
        // } else {
        //     $('.canceldiv').show();
        //     $('.cancelbtn').show();
        //     $('deliverydate').show();
        //     $('.line').show();
        //     $('.invoicedownload').show();
        // }

        $('.invoicedownload').click(function() {

            let unique_id = $(this).attr('id');
            console.log(unique_id);

            window.location.href = 'invoicepage.php?unique_id=' + unique_id;
        })

    })
</script>
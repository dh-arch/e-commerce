<?php
include 'connection.php';
include 'header.php';

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
    <link href="css/myorder.css" rel="stylesheet" />
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

    $currentDateTime = new DateTime();
    $currentdate = $currentDateTime->format('Y-m-d');
    // print_r($currentdate);

    // $sql = "select * from cart, payment where cart.product_id=payment.pid"; //join query
    $sql = "select * from `payment`  ";  // print_r($sql);
    $result = mysqli_query($conn, $sql);   // print_r($result);
    while ($row = mysqli_fetch_assoc($result)) {

        $pid = $row['pid'];  // print_r($pid);
        $image = $row['image'];
        // print_r($image);

        $name = $row['name'];  // print_r($name);
        $paymode = $row['paymode'];    // print_r($paymode);
        $order_id = $row['order_id'];  // print_r($order_id);
        $category = $row['category'];
        $totalprice = $row['totalprice'];
        $grandtotal = $row['grandtotal'];
        $quantity = $row['quantity'];
        $status = $row['status'];
        $current_date = $row['current_date'];
        $delivery_date = $row['delivery_date'];

    ?>

        <?php if ($paymode == 'cash') {
        ?>
            <div class="card my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-7 m-auto" style="margin: 0 auto;">
                            <?php
                            $sql = "select * from `payment`,`cart` where payment.uid=cart.user_id";
                            $result = mysqli_query($conn, $sql);   // print_r($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $delivery = $row['delivery'];
                            ?>
                                <div class="right border">
                                    <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                    <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $row['product_id']; ?>">

                                    <div class="header pb-4">Order Summary</div>

                                    <div class="row item d-flex justify-content-center align-self-center pt-1">
                                        <div class="row col-10 align-self-center ">
                                            <div class="col text-left">
                                                <div>
                                                    <p style="20px;"> Order id : &nbsp;&nbsp; <?php echo $row['order_id']; ?> </p>
                                                    <p class=" "> Sold To : <?php echo $name; ?> </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 " style="display: grid; justify-content: end; ">
                                        </div>
                                    </div>

                                    <div class="row item d-flex justify-content-center align-self-center py-4">
                                        <div class=" col-5 align-self-center lh-lg">
                                            <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                        </div>
                                        <div class="col-5 lh-lg" style="display: grid; justify-content: end; align-self: center; line-height:30px;">
                                            <div class="text-right">
                                                <b><?php $row['category']; ?></b>
                                            </div>
                                            <div class=" text-right ">
                                                <?php echo $row['totalprice']; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                            </div>
                                            <div class="text-right">Qty: <?php echo $row['quantity']; ?> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="btn-box row item flex justify-content-center align-self-center ">
                                        <div class="col-lg-6">
                                            <button style="padding: 9px 45px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; border: none;" id="<?php echo $pid; ?>" class="viewbtn"> View Details </button>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php } elseif ($paymode == 'card') { ?>
            <div class="col-12 my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">

                <div class="col-md-6 m-auto" style="margin: 0 auto;">
                    <?php
                    $sql = "select * from `payment` where `uid`='$uid'";
                    $result = mysqli_query($conn, $sql);   // print_r($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // $delivery = $row['delivery'];
                    ?>
                        <div class="right border my-6">
                            <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                            <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $row['pid']; ?>">

                            <div class="header pb-4">Order Summary</div>

                            <div class="row item d-flex justify-content-center align-self-center pt-1">
                                <div class="row col-10 align-self-center ">
                                    <div class="col text-left">
                                        <div>
                                            <p style="20px;"> Order id : &nbsp;&nbsp; <?php echo $row['order_id']; ?> </p>
                                            <p class=" "> Sold To : <?php echo $name; ?> </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 " style="display: grid; justify-content: end; ">
                                </div>
                            </div>

                            <div class="row item d-flex justify-content-center align-self-center py-4">
                                <div class=" col-5 align-self-center lh-lg">
                                    <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                </div>
                                <div class="col-5 lh-lg" style="display: grid; justify-content: end; align-self: center; line-height:30px;">
                                    <div class="text-right">
                                        <b><?php $row['category']; ?></b>
                                    </div>
                                    <div class=" text-right ">
                                        <?php echo $row['totalprice']; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                    </div>
                                    <div class="text-right">Qty: <?php echo $row['quantity']; ?> </div>
                                </div>
                            </div>
                            <div class="btn-box row item d-flex justify-content-center align-self-center ">
                                <div class="col-lg-6 d-flex justify-content-center align-self-center">
                                    <button style="padding: 9px 45px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; border: none;" class="viewbtn" id="<?php echo $row['pid']; ?>"> View Details </button>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                </div>

            </div>
        <?php } ?>

    <?php }  ?>

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

        $('.viewbtn').click(function() {

            let pid = $(this).attr('id');
            console.log(pid);

            let ordertoken = localStorage.getItem('ordertoken');
            console.log(ordertoken);

            $.ajax({
                url: 'ordertoken.php?pid=' + pid,
                type: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': ordertoken
                },
                dataType: 'json',
                data: {
                    pid: pid
                },
                success: function(data) {
                    if (data.error == true) {
                        console.log(data.message);
                    } else {
                        $unique_id = data.unique_id;
                        $pid = data.data;
                        console.log($pid);
                        window.location.href = 'myorderdetail.php?pid=' + $pid;
                    }
                }
            })
        })

        // $('.viewbtn').click(function() {
        //     let pid = $(this).attr('id');
        //     console.log(pid);

        //     window.location.href = 'http://localhost/feane-1.0.0/myorderdetail.php?pid=' + pid;
        // })

    })
</script>
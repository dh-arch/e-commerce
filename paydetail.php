<?php
include 'connection.php';
include 'header.php';

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        #payform a {
            padding: 9px 35px;
            background-color: #000;
            color: #fff !important;
            border-radius: 45px;
            cursor: pointer;
        }

        #payform a:hover {
            background-color: #fff;
            color: #000 !important;
            border: 1px solid #000;
            border-radius: 45px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <?php if (isset($_SESSION['login'])) {

        if (isset($_SESSION['unique_id'])) {
            $unique_id = $_SESSION['unique_id'];   // print_r($unique_id);
            $uid = $_SESSION['user_id'];  // print_r($uid);

            // $_SESSION['name'] = $name;   // print_r($_SESSION['name']);
    ?>

            <div class="container card my-10 wow animate__animated animate__fadeInUp" style="margin-top: 75px ; margin-bottom: 40px;">
                <div class="payment-div row lg-d-flex md-d-grid sm-d-grid" style="gap: 15px 0;">
                    <div class="col-lg-6">
                        <div class="p-5 border border-1 border-slate-300 rounded-sm">
                            <form id="payform">
                                <input type="hidden" class="unique_id" value="<?php echo $unique_id; ?>">
                                <input type="hidden" class=" uid" name="uid" value="<?php print_r($uid); ?>">
                                <div class="form-input space-x-10 my-3">
                                    <lable>name:</lable>
                                    <input type="text" id="name" name="name" class="h-8 w-96 form-control border border-1 border-slate-300 rounded-sm outline-none name" placeholder="enter name" value="<?php  ?>" required>
                                </div>
                                <div class="form-input space-x-2 my-3">
                                    <lable>pay mode:</lable>
                                    <select id="paytype" name="paytype" class="h-8 w-96 form-control border border-1 border-slate-300 rounded-sm paytype" style="outline: none;" required>
                                        <option disabled>select cash on delivery</option>
                                        <option value="cash" name="cash">cash on delivery</option>
                                        <option value="card" name="card"> credit card / debit card </option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center pt-3">
                                    <a class="order btn"> Continue </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6  ">
                        <div class="row">
                            <div class="d-grid px-4 " style="gap: 15px 0;">
                                <?php
                                $sql = "select * from `addtocart` where `user_id`='$uid'";
                                $result = mysqli_query($conn, $sql);
                                $totalproduct = mysqli_num_rows($result);  // print_r($row);

                                $sql = "select * from addtocart where addtocart.unique_id= '$unique_id'";
                                $result = mysqli_query($conn, $sql); // print_r($result); 
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <div class="row item d-lg-flex d-md-grid justify-content-center align-self-center py-4 border border-1 border-slate-300">
                                        <div class="col-12 px-3 pb-3 d-flex justify-content-start align-self-center">
                                            <div class=" ">
                                                <span> Sold by : &nbsp;&nbsp; <?php echo $row['soldby']; ?> </span>
                                            </div>
                                            <div>
                                                <span> Delivery : &nbsp;&nbsp; <?php echo $row['delivery']; ?> </span>
                                            </div>
                                        </div>
                                        <div class=" col-4 align-self-center lh-lg">
                                            <img class="img-fluid" src="./Blog_project/assets/images/product/product-images/<?php echo $row['image']; ?>" style="width: 100px; height: 100px; border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                        </div>
                                        <div class="col-6 lh-lg text-right" style="display: grid; justify-content: end; align-self: center;">
                                            <div class="">
                                                <b><?php echo $row['subcategory']; ?></b>
                                            </div>
                                            <div class="  ">
                                                <?php echo $row['totalprice']; ?> <i class="fa fa-indian-rupee-sign text-sm mt-1"></i>
                                            </div>
                                            <div class="">Qty: <?php echo $row['quantity']; ?> </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card my-10 wow animate__animated animate__fadeInUp" style="margin-top: 30px ; margin-bottom: 30px;">

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="left border">
                                <div class="row">

                                </div>
                                <form id="payform">
                                    <input type="hidden" class="unique_id" value="<?php echo $unique_id; ?>">
                                    <input type="hidden" class=" uid" name="uid" value="<?php print_r($uid); ?>">
                                    <p id='errormess' class='text-red-500 text-md'></p>
                                    <div class="form-input space-x-10">
                                        <lable>name:</lable>
                                        <input type="text" id="name" name="name" class="h-8 w-96 form-control border border-1 border-slate-300 rounded-sm outline-none name" placeholder="enter name" value="<?php  ?>" required>
                                    </div>
                                    <p id='errormess' class='text-red-500 text-md'></p>
                                    <div class="form-input space-x-2">
                                        <lable>pay mode:</lable>
                                        <select id="paytype" name="paytype" class="h-8 w-96 form-control border border-1 border-slate-300 rounded-sm paytype" style="outline: none;" required>
                                            <option disabled>select cash on delivery</option>
                                            <option value="cash" name="cash">cash on delivery</option>
                                            <option value="card" name="card"> credit card / debit card </option>
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-center pt-3">
                                        <a style="margin-top: 30px; padding: 10px 40px; background-color: #000; color: #fff; border-radius: 45px;" class="order btn"> Continue </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        // $sql = "select * from `addtocart` where `user_id`='$uid'";
                        // $result = mysqli_query($conn, $sql);
                        // $totalproduct = mysqli_num_rows($result);  // print_r($row);

                        // $sql = "select * from addtocart where addtocart.unique_id= '$unique_id'";
                        // $result = mysqli_query($conn, $sql); // print_r($result); 
                        // while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="col-md-6">
                                <div class="right border">
                                    <div class="header pb-3">Order Summary</div>
                                    <p><?php print_r($totalproduct); ?> items</p>
                                    <div class="row item d-flex justify-content-center align-self-center py-4">
                                        <div class=" col-4 align-self-center lh-lg">
                                            <img class="img-fluid" src="./Blog_project/assets/images/product/product-images/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                        </div>
                                        <div class="col-6 lh-lg" style="display: grid; justify-content: end; align-self: center;">
                                            <div class="">
                                                <b><?php echo $row['category']; ?></b>
                                            </div>
                                            <div class="  ">
                                                <?php echo $row['totalprice']; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                            </div>
                                            <div class="">Qty: <?php echo $row['quantity']; ?> </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
                                                <div>
                                                    Subtotal
                                                </div>
                                                <div>
                                                    Delivery
                                                </div>
                                                <div>
                                                    <b> Total to pay </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg">
                                                <div>
                                                    <?php echo $row['grandtotal']; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                                <div>
                                                    <?php echo $row['delivery']; ?>
                                                </div>
                                                <div>
                                                    <?php echo $row['grandtotal']; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div>
                </div>
            </div> -->

        <?php }
    } else { ?>
        <a href="login/login.php" class="text-xl cursor-pointer" id="fa-user"><span class="fa fa-user "></span></a>
    <?php } ?>

    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        $(document).ready(function() {
            new WOW().init();

            $('.order').click(function() {
                let uid = $('.uid').val();
                console.log(uid);
                let name = $('.name').val();
                console.log(name);
                let paytype = $('.paytype').val();
                console.log(paytype);
                let unique_id = $('.unique_id').val();
                console.log(unique_id);

                $.ajax({
                    url: 'paymode.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        uid: uid,
                        name: name,
                        paytype: paytype,
                        unique_id: unique_id
                    },
                    success: function(data) {
                        if (data.error == 'true') {
                            console.log(data.message);
                        } else {
                            window.location.href = 'paydetail.php';
                        }

                        if (paytype == 'card') {
                            window.location.href = 'payment.php';
                        } else {
                            window.location.href = 'cash.php?mode=' + paytype;
                        }
                    }
                })
            })

            // $('#payform').validate({
            //     rules: {
            //         name: {
            //             required: true,
            //         },
            //         paytype: {
            //             required: true,
            //         }
            //     },
            //     messages: {
            //         name: {
            //             required: 'name is require',
            //         },
            //         paytype: {
            //             required: 'paytype is require'
            //         },
            //     },
            //     submitHandler: function(form) {
            //         let uid = $('.uid').val();
            //         console.log(uid);
            //         let name = $('.name').val();
            //         console.log(name);
            //         let paytype = $('.paytype').val();
            //         console.log(paytype);

            //         // $.ajax({
            //         //     url: 'paymode.php',
            //         //     type: 'POST',
            //         //     dataType: 'json',
            //         //     data: {
            //         //         uid: uid,
            //         //         name: name,
            //         //         paytype: paytype
            //         //     },
            //         //     success: function(data) {
            //         //         if (data.error == 'true') {
            //         //             console.log(data.message);
            //         //         } else {
            //         //             window.location.href = 'paydetail.php';
            //         //         }

            //         //         if (paytype == 'card') {
            //         //             window.location.href = 'payment.php?mode=' + paytype;
            //         //         } else {
            //         //             window.location.href = 'cash.php?mode=' + paytype;
            //         //         }
            //         //     }
            //         // })
            //     }
            // })
        })
    </script>
</body>
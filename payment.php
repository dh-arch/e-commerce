<?php
include 'connection.php';
include 'header.php';

$uid = $_SESSION['user_id'];  // print_r($uid);
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
        .paymode button {
            padding: 9px 35px;
            background-color: #000;
            color: #fff !important;
            border-radius: 45px;
            cursor: pointer;
        }

        .paymode button:hover {
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

        // $name=$_SESSION['firstname'];   print_r($name);
        $email = $_SESSION['email']; // print_r($email);
        $uid = $_SESSION['user_id'];  // print_r($uid);
        // $mode = $_GET['mode'];   print_r($mode);
        // $mode = $_GET['stripeTokenType'];  // print_r($mode);
        $unique_id = $_SESSION['unique_id'];   // print_r($unique_id);

        // $name = $_SESSION['name'];   // print_r($name);

        $sql = "select * from `paymode` where `unique_id`= '$unique_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mode = $row['paymode'];
            $name = $row['name'];
            $delivery_date = $row['delivery_date'];  // print_r($delivery_date);

        }

        $sql = "select * from `address` where `unique_id`='$unique_id' and `email`='$email'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mobileno = $row['mobileno'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $pincode = $row['pincode'];
        }

    ?>

        <div class="container wow animate__animated animate__fadeInLeft" id="element" style="margin-top: 75px ; margin-bottom: 40px;">
            <form id="payment-form" enctype="multipart/form-data">

                <div class="payment-div row lg-d-flex md-d-grid sm-d-grid lh-lg" style="gap: 10px 0;">
                    <div class="col-lg-6 d-lg-grid d-md-grid px-4 wow animate__animated animate__fadeInLeft" style="margin-top: 5px; gap: 10px 0;">
                        <div style="gap: 10px 0;">
                            <?php
                            $sql = "SELECT addtocart.id, addtocart.unique_id, addtocart.user_id, addtocart.product_id, addtocart.image, addtocart.size, addtocart.category, addtocart.subcategory, addtocart.quantity, addtocart.price, productdata.mrp, productdata.discount, productdata.offer, addtocart.grandtotal, addtocart.soldby, addtocart.delivery, addtocart.payment_charge FROM addtocart
                            LEFT JOIN productdata ON productdata.id = addtocart.product_id 
                            WHERE unique_id= '$unique_id' ";

                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['product_id'];
                            ?>
                                <div class="row border border-1 border-slate-300 rounded p-4 mb-3 ">
                                    <input type="hidden" class="image" id="image" name="image" value="<?php echo $row['image']; ?>">
                                    <input type="" class="size" id="size" value="<?php echo json_decode($row['size']); ?>">
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
                        <div class="row border border-1 border-slate-300 p-4 rounded">
                            <div>
                                <h4> Delivery Address </h4>
                            </div>
                            <div class="lh-lg">
                                <div>
                                    <span style="color: #000; font-size: 19px; font-weight: bold;"> <?php echo $name; ?> </span>
                                </div>
                                <div class="address ">
                                    <span style="color: #000;">
                                        <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $pincode; ?>
                                    </span>
                                </div>
                                <div>
                                    <span style="color: #000;"> <?php echo $mobileno; ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 md-pt-4 sm-pt-5 px-4 wow animate__animated animate__fadeInRight">

                        <?php
                        $sql = "select * from `addtocart` where unique_id= '$unique_id'"; // print_r($sql);
                        $result = mysqli_query($conn, $sql); // print_r($result); 
                        $totalproduct = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                            $grandtotal = $row['grandtotal'];
                        }

                        ?>
                        <div class="paymode row item d-flex justify-content-center align-self-center py-4 border border-1 border-slate-300 rounded">
                            <h5>Payment Details</h5>
                            <div class="d-grid ">
                                <div class="price-detail lh-lg " style="padding: 20px;">

                                    <div class="col-12 d-flex my-2">
                                        <span style="color: #000; font-size: 15px;">( <?php echo $totalproduct ?> <span style="color: #000; font-size: 15px;">item</span> ) </span>
                                    </div>

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
                                        <div class="col-6" style="font-weight: bold;"> Total To Pay </div>
                                        <div class="col-6 text-right " style="color: #000;">
                                            <input class="totalpay" id="totalpay" style="width: 40px; border: none !important; background-color: #fff !important; font-weight: bold;" value="">
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

                                    <div class="btn-box row item flex justify-content-center align-self-center mt-3">
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
                    <form action="paysubmit.php?type=payment" method="POST" id="payment-form" enctype="multipart/form-data">
                        <div class="col-md-7 m-auto">

                            <?php
                            $sql = "select * from `addtocart` where `unique_id`='$unique_id'";
                            $result = mysqli_query($conn, $sql);
                            $totalproduct = mysqli_num_rows($result);  // print_r($row);

                            $sql = "select * from `addtocart` where unique_id= '$unique_id'"; // print_r($sql);
                            $result = mysqli_query($conn, $sql); // print_r($result); 
                            while ($row = mysqli_fetch_array($result)) {
                                $image = $row['image'];
                                $category = $row['category'];
                                $totalprice = $row['totalprice'];
                                $quantity = $row['quantity'];

                                $price = $row['price'];
                                $grandtotal = $row['grandtotal'];
                                $delivery = $row['delivery'];
                            ?>


                                <div class="right border">
                                    <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                    <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $row['product_id']; ?>">

                                    <div class="pt-4 pl-4 d-flex">
                                        <p>
                                            Estimated Delivery by <?php echo $delivery_date; ?>
                                        </p>
                                    </div>

                                    <hr>

                                    <div class="header pb-2">Order Summary</div>
                                    <p><?php print_r($totalproduct); ?> items</p>

                                    <?php
                                    $sql = "select * from `addtocart` where unique_id= '$unique_id'"; // print_r($sql);
                                    $result = mysqli_query($conn, $sql); // print_r($result); 
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <div class="row item d-flex justify-content-center align-self-center py-4">
                                            <div class=" col-4 align-self-center lh-lg">
                                                <img class="img-fluid" src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                            </div>
                                            <div class="col-6 lh-lg" style="display: grid; justify-content: end; align-self: center;">
                                                <div class="text-right">
                                                    <b><?php echo $row['category']; ?></b>
                                                </div>
                                                <div class=" text-right ">
                                                    <?php echo $row['totalprice']; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                                <div class="text-right">Qty: <?php echo $row['quantity']; ?> </div>
                                                <div> Sold By : <?php echo $row['soldby']; ?> </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
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
                                                    <?php echo $delivery; ?>
                                                </div>
                                                <div>
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
                                        <div class="col item d-grid pl-4">
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

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
                                                <div>
                                                    paymode
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg">
                                                <div class="paymode">
                                                    <?php print_r($mode); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="pk_test_51PBfpgLkGTnmsxChSNvHD5Dae8EYOF4hplQmPKlnR63IBThgbsnuYUCslUfQIcZwx6ZpBzCotFUWPTm69eBYCalg00ZXFAmk4J"
                                        data-currency="inr">
                                    </script>
                                    <script>
                                        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
                                    </script>
                                    <div class="btn-box row item flex justify-content-center align-self-center ">
                                        <div class="col-5 d-flex justify-content-center">
                                            <button style="padding: 9px 30px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px;" class="btn"> Order </button>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>

        </div> -->


    <?php
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

            let totalprice = $('.totalprice').val();
            console.log(totalprice);

            let discount = $('.discount').val();
            console.log(discount);

            let discountAmount = totalprice * (discount / 100);
            let finalTotal = Math.round(totalprice - discountAmount);
            console.log(finalTotal);

            document.getElementById('totalpay').value = finalTotal;

            $('#payment-form').submit(function(e) {
                e.preventDefault();

                let uid = document.querySelectorAll('#element .uid');
                console.log(uid);
                let pid = document.querySelectorAll('#element .pid');
                console.log(pid);
                let name = document.querySelectorAll('#element .name');
                console.log(name);
                let email = document.querySelectorAll('#element .email');
                console.log(email);
                let category = document.querySelectorAll('#element .category');
                console.log(category);
                let subcategory = document.querySelectorAll('#element .subcategory');
                console.log(subcategory);
                let image = document.querySelectorAll('#element .image');
                console.log(image);
                let size = document.querySelectorAll('#element .size');
                console.log(size);
                let quantity = document.querySelectorAll('#element .quantity');
                console.log(quantity);
                let price = document.querySelectorAll('#element .price');
                console.log(price);
                let totalprice = document.querySelectorAll('#element .totalp');
                console.log(totalprice);
                let grandtotal = document.querySelector('#element .totalpay');
                console.log(grandtotal);
                let delivery = document.querySelectorAll('#element .delivery');
                console.log(delivery);
                let paymode = document.querySelectorAll('#element .mode');
                console.log(paymode);
                let mobileno = document.querySelectorAll('#element .mobileno');
                console.log(mobileno);
                let address = document.querySelectorAll('#element .address');
                console.log(address);

                let pidarry = []
                for (let i = 0; i < pid.length; i++) {

                    let objpid = {
                        uid: uid[i].value,
                        pid: pid[i].value,
                        name: name[i].value,
                        email: email[i].value,
                        image: image[i].value,
                        size: size[i].value,
                        quantity: quantity[i].value,
                        category: category[i].value,
                        subcategory: subcategory[i].innerText,
                        totalprice: totalprice[i].value,
                        grandtotal: grandtotal.value,
                        paymode: paymode[i].value,
                        mobileno: mobileno[i].innerText,
                        address: address[i].innerText
                    }
                    pidarry.push(objpid);
                }
                console.log(pidarry);

                // $.ajax({
                //     url: 'paysubmit.php?type=PlaceOrder',
                //     type: 'POST',
                //     dataType: 'json',
                //     data: {
                //         pidarry: pidarry,
                //     },
                //     success: function(data) {
                //         if (data == 0) {
                //             console.log(data.message);
                //         } else {
                //             window.location.href = "http://localhost/feane-1.0.0/ordersuccess.php";

                //         }
                //     }
                // });
            })


        });
    </script>
</body>
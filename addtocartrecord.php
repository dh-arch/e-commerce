<?php
include 'connection.php';
include 'header.php';


?>

<!DOCTYPE html>
<html>

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
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /* color: #455A64; */
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 20%;
            float: left;
            position: relative;
            font-weight: 400;
            color: #455A64 !important;

        }

        #progressbar #step1:before {
            content: "1";
            color: #fff;
            width: 29px;
            margin-left: 31px !important;
            padding-left: 11px !important;
        }


        #progressbar #step2:before {
            content: "2";
            color: #fff;
            width: 29px;

        }

        #progressbar #step3:before {
            content: "3";
            color: #fff;
            width: 29px;

        }

        #progressbar #step4:before {
            content: "4";
            color: #fff;
            width: 29px;
            margin-right: 3px !important;
            padding-right: 11px !important;
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #455A64;
            border-radius: 50%;
            margin: auto;
        }

        #progressbar li:after {
            content: '';
            width: 121%;
            height: 2px;
            background: #455A64;
            position: absolute;
            left: 0%;
            right: 0%;
            top: 15px;
            z-index: -1;
        }

        #progressbar li:nth-child(2):after {
            left: 50%;
        }

        #progressbar li:nth-child(1):after {
            left: 25%;
            width: 121%;
        }

        #progressbar li:nth-child(3):after {
            left: 25% !important;
            width: 50% !important;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #4bb8a9;
        }

        .card {
            /* background-color: #fff; */
            /* box-shadow: 2px 4px 15px 0px rgb(0, 108, 170); */
            z-index: 0;
            border: none !important;
        }

        small {
            font-size: 12px !important;
        }

        .a {
            justify-content: space-between !important;
        }

        .border-line {
            border-right: 1px solid rgb(226, 206, 226)
        }

        .card-footer img {
            opacity: 0.3;
        }

        .card-footer h5 {
            font-size: 1.1em;
            color: #8C9EFF;
            cursor: pointer;
        }
    </style>
</head>

<body class="sub_page">

    <!-- <div class="card px-2 container my-5 d-sm-flex justify-content-center">

        <div class="row px-3">
            <div class="col ">
                <ul class="" id="progressbar">
                    <li class="step0 active " id="step1">Cart</li>
                    <li class="step0 active text-center" id="step2">Placed</li>
                    <li class="step0 active text-center" id="step3">Payment</li>
                    <li class="step0 active text-center" id="step4">Deliverd</li>
                    <li class="step0  text-right" id="step4">DELIVERED</li>
                </ul>
            </div>
        </div>

    </div> -->

    <?php
    if (isset($_SESSION['login'])) {
    ?>
        <section class="addtocart_section " id="element">

            <?php
            $uid = $_SESSION['user_id'];   // print_r($uid);  //loginajax.php
            // $sql = "select * from `addtocartproduct` where `user_id`='$uid'";   //print_r($sql);

            // $sql = "select * from productdata, addtocartproduct where productdata.id=addtocartproduct.product_id";

            $sql = "SELECT addtocartproduct.unique_id, addtocartproduct.user_id, addtocartproduct.product_id, productdata.image, addtocartproduct.category, addtocartproduct.quantity, addtocartproduct.size, productdata.color, addtocartproduct.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer, productdata.delivery, productdata.payment_charge, productdata.soldby FROM addtocartproduct
            LEFT JOIN productdata ON productdata.id = addtocartproduct.product_id
            where user_id = '$uid' ";

            $result = mysqli_query($conn, $sql);
            // print_r($result);
            while ($row = mysqli_fetch_assoc($result)) {
                $unique_id = $row['unique_id'];
                $images = json_decode($row['image'], true);
                $qty = $row['quantity'];  // print_r($qty);

            ?>
                <div class="product-show col-xl-12 " style="padding-bottom: 10rem;">

                    <div class="product-img col-xl-6 animated fadeInLeft">
                        <img src="./Blog_project/assets/images/product/product-images/<?= $images[0]; ?>" data-scale="1.6" alt="">
                        <input type="hidden" class="image" id="image" name="image[]" value="<?= $images[0]; ?>">
                    </div>

                    <div class="col-xl-6 product-detail animated fadeInRight" style="padding-bottom: 10rem;">
                        <div class="box">
                            <input type="hidden" class="uid" id="uid" value="<?php echo $row['user_id']; ?>">
                            <input type="hidden" class="id" id="id" value="<?php echo $row['user_id'] ?>">
                            <input type="hidden" id="pid" class="pid" name="pid" value="<?php echo $row['product_id']; ?>">
                            <input type="hidden" class="category" id="category" name="category" value="<?php echo $row['category']; ?>">

                            <div class="lh-lg">
                                <p class=" subcategory py-2" style="font-size: 18px; font-weight: bold; " name="subcategory" value="<?php echo $row['subcategory']; ?>">
                                    <?php echo $row['subcategory']; ?>
                                </p>

                                <div class="col-12 d-flex text">
                                    <div class="col-6 col-sm-8">
                                        <p class="">
                                            <i class="fa-solid fa-indian-rupee-sign "></i> <?php echo $row['price']; ?> &nbsp;&nbsp;
                                            <del> <span class=""><?php echo $row['mrp']; ?></span> </del> &nbsp;&nbsp;
                                            <span><?php echo $row['discount']; ?>&nbsp;<i class="fa-thin fa-percent"></i></span>
                                        </p>
                                    </div>
                                </div>

                                <div class=" d-flex text">
                                    <div class="col-12">
                                        <p><?php echo $row['offer']; ?></p>
                                    </div>
                                </div>

                                <div class="d-flex py-2">
                                    <div>
                                        <label style="font-weight: bold;"> Delivery </label>
                                    </div>

                                    <?php
                                    if ($row['delivery'] == 'Free Delivery') { ?>
                                        <!-- free delivery -->
                                        <div class="col-12">
                                            <input id="delivery" name="delivery" class="delivery text-center" style="width: 105px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; font-size: 15px; font-weight: 500;" value="<?php echo $row['delivery']; ?>" readonly>
                                            <input type="hidden" class="payment_charge" value="<?php echo $row['payment_charge']; ?>">
                                        </div>
                                    <?php } else { ?>
                                        <!-- pay to charge -->
                                        <div class="col-12 d-flex text">
                                            <div class="col-6">
                                                <p class="">
                                                    <span class="delivery"> <?php echo $row['delivery']; ?> </span> : &nbsp;&nbsp;
                                                    <span class="payment_charge"> <?php echo $row['payment_charge']; ?> </span>
                                                    <i class="fa-solid fa-indian-rupee-sign "></i>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class=" py-3 d-flex text">
                                    <label style="font-weight: bold;"> Sold By : &nbsp;&nbsp; </label>
                                    <span class="soldby"> <?php echo $row['soldby']; ?> </span>
                                </div>

                                <div class="d-flex py-2">
                                    <div>
                                        <label style="font-weight: bold;"> Size </label>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                        $size = $row['size'];

                                        if ($size == 'Free Size') {
                                            // print_r($size);
                                        ?>
                                            <!-- free size -->
                                            <div class="ml-4">
                                                <input id="size" name="size" class="sizecheckbox text-center" style="width: 100px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; font-size: 15px; font-weight: 500;" value="<?php echo $size; ?>" readonly require>
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex align-items-center ml-4 " style="gap: 10px;">
                                                <input type="text" id="size" name="size[]" class="sizecheckbox text-center " style=" width: 48px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; " value="<?= $size ?>" readonly require>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="d-flex py-4">
                                    <div>
                                        <label style="font-weight: bold;"> Quantity </label>
                                    </div>

                                    <div class="sizeqty col-lg-5 col-md-12 " id="qty">
                                        <div class="input-group Input">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary quantity-btn" id="decrement" type="button">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center quantity " id="quantity" name="quantity[]" onchange="addtotal(<?php echo $row['product_id']; ?>)" value="<?php echo $row['quantity']; ?>" require>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary quantity-btn" id="increment" onchange="addtotal(<?php echo $row['product_id']; ?>)" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid">
                                    <div class="price-detail lh-lg ">

                                        <input type="hidden" class="qty" id="qty" value="<?php echo $row['quantity']; ?>">
                                        <div class=" col-md-12 d-flex justify-content-start mt-3">
                                            <p class="" style="color: rgb(117, 117, 117);">Price Details<span class="">(<?php echo $row['quantity']; ?> qty)</span></p>
                                        </div>

                                        <div class="col-12 d-flex text">
                                            <div class="col-6">Total Price </div>
                                            <div class="col-6 col text-right">
                                                <span id="" class="">
                                                    <?php echo $row['price']; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign"></i>
                                                </span>
                                                <input type="hidden" class="iprice" id="iprice" value="<?php echo $row['price']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex text">
                                            <div class="col-6 " style="color: #000;">Total Discount </div>
                                            <div class="col-6 col text-right">
                                                <span id="" class="">
                                                    <?php echo $row['discount']; ?>
                                                    <i class="fa-solid fa-percent"></i>
                                                </span>
                                                <input type="hidden" class="offer" id="offer" value="<?php echo $row['discount']; ?>">
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="col-12 pb-2 d-flex text">
                                            <div class="col-6"> <span style="font-weight: bold;"> Total Price </span> &nbsp;&nbsp; (<?php echo $row['quantity']; ?> qty) </div>
                                            <div class="col-6 col text-right">
                                                <span id="" class="price">
                                                </span>
                                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                                <input type="hidden" class="totalprice" value="<?php echo round(($row['price'] - ($row['price'] * $row['discount'] / 100)) * $row['quantity']); ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="cart-btn mt-5">
                                        <div class="col-lg-12 d-lg-flex justify-content-end ">
                                            <a class="remove" id="<?php echo $row['product_id']; ?>"> Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-lg-12 d-grid pt-4 checkout">
                <div class="col-6 checkout-detail" id="checkout-text">
                    <div class="d-flex px-5">
                        <div class="col-8 total-price"> Total Price : </div>
                        <div class="col-4  text-right">
                            <span id="grandtotal" class=" grandtotal"> </span>
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>
                    </div>
                    <div class=" col-12 mt-3" style="display: flex; justify-content: center;">
                        <a style="margin-bottom: 30px; " class="Checkoutbtn" id="<?php echo $unique_id; ?>"> Checkout </a>
                    </div>
                </div>
            </div>


        </section>

        <?php include 'footer.php'; ?>

    <?php } else {
        header('location: /feane-1.0.0/userform/login.php');
    } ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

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
        new WOW().init();

        function GetTotal() {
            let Price = document.getElementById('iprice').value;
            console.log(Price);
            let offer = document.getElementById('offer').value;
            console.log(offer)
            let totalprice = document.getElementsByClassName('totalprice');
            console.log(totalprice);
        }

        function calculateItemTotal(row) {
            let price = parseFloat($(row).find('.iprice').val());
            let quantity = parseInt($(row).find('.quantity').val());
            let discount = parseFloat($(row).find('.offer').val());

            let total = price * quantity;
            let discountAmount = total * (discount / 100);
            let finalTotal = Math.round(total - discountAmount);

            $(row).find('.price').text(finalTotal.toFixed(2));
            $(row).find('.totalprice').val(finalTotal.toFixed(2));
        }

        // Function to calculate grand total
        function calculateGrandTotal() {
            let grandTotal = 0;
            $('.product-detail').each(function() {
                grandTotal += parseFloat($(this).find('.totalprice').val());
            });
            $('#grandtotal').text(grandTotal.toFixed(2));
        }

        // Calculate totals on page load
        $('.product-detail').each(function() {
            calculateItemTotal(this);
        });
        calculateGrandTotal();

        // Recalculate when quantity changes
        $('.quantity').on('change', function() {
            let row = $(this).closest('.product-detail');
            calculateItemTotal(row);
            calculateGrandTotal();
        });

        // Increment quantity
        $('.quantity-btn#increment').on('click', function() {
            let input = $(this).closest('.input-group').find('.quantity');
            input.val(parseInt(input.val()) + 1).trigger('change');
        });

        // Decrement quantity
        $('.quantity-btn#decrement').on('click', function() {
            let input = $(this).closest('.input-group').find('.quantity');
            let currentVal = parseInt(input.val());
            if (currentVal > 1) {
                input.val(currentVal - 1).trigger('change');
            }
        });


        $(document).ready(function() {

            $('.Checkoutbtn').click(function(e) {
                e.preventDefault();

                let id = $('.id').val();
                console.log(id);
                let uid = document.querySelectorAll('#element .uid');
                console.log(uid)
                let pid = document.querySelectorAll('#element .pid');
                console.log(pid);
                // let image = $('#element #image').val(this);
                let image = document.querySelectorAll('#element .image');
                console.log(image);
                let category = document.querySelectorAll('#element .category');
                console.log(category);
                let subcategory = document.querySelectorAll('#element .subcategory');
                console.log(subcategory);
                let size = document.querySelectorAll('#element .sizecheckbox');
                console.log(size);
                let qty = document.querySelectorAll('#element .quantity');
                console.log(qty);
                let price = document.querySelectorAll('#element .iprice');
                console.log(price);
                let totalprice = document.querySelectorAll('#element .totalprice');
                console.log(totalprice);
                let grandtotal = document.querySelectorAll('#element .grandtotal')
                console.log(grandtotal);
                let delivery = document.querySelectorAll('#element .delivery');
                console.log(delivery);
                let payment_charge = document.querySelectorAll('#element .payment_charge');
                console.log(payment_charge);
                let soldby = document.querySelectorAll('#element .soldby');
                console.log(soldby);

                let pidarry = []
                for (let i = 0; i < pid.length; i++) {

                    let objpid = {
                        uid: uid[i].value,
                        pid: pid[i].value,
                        image: image[i].value,
                        category: category[i].value,
                        subcategory: subcategory[i].innerHTML,
                        size: size[i].value,
                        qty: qty[i].value,
                        price: price[i].value,
                        totalprice: totalprice[i].value,
                        delivery: delivery[i].innerHTML,
                        payment_charge: payment_charge[i].innerHTML,
                        soldby: soldby[i].innerHTML,
                    }
                    pidarry.push(objpid);
                }
                console.log(pidarry);

                let gtarry = []
                for (let i = 0; i < grandtotal.length; i++) {
                    let objgt = {
                        grandtotal: grandtotal[i].innerHTML,
                    }
                    gtarry.push(objgt);
                }
                console.log(gtarry);

                $.ajax({
                    url: 'addtocartphp.php?type=' + 'pending',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        pidarry: pidarry,
                        gtarry: gtarry,
                    },
                    success: function(data) {
                        if (data == 0) {
                            console.log('error');
                        } else {
                            window.location.href = "http://localhost/feane-1.0.0/address.php";
                        }
                    }
                })
            });

            $('.remove').click(function(e) {
                let pid = e.target.id
                console.log(pid);

                $.ajax({
                    url: 'addtocartdelete.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        pid: pid
                    },
                    success: function(data) {
                        if (data.error == 'true') {
                            console.log(data.message);
                        } else {
                            console.log(data.message);
                        }
                    }
                })
            })

        });


        // Increment the quantity
        // $('#increment').on('click', function() {
        //     let qty = parseInt($('#quantity').val());
        //     $('#quantity').val(qty + 1);

        // });

        // // Decrement the quantity but don't go below 1
        // $('#decrement').on('click', function() {
        //     let qty = parseInt($('#quantity').val());
        //     $('#quantity').val(qty - 1);
        // });

        // let iprice = document.getElementById('iprice').value;
        // // console.log(iprice)
        // let offer = document.getElementById('offer').value;
        // // console.log(offer)
        // // let totalprice = document.getElementsByClassName('totalprice');
        // // console.log(totalprice)

        // function addtotal(a) {
        //     let qty = document.getElementById('quantity').value;
        //     console.log(qty)

        //     // for (let i = 0; i < iprice.length; i++) {
        //     //     total = ((iprice[i].value) * (qty[i].value) - ((iprice[i].value) * (qty[i].value) * offer[i].value / 100));
        //     //     console.log(total)
        //     //     let ptotal = Math.round(total);
        //     //     console.log(ptotal)

        //     //     document.getElementsByClassName('totalprice')[i].innerText = ptotal
        //     // }

        // let total = ((iprice * qty))
        // let totaloffer = total * offer / 100
        // let grandtotal = total - totaloffer

        // let ptotal = Math.round(grandtotal);
        // console.log(ptotal);
        // document.getElementsByClassName('totalprice')[0].innerHTML = ptotal
        // gettotal();
        // }
        // addtotal();

        // function gettotal() {
        //     let sum = 0;
        //     let totalprice = document.getElementsByClassName('totalprice');
        //     console.log(totalprice)
        //     for (let i = 0; i < totalprice.length; i++) {
        //         let colums = totalprice[i].innerText;
        //         // console.log(colums);

        //         sum += parseInt(colums);
        //         console.log(sum)
        //     }
        //     document.getElementById('grandtotal').innerHTML = sum;
        // }

        // let totalprice = document.getElementsByClassName('totalprice');
        // console.log(totalprice);

        // let sum= 0;
        // for(let i=0; i< totalprice.length; i++){
        //     sum += parseInt(totalprice[i].value);
        // }
        // console.log(sum);

        // document.getElementById('grandtotal').innerHTML = sum;
    </script>

</body>

</html>
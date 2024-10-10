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
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-magnifier/1.1.0/jquery.magnifier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .product-img {
            position: relative;
        }

        .magnifier {
            position: absolute;
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            cursor: none;
            pointer-events: none;
            display: none;
            overflow: hidden;
        }

        .magnifier img {
            position: absolute;
            top: 10%;
            left: 10%;
        }

        .size-qty-container {
            display: grid;
            flex-wrap: wrap;
            gap: 10px;
        }

        .size-box,
        .qty-box {
            width: 38px;
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            font-weight: 500;
        }

        .size-box {
            background-color: #f8f9fa;
        }

        .qty-box {
            background-color: #e9ecef;
        }

        .colorContainer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .colorbox {
            display: flex !important;
        }

        #selectedColors {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .selectedColor {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            margin-bottom: 7px;
        }

        .selectedColorInner {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

        .size-qty-container {
            display: grid;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['login'])) { ?>

        <section class="addtocart_section">

            <?php if (isset($_GET['pid'])) {
                $pid = $_GET['pid'];    // print_r($pid);
                $uid = $_SESSION['user_id'];  //  print_r($uid);  //loginajax.php

                $sql = "SELECT productdata.id, productdata.image, productdata.color, productdata.size, admin_category.category, admin_subcategory.subcategory, productdata.quantity, productdata.price, productdata.mrp, productdata.discount, productdata.offer, productdata.delivery, productdata.description, productdata.soldby FROM productdata
                LEFT JOIN admin_category ON productdata.category=admin_category.id
                LEFT JOIN admin_subcategory ON productdata.subcategory=admin_subcategory.id
                WHERE productdata.id=$pid";
                // print_r($sql);
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);
                    // echo $row['product_id']; 
                    $images = json_decode($row['image'], true);
                    $colors = json_decode($row['color'], true);

            ?>
                    <div class="container">
                        <div class="product-show col-xl-12 col-lg-12">

                            <div class="product-img zoom col-xl-6 animated fadeInLeft">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <?php if (!empty($images)) { ?>
                                                <img id="mainImage" src="./Blog_project/assets/images/product/product-images/<?= $images[0]; ?>" class="img-fluid rounded" style="max-height: 300px; width: 150%; object-fit: contain;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($images)) { ?>
                                        <div class="row">
                                            <?php foreach ($images as $index => $image) { ?>
                                                <div class="col-3 mb-3">
                                                    <img src="./Blog_project/assets/images/product/product-images/<?= $image; ?>"
                                                        class="img-thumbnail thumbnail-image"
                                                        data-full-image="./Blog_project/assets/images/product/product-images/<?= $image; ?>"
                                                        style="height: 100px; width: 100%; object-fit: cover; cursor: pointer;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <div class="col-xl-6  product-detail animated fadeInRight">
                                <div class="box">
                                    <p class="subcategory" id="<?php echo $row['subcategory']; ?>" name="subcategory" style="font-size: 29px; font-weight: 600;"><?php echo $row['subcategory']; ?> </p>
                                    <input type="hidden" class="category" id="category" value="<?php echo $row['category']; ?>">

                                    <p class="">
                                        <i class="fa-solid fa-indian-rupee-sign "></i><?php echo $row['price']; ?> &nbsp;&nbsp;
                                        <del> <span class=""><?php echo $row['mrp']; ?></span> </del> &nbsp;&nbsp;
                                        <span><?php echo $row['discount']; ?>&nbsp;<i class="fa-thin fa-percent"></i></span>
                                    </p>

                                    <div>
                                        <p class="mt-3" style="font-weight: bold;"> Sold by : &nbsp; <span style="font-weight: 400;"> <?php echo $row['soldby']; ?> </span> </p>
                                    </div>

                                    <p class="text-md"> <?php echo $row['description']; ?> </p>

                                    <!-- color -->
                                    <div class="color d-flex" style="padding-top: 20px;">
                                        <div>
                                            <label style="font-weight: bold;"> Color </label>
                                        </div>
                                        <div>
                                            <div class="colorContainer ml-4">
                                                <?php
                                                if (!empty($colors)) {
                                                    foreach ($colors as $color) {
                                                ?>
                                                        <div id="selectedColors ">
                                                            <div class="selectedColor " style="border-color: <?= $color; ?>;">
                                                                <div class="selectedColorInner" style="background-color: <?= $color; ?>;"></div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="size d-flex mt-5">
                                        <div>
                                            <label style="font-weight: bold;"> Size </label>
                                        </div>
                                        <div>
                                            <div class="d-flex ml-2 sizebox">
                                                <?php
                                                if (isset($row['size']) && isset($row['quantity'])) {

                                                    $sizes = json_decode($row['size'], true);
                                                    $quantities = json_decode($row['quantity'], true);

                                                    if ($quantities > 0) {

                                                        foreach ($sizes as $size) {

                                                            if ($size == 'Free Size') { ?>
                                                                <div class="ml-4">
                                                                    <input id="size" name="size" class="sizecheckbox text-center" style="width: 100px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; font-size: 15px; font-weight: 500;" value="<?php echo $size; ?>" readonly>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="d-flex align-items-center ml-4 mb-2" style="gap: 10px;">
                                                                    <input type="text" id="size" name="size[]" class="sizecheckbox text-center " style=" width: 48px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; " value="<?= $size ?>" readonly>
                                                                </div>
                                                    <?php }
                                                        }
                                                    }
                                                } elseif ((isset($row['size']) == 'Free Size') && (isset($row['quantity']) == 0)) { ?>
                                                    <div>
                                                        <span style="border: 1px solid #ced4da; border-radius: 15px; padding: 5px 10px; font-size: 15px; font-weight: 500;"> <?php echo $row['size']; ?></span>
                                                    </div>
                                                <?php } ?>

                                                <!-- <?php
                                                        $sizes = json_decode($row['size'], true);
                                                        print_r($sizes);
                                                        $availableSizes = ['XS', 'S', 'M', 'L', 'XL'];

                                                        foreach ($availableSizes as $availableSize) {
                                                            $sizeIndex = array_search($availableSize, $sizes);
                                                            $isChecked = $sizeIndex !== false ? 'readonly' : 'disabled';
                                                        ?>
                                                <div class="d-flex align-items-center ml-4 mb-2" style="gap: 10px;">
                                                    <input type="text" id="size<?= $availableSize ?>" <?= $isChecked ?> name="size[]" class="sizecheckbox text-center d-flex justify-content-center align-items-center" style=" width: 48px; height: 39px; border: 1px solid #ced4da; border-radius: 15px; " value="<?= $availableSize ?>">
                                                </div>
                                            <?php
                                                        }
                                            ?> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex py-4">
                                        <div>
                                            <label style="font-weight: bold;"> Quantity </label>
                                        </div>

                                        <div class="qty col-lg-5 col-md-12 " id="qty">
                                            <div class="input-group Input">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary quantity-btn" id="decrement" type="button">-</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity " id="quantity" name="quantity[]" value="1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary quantity-btn" id="increment" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- <p><?php echo $row['offer']; ?></p> -->

                                <hr>

                                <div class="cart-btn" style="padding-top: 17px;">
                                    <a href="" class="wishlist" id="<?php echo $row['id']; ?>"> Wishlist </a> &nbsp;
                                    <a href="" style="margin-bottom: 30px; " class="addtocart" id="<?php echo $row['id']; ?>"> Add To Cart </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </section>
    <?php } else {
        header('location: /feane-1.0.0/userform/login.php');
    } ?>



    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-magnifier/1.1.0/jquery.magnifier.min.js"></script>

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>

    <script>
        $(document).ready(function() {
            new WOW().init();

            $(function() {
                $('.zoom').zoom();
                $('.thumb').on('click', 'a', function(e) {
                    e.preventDefault();
                    var thumb = $(e.delegateTarget);
                    if (!thumb.hasClass('active')) {
                        thumb.addClass('active').siblings().removeClass('active');
                        $('.zoom')
                            .zoom({
                                url: this.href
                            })
                            .find('img').attr('src', this.href);
                    }
                });
            });


            // Increment the quantity
            $('#increment').on('click', function() {
                let qty = parseInt($('#quantity').val());
                $('#quantity').val(qty + 1);

            });

            // Decrement the quantity but don't go below 1
            $('#decrement').on('click', function() {
                let qty = parseInt($('#quantity').val());
                $('#quantity').val(qty - 1);
            });


            $('.addtocart').click(function(e) {
                e.preventDefault();

                let pid = e.target.id;
                console.log(pid);

                let size = $('.sizecheckbox').val();
                console.log(size);

                let quantity = $('#quantity').val();
                console.log(quantity);

                let category = $('.category').val();
                console.log(category);

                let subcategory = $('.subcategory').attr('id');
                console.log(subcategory);

                $.ajax({
                    url: 'addtocartproduct.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        pid: pid,
                        size: size,
                        quantity: quantity,
                        category: category,
                        subcategory: subcategory
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

            $('.wishlist').click(function(e) {
                e.preventDefault();
                let pid = e.target.id;
                console.log(pid);

                // let pid = $(this).attr('id');
                // console.log($pid);
                // window.location.href='wishlistrecordpage.php?id='+$(this).attr('id');

                $.ajax({
                    url: 'wishlist.php',
                    type: 'POST',
                    dataType: json,
                    data: {
                        pid: pid
                    },
                    success: function(data) {
                        if (data.error == 'true') {
                            console.log(data.message);
                        } else {
                            window.location.href = "http://localhost/feane-1.0.0/wishlistrecord.php";
                        }
                    }
                })
            });


        })
    </script>
</body>
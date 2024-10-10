<?php
include 'connection.php';
include 'header.php';

$uid = $_SESSION['user_id'];  // print_r($uid);
$unique_id = $_SESSION['unique_id'];

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
    <link href="css/address.css" rel="stylesheet" />
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
        .address-container a {
            padding: 9px 35px;
            background-color: #000;
            color: #fff !important;
            border-radius: 45px;
            cursor: pointer;
        }

        .address-container a:hover {
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

        // $unique_id = $_GET['unique_id'];  // print_r($unique_id); 
    ?>

        <div class="address_section container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col card m-4 ">
                    <div class="row g-0">

                        <div class="col-lg-6 d-xl-block bg-image animated fadeInLeft">
                            <img class="img-fluid" />
                            <div class="mask">
                                <div class=" justify-content-center align-items-center ">
                                    <div class=" text-center" style="margin-top: 220px; color: #fff;">
                                        <i class="fas fa-truck fa-3x"></i>
                                        <p class="title-style">Lorem ipsum delivery</p>
                                        <p class="text-white mb-0"></p>

                                        <figure class="text-center mb-0">
                                            <blockquote class="blockquote ">
                                                <p class="pb-3">
                                                    <i class="fas fa-quote-left fa-xs text-primary"
                                                        style="color: hsl(210, 100%, 50%) ;"></i>
                                                    <span class="lead font-italic">Everything at your doorstep.</span>
                                                    <i class="fas fa-quote-right fa-xs text-primary"
                                                        style="color: hsl(210, 100%, 50%) ;"></i>
                                                </p>
                                            </blockquote>

                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 address-detail animated fadeInRight">
                            <div class="card-body p-md-5 text-black" id="addressform">
                                <h3 class="mb-4 text-uppercase">Delivery Info</h3>

                                <form class="address-form">
                                    <input type="hidden" class="unique_id" value="<?php echo $unique_id; ?>">
                                    <input type="hidden" class=" inputuid" name="uid" value="<?php print_r($uid); ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="firstname" id="firstname" class="form-control firstname" />
                                                <label class="form-label" for="firstname">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="lastname" id="lastname" class="form-control lastname" />
                                                <label class="form-label" for="lastname">Last name</label>
                                            </div>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <input type="text" name="email" id="email" class="form-control email" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <input type="text" name="mobileno" id="mobileno" class="form-control mobileno" />
                                            <label class="form-label" for="mobileno">Mobile No</label>
                                        </div>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="text" name="address" id="address" class="form-control address" />
                                        <label class="form-label" for="address">Address</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="text" name="pincode" id="pincode" class="form-control pincode" />
                                        <label class="form-label" for="pincode">Pincode</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="text" name="state" id="state" class="form-control state" />
                                        <label class="form-label" for="state">State</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-3">
                                        <input type="text" name="city" id="city" class="form-control city" />
                                        <label class="form-label" for="city">City</label>
                                    </div>

                                    <!-- <div class="row" style="display: flex;">
                                        <div class="col-md-6  mb-3" style="width: 10rem; ">
                                            <select class="state" name="state" id="state" style="width: 13rem; height: 2.5rem; margin: 15px 0px 30px 0px; outline: 1px rgb(117, 117, 117); border-radius: 5px;" data-mdb-select-init>
                                                <option value="1">State</option>
                                                <option value="2">g</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3 ">
                                            <select class="city " name="city" id="city" style="width: 13rem; height: 2.5rem; margin: 15px 0px 30px 0px; border-radius: 5px;" data-mdb-select-init>
                                                <option value="1">City</option>
                                                <option value="2">surat</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="d-flex justify-content-center pt-3">
                                        <a class="order" id=""> Place Order </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $sql = "select * from `address` where uid='$uid'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];;
            $mobileno = $row['mobileno'];
            $address = $row['address'];
            $pincode = $row['pincode'];
            $city = $row['city'];
            $state = $row['state'];
        ?>
            <div class="container address_section address-container animated fadeInUp">
                <div class="address-cart col-lg-12 col-md-12" style="height: auto; margin: 10px 0 20px 0;">
                    <div class="address-box col-lg-5 col-md-6 text-sm " style=" box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 3rem; ">

                        <input type="hidden" class="unique_id" value="<?php echo $unique_id; ?>">
                        <input type="hidden" class="uid" value="<?php echo $uid; ?>">
                        <input type="hidden" class="firstname" value="<?php echo $firstname; ?>">
                        <input type="hidden" class="lastname" value="<?php echo $lastname; ?>">
                        <input type="hidden" class="email" value="<?php echo $email; ?>">
                        <input type="hidden" class="mobileno" value="<?php echo $mobileno; ?>">
                        <input type="hidden" class="address" value="<?php echo $address; ?>">
                        <input type="hidden" class="pincode" value="<?php echo $pincode; ?>">
                        <input type="hidden" class="city" value="<?php echo $city; ?>">
                        <input type="hidden" class="state" value="<?php echo $state; ?>">

                        <div class="row col-12 text-left pb-3 pl-0">
                            <div class="col ">
                                <div class="" style="font-weight: bold; font-size: 20px;">
                                    Delivert Address
                                </div>

                            </div>
                        </div>
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

                        <div class="d-flex justify-content-center pt-3">
                            <a class="btn" id=""> Continue </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

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

        $(document).ready(function() {

            $('.order').click(function() {
                let unique_id = $('.unique_id').val();
                console.log(unique_id);
                let uid = $('.inputuid').val();
                console.log(uid);
                let firstname = $('.firstname').val();
                console.log(firstname);
                let lastname = $('.lastname').val();
                console.log(lastname);
                let email = $('.email').val();
                console.log(email);
                let mobileno = $('.mobileno').val();
                console.log(mobileno);
                let address = $('.address').val();
                console.log(address);
                let pincode = $('.pincode').val();
                console.log(pincode);
                let state = $('.state').val();
                console.log(state);
                let city = $('.city').val();
                console.log(city);

                $.ajax({
                    url: 'addressphp.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        unique_id: unique_id,
                        uid: uid,
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        mobileno: mobileno,
                        address: address,
                        pincode: pincode,
                        state: state,
                        city: city,
                    },
                    success: function(data) {
                        if (data.error == 'true') {
                            // console.log(data.message);
                            document.getElementById('errormess').innerHTML = data.message;
                            window.location.href = 'address.php';
                        } else {
                            $unique_id = data.unique_id;
                            window.location.href = "http://localhost/feane-1.0.0/paydetail.php";
                        }
                    }
                })
            })

            $('.btn').click(function() {
                let unique_id = $('.unique_id').val();
                console.log(unique_id);

                $.ajax({
                    url: 'addaddress.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        unique_id: unique_id,
                    },

                    success: function(data) {
                        if (data.error == true) {
                            console.log(data.message);
                        } else {
                            $unique_id = data.unique_id;
                            window.location.href = "http://localhost/feane-1.0.0/paydetail.php";
                        }
                    }
                })
            })


            // $('.btn').click(function(e) {
            //     e.preventDefault();

            //     console.log($(this).attr('id'));

            //     window.location.href = 'paydetail.php?unique_id=' + $(this).attr('id');
            // })

            // $('#addressform').validate({
            //     rules: {
            //         firstname: {
            //             required: true,
            //         },
            //         lastname: {
            //             required: true,
            //         },
            //         email: {
            //             required: true,
            //         },
            //         mobileno: {
            //             required: true,
            //         },
            //         address: {
            //             required: true,
            //         },
            //         pincode: {
            //             required: true,
            //         },
            //         city: {
            //             required: true,
            //         },
            //         state: {
            //             required: true,
            //         }
            //     },
            //     messages: {
            //         firstname: {
            //             required: 'firstname is require',
            //         },
            //         lastname: {
            //             required: 'lastname is require',
            //         },
            //         email: {
            //             required: 'email is require',
            //         },
            //         mobileno: {
            //             required: 'mobileno is require',
            //         },
            //         address: {
            //             required: 'address is require',
            //         },
            //         pincode: {
            //             required: 'pincode is require',
            //         },
            //         city: {
            //             required: 'city is require',
            //         },
            //         state: {
            //             required: 'state is require',
            //         }
            //     },
            //     submitHandler: function(form) {

            //         let uid = $('.inputuid').val();
            //         console.log(uid);
            //         let firstname = $('.firstname').val();
            //         console.log(name);
            //         let lastname = $('.lastname').val();
            //         console.log(lastname);
            //         let email = $('.email').val();
            //         console.log(email);
            //         let mobile = $('.mobileno').val();
            //         console.log(mobile);
            //         let address = $('.address').val();
            //         console.log(address);
            //         let pincode = $('.pincode').val();
            //         console.log(pincode);
            //         let city = $('.city').val();
            //         console.log(city);
            //         let state = $('.state').val();
            //         console.log(state);

            //         $.ajax({
            //             url: 'addressphp.php',
            //             type: 'POST',
            //             dataType: 'json',
            //             data: {
            //                 uid: uid,
            //                 firstname: firstname,
            //                 lastname: lastname,
            //                 email: email,
            //                 mobile: mobile,
            //                 address: address,
            //                 pincode: pincode,
            //                 city: city,
            //                 state: state,
            //             },
            //             success: function(data) {
            //                 if (data.error == 'true') {
            //                     // console.log(data.message);
            //                     document.getElementById('errormess').innerHTML = data.message;
            //                     window.location.href = 'address.php';
            //                 } else {
            //                     // window.location.href='paydetail.php?name='+name;
            //                 }
            //             }
            //         })
            //     }
            // })
        })
    </script>
</body>
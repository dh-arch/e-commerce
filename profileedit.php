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


</head>

<body>

    <div class="address_section container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-7 card m-4 " style="box-shadow: 0 4px 8px 0 rgba(99, 99, 99, 0.2), 0 6px 20px 0 rgba(110, 110, 110, 0.19);">
                <div class="row g-0">

                    <div class="col-lg-12 address-detail animated fadeInRight">
                        <div class="col-8 card-body p-md-5 text-black" id="addressform" style="margin: auto;">
                            <h3 class="mb-4 text-uppercase"> Change User Data </h3>

                            <form class="address-form">
                                <div class="row">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" name="firstname" id="firstname" class="form-control firstname" />
                                        <label class="form-label" for="firstname">First name</label>
                                    </div>
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" name="lastname" id="lastname" class="form-control lastname" />
                                        <label class="form-label" for="lastname">Last name</label>
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

                                <div class="d-flex justify-content-center pt-3">
                                    <a class="btn" id=""> Change </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- <div class="container" >
        <div class="card col-8 login-card" >
            <div class="row no-gutters">
                
                <div class="col-md-7 col-12">
                    <div class="card-body">
                       
                        <p class="login-card-description"></p>
                        <form id="loginform">
                            <div class="form-group">
                                <p id='errormess' class='text-red-800 text-md'></p>
                                <label for="oldpassword" class="sr-only">Old Passeord</label>
                                <input type="oldpassword" name="oldpassword" id="oldpassword" class="form-control" placeholder="old password">
                            </div>

                            <div class="form-group mb-4">
                                <p id='errormess' class='text-red-800 text-md'></p>
                                <label for="newpassword" class="sr-only">New Password</label>
                                <input type="newpassword" name="newpassword" id="newpassword" class="form-control" placeholder="new password">
                            </div>

                            <div class="form-group mb-4">
                                <p id='errormess' class='text-red-800 text-md'></p>
                                <label for="conpassword" class="sr-only">Confirm Password</label>
                                <input type="conpassword" name="conpassword" id="conpassword" class="form-control" placeholder="confirm password">
                            </div>

                            <input name="btn" id="btn" class="btn btn-block btn mb-4" type="submit" value="Change Password">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script>
    $(document).ready(function() {
        new WOW().init();

        $('.btn').click(function() {
            let firstname = $('.firstname').val();
            console.log(firstname);
            let lastname = $('.lastname').val();
            console.log(lastname);
            let email = $('.email').val();
            console.log(email);
            let mobileno = $('.mobileno').val();
            console.log(mobileno);

            $.ajax({
                url: 'profileeditphp.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    mobileno: mobileno
                },
                success: function(data) {
                    if (data) {
                        console.log(data.message);
                    } else {
                        console.log(data.message);
                    }
                }
            })
        })
    })
</script>
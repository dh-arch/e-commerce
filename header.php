<?php

include 'connection.php';

session_start();

$uid = $_SESSION['user_id'];  // print_r($uid);
if ($uid == true) {
  header('locatoin: index.php');
} else {
  header('location: /feane-1.0.0/userform/login.php');
}

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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
  <link rel="stylesheet" href="lib/animate/animate.min.css" />
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .nav-item {
      margin-bottom: 10px;
      ;
      gap: 5px 0;
    }

    .navlink {
      color: #000;
    }

    .navlink:hover {
      color: #ffbe33;
    }
  </style>

</head>

<body>

  <?php
  $sql = "select * from `signupdata` where `id`='$uid'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];   // print_r($email);
    $mobileno = $row['mobileno'];
  }
  ?>

  <section class="topbar_section">
    <div class="container topbar px-5 d-none d-lg-block">
      <div class="row gx-0 align-items-center">
        <div class="col-lg-6">
          <form class="form-inline">
            <input type="text" id="search" class="search form-control focus-none mr-sm-2" style="width: 20rem; padding: 4px 9px; outline: none;" type="search" placeholder="Search" aria-label="Search">
            <button class="searchbtn btn-outline-dark my-2 my-sm-0" style="padding: 5px 13px; border: 1px solid #000; background-color: #fff; color: #000; border-radius: 10px;" type="submit">Search</button>
          </form>
        </div>
        <div class="col-lg-3 text-center text-lg-start mb-2 mb-lg-0">
          <div class="d-flex flex-wrap gx-4" style="display: flex; ">
            <a href="tel:+01234567890" class="text-muted small me-4 mr-4"><i
                class="fas fa-phone-alt text-dark me-2"></i> <?php echo $mobileno; ?> </a>
            <a href="mailto:example@gmail.com" class="text-muted small me-0"><i
                class="fas fa-envelope text-dark me-2"></i> <?php echo $email; ?> </a>
          </div>
        </div>
        <div class="col-lg-3 text-center text-lg-end user_option">
          <div class="d-inline-flex align-items-center" style="height: 45px; justify-content: space-between;">
            <div class="user ">
              <?php if (isset($_SESSION['login'])) { ?>
                <a href="./userform/logout.php" class=" order_online cursor-pointer " id="logout">logout</a>
              <?php } else { ?>
                <a href="./userform/login.php" class="user_link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </a>
              <?php } ?>
            </div>
            <div class="dropdown">
              <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small> My Dashboard</small></a>
              <div class="dropdown-menu rounded">
                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                <a href="./userform/logout.php" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- header section strats -->
  <header class="header_section">
    <div class="container-fluid header-nav" style="position: relative;">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <div class="text-3xl subpixel-antialiased font-mono"><img src="images/logocrop.png"
            style="height: 70px; width: 80px; color: #fff">
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="category.php">Category</a>
            </li>

            <li class="nav-item dropdown show">
              <a class="btn nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Category </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="order.php">My Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">Contact Us</a>
            </li>
          </ul>

          <div class="user_option">

            <div class="wishlist">
              <a href="" class="wishlist_link">
                <i class="fa fa-heart " aria-hidden="true" style="font-size: 16px;"></i>
              </a>
              <div class="wishlist-record">
                <span class="">
                  <?php
                  $sql = "select * from productdata, wishlist where productdata.id=wishlist.product_id"; //join query
                  $result = mysqli_query($conn, $sql);
                  $total = mysqli_num_rows($result);
                  print_r($total);
                  ?>
                </span>
              </div>
            </div>

            <div class="addtocart">
              <a href="" class="cart_link">
                <i class="fa fa-cart-shopping " aria-hidden="true"></i>
              </a>
              <div class="cart-record">
                <span>
                  <?php
                  $sql = "select * from productdata, addtocartproduct where productdata.id=addtocartproduct.product_id"; //join query
                  $result = mysqli_query($conn, $sql);
                  $total = mysqli_num_rows($result);
                  print_r($total);
                  ?>
                </span>
              </div>
            </div>

            <?php
            if (isset($_SESSION['login'])) {
              $sql = "select * from `signupdata` where `id`='$uid'";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['firstname'];
                $char = strtoupper(substr($name, 0, 1));
                // print_r($char);
            ?>
                <div class="profilebox">
                  <div class="profiledetail">
                    <span> <?php echo $char; ?> </span>
                  </div>
                </div>
            <?php }
            } ?>

          </div>
        </div>
      </nav>
    </div>

    <div style=" width: 100%; height: 100%; position: absolute; background-color: #fff; top: 176px; left: 0; right: 0; z-index: 1;">
      <nav class=" container navbar navbar-expand-lg custom_nav-container ">

        <div class="col-5">

          <nav class="navbar navbar-expand-lg custom_nav-container ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav d-grid justify-content-center ">
                <div class="d-grid  py-5 ">

                  <li class="nav-item "> <a class="navlink " href=""> Clothes </a> </li>
                  <li class="nav-item"> <a class="navlink" href=""> Jewellery </a> </li>
                  <li class="nav-item"> <a class="navlink" href=""> Cosmetics </a> </li>
                  <li class="nav-item"> <a class="navlink" href=""> Bags </a> </li>
                  <li class="nav-item"> <a class="navlink" href=""> Footwears </a> </li>

                </div>
              </ul>
          </nav>

        </div>

        <div class="col-7 " style="display: flex; justify-content: center;">
          <div class="row " style="gap : 22px; ">
            <div>
              <img src="images/IMG-20240927-WA0022.jpg" style="width: 200px; height: 200px;">
            </div>
            <div>
              <img src="images/IMG-20240927-WA0022.jpg" style="width: 200px; height: 200px;">
            </div>
            <div>
              <img src="images/IMG-20240927-WA0022.jpg" style="width: 200px; height: 200px;">
            </div>
          </div>
        </div>

      </nav>
    </div>

  </header>
  <!-- end header section -->

  

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

  <script>
    $(document).ready(function() {

      $('.wishlist').click(function() {
        window.location.href = "http://localhost/feane-1.0.0/wishlistrecord.php";
      })

      $('.addtocart').click(function() {
        window.location.href = "http://localhost/feane-1.0.0/addtocartrecord.php";
      })

      $('.searchbtn').click(function() {
        let searchdata = $('.search').val();
        // console.log(searchdata);

        if (searchdata.length > 0) {
          $.ajax({
            url: 'searchrecord.php',
            method: 'POST',
            data: {
              searchdata: searchdata
            },
            success: function(data) {
              if (data == 0) {
                window.location.href = 'http://localhost/feane-1.0.0/index.php';
              } else {
                window.location.href = 'http://localhost/feane-1.0.0/searchrecord.php?input=' + searchdata;
              }
            }
          })
        } else {
          window.location.href = 'index.php';
        }
      })

      $('.profilebox').click(function() {
        window.location.href = 'http://localhost/feane-1.0.0/profile.php';
      })

      $('#logout').click(function() {
        let token = localStorage.getItem('jwt_token');
        console.log(token);

        if (token == '') {
          console.log('token is not found')
        } else {
          $.ajax({
            url: 'logout.php',
            type: 'GET',
            headers: {
              'Content-Type': 'Application/json',
              'authorization': token,
              Accept: 'Application/json'
            },
            dataType: 'json',
            success: function(data) {
              if (data.error == 'false') {
                localeStorage.removeItem('jwt_token');
                window.location.href = 'http://localhost/tailwindcss/login/login.php';
              } else {
                console.log(data.message);
              }
            }
          })
        }
      })

      // $("#search").on("input", function() {
      //   let searchdata = $(this).val();
      //   if (searchdata.length > 0) {
      //     $.ajax({
      //       url: 'search.php',
      //       method: 'POST',
      //       data: {
      //         searchdata: searchdata
      //       },
      //       success: function(response) {
      //         window.location.href= 'searchrecord.php';
      //       }
      //     });
      //   } else {
      //     window.location.href= 'index.php';
      //   }
      // });
    })
  </script>

</body>

</html>
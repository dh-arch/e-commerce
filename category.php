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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->

    <!-- end header section --> 
  </div>

  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".clothes">clothes</li>
        <li data-filter=".jwellery">jwellery</li>
        <li data-filter=".cosmetics">cosmetics</li>
        <li data-filter=".purse">purse</li>
        <li data-filter=".footwears">footwears</li>
      </ul>

      <?php
      if(isset($_GET['category']) && $_GET['category']=='clothes' )
      ?>

    </div>
  </section>


  <!-- <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".clothes">clothes</li>
        <li data-filter=".jwellery">jwellery</li>
        <li data-filter=".cosmetics">cosmetics</li>
        <li data-filter=".purse">purse</li>
        <li data-filter=".footwears">footwears</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all jwellery">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-46.png" alt="">
                </div>
                <div class="detail-box">
                  <h5> jwellery </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="wishlistrecord.php">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="addtocart.php">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all cosmetics">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-62.png" alt="">
                </div>
                <div class="detail-box">
                  <h5> cosmetics </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="wishlistrecord.php">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="addtocart.php">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all cosmetics">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-31.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5> cosmetics </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="wishlistrecord.php">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="addtocart.php">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all cosmetics">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-30.png" alt="">
                </div>
                <div class="detail-box">
                  <h5> cosmetics </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="wishlistrecord.php">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="addtocart.php">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all clothes">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-6.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5> clothes </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="wishlistrecord.php">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="addtocart.php">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all purse">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-68.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5> purse </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all footwears">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/category5.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5> footwears </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all jwellery">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-57.webp" alt="">
                </div>
                <div class="detail-box">
                  <h5> jwellery </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all cosmetics">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/pro-67.jpeg" alt="">
                </div>
                <div class="detail-box">
                  <h5> cosmetics </h5>
                  <p>
                    200 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    5 <i class="fa-thin fa-percent"></i> &nbsp;
                    <del> 230 <i class="fa-solid fa-indian-rupee-sign text-xs"></i> </del>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> 120 with 2special offer
                  </p>
                  <p> free delivery </p>
                  <div class="pro-box">
                    <p class="stars">
                      <span> 3 </span> &nbsp;&nbsp;&nbsp;
                      <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                    </p>
                    <div class="options">
                      <a href="">
                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                      </a>
                      <a href="">
                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View More
        </a>
      </div>
    </div>
  </section> -->

  <!-- end product section -->

  <!-- footer section -->
  <?php include 'footer.php'; ?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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

</body>

</html>
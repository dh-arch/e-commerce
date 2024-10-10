<?php include 'connection.php'; ?>

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

</head>

<style>
  .main-content {

    position: relative;

    .owl-theme {
      .owl-stage {
        display: flex;
        gap: 18px !important;
      }

      .custom-nav {
        position: absolute;
        top: 43%;
        left: 0;
        right: 0;

        .owl-prev,
        .owl-next {
          position: absolute;
          height: 100px;
          color: inherit;
          background: none;
          border: none;
          z-index: 100;

          i {
            font-size: 2.5rem;
            color: #cecece;
          }
        }

        .owl-prev {
          left: 0;
        }

        .owl-next {
          right: 0;
        }
      }

    }
  }
</style>

<body>

  <?php include 'header.php'; ?>
  <div class="hero_area">
    <!-- header section strats -->


    <!-- slider section -->

    <section class="slider_section ">
      <div class="bgbox-gradiant"></div>

      <div class="container animated fadeInLeft">
        <div class="row">
          <div class="col-md-7 col-lg-6 ">
            <div class="detail-box">
              <h1>
                Go For Shopping
              </h1>
              <p>
                Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam
                quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos
                nihil ducimus libero ipsam.
              </p>
              <div class="btn-box">
                <a href="" class="btn1">
                  Order Now
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- end slider section -->

  <!-- start product category section -->

  <div class="container animated fadeInUp my-5" style="padding : 50px 0px; ">
    <h3 class="text-center mb-5" style="padding : 40px 0px; font-size: 32px; font-weight: 300; "> Category </h3>
    <div class="row">
      <?php
      $sql = "select * from admin_category";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="box oncategory" id="<?php echo $row['category']; ?>" style="width: 190px; height: 190px;  border-radius: 50%;  display: grid;  justify-content: space-between; margin: 0 20px; cursor: pointer;">
          <input type="hidden" class="category" id="category" value="<?php echo $row['category']; ?>">
          <img src=".\Blog_project\assets\images\product\category-images\<?php echo $row['image']; ?>" alt="" style="width: 100%; height: 100%; object-fit: contain;border-image: round; border-radius: 50%;">
          <div class="box-detail" style=" margin: auto; ">
            <h3 class="heading" style="font-size: 23px; font-weight: 400;"> <?php echo $row['category']; ?> </h3>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- end product category section -->


  <!-- offer section -->

  <!-- layout_padding-bottom owl-carousel owl-theme -->

  <!-- <div class="container-fluid animated fadeInUp offer pb-5" style="margin-top: 170px;">
    <div class="row">
      <div class="col-lg-10 d-flex ">

        <?php
        $sql = "select * from `admin_offeradverties`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="bg-image " style="position: relative;">
            <img src=".\Blog_project\assets\images\product\offeradverties-images\<?php echo $row['image']; ?>">
            <div class="bgbox-gradiant"></div>
            <div class="box-detail mt-3 p-2">
              <h3 class=""> <?php echo $row['heading']; ?> </h3>
              <p> <?php echo $row['subheading']; ?> </p>
              <a href="<?php echo $row['link']; ?>.php" class="btn"> Shop Now </a>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
  </div> -->

  <!-- end offer section -->


  <!-- <div class="container my-5  owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s " style="margin-bottom: 10px;  ">
    <div class=" row" class="testimonial-item">

      <div class="box " style="width: 215px; height: 250px; position: relative; margin: 0 20px;">
        <img src=".\Blog_project\assets\images\product\adverties-images\1Nainvish_564x1012._SX564_QL85_FMpng_.png" alt="image" style="width: 100%; height: 100%; object-fit: contain; ">
        <div class="box-detail testimonial-text" style="position: absolute; bottom: 0; width: 200px; padding: 10px; margin-left: 6px; margin-bottom: 6px; text-align: center; background-color: #7523238f; color: #e2dddd;">
          <h4 class="heading"> UP TO 20% OFF </h4>
        </div>
      </div>
      <div class="box " style="width: 215px; height: 250px; position: relative; ">
        <img src=".\Blog_project\assets\images\product\adverties-images/Jewellery.jpg" alt="image" style="width: 100%; height: 100%; object-fit: contain; ">
        <div class="box-detail" style="position: absolute; bottom: 0; width: 200px; padding: 10px; margin-left: 6px; margin-bottom: 6px; text-align: center; background-color: #7523238f; color: #e2dddd;">
          <h4 class="heading"> UP TO 20% OFF </h4>
        </div>
      </div>

    </div>
  </div> -->


  <div class="main-content animated fadeInUp" style="margin: 10rem 0;  ">
    <div class="owl-carousel owl-theme">

      <?php
      $sql = "select * from admin_adverties";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>

        <div style="position: relative;">
          <div class="box " style=" width: 100%; height: 100%; ">
            <img src=".\Blog_project\assets\images\product\adverties-images\<?php echo $row['image']; ?>" alt="image" style="width: 100% height: auto; object-fit: contain; border: 5px solid #7523238f; border-radius: 6px;">
          </div>
          <div class="box-detail testimonial-text" style="position: absolute; bottom: 0; width: 200px; padding: 10px; margin-left: 39px; margin-bottom: 10px; text-align: center; background-color: #7523238f; color: #e2dddd; ">
            <h4 class="heading"> <?php echo $row['heading']; ?> </h4>
          </div>
        </div>

      <?php } ?>

    </div>
    <div class="owl-theme">
      <div class="owl-controls">
        <div class="custom-nav owl-nav"></div>
      </div>
    </div>
  </div>


  <section class="add_section">
    <div class="bgbox-gradiant"></div>

    <div class="container animated fadeInLeft">
      <div class="row col-12">
        <div class="col-10 ">
          <div class="detail-box lh-lg">
            <h1 style="padding-bottom: 9px;"> Limited Time Offer </h1>
            <h3>Special Edition</h3>
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam, culpa! adipisicing elit </p>
            <p class="offer"> Buy This T-shirt At 20% Discount, Use Code OFF20 </p>
            <div class="btn-box">
              <a href="" class="btn1"> Order Now </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- product section -->

  <section class="product_section layout_padding-bottom " style="padding-top: 170px; padding-bottom: 100px;">
    <div class="container">
      <div class="heading_container heading_center wow fadeInUp">
        <h2> Our Products </h2>
      </div>

      <ul class="filters_menu wow fadeInUp">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".Clothes">Clothes</li>
        <li data-filter=".Jewellery">Jewellery</li>
        <li data-filter=".Cosmetics">Cosmetics</li>
        <li data-filter=".Bags">Bags</li>
        <li data-filter=".Footwears">Footwears</li>
      </ul>

      <div class="filters-content wow fadeInUp mt-5">
        <div class="row grid">
          <?php
          // $sql = "select * from productdata";
          $sql = "SELECT productdata.id, productdata.image, admin_category.category, admin_subcategory.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer FROM productdata  
          LEFT JOIN admin_category ON productdata.category=admin_category.id 
          LEFT JOIN admin_subcategory ON productdata.subcategory=admin_subcategory.id";

          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['id'];
            $images = json_decode($row['image']);
          ?>

            <div class="col-sm-6 col-lg-4 all <?php echo $row['category']; ?>">
              <div class="box cart" id="<?php echo $row['id']; ?>" style="postion: relative;">
                <div class="options d-flex justify-content-end m-3" style="position: absolute; top: 10px; right: 10px;">
                  <a href="" class="wishlist  " id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                    <i class="fa fa-heart text-white " aria-hidden="true"></i>
                  </a>
                </div>
                <div class="img-box">
                  <img src="./Blog_project/assets/images/product/product-images/<?= $images[0]; ?>" alt="">
                </div>
                <div class="detail-box">
                  <h5> <?php echo $row['subcategory']; ?> </h5>
                  <p>
                    <?php echo $row['price']; ?> <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                    <del><?php echo $row['mrp']; ?> <i class="fa-thin fa-percent"></i> </del> &nbsp;
                    <?php echo $row['discount']; ?> <i class="fa-solid fa-indian-rupee-sign text-xs"></i>
                  </p>
                  <p>
                    <i class="fa-solid fa-indian-rupee-sign text-xs"></i> <?php echo $row['offer']; ?>
                  </p>

                  <!-- <div class="col-12 mt-4 d-flex justify-content-center">
                    <button class="btn " style="background-color: #ffbe33; color: white; border-radius: 3px; padding: 5px 19px; font-size: 14px; font-weight: 500; margin-top: 15px; margin: auto;">Add to Cart</button>
                  </div> -->

                </div>
              </div>
            </div>

          <?php } ?>
        </div>

        <div class="btn-box">
          <a href=""> View More </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end product section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row col-lg-12">
        <div class=" col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
          <div class="img-box" style="margin: auto;">
            <img src="images/homebg2.jpeg" class="" alt="">
          </div>
        </div>
        <div class=" col-lg-6  wow fadeInRight" data-wow-delay="0.2s">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Feane
              </h2>
            </div>
            <p>
              There are many products of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
              the middle of text. All
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- icon section start -->

  <section class="icon_section pb-5 pt-5 my-5">
    <div class="container pb-5">
      <div class="row g-4">

        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
          <div class="icon-detail p-4">
            <div class="icon-img p-4 mb-4">
              <img src="images/globe-free-img.png" style="width: 55px; height: 55px; margin: auto;">
            </div>
            <h4>Worldwide Shipping</h4>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
          <div class="icon-detail p-4">
            <div class="icon-img p-4 mb-4">
              <img src="images/quality-free-img.png" style="width: 55px; height: 55px;">
            </div>
            <h4>Best Quality</h4>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
          <div class="icon-detail p-4">
            <div class="icon-img p-4 mb-4">
              <img src="images/tag-free-img.png" style="width: 55px; height: 55px;">
            </div>
            <h4>Best Offers</h4>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
          <div class="icon-detail p-4">
            <div class="icon-img p-4 mb-4">
              <img src="images/lock-free-img.png" style="width: 55px; height: 55px;">
            </div>
            <h4>Secure Payments</h4>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- icon section end -->


  <!-- client section -->

  <div class="container-fluid testimonial pb-5">
    <div class="container pb-5">
      <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
        <h4>Testimonial</h4>
        <h1 class="display-5 mb-4">Our Clients Riviews</h1>
        <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
        </p>
      </div>
      <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">

        <div class="row col-12" style="gap: 15px; display: flex; justify-content: center;">
          <div class="testimonial-item col-5">
            <div class="testimonial-quote-left">
              <i class="fas fa-quote-left fa-2x"></i>
            </div>
            <div class="testimonial-img">
              <img src="images/testimonial-1.jpg" class="img-fluid" alt="Image">
            </div>
            <div class="testimonial-text">
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
              </p>
            </div>

            <div class="testimonial-title">
              <div>
                <h4 class="mb-0">Person Name</h4>
                <p class="mb-0">Profession</p>
              </div>
              <div class="d-flex text-primary">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="testimonial-quote-right">
              <i class="fas fa-quote-right fa-2x"></i>
            </div>
          </div>
          <div class="testimonial-item col-5">
            <div class="testimonial-quote-left">
              <i class="fas fa-quote-left fa-2x"></i>
            </div>
            <div class="testimonial-img">
              <img src="images/testimonial-2.jpg" class="img-fluid" alt="Image">
            </div>
            <div class="testimonial-text">
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
              </p>
            </div>
            <div class="testimonial-title">
              <div>
                <h4 class="mb-0">Person Name</h4>
                <p class="mb-0">Profession</p>
              </div>
              <div class="d-flex text-primary">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="testimonial-quote-right">
              <i class="fas fa-quote-right fa-2x"></i>
            </div>
          </div>
        </div>

        <div class="row col-12" style="gap: 15px; display: flex; justify-content: center;">
          <div class="testimonial-item col-5">
            <div class="testimonial-quote-left">
              <i class="fas fa-quote-left fa-2x"></i>
            </div>
            <div class="testimonial-img">
              <img src="images/testimonial-3.jpg" class="img-fluid" alt="Image">
            </div>
            <div class="testimonial-text">
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
              </p>
            </div>

            <div class="testimonial-title">
              <div>
                <h4 class="mb-0">Person Name</h4>
                <p class="mb-0">Profession</p>
              </div>
              <div class="d-flex text-primary">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="testimonial-quote-right">
              <i class="fas fa-quote-right fa-2x"></i>
            </div>
          </div>
          <div class="testimonial-item col-5">
            <div class="testimonial-quote-left">
              <i class="fas fa-quote-left fa-2x"></i>
            </div>
            <div class="testimonial-img">
              <img src="images/testimonial-2.jpg" class="img-fluid" alt="Image">
            </div>
            <div class="testimonial-text">
              <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis blanditiis excepturi quisquam temporibus voluptatum reprehenderit culpa, quasi corrupti laborum accusamus.
              </p>
            </div>
            <div class="testimonial-title">
              <div>
                <h4 class="mb-0">Person Name</h4>
                <p class="mb-0">Profession</p>
              </div>
              <div class="d-flex text-primary">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>
            <div class="testimonial-quote-right">
              <i class="fas fa-quote-right fa-2x"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- end client section -->

  <?php include 'footer.php'; ?>

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
      new WOW().init();

      $('.main-content .owl-carousel').owlCarousel({
        autoplay: true,
        autoPlaySpeed: 1500,
        autoPlayTimeout: 1500,
        autoplayHoverPause: true,
        center: true,
        stagePadding: 50,
        arrows: true,
        loop: true,
        margin: 2,
        nav: true,
        navText: [
          '<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        navContainer: '.main-content .custom-nav',
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      });

      $("#carousel-slider").slick({
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        mobileFirst: true
      });

      $('.owl-carousel').owlCarousel({
        loop: true,
        // margin: 10,
        // nav: true,
        // stagepaddingbottom: 50,
        autoplay: true,
        autoPlaySpeed: 100,
        autoPlayTimeout: 100,
        autoplayHoverPause: true,

        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })

      $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 100,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
          '<i class="fa fa-angle-right"></i>',
          '<i class="fa fa-angle-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 2
          }
        }
      })

      $(".offer-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 100,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
          '<i class="fa fa-angle-right"></i>',
          '<i class="fa fa-angle-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 2
          },
          1200: {
            items: 3
          }
        }
      })

      $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 100,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav: true,
        navText: [
          '<i class="fa fa-angle-right"></i>',
          '<i class="fa fa-angle-left"></i>'
        ],
        responsiveClass: true,
        responsive: {
          0: {
            items: 1
          },
          576: {
            items: 1
          },
          768: {
            items: 2
          },
          992: {
            items: 3
          },
          1200: {
            items: 3
          }
        }
      });


      $(document).on('click', '.oncategory', function(e) {
        e.preventDefault();

        let category = $(this).attr('id');
        console.log(category);

        window.location.href = 'pro-' + category + '.php?category=' + category;
      })


      $(document).on('click', '.cart', function(e) {
        e.preventDefault();
        console.log($(this).attr('id'));
        window.location.href = 'displayproduct.php?pid=' + $(this).attr('id');
      });

      $('.wishlist').click(function(e) {
        e.preventDefault();
        // let pid = e.target.id;
        // console.log(pid);

        let pid = $(this).attr('id');
        console.log(pid);

        $.ajax({
          url: 'wishlist.php',
          type: 'POST',
          data: {
            pid: pid
          },
          success: function(data) {
            if (data.error == 'true') {
              console.log(data.message);
            } else {
              window.location.href = "http://localhost/feane-1.0.0/index.php";
            }
          }
        })
      });

      // $('.addtocartpage').click(function(e) {
      //   e.preventDefault();
      //   let pid = $(this).attr('id');
      //   console.log(pid);

      //   $.ajax({
      //     url: 'addtocartproduct.php',
      //     type: 'POST',
      //     dataType: 'json',
      //     data: {
      //       pid: pid
      //     },
      //     success: function(data) {
      //       if (data.error == 'true') {
      //         console.log(data.message);
      //       } else {
      //         console.log(data.message);
      //         window.location.href = "http://localhost/feane-1.0.0/index.php";
      //       }
      //     }
      //   })
      // })

      // $('.cart').click(function(e) {
      //   e.preventDefault();

      //   let pid = $(this).attr('id');
      //   console.log(pid);

      //   window.location.href = 'displayproduct.php?pid=' + $(this).attr('id');
      // })



      // $('.addtocart').click(function(e) {
      //   e.preventDefault();

      //   // let pid= e.target.id;
      //   // console.log(pid);

      //   let pid= $(this).attr('id');
      //   console.log(pid);

      //   // console.log($(this).attr('id'));
      //   // window.location.href='wishlistrecordpage.php?id='+$(this).attr('id');

      //   $.ajax({
      //     url: 'addtocartproduct.php',  
      //     type: 'POST',
      //     dataType: 'json',
      //     data: {
      //       pid: e.target.id
      //     },
      //     success: function(data) {
      //       if (data.error == 'true') {
      //         console.log(data.message);
      //       } else {
      //         window.location.href = 'addtocartrecord.php';
      //       }
      //     }
      //   })
      // });

    });
  </script>

</body>

</html>
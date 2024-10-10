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

</head>

<body class="sub_page">

  <?php if (isset($_SESSION['login'])) { ?>

    <section class="product_section layout_padding-bottom  wow animate__animated animate__fadeIn">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Our Products
          </h2>
        </div>

        <ul class="filters_menu">
          <li class="active" data-filter="*">All</li>
          <li data-filter=".Clothes">Clothes</li>
          <li data-filter=".Jewellery">Jewellery</li>
          <li data-filter=".Cosmetics">Cosmetics</li>
          <li data-filter=".Bags">Bags</li>
          <li data-filter=".Footwears">Footwears</li>
        </ul>

        <div class="filters-content">
          <div class="row grid">
            <?php
            $uid = $_SESSION['user_id'];    //loginajax.php

            $sql = "SELECT productdata.id, productdata.image, admin_category.category, admin_subcategory.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer FROM wishlist, productdata
            LEFT JOIN admin_category ON productdata.category = admin_category.id
            LEFT JOIN admin_subcategory ON productdata.subcategory = admin_subcategory.id
            WHERE productdata.id = wishlist.product_id ";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $images = json_decode($row['image']);
              $id = $row['id'];
            ?>

              <div class="col-sm-6 col-lg-4 all <?php echo $row['category']; ?>">
                <div class="box cart" id="<?php echo $row['id']; ?>" onclick="displaypage(<?php echo $row['id']; ?>)" style="position: relative;">
                  <div class="options d-flex justify-content-end" style="position: absolute; top: 10px; right: 10px;">
                    <a href="" class="wishlist" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
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
                      <button class="btn addtocartbn " id="<?php echo $row['id']; ?>" style="background-color: #ffbe33; color: white; border-radius: 3px; padding: 5px 19px; font-size: 14px; font-weight: 500; margin-top: 15px; margin: auto;">Add to Cart</button>
                    </div> -->
                    
                  </div>
                </div>
              </div>

            <?php } ?>
          </div>
        </div>

        <div class="btn-box">
          <a href="">
            View More
          </a>
        </div>
      </div>
    </section>

    <?php include 'footer.php'; ?>

  <?php } else {
    header('location: /feane-1.0.0/userform/login.php');
  } ?>

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

      // remove product from page
      $('.wishlist').click(function(e) {
        e.preventDefault();
        $('.status').show();
        // console.log(e.target.id);

        let pid = $(this).attr('id');
        console.log(pid);

        $.ajax({
          url: 'wishlistdelete.php',
          type: 'POST',
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

      // function displaypage(<?php echo $id; ?>) {

      //   console.log(id);
      // }

      // $('.btn').click(function(e) {
      //   e.preventDefault();

      //   let pid = $(this).attr('id');
      //   console.log(pid);

      //   window.location.href = 'displayproduct.php?id=' + $(this).attr('id');
      // })

      $('.cart').click(function(e) {
        e.preventDefault();

        let pid = $(this).attr('id');
        console.log(pid);

        window.location.href = 'displayproduct.php?pid=' + $(this).attr('id');
      })

      // $(document).on('click', '.cart', function(e) {
      //   e.preventDefault();
      //   console.log($(this).attr('id'));
      //   window.location.href = 'displayproduct.php?id=' + $(this).attr('id');
      // });

    })
  </script>

</body>

</html>
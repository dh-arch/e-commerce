<?php
include 'connection.php';
include 'header.php';
?>



<section class="product_section layout_padding-bottom  wow animate__animated animate__fadeIn">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
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

                <?php
                if (isset($_GET['input'])) {
                    $input = $_GET['input'];
                    // print_r($input);
                    $sql = "select * from `productdata` where `category` like '{$input}%'";   // print_r($sql);
                    $result = mysqli_query($conn, $sql);   //print_r($result);
                    $response = array();
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { //print_r($row);
                            $response = $row;
                            json_encode($response); ?>

                            <div class="col-sm-6 col-lg-4 all <?php echo $row['category']; ?>">
                                <div class="box cart" id="<?php echo $row['id']; ?>">
                                    <div>
                                        <div class="img-box">
                                            <img src="./Blog_project/Admin/<?php echo $row['image']; ?>" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h5> <?php echo $row['category']; ?> </h5>
                                            <p>
                                                <?php echo $row['price']; ?> <i class="fa-solid fa-indian-rupee-sign text-xs"></i> &nbsp;
                                                <del><?php echo $row['mrp']; ?> <i class="fa-thin fa-percent"></i> </del> &nbsp;
                                                <?php echo $row['discount']; ?> <i class="fa-solid fa-indian-rupee-sign text-xs"></i>
                                            </p>
                                            <p>
                                                <i class="fa-solid fa-indian-rupee-sign text-xs"></i> <?php echo $row['offer']; ?>
                                            </p>
                                            <p> <?php echo $row['delivery']; ?> </p>
                                            <div class="pro-box">
                                                <p class="stars">
                                                    <span> <?php echo $row['rate']; ?> </span> &nbsp;&nbsp;&nbsp;
                                                    <i class="fa-solid fa-star text-sm self-center text-sm text-white"></i>
                                                </p>
                                                <div class="options">
                                                    <!-- <?php echo $row['id']; ?> -->
                                                    <a href="" class="wishlist" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                                                        <i class="fa fa-heart text-white " aria-hidden="true"></i>
                                                    </a>
                                                    <!-- <a href="" class="addtocart" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                                                        <i class="fa-light fa fa-cart-shopping text-white " aria-hidden="true"></i>
                                                    </a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <?php  }
                    } else {
                        echo "<h3 class='top: 5px;' style='display: flex; justify-content: center;'>no record found</h3>";
                    }
                } ?>
            </div>
        </div>

        <div class="btn-box">
            <a href="">
                View More
            </a>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>;

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

        $(document).on('click', '.cart', function(e) {
            e.preventDefault();
            console.log($(this).attr('id'));
            window.location.href = 'displayproduct.php?id=' + $(this).attr('id');
        });

    })
</script>
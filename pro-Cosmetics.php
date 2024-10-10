<?php
include 'connection.php';
include 'header.php';
?>

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

<div class="container category my-5" style="padding : 50px 0px; ">
    <!-- <h3 class="text-center mb-5" style="padding : 40px 0px; font-size: 32px; font-weight: 300; "> Category </h3> -->
    <div class="row">
        <?php
        // $sql = "select * from admin_category";

        $category = $_GET['category'];

        $sql = "SELECT admin_subcategory.subcategory, admin_subcategory.image, admin_category.category FROM admin_subcategory
        LEFT JOIN admin_category ON admin_subcategory.category=admin_category.id
        WHERE admin_category.category='$category' ";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="box subcategory" id="<?php echo $row['subcategory']; ?>" style="width: 150px; height: 150px; border: 2px solid #565e8bcb; border-radius: 50%;  display: grid;  justify-content: space-between; margin: 0 20px;">
                <img src=".\Blog_project\assets\images\product\subcategory-images\<?php echo $row['image']; ?>" alt="" style="width: 100%; height: 100%; object-fit: contain; border-image: round; border-radius: 50%; ">

                <div class="box-detail mt-4" style=" margin: auto; ">
                    <h3 class="heading text-center" style="font-size: 15px; font-weight: 500;"> <?php echo $row['subcategory']; ?> </h3>
                </div>
            </div>

        <?php } ?>
    </div>
</div>


<div class="main-content" style="margin: 10rem 0;  ">
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


<section class="product_section layout_padding-bottom ">
    <div class="container" style="margin-top: 200px;">
        <div class="heading_container heading_center wow fadeInUp">
            <h2> Our Products </h2>
        </div>

        <ul class="filters_menu wow fadeInUp">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".Mackeup Combo">Mackeup Combo</li>
            <li data-filter=".Face Mackeup">Face Mackeup</li>
            <li data-filter=".Lipstick">Lipstick</li>
            <li data-filter=".Eye Makeup">Eye Makeup</li>
            <li data-filter=".Brushes & Accessories">Brushes And Accessories</li>
            <li data-filter=".Nail Mackeup">Nail Mackeup</li>
        </ul>

        <div class="filters-content wow fadeInUp mt-5">
            <div class="row grid">
                <?php

                $category = $_GET['category'];

                $sql = "SELECT productdata.id, productdata.image, admin_category.category, admin_subcategory.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer FROM productdata  
                    LEFT JOIN admin_category ON productdata.category=admin_category.id 
                    LEFT JOIN admin_subcategory ON productdata.subcategory=admin_subcategory.id WHERE admin_category.category='$category' ";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['id'];
                    $images = json_decode($row['image']);
                ?>

                    <div class="col-sm-6 col-lg-4 all <?php echo $row['subcategory']; ?>"> <?php echo $row['subcategory']; ?>
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
                                <div class="col-12 mt-4 d-flex justify-content-center">
                                    <button class="btn " style="background-color: #ffbe33; color: white; border-radius: 3px; padding: 5px 19px; font-size: 14px; font-weight: 500; margin-top: 15px; margin: auto;">Add to Cart</button>
                                </div>
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

<?php include 'footer.php'; ?>


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

        $(document).on('click', '.subcategory', function(e) {
            e.preventDefault();

            let subcategory = $(this).attr('id');
            console.log(subcategory);

            window.location.href = 'pro-' + subcategory + '.php?subcategory=' + subcategory;
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

    });
</script>
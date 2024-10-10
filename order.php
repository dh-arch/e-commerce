<?php
include 'connection.php';
include 'header.php';
$uid = $_SESSION['user_id'];   // print_r($uid);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4">Order History</h3>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <select class="form-select" id="sortSelect">
                    <option selected>Sort by</option>
                    <option value="date">Date</option>
                    <option value="status">Status</option>
                    <option value="price">Price</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select class="form-select" id="filterSelect">
                    <option selected>Filter by Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="books">Books</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="Search orders...">
            </div>
        </div>
        <div class="row" id="orderList">
            <?php
            $sql = "select * from `payment` where `uid`='$uid'";
            $result = mysqli_query($conn, $sql);   // print_r($result);
            while ($row = mysqli_fetch_assoc($result)) {
                // print_r($row['pid']);
                // $delivery = $row['delivery'];
            ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="./Blog_project/Admin/<?php echo $row['image']; ?>" style="width: 310px; height: 260px; margin: auto;" class="card-img-top mt-3" alt="product image">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $row['order_id'] ?> </h5>
                            <p class="card-text"><i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i> <?php echo $row['totalprice'] ?></p>
                            <p class="card-text"><small class="text-muted">Ordered on: <?php echo $row['current_date'] ?></small></p>
                            <span class="badge bg-success"><?php echo $row['status'] ?></span>
                        </div>
                        <div class="card-footer">
                            <button class="trackbtn btn-primary btn-sm" style="padding: 9px 35px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; border: none;">Track Order</button>
                            <button class="viewbtn btn-secondary btn-sm" style="padding: 9px 35px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; border: none;" id="<?php echo $row['pid']; ?>">View Details</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <nav aria-label="Order history pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            $('.viewbtn').click(function() {
                let pid= $(this).attr('id');
                console.log(pid);

                window.location.href = 'http://localhost/feane-1.0.0/myorderdetail.php?pid=' + pid;
            })
        })
    </script>
</body>

</html>
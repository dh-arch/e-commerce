

<?php
include 'connection.php';
include 'header.php';

$uid= $_SESSION['user_id'];   // print_r($uid);
print_r($_SESSION['order_id']);
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
  <link href="css/paydetail.css" rel="stylesheet" />
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

<body>

<?php 

$sql= "select * from `payment` where `orderid`='$uid'";
$result= mysqli_query($conn, $sql);   // print_r($result);
while($row= mysqli_fetch_assoc($result)){
    $pid= $row['product_id'];  // print_r($pid);
    $image= $row['image'];

    $name= $row['name'];  // print_r($name);
    $paymode= $row['paymode'];     print_r($paymode);
    $order_id= $row['order_id'];  // print_r($order_id);
    $category= $row['category'];
    $totalprice= $row['totalprice'];
    $grandtotal= $row['grandtotal'];
    $quantity= $row['quantity'];
    $due_date= $row['due_date'];

    if($paymode == 'cash'){
?>
    <div class="card my-10 wow animate__animated animate__fadeInLeft " style="margin-top: 30px ; margin-bottom: 30px;">
            <div class="card-body">
                <div class="row">
                    
                            <div class="col-md-7 m-auto" style="margin: 0 auto;">
                                <div class="right border">
                                    <input type="hidden" class="id " name="uid" value="<?php print_r($uid); ?>">
                                    <input type="hidden" class="pid " name="pid" id="pid" value="<?php echo $row['product_id']; ?>">

                                    <div class=" d-flex pt-2"> <p style="20px;"> Order id : &nbsp;&nbsp; <?php echo $row['order_id']; ?> </p> </div>
                                    
                                    <hr>

                                    <div class="header pb-2">Order Summary</div>
                                    <div class="row item d-flex justify-content-center align-self-center py-4">
                                        <div class=" col-4 align-self-center lh-lg">
                                            <img class="img-fluid" src="./Blog_project/Admin/<?php echo $image; ?>" style="border-radius: 10px; box-shadow: 0 2px 3px 0 rgba(26, 25, 25, 0.2), 0 6px 20px 0 rgba(20, 20, 20, 0.19); background-color: rgba(182, 181, 181, 0.39);">
                                        </div>
                                        <div class="col-6 lh-xl" style="display: grid; justify-content: end; align-self: center;">
                                            <div class="">
                                                <b><?php echo $category; ?></b>
                                            </div>
                                            <div class="  ">
                                                <?php echo $totalprice; ?> <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                            </div>
                                            <div class="">Qty: <?php echo $quantity; ?> </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
                                                <div>
                                                    Subtotal
                                                </div>
                                                
                                                <div>
                                                    <b> Total to pay </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg">
                                                <div class="grandtotal">
                                                    <?php echo $grandtotal; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                                
                                                <div>
                                                    <?php echo $grandtotal; ?>
                                                    <i class="fa-solid fa-indian-rupee-sign text-sm mt-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <?php
                                    $sql = "select * from `address` where `firstname`='$name'";   // print_r($sql);
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="row item d-flex justify-content-center align-self-center">
                                            <div class="row col-5 align-self-center lh-lg">
                                                <div class="col text-left">
                                                    <div>
                                                        name
                                                    </div>
                                                    <div>
                                                        mobileno
                                                    </div>
                                                    <div>
                                                        email
                                                    </div>
                                                    <div>
                                                        address
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 pt-4" style="display: grid; justify-content: end; align-self: center;">
                                                <div class="col text-right lh-lg">
                                                    <div class="firstname">
                                                        <?php echo $row['firstname']; ?>
                                                    </div>
                                                    <div class="mobileno">
                                                        <?php echo $row['mobileno']; ?>
                                                    </div>
                                                    <div class="email">
                                                        <?php echo $row['email']; ?>
                                                    </div>
                                                    <div class=" ">
                                                        <p class="address"><?php echo $row['address']; ?>,&nbsp;
                                                            <?php echo $row['pincode']; ?>,&nbsp;
                                                            <?php echo $row['city']; ?>,&nbsp;
                                                            <?php echo $row['state']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
                                                <div>
                                                    paymode  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg">
                                                <div class="paymode">
                                                    <?php echo $paymode; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row item d-flex justify-content-center align-self-center">
                                        <div class="row col-5 align-self-center lh-lg">
                                            <div class="col text-left">
                                                <div>
                                                    due-date  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 " style="display: grid; justify-content: end; align-self: center;">
                                            <div class="col text-right lh-lg">
                                                <div class="paymode">
                                                    <?php echo $due_date; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="btn-box row item flex justify-content-center align-self-center ">
                                        <div class="col-6">
                                            <button style="padding: 9px 45px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px;" class="btn"> Continue Shopping </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                </div>
            </div>
        </div>
        
 <?php } ?>

<?php }  ?>

</body>

<?php
include 'footer.php';
?>

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
    $(document).ready(function(){
        $('.btn').click(function(){
            window.location.href = "http://localhost/feane-1.0.0/index.php";
        })
        
        $('.invoicebtn').click(function(){
            window.location.href = "http://localhost/feane-1.0.0/invoice.php";
        })
    })
    </script>

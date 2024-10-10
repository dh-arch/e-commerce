<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<head>
    <style>
        .card-title {
            cursor: pointer;
        }

        label {
            font-size: 20px;
            font-weight: 600;
        }

        .detail {
            padding: 10px 0;
        }

        .size {
            padding-right: 10px;
        }

        .image {
            background-size: cover;
            background-position: center center;
            height: 250px;
            width: 280px;
            position: relative;
        }

        .img-box {
            position: absolute;
        }

        .img {
            width: 90px;
            height: 90px;
            display: flex;
            justify-content: start;
            margin-top: 8px;
        }

        .colorContainer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .colorbox {
            display: flex !important;
        }

        #selectedColors {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .selectedColor {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            margin-bottom: 7px;
        }

        .selectedColorInner {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
        }

        /* .sizeContainer {
            display: grid;
            gap: 13px;
        }

        .sizebox {
            border: 1px solid;
            width: 38px;
            height: 38px;
            border-radius: 5px;
        }

        .size-qty-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        } */

        .size-qty-container {
            display: grid;
            flex-wrap: wrap;
            gap: 10px;
        }

        .size-box,
        .qty-box {
            width: 38px;
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            font-weight: 500;
        }

        .size-box {
            background-color: #f8f9fa;
        }

        .qty-box {
            background-color: #e9ecef;
        }
    </style>
</head>

<div class="content-body text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <span> <a class="backbtn"> Product </a> </span> / View Product </h4>
                    </div>
                    <div class="container " id="element">
                        <div class="container col-12 pb-5 table-responsive d-flex justify-content-center">

                            <div class="col-6 d-grid justify-content-center ">
                                <?php
                                $pid = $_GET['pid'];

                                $sql = "SELECT productdata.id, productdata.image, productdata.color, productdata.size, productdata.quantity, admin_subcategory.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer, productdata.description FROM productdata  
                                LEFT JOIN admin_category ON productdata.category=admin_category.id 
                                LEFT JOIN admin_subcategory ON productdata.subcategory=admin_subcategory.id WHERE productdata.id='$pid'";

                                $result = mysqli_query($con, $sql);
                                if ($row = mysqli_fetch_assoc($result)) {
                                    $images = json_decode($row['image'], true);
                                    $colors = json_decode($row['color'], true);
                                    $sizes = json_decode($row['size'], true);
                                    $qtys = json_decode($row['quantity'], true);
                                    $description = $row['description'];
                                } ?>

                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <?php if (!empty($images)) { ?>
                                                <img id="mainImage" src="<?= BASE_URL . 'assets/images/product/product-images/' . $images[0]; ?>" class="img-fluid rounded" style="max-height: 450px; width: 100%; object-fit: contain;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($images)) { ?>
                                        <div class="row">
                                            <?php foreach ($images as $index => $image) { ?>
                                                <div class="col-3 mb-3">
                                                    <img src="<?= BASE_URL . 'assets/images/product/product-images/' . $image; ?>"
                                                        class="img-thumbnail thumbnail-image"
                                                        data-full-image="<?= BASE_URL . 'assets/images/product/product-images/' . $image; ?>"
                                                        style="height: 100px; width: 100%; object-fit: cover; cursor: pointer;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="col-6 ml-3 pb-5">

                                <div>
                                    <div class="detail">
                                        <span style="font-weight: 600; font-size: 26px;"> <?php echo $row['subcategory']; ?> </span>
                                    </div>
                                    <div class="d-grid justify-content-between mt-2 ml-3" style="font-size: 17px;">
                                        <div class="detail ">
                                            <span> <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['price'] ?> </span> &nbsp;&nbsp;&nbsp;
                                            <del> <i class="fa-solid fa-indian-rupee-sign"></i> <span> <?php echo $row['mrp'] ?> </span> </del>
                                        </div>
                                        <span> <?php echo $row['offer']; ?> </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label> Description </label>
                                    <div class="detail mt-2 ml-4">
                                        <p> <?= $description; ?> </p>
                                    </div>
                                </div>

                                <div style="margin-top: 10px;">
                                    <label> Color </label>
                                    <div class="colorContainer mt-2 ml-4">
                                        <?php
                                        if (!empty($colors)) {
                                            foreach ($colors as $color) {
                                        ?>
                                                <div id="selectedColors ">
                                                    <div class="selectedColor " style="border-color: <?= $color; ?>;">
                                                        <div class="selectedColorInner" style="background-color: <?= $color; ?>;"></div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label>Size and Quantity</label>
                                    <div class="size-qty-container mt-2">
                                        <?php
                                        if (!empty($sizes) && !empty($qtys)) {
                                            foreach ($sizes as $index => $size) {
                                                $qty = $qtys[$index] ?? '';
                                        ?>
                                                <div class="d-flex align-items-center ml-4 mb-2" style="gap: 10px;">
                                                    <div class="size-box me-2">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <?= $size; ?>
                                                        </span>
                                                    </div>
                                                    <div class="qty-box me-2">
                                                        <span class="d-flex justify-content-center align-items-center">
                                                            <?= $qty; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('./includes/footer.php');
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail-image');
        const mainImage = document.getElementById('mainImage');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                mainImage.src = this.getAttribute('data-full-image');
            });
        });
    });

    $(document).ready(function() {

        $('.backbtn').click(function() {
            window.location.href = "<?= BASE_URL ?>admin/company_list.php";
        })

        $('.editbtn').click(function() {
            let pid = $(this).attr('id');
            console.log(pid);
            window.location.href = "<?= BASE_URL ?>admin/editproduct.php?pid=" + pid;
        })
    })
</script>
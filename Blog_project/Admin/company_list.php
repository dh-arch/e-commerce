<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<head>
    <style>
        .icon {
            cursor: pointer;
        }
    </style>
</head>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product</h4>
                        <button class="btn btn-dark" id="addbtn">Add</button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Image</th>
                                    <th>Subcategory</th>
                                    <th>Stock</th>
                                    <th>Company Name</th>
                                    <th>Delivery Charge</th>
                                    <th>Product Date</th>
                                    <th>Product Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "SELECT productdata.id, productdata.image, productdata.color, productdata.size, productdata.quantity, admin_subcategory.subcategory, productdata.price, productdata.mrp, productdata.discount, productdata.offer, productdata.soldby, productdata.delivery, productdata.product_date, productdata.outofstock_date, productdata.description FROM productdata  
                                LEFT JOIN admin_category ON productdata.category=admin_category.id 
                                LEFT JOIN admin_subcategory ON productdata.subcategory=admin_subcategory.id";

                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $images = json_decode($row['image'], true);
                                    $quantitys = json_decode($row['quantity']); // print_r($quantity);

                                    $sizes = json_decode($row['size']);

                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>

                                        <td>
                                            <img src="<?= BASE_URL . 'assets/images/product/product-images/' . $images[0]; ?>" height="100px" width="100px" style="object-fit: cover;">
                                        </td>
                                        <td> <?php echo $row['subcategory']; ?> </td>
                                        <td>
                                            <?php
                                            if ($sizes == 0) {
                                                echo ('<span style="color: orange;"> Out Of Stock </span>');
                                            } else {
                                                foreach ($sizes as $size) {
                                                    if ($quantitys) {
                                                        foreach ($quantitys as $qty) {
                                                            $quantity = $qty;
                                                        }
                                                    } else {
                                                        $quantity = '-';
                                                    } ?>
                                                    <?php echo $size; ?> - <?php echo $quantity; ?>
                                            <?php }
                                            } ?>
                                        </td>
                                        <td> <?php echo $row['soldby']; ?> </td>
                                        <td> <?php echo $row['delivery']; ?> </td>
                                        <td> <?php echo $row['product_date']; ?> </td>
                                        <td> <?php echo $row['outofstock_date']; ?> </td>

                                        <td>
                                            <i class="fas fa-eye icon viewbtn" id="<?php echo $row['id'] ?>"></i> &nbsp;&nbsp;
                                            <i class="fas fa-edit icon editbtn" id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-trash-alt icon deletebtn" id="<?php echo $row['id']; ?>"></i>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
    $(document).ready(function() {

        $('#addbtn').click(function() {
            window.location.href = "<?= BASE_URL ?>admin/product.php";
        })

        $('.viewbtn').click(function() {
            let pid = $(this).attr('id');
            console.log(pid);
            window.location.href = "<?= BASE_URL ?>admin/viewproduct.php?pid=" + pid;
        })

        $('.editbtn').click(function() {
            let pid = $(this).attr('id');
            console.log(pid);
            window.location.href = "<?= BASE_URL ?>admin/editproduct.php?pid=" + pid;
        })

        $('.deletebtn').click(function() {
            let pid = $(this).attr('id');
            console.log(pid);

            var settings = {
                "url": "<?= BASE_URL ?>controller/Company.php?type=deleteproduct",
                "method": "POST",
                "data": {
                    pid: pid
                }
            };
            $.ajax(settings).done(function(response) {
                response = JSON.parse(response);
                if (response.error == true) {
                    toastr.error(response.message, 'Error');
                } else {
                    toastr.success(response.message, 'Success');
                    // producttable.ajax.reload();
                }
            });
        })

    });
</script>
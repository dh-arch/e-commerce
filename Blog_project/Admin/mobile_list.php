<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<div class="content-body text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> All Orders </h4>
                    </div>
                    <div class=" table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>GrandTotal</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "SELECT payment.id, address.firstname, address.email, address.mobileno, payment.category, payment.quantity, payment.totalprice, payment.grandtotal, payment.status, payment.current_date, payment.delivery_date FROM payment, address";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['category']; ?> </td>
                                        <td> <?php echo $row['quantity']; ?> </td>
                                        <td> <?php echo $row['grandtotal']; ?> </td>
                                        <td>
                                            <span style="padding: 5px 10px; background-color: <?php echo $row['status'] == 'Pending' ? 'orange' : ($row['status'] == 'Delivered' ? 'green' : 'red'); ?>; color: white; margin: auto; border-radius: 10px; "> <?php echo $row['status']; ?> </span>
                                        </td>
                                        <td> <?php echo $row['current_date']; ?> </td>
                                        <td> <?php echo $row['delivery_date']; ?> </td>
                                        <td>
                                            <i class="fas fa-eye viewbtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"> </i> &nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                            <!-- <tbody class="text-dark">
                                <?php
                                $sql = "select * from `payment`";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $image = $row['image'];
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['name']; ?> </td>
                                        <td> <?php echo $row['email']; ?> </td>
                                        <td> <?php echo $row['mobileno']; ?> </td>
                                        <td> <?php echo $row['address']; ?> </td>
                                        <td> <img src="<?= BASE_URL . 'assets/images/product/product-images/' . $image; ?>" height='150px' width='150px' style='object-fit:cover;'> </td>
                                        <td> <?php echo $row['category']; ?> </td>
                                        <td> <?php echo $row['quantity']; ?> </td>
                                        <td> <?php echo $row['totalprice']; ?> </td>
                                        <td> <?php echo $row['grandtotal']; ?> </td> 
                                        <td> <?php echo $row['paymode']; ?> </td>
                                        <td> <?php echo $row['status']; ?> </td> 
                                        <td> <?php echo $row['current_date']; ?> </td>
                                        <td> <?php echo $row['delivery_date']; ?> </td>
                                        <td>
                                            <i class="fas fa-eye viewbtn" id="<?php echo $row['unique_id']; ?>" style="cursor: pointer;"> </i> &nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody> -->
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

        $(document).on('click', '.viewbtn', function() {

            let id = $(this).attr('id');
            console.log(id);

            window.location.href = "http://localhost/feane-1.0.0/Blog_project/admin/order.php?id=" + id;
        })

    })
</script>
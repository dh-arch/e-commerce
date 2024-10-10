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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>TotalPrice</th>
                                    <th>GrandTotal</th>
                                    <th>Sold by</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "SELECT cart.id, address.firstname, address.email, address.mobileno, cart.category, cart.subcategory, cart.size, cart.quantity, cart.totalprice, cart.grandtotal, cart.soldby, cart.status, cart.current_date FROM cart, address";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['firstname']; ?> </td>
                                        <td> <?php echo $row['email']; ?> </td>
                                        <td> <?php echo $row['mobileno']; ?> </td>
                                        <td> <?php echo $row['category']; ?> </td>
                                        <td> <?php echo $row['subcategory']; ?> </td>
                                        <td> <?php echo $row['quantity']; ?> </td>
                                        <td> <?php echo $row['size']; ?> </td>
                                        <td> <?php echo $row['totalprice']; ?> </td>
                                        <td> <?php echo $row['grandtotal']; ?> </td>
                                        <td> <?php echo $row['soldby']; ?> </td>
                                        <td> <?php echo $row['status']; ?> </td>
                                        <td> <?php echo $row['current_date']; ?> </td>
                                        <td>
                                            <i class="fas fa-eye viewbtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"> </i> &nbsp;&nbsp;&nbsp;
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


    })
</script>
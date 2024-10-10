<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<style>
    .card-title {
        cursor: pointer;
    }
</style>

<div class="content-body text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <span> <a class="backbtn"> All Orders </a> </span> / View Order </h4>
                    </div>
                    <div class=" table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Address</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Grand Total</th>
                                    <th>Order ID</th>
                                    <th>Action</th>
                            </thead>
                            <tbody class="text-dark">
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
                                        <td> <?php echo $row['category']; ?> </td>
                                        <td> <?php echo $row['quantity']; ?> </td>
                                        <td> <?php echo $row['grandtotal']; ?> </td>
                                        <td> <?php echo $row['order_id']; ?> </td>
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

        $('.backbtn').click(function() {
            // window.location.href = "<?= BASE_URL ?>Admin/order.php";
        })

        $('.viewbtn').click(function() {

            let unique_id = $(this).attr('id');
            console.log(unique_id);

            window.location.href = "<?= BASE_URL ?>admin/vieworderdetails.php?unique_id=" + unique_id;
        })

    })
</script>
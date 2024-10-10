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
                        <h4 class="card-title"> <span> <a class="backbtn"> All Orders </a> </span> / <a class="viewbackbtn"> View Order </a> / view order details </h4>
                    </div>
                    <div class=" table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.NO</th>
                                    <th>Transaction ID</th>
                                    <th>Paymode</th>
                                    <th>Order Date</th>
                                    <th>Due Date</th>
                                    <th>Order Type</th>
                                    <th>product details</th>
                                </tr>
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
                                        <td> <?php echo $row['transaction-id']; ?> </td>
                                        <td> <?php echo $row['paymode']; ?> </td>
                                        <td> <?php echo $row['current_date']; ?> </td>
                                        <td> <?php echo $row['delivery_date']; ?> </td>
                                        <td>
                                            <span style="padding: 5px 10px; background-color: <?php echo $row['status'] == 'Pending' ? 'orange' : ($row['status'] == 'Delivered' ? 'green' : 'red'); ?>; color: white; margin: auto; border-radius: 10px; "> <?php echo $row['status']; ?> </span>
                                        </td>
                                        <td>
                                            <ul class="d-grid justify-content-start">
                                                <li> <span> length : </span> <?php echo $row['length']; ?> </li>
                                                <li> <span> breadth : </span> <?php echo $row['breadth']; ?> </li>
                                                <li> <span> height : </span> <?php echo $row['height']; ?> </li>
                                                <li> <span> weight : </span> <?php echo $row['weight']; ?> </li>
                                            </ul>
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

        $('.viewbtn').click(function() {

            let unique_id = $(this).attr('id');
            console.log(unique_id);

            window.location.href = "<?= BASE_URL ?>admin/vieworderdetails.php?unique_id=" + unique_id;
        })

        $('.viewbackbtn').click(function() {
            window.location.href = "<?= BASE_URL ?>Admin/vieworder.php";
        })

    })
</script>
<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<style>
    .card-title {
        cursor: pointer;
    }
</style>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

?>

    <div class="content-body text-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> <span> <a class="backbtn"> All Orders </a> </span> / Order Details </h4>
                        </div>
                        <div class=" table-responsive py-5">
                            <table class="table table-bordered producttable">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>TotalPeice</th>
                                        <th>GrandTotal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php
                                    $sql = "select * from `payment` where `id`='$id'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $image = $row['image'];
                                    ?>
                                        <input type="hidden" class="unique_id" value="<?php echo $_GET['id']; ?>">
                                        <input type="hidden" class="uid" value="<?php echo $row['uid']; ?>">
                                        <tr class="text-center">
                                            <td> <img src="<?= BASE_URL . 'assets/images/product/product-images/' . $image; ?>" height='150px' width='150px' style='object-fit:cover;'> </td>
                                            <td> <?php echo $row['category']; ?> </td>
                                            <td> <?php echo $row['quantity']; ?> </td>
                                            <td> <?php echo $row['totalprice']; ?> </td>
                                            <td> <?php echo $row['grandtotal']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <p>
                                                    <span style="font-weight: bold;"> address : &nbsp; </span> <?php echo $row['address']; ?>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <label> <span style="font-weight: bold;"> Order Status : &nbsp; </span> pending </label>
                                                <select id="ordertype" name="ordertype" class="h-8 w-96 form-control border border-1 border-slate-300 rounded-sm ordertype" style="outline: none;" required>
                                                    <option disabled>Select Order</option>
                                                    <option value="PlaceOrder" name="PlaceOrder">PlaceOrder</option>
                                                    <option value="Pending" name="pending">Pending</option>
                                                    <option value="Processing" name="processing">Processing</option>
                                                    <option value="Shipping" name="shipping">Shipping</option>
                                                    <option value="Canceled" name="canceled">Canceled</option>
                                                    <option value="Compelete" name="compelete">Compelete</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label> Length </label>
                                                <input type="text" name="length" id="length" class="form-control length" placeholder="Length">
                                            </td>
                                            <td>
                                                <label> Breadth </label>
                                                <input type="text" name="breadth" id="breadth" class="form-control breadth" placeholder="Breadth">
                                            </td>
                                            <td>
                                                <label> Height </label>
                                                <input type="text" name="height" id="height" class="form-control height" placeholder="Height">
                                            </td>
                                            <td>
                                                <label> Weight </label>
                                                <input type="text" name="weight" id="weight" class="form-control weight" placeholder="Weight">
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="text-center my-4">
                                        <td colspan="6">
                                            <button style="padding: 9px 30px; background-color: #000; color: #fff; border-radius: 45px; margin-bottom: 20px; margin: auto; border: none;" class="submitbtn"> Submit </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php
include('./includes/footer.php');
?>


<script>
    $(document).ready(function() {

        $('.backbtn').click(function() {
            window.location.href = '<?= BASE_URL ?>Admin/mobile_list.php';
        })

        $('.submitbtn').click(function() {

            let unique_id = $('.unique_id').val();
            console.log(unique_id);
            let uid = $('.uid').val();
            console.log(uid);
            let ordertype = $('.ordertype').val();
            console.log(ordertype);

            let length = $('.length').val();
            console.log(length);
            let breadth = $('.breadth').val();
            console.log(breadth);
            let height = $('.height').val();
            console.log(height);
            let weight = $('.weight').val();
            console.log(weight);

            var settings = {
                "url": '<?= BASE_URL ?>controller/Order.php?type=adddata',
                "method": "POST",
                "data": {
                    unique_id: unique_id,
                    uid: uid,
                    ordertype: ordertype,
                    length: length,
                    breadth: breadth,
                    height: height,
                    weight: weight,
                }
            };

            $.ajax(settings).done(function(response) {
                response = JSON.parse(response);
                if (response.error == true) {
                    toastr.error(response.massage, 'Error');
                } else {
                    toastr.success(response.massage, 'Success');
                    window.location.href = '<?= BASE_URL ?>Admin/vieworder.php';
                    // producttable.ajax.reload();
                }
            });

        })

    });
</script>
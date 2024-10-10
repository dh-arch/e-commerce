<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> User </h4>
                        <button class="btn btn-dark" id="addbtn">Add</button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                
                                $sql= "SELECT * FROM address, signupdata ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['firstname']; ?> </td>
                                        <td> <?php echo $row['lastname']; ?> </td>
                                        <td> <?php echo $row['email']; ?> </td>
                                        <td> <?php echo $row['mobileno']; ?> </td>
                                        <td> <?php echo $row['address']; ?> </td>
                                        <td> <?php echo $row['city']; ?> </td>
                                        <td> <?php echo $row['state']; ?> </td>
                                        <td> <?php echo $row['pincode']; ?> </td>
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
            window.location.href = 'viewpage.php';
        })
    });
</script>
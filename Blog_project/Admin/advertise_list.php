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

<div class="content-body text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Advertise </h4>
                        <button class="btn btn-dark" id="addbtn">Add</button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Sub Category</th>
                                    <th>Image</th>
                                    <th>Heading Text</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "SELECT admin_adverties.id, admin_adverties.image, admin_adverties.heading, admin_subcategory.subcategory FROM admin_adverties 
                                LEFT JOIN admin_subcategory ON admin_subcategory.id=admin_adverties.subcategory";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td class="subcategory"> <?php echo $row['subcategory']; ?> </td>
                                        <td>
                                            <img src="<?= BASE_URL ?>assets/images/product/adverties-images/<?php echo $row['image']; ?>" alt="image" style="width: 100px; height: 100px;" class="images">
                                            <input type="hidden" class="image" id="image" name="image" value="<?php echo $row['image']; ?>">
                                        </td>
                                        <td class="heading"> <?php echo $row['heading']; ?> </td>
                                        <td>
                                            <i class="fas fa-edit editbtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"></i> &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-trash-alt deletebtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"></i>
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
            window.location.href = "<?= BASE_URL ?>admin/addadvertise.php";
        })

        $('.editbtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);
            window.location.href = "<?= BASE_URL ?>admin/editadvertise.php?id=" + id;
        })

        $('.deletebtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);

            let image = $('.image').val();
            console.log(image);

            var settings = {
                "url": "<?= BASE_URL ?>controller/Adverties.php?type=deleteadvertise",
                "method": "POST",
                "data": {
                    id: id,
                    image: image
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
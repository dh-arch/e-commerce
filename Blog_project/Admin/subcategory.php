<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<style>
    .card-title {
        cursor: pointer;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Sub Category </h4>
                        <button class="btn btn-dark addsubcartegory"> Add </button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "SELECT admin_subcategory.id, admin_subcategory.subcategory, admin_category.category, admin_subcategory.image FROM admin_subcategory 
                                LEFT JOIN admin_category ON admin_category.id = admin_subcategory.category";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td>
                                            <img src="<?= BASE_URL ?>assets/images/product/subcategory-images/<?php echo $row['image']; ?>" style="width: 100px; height: 100px;">
                                            <p class="img d-none" id="<?php echo $row['image']; ?>"> <?php echo $row['image']; ?> </p>
                                        </td>
                                        <td class="category" id="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?> </td>
                                        <td class="subcategory" id="<?php echo $row['subcategory']; ?>"> <?php echo $row['subcategory']; ?> </td>
                                        <td>
                                            <i class="fas fa-edit editbtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"></i> &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-trash-alt deletebtn" id="<?php echo $row['id']; ?>" style="cursor: pointer;"></i>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
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

        $('.addsubcartegory').click(function() {
            window.location.href = "<?= BASE_URL ?>admin/addsubcategory.php";
        })

        $('.editbtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);

            window.location.href = "<?= BASE_URL ?>admin/editsubcategory.php?id=" + id;
        })

        $('.deletebtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);
            let image = $('.img').attr('id');
            console.log(image);
            let category = $('.category').attr('id');
            console.log(category);
            let subcategory = $('.subcategory').attr('id');
            console.log(subcategory);

            var settings = {
                "url": "<?= BASE_URL ?>controller/Color.php?type=deletesubcategory",
                "method": "POST",
                "data": {
                    id: id,
                    category: category,
                    subcategory: subcategory,
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
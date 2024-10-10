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
                        <h4 class="card-title"> Category </h4>
                        <button class="btn btn-dark addcartegory"> Add </button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark"> 
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $sql = "select * from `admin_category`";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="text-center">
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td>
                                            <img src="<?= BASE_URL ?>assets/images/product/category-images/<?php echo $row['image']; ?>" alt="image" style="width: 100px; height: 100px;" class="images">
                                            <input type="hidden" value="<?php echo $row['image']; ?>" class="image">
                                        </td>
                                        <td class="category"> <?php echo $row['category']; ?> </td>
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

        $('.addcartegory').click(function() {
            window.location.href = "<?= BASE_URL ?>admin/addcategory.php";
        })

        $('.editbtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);
            window.location.href = "<?= BASE_URL ?>admin/editcategory.php?id=" + id;
        })

        $('.deletebtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);
            let category = $('.category').val();
            console.log(category);
            let image = $('.image').val();
            console.log(image);

            var settings = {
                "url": "<?= BASE_URL ?>controller/Color.php?type=deletecategory",
                "method": "POST",
                "data": {
                    id: id,
                    category: category,
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
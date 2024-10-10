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
                        <h4 class="card-title"> <span> <a class="backbtn"> Advertise </a> </span> / Edit Advertise </h4>
                    </div>
                    <div class="container " id="element" style="max-width: 723px; margin: 40px auto 40px auto;">
                        <form id="addEditAdvertiseData" class="d-grid" style="padding: 25px; box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <div class="container col-12  table-responsive  ">
                                <div class="col-11 m-auto">
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = "select * from admin_adverties where id = '$id'";
                                    // $sql = "SELECT  admin_subcategory.subcategory, admin_adverties.image, admin_adverties.heading FROM admin_adverties INNER JOIN admin_subcategory ON admin_adverties.subcategory = admin_subcategory.id WHERE admin_adverties.id = '$id'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <input type="hidden" class="id" id="id" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group error subcategory" id="subcategory">
                                            <label style="font-weight: bold;"> Sub Category </label>
                                            <select class="form-control subcategory" id="subcategory" name="subcategory">
                                                <option class="category" name="category"> <?php echo $row['subcategory']; ?> </option>
                                                <?php
                                                $subcategorysql = "select * from `admin_subcategory` ";
                                                $subcategoryresult = mysqli_query($con, $subcategorysql);
                                                while ($subcategoryrow = mysqli_fetch_assoc($subcategoryresult)) {
                                                ?>
                                                    <option value="<?php echo $subcategoryrow['id']; ?>"> <?php echo $subcategoryrow['subcategory']; ?> </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group error">
                                            <label style="font-weight: bold;"> Image </label>
                                            <input type="file" name="uploadfile" class="form-control images" id="images">
                                            <input type="hidden" class="image" id="image" name="image" value="<?php echo $row['image']; ?>" >
                                        </div>
                                        <div class="form-group error">
                                            <label style="font-weight: bold;"> Heading Text </label>
                                            <input type="text" name="heading" class="form-control heading" id="heading" value="<?php echo $row['heading']; ?>" placeholder="Enter Heading Text">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-3 m-auto " style="padding: 30px 0 20px 0;">
                                <button class="btn btn-dark editadvertise" style=" width: 10rem; height: 40px; border: none;"> Change </button>
                            </div>
                        </form>
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
            window.location.href = '<?= BASE_URL ?>Admin/advertise_list.php';
        });

        $('#addEditAdvertiseData').validate({
            rules: {
                category: "required",
                uploadfile: "required",
                heading: "required",
            },
            messages: {
                category: "Subcategory is required",
                uploadfile: "Image is required",
                heading: "Heading Text is required",
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                let id = $('.id').val();
                console.log(id);
                let category = $('.category').val();
                console.log(category);
                let images = document.getElementById('images').files;
                console.log(images);
                let image = $('.image').val();
                console.log(image);
                let heading = $('.heading').val();
                console.log(heading);

                let formData = $("#addEditAdvertiseData").serialize();
                console.log(formData);

                let formdata = new FormData(form);
                console.log(formdata);

                var settings = {
                    "url": '<?= BASE_URL ?>controller/Adverties.php?type=editadvertise',
                    "method": "POST",
                    contentType: false,
                    processData: false,
                    "data": formdata
                };

                $.ajax(settings).done(function(response) {
                    response = JSON.parse(response);
                    if (response.error == true) {
                        toastr.error(response.message, 'Error');
                    } else {
                        toastr.success(response.message, 'Success');
                    }
                });

            }
        });
    })
</script>
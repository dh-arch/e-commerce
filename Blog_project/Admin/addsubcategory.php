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
                        <h4 class="card-title"> <span> <a class="backbtn"> Sub Category </a> </span> / Add Sub Category </h4>
                    </div>
                    <div class="container " id="element" style="max-width: 723px; margin: 40px auto 40px auto;">
                        <form id="addSubCategoryData" class="d-grid" style="padding: 25px; box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <div class="container col-12  table-responsive  d-flex">
                                <div class="col-11 m-auto">
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Category</label>
                                        <select class="form-control category" id="category" name="category">
                                            <option> Select Category </option>
                                            <?php
                                            $sql = "select * from `admin_category`";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['category']; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Sub Category</label>
                                        <input type="text" name="subcategory" class="form-control subcategory" id="subcategory" placeholder="Enter Sub Category">
                                    </div>
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Image </label>
                                        <input type="file" name="uploadfile" class="form-control images" id="images" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 m-auto " style="padding: 30px 0 20px 0;">
                                <button class="btn btn-dark addsubcategory" style=" width: 10rem; height: 40px; border: none;"> Save </button>
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
            window.location.href = '<?= BASE_URL ?>Admin/subcategory.php';
        });

        // $('.addsubcategory').click(function() {
        //     $('#addSubCategoryData').submit(function(e) {
        //         e.preventDefault();
        //         let category = $('#category').val();
        //         console.log(category);
        //         let subcategory = $('#subcategory').val();
        //         console.log(subcategory);
        //     });
        // });


        $('#addSubCategoryData').validate({
            rules: {
                category: "required",
                subcategory: "required",
            },
            messages: {
                category: "Category is required",
                subcategory: "Sub Category is required",
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
            },
            submitHandler: function(form, e) { 
                e.preventDefault();

                let category = $('#category').val();
                console.log(category);
                let subcategory = $('#subcategory').val();
                console.log(subcategory);
                let images= document.getElementById('images').files;
                console.log(images);

                let formData = $("#addCategoryData").serialize();
                console.log(formData);

                let formdata = new FormData(form);
                console.log(formdata);

                var settings = {
                    "url": '<?= BASE_URL ?>controller/Color.php?type=addsubcategory',
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
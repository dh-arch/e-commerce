<?php
include 'include/header.php';
include 'include/sidebar.php';
?>


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
                        <h4 class="card-title"> <span> <a class="backbtn"> Offer Advertise </a> </span> / Add Offer Advertise </h4>
                    </div>
                    <div class="container " id="element" style="max-width: 723px; margin: 40px auto 40px auto;">
                        <form id="addOfferAdvertiseData" class="d-grid" style="padding: 25px; box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <div class="container col-12  table-responsive  d-flex">
                                <div class="col-11 m-auto">
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Category</label>
                                        <select class="form-control subcategory" id="subcategory" name="subcategory" required>
                                            <option> Select category </option>
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
                                        <label style="font-weight: bold;"> Image </label>
                                        <input type="file" name="uploadfile" class="form-control images" id="images">
                                    </div>
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Heading </label>
                                        <input type="text" name="heading" class="form-control heading" id="heading" placeholder="Enter Heading ">
                                    </div>
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> SubHeading </label>
                                        <input type="text" name="subheading" class="form-control subheading" id="subheading" placeholder="Enter SubHeading ">
                                    </div>
                                    <div class="form-group error">
                                        <label style="font-weight: bold;"> Link </label>
                                        <input type="text" name="link" class="form-control link" id="link" placeholder="Enter Link ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 m-auto " style="padding: 30px 0 20px 0;">
                                <button class="btn btn-dark addofferadvertise" style=" width: 10rem; height: 40px; border: none;"> Save </button>
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
            window.location.href = '<?= BASE_URL ?>Admin/offeradverties_list.php';
        });

        $('#addOfferAdvertiseData').validate({
            rules: {
                category: "required",
                uploadfile: "required",
                heading: "required",
                subheading: "required",
                link: "required",
            },
            messages: {
                category: "Category is required",
                uploadfile: "Image is required",
                heading: "Heading is required",
                subheading: "SubHeading is required",
                link: "Link is required",
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                let category = $('.category').val();
                console.log(category);

                let image = document.getElementById('images').files;
                console.log(image);

                let heading = $('#heading').val();
                console.log(heading);

                let formData = $("#addOfferAdvertiseData").serialize();
                console.log(formData);

                let formdata = new FormData(form);
                console.log(formdata);

                var settings = {
                    "url": '<?= BASE_URL ?>controller/OfferAdverties.php?type=addofferadvertise',
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



<?php
include 'include/footer.php';
?>
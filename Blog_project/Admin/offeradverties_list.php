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
                        <h4 class="card-title"> Offer Advertise </h4>
                        <button class="btn btn-dark" id="addbtn">Add</button>
                    </div>
                    <div class="container table-responsive py-5">
                        <table class="table table-bordered  producttable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>SR.No</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Subheading</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">

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
            window.location.href = "<?= BASE_URL ?>admin/addofferadvertise.php";
        })

        $('.editbtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);
            window.location.href = "<?= BASE_URL ?>admin/editofferadvertise.php?id=" + id;
        })

        $('.deletebtn').click(function() {
            let id = $(this).attr('id');
            console.log(id);

            let image = $('.image').val();
            console.log(image);

            var settings = {
                "url": "<?= BASE_URL ?>controller/OfferAdverties.php?type=deleteofferadvertise",
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
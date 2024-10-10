<?php
    include ('./includes/header.php');
    include('./includes/sidebar.php');
?>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

<!--            <div class="unix-login">-->
<!--                <div class="container-fluid">-->
                    <div class="row align-items-center card">
                        <div class="col-lg-6">
                            <div class="login-content">
                                <div class="login-form">
                                    <div class="card-header">
                                        <h4>Change Password</h4>
                                    </div>
                                    <form id="resetPassword" class="card-body">
                                        <div class="form-group error">
                                            <label>Old Password</label>
                                            <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                        </div>
                                        <div class="form-group error">
                                            <label>New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group error">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>
    <!--*******************
        Content body end
    ********************-->


    <!--**********************************
        Scripts
    ***********************************-->
<?php
    include ('./includes/footer.php');
?>
<script>
    $(document).ready(function () {
        $('#resetPassword').validate({
            rules: {
                old_password: "required",
                new_password: "required",
                confirm_password: "required",
            },
            message: {
                old_password: "Please enter old password",
                new_password: "Please enter new password",
                confirm_password: "Please enter confirm password",
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
            },
            submitHandler: function (form) {
                let n_form = $(form).serialize();
                var settings = {
                    "url": '<?= BASE_URL ?>controller/Dashboard.php?type=changePassword',
                    "method": "POST",
                    "data": n_form
                };

                $.ajax(settings).done(function (response) {
                    response = JSON.parse(response);
                    if (response.error == true) {
                        toastr.error(response.msg, 'Error');
                    } else {
                        toastr.success(response.msg, 'Success');
                        $('#resetPassword')[0].reset();
                    }
                });
            }
        })
    });
</script>

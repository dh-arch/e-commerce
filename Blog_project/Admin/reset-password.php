<?php
    session_start();
    include ('../config/config.php');
    if (!isset($_SESSION['forgotEmail'])) {
        header("Location: forgot-password.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Focus Admin: Widget</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="<?= BASE_URL ?>assets/assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="<?= BASE_URL ?>assets/assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="<?= BASE_URL ?>assets/assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="<?= BASE_URL ?>assets/assets/css/lib/helper.css" rel="stylesheet">
        <link href="<?= BASE_URL ?>assets/assets/css/style.css" rel="stylesheet">
        <link href="<?= BASE_URL ?>assets/assets/css/lib/toastr/toastr.min.css" rel="stylesheet"  />
    </head>

    <body class="bg-primary">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="<?= BASE_URL ?>admin"><span>Focus</span></a>
                            </div>
                            <div class="login-form">
                                <h4>Reset Password</h4>
                                <form id="forgotPassword">
                                    <div class="form-group error">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="form-group error">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                                    <div class="register-link text-center">
                                        <p>Back to <a href="<?= BASE_URL ?>admin/login.php"> Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
            Scripts
        ***********************************-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="<?= BASE_URL ?>assets/assets/js/lib/form-validation/jquery.validate.min.js"></script>
        <script src="<?= BASE_URL ?>assets/assets/js/lib/toastr/toastr.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#forgotPassword').validate({
                    rules: {
                        new_password: "required",
                        confirm_password: "required",
                    },
                    message: {
                        new_password: "Please enter new password",
                        confirm_password: "Please enter confirm password",
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
                    },
                    submitHandler: function (form) {
                        let n_form = $(form).serialize();
                        var settings = {
                            "url": '<?= BASE_URL ?>controller/Login.php?type=forgotPassword',
                            "method": "POST",
                            "data": n_form
                        };

                        $.ajax(settings).done(function (response) {
                            response = JSON.parse(response);
                            if (response.error == true) {
                                toastr.error(response.msg, 'Error');
                            } else {
                                toastr.success(response.msg, 'Success');
                                setTimeout(() => {
                                    window.location.href = '<?= BASE_URL ?>admin';
                                }, 2000);
                            }
                        });
                    }
                })
            });
        </script>

    </body>

</html>
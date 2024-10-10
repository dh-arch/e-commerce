<?php
session_start();
include ('../config/config.php');
if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/images/favicon.png">
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/assets/css/lib/toastr/toastr.min.css" rel="stylesheet" />

</head> 

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="loginForm">
                                        <div class="form-group error">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control email">
                                        </div>
                                        <div class="form-group error">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="./forgot-password.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary btn-block" value="Sign me in" />
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="#">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/global/global.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/quixnav-init.js"></script>
    <script src="<?= BASE_URL ?>assets/js/custom.min.js"></script>
    <script src="<?= BASE_URL ?>assets/assets/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="<?= BASE_URL ?>assets/assets/js/lib/toastr/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').validate({
                rules: { 
                    email: {
                        required: true,
                        email: true
                    },
                    password: "required"
                },
                message: {
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email"
                    },
                    password: "Please enter password"
                },
                errorPlacement: function (error, element) {
                    error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
                },
                submitHandler: function (form) {

                    let email = $('.email').val();
                    console.log(email);
                    let password = $('.password').val();
                    console.log(password);
                    
                    let n_form = $(form).serialize();
                    console.log(n_form);
                    
                    var settings = {
                        "url": '<?= BASE_URL ?>controller/Login.php?type=login',
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
<?php
include 'connection.php';
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <style>
        .error {
            color: 'red';
        }
    </style>
</head>

<body>

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0 wow animate__animated animate__fadeIn" id="">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/logo.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Verify your email</p>
                            <form id="emailverify">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <input name="verifyemail" id="verifyemail" class="verifyemail btn-block login-btn mb-4" type="submit" value="Continue">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


    <script>
        $(document).ready(() => {
            new WOW().init();

            $('#emailverify').validate({
                rules: {
                    email: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: 'email is require',
                    },
                },
                submitHandler: function(form) {
                    let email = $('#email').val();
                    console.log(email);

                    $.ajax({
                        url: 'verifyemailphp.php',
                        type: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        dataType: 'json',
                        data: {
                            email: email
                        },
                        success: function(data) {
                            if (data.error == 'true') {
                                document.getElementById('errormess').innerHTML = data.message;
                            } else {
                                if (data.token) {
                                    localStorage.setItem('otptoken', data.token);
                                    window.location.href = "http://localhost/feane-1.0.0/userform/verifyotp.php";
                                }
                            }
                        }
                    })
                }
            });

            // $('#verifybtn').click((e)=>{
            //     e.preventDefault();
            //     let email= $('#email').val();
            //     console.log(email);

            //     if(email == ''){
            //         $('#errormess').html('email is required');
            //     }
            //     else{
            //         $.ajax({
            //             url: 'verifyemailphp.php',
            //             type: 'POST',
            //             headers: { 
            //                 'Content-Type': 'application/x-www-form-urlencoded'
            //             },
            //             dataType: 'json',
            //             data: {email: email},
            //             success:function(data){
            //                 if(data.error == 'true'){
            //                     document.getElementById('errormess').innerHTML = data.message;
            //                 }
            //                 else{
            //                     if(data.token){
            //                         localStorage.setItem('otptoken', data.token);
            //                         window.location.href="http://localhost/tailwindcss/login/verifyotp.php";
            //                     }
            //                 }
            //             }
            //         })
            //     }
            // })
        })
    </script>
</body>

</html>
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
                            <p class="login-card-description"> Change your password </p>
                            <form id="passwordverify">
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="conpassword" class="sr-only">confirm Password</label>
                                    <input type="password" name="conpassword" id="conpassword" class="form-control" placeholder="***********">
                                </div>
                                <input name="verifypassword" id="verifypassword" class="verifypassword btn-block login-btn mb-4" type="submit" value="Reset Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        $(document).ready(() => {
            new WOW().init();

            $('#passwordverify').validate({
                rules: {
                    password: {
                        required: true,
                    },
                    conpassword: {
                        required: true
                    },
                },
                messages: {
                    password: {
                        required: 'password is require',
                    },
                    conpassword: {
                        required: 'confirm password is required',
                    }
                },
                submitHandler: function(form) {
                    let verifytoken = localStorage.getItem('verifytoken');
                    console.log(verifytoken);
                    let password = $('#password').val();
                    console.log(password);
                    let conpassword = $('#conpassword').val();
                    console.log(conpassword);

                    $.ajax({
                        url: 'resetpassphp.php',
                        type: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': verifytoken
                        },
                        dataType: 'json',
                        data: {
                            password: password,
                            conpassword: conpassword
                        },
                        success: (data) => {
                            if (data.error == 'true') {
                                document.getElementById('errormess').innerHTML = data.message;
                            } else {
                                window.location.href = "http://localhost/feane-1.0.0/userform/login.php";

                            }
                        }
                    })
                }
            })

        })
    </script>

</body>

</html>
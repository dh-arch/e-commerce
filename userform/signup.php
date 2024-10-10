<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <style>
        .error {
            color: red;
            left: 3px;
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
                            <p class="login-card-description">Sign into your account</p>
                            <form id="signupform">
                                <div class="form-group">
                                    <label for="firstname" class="sr-only">First Name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="firstname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="sr-only">Last Name</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group">
                                    <label for="mobileno" class="sr-only">Mobile No</label>
                                    <input type="text" name="mobileno" id="mobileno" class="form-control" placeholder="mobileno">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <input name="signup" id="signup" class="btn btn-block login-btn mb-4" type="submit" value="signup">
                            </form>
                            <p class="login-card-footer-text"> Already have an account? <a href="#!" class="text-reset" id="loginbtn">Login here</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


    <script>
        $(document).ready(function() {

            new WOW().init();

            $('#loginbtn').click(function() {
                window.location.href = "http://localhost/feane-1.0.0/userform/login.php";
            })

            $('#signupform').validate({
                rules: {
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    email: {
                        required: true,
                    },
                    mobileno: {
                        required: true,
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    firstname: {
                        required: 'enter your firstname'
                    },
                    lastname: {
                        required: 'enter your lastname'
                    },
                    email: {
                        required: 'email is require',
                    },
                    mobileno: {
                        required: 'enter your mobileno',
                    },
                    password: {
                        required: 'password is required',
                    }
                },
                submitHandler: function(form) {
                    let firstname = $('#firstname').val();
                    console.log(firstname);

                    let lastname = $('#lastname').val();
                    console.log(lastname);

                    let email = $('#email').val();
                    console.log(email);

                    let mobileno = $('#mobileno').val();
                    console.log(mobileno);

                    let password = $('#password').val();
                    console.log(password);

                    // let signupform = $('#signup').serialize();
                    // console.log(signupform);

                    $.ajax({
                        url: 'signupajax.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            firstname: firstname,
                            lastname: lastname,
                            email: email,
                            mobileno: mobileno,
                            password: password
                        },
                        success: function(data) {
                            // console.log(data);
                            if (data.error == 'true') {
                                console.log(data.messages);
                                document.getElementById('errormess').innerHTML = data.message;
                            } else {
                                window.location.href = "http://localhost/feane-1.0.0/userform/login.php";
                                // $('#errormess').html(data.message).slideDown();
                            }
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>
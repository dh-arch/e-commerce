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
              <form id="loginform">
                <div class="form-group"> 
                  <p id='errormess' class='text-red-800 text-md'></p>
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                </div>

                <div class="form-group mb-4">
                  <p id='errormess' class='text-red-800 text-md'></p>
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>

                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
              </form>
              <a href="#!" id="verifyemail" class="forgot-password-link">Forgot password?</a>
              <p class="login-card-footer-text">Don't have an account? <a href="#!" id="signupbtn" class="text-reset">Register here</a></p>
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

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

  <script>
    new WOW().init();

    $(document).ready(function() {
      $('#signupbtn').click(function() {
        window.location.href = "http://localhost/feane-1.0.0/userform/signup.php";
      })

      $('#verifyemail').click(function() {
        window.location.href = "http://localhost/feane-1.0.0/userform/verifyemail.php";
      })

      // $('#login').parsley();

      $('#loginform').validate({
        rules: {
          email: {
            required: true,
          },
          password: {
            required: true,
          }
        },
        messages: {
          email: {
            required: 'email is require',
          },
          password: {
            required: 'password is required',
          }
        },
        submitHandler: function(form) {
          let email = $('#email').val();
          console.log(email);
          let password = $('#password').val();
          console.log(password);

          $.ajax({
            url: 'loginajax.php',
            type: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            dataType: 'json',
            data: {
              email: email,
              password: password
            },
            success: function(data) {
              if (data.error == 'true') {
                alert(data.messages);
                // document.getElementById('errormess').innerHTML = data.message;
              } else {
                if (data.token) {
                  localStorage.setItem('jwt_token', data.token);
                  window.location.href = "http://localhost/feane-1.0.0/index.php";
                  $("#logout").css({
                    "display": "inline"
                  });
                }
              }
            }
          })
        }
      })
    })
  </script>
</body>

</html>
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
                            <p class="login-card-description"> Otp verify </p>
                            <form id="otpverify">
                                <div class="form-group">
                                    <label for="otp" class="sr-only">Otp</label>
                                    <input type="text" name="otp" id="otp" class="form-control" placeholder="otp">
                                </div>
                                <input name="verifyotp" id="verifyotp" class="verifyotp btn-block login-btn mb-4" type="submit" value="Verify Otp">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('otp-form')
            const inputs = [...form.querySelectorAll('input[type=text]')]
            // const submit = form.querySelector('button[type=submit]')

            const handleKeyDown = (e) => {
                if (
                    !/^[0-9]{1}$/.test(e.key) &&
                    e.key !== 'Backspace' &&
                    e.key !== 'Delete' &&
                    e.key !== 'Tab' &&
                    !e.metaKey
                ) {
                    e.preventDefault()
                }

                if (e.key === 'Delete' || e.key === 'Backspace') {
                    const index = inputs.indexOf(e.target);
                    if (index > 0) {
                        inputs[index - 1].value = '';
                        inputs[index - 1].focus();
                    }
                }
            }

            const handleInput = (e) => {
                const {
                    target
                } = e
                const index = inputs.indexOf(target)
                if (target.value) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus()
                    } else {
                        // submit.focus()
                    }
                }
            }

            const handleFocus = (e) => {
                e.target.select()
            }

            const handlePaste = (e) => {
                e.preventDefault()
                const text = e.clipboardData.getData('text')
                if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                    return
                }
                const digits = text.split('')
                inputs.forEach((input, index) => input.value = digits[index])
                // submit.focus()
            }

            inputs.forEach((input) => {
                input.addEventListener('input', handleInput)
                input.addEventListener('keydown', handleKeyDown)
                input.addEventListener('focus', handleFocus)
                input.addEventListener('paste', handlePaste)
            })
        })
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        $(document).ready(() => {
            new WOW().init();

            $('#otpverify').validate({
                rules: {
                    otp: {
                        required: true,
                    },
                },
                messages: {
                    otp: {
                        required: 'otp is require',
                    },
                },
                submitHandler: function(form) {
                    let otp = $('#otp').val();
                    console.log(otp);

                    let otptoken = localStorage.getItem('otptoken');
                    console.log(otptoken);

                    $.ajax({ 
                        url: 'verifyotpphp.php',
                        type: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': otptoken
                        },
                        dataType: 'json',
                        data: {
                            otp: otp
                        },
                        success: function(data) {
                            if (data.error == 'true') {
                                document.getElementById('errormess').innerHTML = data.message;
                            } else {
                                if (data.verifytoken) {
                                    localStorage.setItem('verifytoken', data.verifytoken);
                                    window.location.href = "http://localhost/feane-1.0.0/userform/resetpass.php";
                                }
                            }
                        }
                    })
                }
            })

            // $('#verifybtn').click((e)=>{
            //     e.preventDefault();
            //     let otp= $('#otp').val();
            //     console.log(otp);

            //     let otptoken= localStorage.getItem('otptoken');
            //     console.log(otptoken);

            //     if(otp == ''){
            //         $('#errormess').html('otp is required');
            //     }
            //     else{
            //         $.ajax({
            //             url: 'verifyotpphp.php',
            //             type: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/x-www-form-urlencoded',
            //                 'Authorization': otptoken
            //             },
            //             dataType: 'json',
            //             data: {otp: otp},
            //             success:function(data){
            //                 if(data.error == 'true'){
            //                     document.getElementById('errormess').innerHTML = data.message;
            //                 }else{
            //                     if(data.verifytoken){
            //                         localStorage.setItem('verifytoken', data.verifytoken);
            //                         window.location.href="http://localhost/tailwindcss/login/resetpass.php";
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
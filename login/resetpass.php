
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <style>
        .error{
            color: 'red';
        }
    </style>
</head>
<body>
    <!-- <div class="col col-12 flex justify-center align-center mt-56">
        <form class="grid justify-items-stretch" id="verifyform"> 
            <div class="my-4 form-input border-b-2 border-slate-600 w-72 ">
                <i class="fa-solid fa-envelope text-orange-400"></i>
                <input class="px-2 form-control " type="password" id="password" name="password" placeholder="enter new password">
            </div>
            <div class="my-4 form-input border-b-2 border-slate-600 w-72 ">
                <i class="fa-solid fa-envelope text-orange-400"></i>
                <input class="px-2 form-control " type="password" id="conpassword" name="conpassword" placeholder="enter confirm password">
            </div>
            <button id="passwordbtn" name="password" class="justify-self-center px-10 py-2 mt-3 text-white rounded bg-orange-400 hover:translate-y-2">Continue</button>
        </form>
    </div> -->

    <div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow-lg mt-56 wow animate__animated animate__fadeIn">
        <header class="mb-8">
            <h1 class="text-2xl font-bold mb-1">Change Password</h1>
        </header>
        <form id="verifyform">
            <p id='errormess' class='text-red-500 text-md'></p>
            <div class="flex items-center justify-center gap-3" >
                <input class="px-2 form-control border border-1 w-64 h-9 rounded-md" type="password" id="password" class="password" name="password" placeholder="enter new password">
            </div>
 
            <p id='errormess' class='text-red-500 text-md'></p>
            <div class="flex items-center justify-center gap-3" >
                <input class="px-2 form-control border border-1 w-64 h-9 rounded-md mt-4" type="password" id="conpassword" class="conpassword" name="conpassword" placeholder="enter confirm password">
            </div>

            <div class="max-w-[260px] mx-auto mt-4"> 
                <button id="passwordbtn" name="password"
                    class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-orange-400 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm  focus:outline-none focus:ring  focus-visible:outline-none focus-visible:ring transition-colors duration-150">Reset Password</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

    <script>

        $(document).ready(()=>{

            $('#verifyform').validate({
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
                submitHandler: function(form){
                    let verifytoken= localStorage.getItem('verifytoken');
                    console.log(verifytoken);
                    let password= $('#password').val();
                    console.log(password);
                    let conpassword= $('#conpassword').val();
                    console.log(conpassword);

                    $.ajax({
                        url: 'resetpassphp.php',
                        type: 'POST',
                        headers: {
                            'Content-Type' : 'application/x-www-form-urlencoded',
                            'Authorization': verifytoken
                        },
                        dataType: 'json',
                        data: {
                            password: password,
                            conpassword: conpassword
                        },
                        success: (data)=>{
                            if(data.error == 'true'){
                                document.getElementById('errormess').innerHTML = data.message;
                            }
                            else{
                                window.location.href='http://localhost/tailwindcss/login/login.php';
                            }
                        }
                    })
                }
            })

            // $('#passwordbtn').click((e)=>{
            //     e.preventDefault();

            //     let verifytoken= localStorage.getItem('verifytoken');
            //     console.log(verifytoken);
            //     let password= $('#password').val();
            //     console.log(password);
            //     let conpassword= $('#conpassword').val();
            //     console.log(conpassword);

            //     if(password == '' && conpassword == ''){
            //         $('#errormess').html('password is required');
            //     }
            //     else{
            //         $.ajax({
            //             url: 'resetpassphp.php',
            //             type: 'POST',
            //             headers: {
            //                 'Content-Type' : 'application/x-www-form-urlencoded',
            //                 'Authorization': verifytoken
            //             },
            //             dataType: 'json',
            //             data: {
            //                 password: password,
            //                 conpassword: conpassword
            //             },
            //             success: (data)=>{
            //                 if(data.error == 'true'){
            //                     document.getElementById('errormess').innerHTML = data.message;
            //                 }
            //                 else{
            //                     window.location.href='http://localhost/tailwindcss/login/login.php';
            //                 }
            //             }
            //         })
            //     }
            // })
        })
    </script>

</body>
</html>
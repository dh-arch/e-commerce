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
<body >
<!-- <div class="grid justify-items-stretch justify-items-center items-center h-full w-full fixed z-10 top-0 overflow-y-hidden bg-white">
    <div class="col col-12 flex justify-items-center items-center ">
        <form class="grid justify-items-stretch" id="verifyform" data-parsley-validate>
            <div class="my-4 form-input border-b-2 border-slate-600 w-72 ">
                <i class="fa-solid fa-envelope text-orange-400"></i>
                <input class="px-2 form-control " type="email" id="email" name="email" placeholder="enter email" required data-parsley-type="email">
            </div>
            <button id="verifybtn" name="verifyemail" class="justify-self-center px-10 py-2 mt-3 text-white rounded bg-orange-400 hover:translate-y-2">Continue</button>
        </form>
    </div>
</div> -->

<div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow-lg mt-60 wow animate__animated animate__fadeIn ">
    <header class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Email Verification</h1>
    </header>
    <form id="verifyform" data-parsley-validate>

        <p id='errormess' class='text-red-500 text-md'></p>
        <div class="flex items-center justify-center gap-3">
            <input class="px-2 form-control border border-1 w-64 h-9 rounded-md" type="email" id="email" name="email" placeholder="enter email" required data-parsley-type="email">
        </div>
        
        <div class="max-w-[260px] mx-auto mt-4">
            <button id="verifybtn" name="verifyemail"
                class="w-full inline-flex justify-center whitespace-nowrap rounded-lg px-3.5 py-2.5 text-sm font-medium text-white bg-orange-400 focus:outline-none focus:ring focus:ring-indigo-300 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150">Continue</button>
        </div>
    </form>
</div> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


<script>
    $(document).ready(()=>{
        new WOW().init();

        $('#verifyform').validate({ 
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
            submitHandler: function(form){
                let email= $('#email').val();
                console.log(email);

                $.ajax({
                    url: 'verifyemailphp.php',
                    type: 'POST',
                    headers: { 
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    dataType: 'json',
                    data: {email: email},
                    success:function(data){
                        if(data.error == 'true'){
                            document.getElementById('errormess').innerHTML = data.message;
                        }
                        else{
                            if(data.token){
                                localStorage.setItem('otptoken', data.token);
                                window.location.href="http://localhost/tailwindcss/login/verifyotp.php";
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
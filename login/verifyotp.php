

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
    <!-- <div class="col col-12 flex justify-items-center items-center ">
        <form class="grid justify-items-stretch" id="verifyform">
            <div class="my-4 form-input border-b-2 border-slate-600 w-72 ">
                <i class="fa-solid fa-envelope text-orange-400"></i>
                <input class="px-2 form-control " type="otp" id="otp" name="otp" placeholder="enter otp">
            </div>
            <button id="verifybtn" name="verifyotp" class="justify-self-center px-10 py-2 mt-3 text-white rounded bg-orange-400 hover:translate-y-2">Continue</button>
        </form>
    </div> -->

<div class="max-w-md mx-auto text-center bg-white px-4 sm:px-8 py-10 rounded-xl shadow-lg mt-56 wow animate__animated animate__fadeIn">
    <header class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Otp Verification</h1>
    </header>
    <form id="otp-form">

        <p id='errormess' class='text-red-500 text-md'></p>
        <div class="flex items-center justify-center gap-3" >
        <input class="px-2 form-control border border-1 w-64 h-9 rounded-md" type="text" id="otp" name="otp" placeholder="enter otp" required>

            <!-- <input
                type="text"
                class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                maxlength="1" />
            <input
                type="text"
                class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                maxlength="1" />
            <input
                type="text"
                class="w-14 h-14 text-center text-2xl font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:ring-2 focus:ring-indigo-100"
                maxlength="1" /> -->
            
        </div>

        <div class="max-w-[260px] mx-auto mt-4">
            <button id="verifybtn" name="verifyotp"
                class="w-full inline-flex justify-center whitespace-nowrap rounded-lg bg-orange-400 px-3.5 py-2.5 text-sm font-medium text-white shadow-sm  focus:outline-none focus:ring  focus-visible:outline-none focus-visible:ring transition-colors duration-150">Verify
                Otp</button>
        </div>
    </form>
    <div class="text-sm text-slate-500 mt-4">Didn't receive code? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">Resend</a></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('otp-form')
        const inputs = [...form.querySelectorAll('input[type=text]')]
        // const submit = form.querySelector('button[type=submit]')

        const handleKeyDown = (e) => {
            if (
                !/^[0-9]{1}$/.test(e.key)
                && e.key !== 'Backspace'
                && e.key !== 'Delete'
                && e.key !== 'Tab'
                && !e.metaKey
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
            const { target } = e
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
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


<script>
    $(document).ready(()=>{

        $('#otp-form').validate({
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
            submitHandler: function(form){
                let otp= $('#otp').val();
                console.log(otp);

                let otptoken= localStorage.getItem('otptoken');
                console.log(otptoken);

                $.ajax({
                    url: 'verifyotpphp.php',
                    type: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': otptoken
                    },
                    dataType: 'json',
                    data: {otp: otp},
                    success:function(data){
                        if(data.error == 'true'){
                            document.getElementById('errormess').innerHTML = data.message;
                        }else{
                            if(data.verifytoken){
                                localStorage.setItem('verifytoken', data.verifytoken);
                                window.location.href="http://localhost/tailwindcss/login/resetpass.php";
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
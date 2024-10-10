
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs/src/parsley.css">

    <link rel="stylesheet" href="signup.css" />

    <style>
        .error{
            color: red;
            left: 3px;
        }
    </style>
</head>

    <div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='bx bx-mail-send'></i>
							<input type="email" placeholder="Email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Password">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Confirm password">
						</div>
						<button>
							Sign up
						</button>
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
				</div>
			
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
						<div class="input-group">
							<i class='bx bxs-user'></i>
							<input type="text" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Password">
						</div>
						<button>
							Sign in
						</button>
						<p>
							<b>
								Forgot password?
							</b>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
		
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome
					</h2>
	
				</div>
				<div class="img sign-in">
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Join with us
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>


    <!-- login form -->
    <!-- <div class="grid justify-items-stretch justify-items-center items-center h-full w-full fixed z-10 top-0 overflow-y-hidden bg-white wow animate__animated animate__fadeIn "
        id="loginform" >
        <div class="fixed grid justify-items-stretch justify-self-center">
            <svg class="justify-self-center h-32 w-32" xmlns="http://www.w3.org/2000/svg" width="532" height="532"
                viewBox="0 0 532 532" xmlns:xlink="http://www.w3.org/1999/xlink">
                <polygon points="379.19 379.04999 246.19 379.04999 246.19 199.04999 361.19 262.04999 379.19 379.04999"
                    fill="#2f2e41" />
                <circle cx="270.76004" cy="260.93216" r="86.34897" fill="#ffb6b6" />
                <polygon
                    points="221.19 360.04999 217.28893 320.61639 295.19 306.04999 341.19 418.04999 261.19 510.04999 204.19 398.04999 221.19 360.04999"
                    fill="#ffb6b6" />
                <path
                    d="m457.03998,451.08997c-.96997,1.01001-1.95996,2.01001-2.94995,3-3.14001,3.14001-6.34003,6.19-9.61005,9.15002-49,44.44-111.87,68.76001-178.47998,68.76001-61.40997,0-119.64001-20.67004-166.75-58.72003-.02997-.02002-.04999-.03998-.08002-.07001-1.42999-1.14996-2.83997-2.32001-4.25-3.51001.25-.71997.52002-1.42999.79004-2.13,15.14996-39.46997,45.07001-58.77997,63.22998-67.22998,9-4.19,15.10999-5.71997,15.10999-5.71997l21.32001-38.40002,15.01001,28,11.06,20.64001,45.38,84.66998,39.15002-97.47998,12.12994-30.22003,3.11005-7.73999,14.78998,11.51001,14,10.89001,28.19,6.21997,22.87,5.04999,31.06,6.86005c12.56,10.22998,20.20001,29.69,24.47003,53.87.15997.85999.31,1.72998.44995,2.59998Z"
                    fill="#f9a826" />
                <path
                    d="m225.33945,162.80316c10.51816-17.66798,29.83585-29.79031,50.31992-31.577,20.48407-1.78667,41.60876,6.80817,55.02692,22.38837,7.99588,9.28423,13.23862,20.65456,21.03256,30.10893,16.77231,20.3455,45.37225,32.2415,52.69913,57.57068,3.19727,11.05298,1.6041,22.85326-.01367,34.24507-1.3866,9.76407-2.77322,19.52817-4.15985,29.29224-1.0791,7.59863-2.11386,15.60931.73538,22.73569,3.34277,8.36084,11.34241,13.83688,16.51462,21.20749,8.80081,12.54153,8.15744,30.90353-1.49963,42.79834-4.18805,5.15848-9.74042,9.04874-14.13116,14.03583s-7.64764,11.80563-5.80865,18.19058c3.52286,12.23126,22.70462,15.16449,24.80847,27.7179,1.07565,6.41818-3.35748,12.82758-9.1658,15.76245s-12.64572,3.02011-19.10587,2.23492c-24.55347-2.98438-47.28705-18.32629-59.24158-39.97961-11.95456-21.65335-12.82504-49.06561-2.26843-71.43384,8.67035-18.37146,24.78519-34.60559,24.60965-54.91949-.09564-11.0668-5.17172-21.4032-10.13535-31.29489-10.15924-20.24577-20.31851-40.49153-30.47775-60.7373-5.44196-10.84496-11.75745-22.53171-22.96112-27.19061-8.65872-3.60063-18.48325-2.20412-27.74442-.73141s-19.07155,2.90622-27.75604-.63181-15.24644-14.04982-11.1087-22.4651"
                    fill="#2f2e41" />
                <path
                    d="m240.47141,163.72575c-16.68272-5.49146-35.39705,3.32417-46.6913,16.77441-11.29425,13.45026-16.77287,30.70596-21.992,47.47588-2.98952,9.60582-5.97903,19.21164-8.96854,28.81747-2.81226,9.03625-5.6245,18.07248-8.43675,27.10873-3.30785,10.62869-6.64275,21.9205-3.92802,32.71591,1.96262,7.8046,7.01262,14.89124,7.12131,22.93808.11353,8.40567-5.15047,15.7851-9.7636,22.81268-4.61311,7.02759-8.94347,15.37701-6.74557,23.49103,3.34306,12.34174,20.502,19.12564,19.56139,31.87747-.3139,4.25571-2.7749,8.19205-2.73022,12.45908.05684,5.42914,4.30745,10.1203,9.2874,12.28336,4.97997,2.16306,10.5818,2.28052,16.01041,2.18506,16.65134-.29279,33.27257-2.27026,49.52779-5.89246,6.25403-1.39359,12.61382-3.10281,17.81967-6.83832s9.0894-9.92447,8.41191-16.29596c-1.05576-9.92862-11.73091-15.56143-17.11801-23.96805-5.29137-8.25723-5.16869-18.71957-7.45038-28.25763-3.13582-13.10846-10.88029-24.55249-16.69402-36.71249-21.85695-45.71606-14.20572-103.98718,18.71225-142.51109,2.91051-3.40616,6.0903-6.83273,7.30457-11.14532,1.21426-4.31261-.35107-9.80727-4.5697-11.31593"
                    fill="#2f2e41" />
                <path
                    d="m454.09003,77.90997C403.84998,27.66998,337.04999,0,266,0S128.15002,27.66998,77.90997,77.90997C27.66998,128.14996,0,194.94995,0,266c0,64.84998,23.04999,126.15997,65.28998,174.56995,4.03003,4.63,8.24005,9.14001,12.62,13.52002,1.03003,1.03003,2.07001,2.06,3.12006,3.06,2.79999,2.71002,5.64996,5.35999,8.54999,7.92999,1.76001,1.57001,3.53998,3.11005,5.33997,4.62,1.41003,1.19,2.82001,2.36005,4.25,3.51001.03003.03003.05005.04999.08002.07001,47.10999,38.04999,105.34003,58.72003,166.75001,58.72003,66.60999,0,129.47998-24.32001,178.47998-68.76001,3.27002-2.96002,6.47003-6.01001,9.61005-9.15002.98999-.98999,1.97998-1.98999,2.94995-3,2.70001-2.77997,5.32001-5.60999,7.88-8.47998,43.37-48.72003,67.07999-110.84003,67.07999-176.60999,0-71.05005-27.66998-137.85004-77.90997-188.09003Zm10.17999,362.21002c-2.5,2.83997-5.06,5.63995-7.67999,8.37-4.08002,4.25-8.29004,8.37-12.64001,12.33997-1.65002,1.52002-3.32001,3-5.01001,4.47003-17.07001,14.84998-36.07001,27.52997-56.56,37.63-7.19,3.54999-14.56,6.77997-22.09998,9.66998-29.29004,11.23999-61.08002,17.40002-94.28003,17.40002-32.03998,0-62.76001-5.74005-91.19-16.24005-11.66998-4.29999-22.95001-9.40997-33.77997-15.25995-1.59003-.86005-3.17004-1.73004-4.74005-2.62006-8.25995-4.67999-16.25-9.78998-23.91998-15.31-5.72998-4.10999-11.28998-8.44-16.65997-13-1.88-1.58997-3.73999-3.19995-5.57001-4.84998-2.98004-2.65002-5.90002-5.38-8.75-8.17999-5.40002-5.28998-10.56-10.79999-15.48999-16.53003C26.09003,391.76996,2,331.64996,2,266,2,120.42999,120.42999,2,266,2s264,118.42999,264,264c0,66.65997-24.83002,127.62-65.72998,174.12Z"
                    fill="#3f3d56" />
            </svg>
            <h4 class="justify-self-center text-2xl pt-4 pb-3 text-gray-500 z-20">Welcome to</h4>
            <form class="grid justify-items-stretch" id="login" >

                <div class="my-4 form-input border-b-2 border-slate-600 w-72 focus:border-none">
                    <p id='errormess' class='text-red-500 text-md'></p>
                    <i class="fa-solid fa-envelope text-orange-400"></i>
                    <input class="px-2 form-control focus:outline-none" type="email" id="email" name="email" placeholder="enter email" required data-parsley-type="email">
                </div>

                <div class="my-4 form-input border-b-2 border-slate-600 w-72 focus:border-none">
                    <p id='errormess' class='text-red-800 text-md'></p>
                    <i class="fa-solid fa-lock text-orange-400"></i>
                    <input class="px-2 form-control focus:outline-none" type="password" id="pwd" name="password" placeholder="enter password" required data-parsley-type="password" data-parsley-minlength="6">
                </div>

                <p class="text-sm">Forgot Password? <a href="#verifyemail" id="verifyemail">Click here</a> </p>

                <button id="loginbtn" name="login" class="justify-self-center px-10 py-2 mt-3 text-white rounded bg-orange-400 hover:translate-y-2">Login</button>

                <div class="mt-3 justify-self-center">
                    <span class="">New member? </span>
                    <a href="#signup" class="cursor-pointer text-orange-400 text-md" id="signupbtn">sign up here</a>
                </div>
            </form>
        </div>
    </div> -->
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>
        
        $(document).ready(function(){
            new WOW().init();
            // $('#close-login').click(function () {
            //     $('#loginform').hide();
            //     $('body').css({ "overflow-y": "auto" });
            //     $('#loginform').css({ "display": "none" });
            // })

            // $('#loginbtn').click(function () {
            //     $('#loginform').hide();
            //     $('body').css({ "overflow-y": "auto"});
            //     $('#loginform').css({ "display": "none" });
            // })
            
            $('#verifyemail').click(function(){
                window.location.href="http://localhost/tailwindcss/login/verifyemail.php";
            })

            $('#signupbtn').click(function(){
                window.location.href="http://localhost/tailwindcss/login/signup.php";
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
                submitHandler: function(form){
                    let email=$('#email').val();
                    console.log(email);
                    let pwd=$('#pwd').val();
                    console.log(pwd); 

                    $.ajax({
                        url:'loginajax.php',
                        type:'POST', 
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        dataType: 'json',
                        data:{email : email, pwd : pwd},
                        success:function(data){
                            if(data.error == 'true'){
                                document.getElementById('errormess').innerHTML = data.message;
                                // $('#errormess').html(data.message);
                            }else{
                                if(data.token){
                                    localStorage.setItem('jwt_token', data.token);
                                    window.location.href="http://localhost/tailwindcss/index.php";
                                    $("#logout").css({"display":"inline"}); 
                                }
                            }
                        }
                    })
                }
            })

            // $("#loginbtn").click(function(e){
            //     e.preventDefault();

            //     let email=$('#email').val();
            //     console.log(email);
            //     let pwd=$('#pwd').val();
            //     console.log(pwd); 
                
            //     if(email === '' && password == ''){
            //         $('#errormess').html('email is required');
            //     }
            //     else{
            //         $.ajax({
            //             url:'loginajax.php',
            //             type:'POST', 
            //             headers: {
            //                 'Content-Type': 'application/x-www-form-urlencoded'
            //             },
            //             dataType: 'json',
            //             data:{email : email, pwd : pwd},
            //             success:function(data){
            //                 if(data.error == 'true'){
            //                     document.getElementById('errormess').innerHTML = data.message;
            //                     // $('#errormess').html(data.message);
            //                 }else{
            //                     if(data.token){
            //                         localStorage.setItem('jwt_token', data.token);
            //                         window.location.href="http://localhost/tailwindcss/index.php";
            //                         $("#logout").css({"display":"inline"}); 
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


<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        /* background: #EBF0F5; */
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
    }

    .checkmark {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        /* display: flex !important; */
        margin: 15px auto;
        border: none !important;
    }

    .text {
        padding: 2rem 3rem 0 3rem;
    }
</style>

<body>
    <div class="container ">
        <div class="card col-5">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <i class="checkmark">✓</i>
            </div>
            <div class="text">
                <h1>Success</h1>
                <p>We received your purchase request;<br /> we'll be in touch shortly!</p>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"> </script>
<script>
    // localStorage.setItem('ordertoken', ordertoken);

    $(document).ready(function() {
        setTimeout(function() {
            // alert('Reloading Page'); 
            // history.go(0);

            // let ordertoken= localStorage.getItem('ordertoken');

            // $.ajax({
            //     url: 'ordertoken.php',
            //     type: 'POST',
            //     headers: {
            //         'Content-Type': 'application/x-www-form-urlencoded',
            //         'Authorization': ordertoken
            //     },
            //     dataType: 'json',
            //     success: function(data){
            //         if(data.error == true) {
            //             console.log(data.message);
            //         }
            //         else{
            //             $unique_id= data.unique_id;
            //         } 
            //     }
            // })
            window.location.href = 'http://localhost/feane-1.0.0/orderdetail.php';

        }, 5000);
    });
</script>

</html>
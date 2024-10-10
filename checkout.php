<head>
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_51Q5NWT07hyYPS9jwF5pWBH4amoHaC4qdWgOUGLt3jAPx9Wrk9hOSWvXNYZoYWpPlBbSAU4XHjRQPUkPFIy7YyftM002ZogGleG"
    data-currency="inr">
    // pk_test_51PBfpgLkGTnmsxChSNvHD5Dae8EYOF4hplQmPKlnR63IBThgbsnuYUCslUfQIcZwx6ZpBzCotFUWPTm69eBYCalg00ZXFAmk4J
</script>
<script>
    document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
</script>
<button class="btn"> Order </button>


<script>
    // Set your publishable key: remember to change this to your live publishable key in production
    // See your keys here: https://dashboard.stripe.com/apikeys
    const stripe = Stripe(
        'pk_test_51Q5NWT07hyYPS9jwF5pWBH4amoHaC4qdWgOUGLt3jAPx9Wrk9hOSWvXNYZoYWpPlBbSAU4XHjRQPUkPFIy7YyftM002ZogGleG', {
            betas: ['custom_checkout_beta_3']
        },
    );
    console.log(stripe);

    fetch('/create-checkout-session', {
            method: 'POST'
        })
        .then((response) => response.json())
        .then((json) => stripe.initCustomCheckout({
            clientSecret: json.clientSecret
        }))
        .then((checkout) => {
            console.log(checkout);
        });
</script>
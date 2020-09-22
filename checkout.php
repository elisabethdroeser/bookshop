<html>
<head>
<title>stripe php</title>
<style>
  /*fått kod från https://tutorial101.blogspot.com/2018/07/using-stripe-with-php.html?fbclid=IwAR0gW3hhGoa4FM81l29aGjM4slomlvSKJFgBQRH_7DGEcFkHKMyE94x4yYU */

.StripeElement {
    background-color: white;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid transparent;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}
.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
    border-color: #fa755a;
}
.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}
</style>
</head>
<body>
    <form action="charge.php" method="post" id="payment-form">
    <!-- posta till sidan charge.php -->
      <div class="form-row">
        <label for="card-element">Credit or debit card</label>
        <div id="card-element">
          <!-- a Stripe Element will be inserted here. Id till card. stripe använda i javascript-->
        </div>
        <!-- Used to display form errors -->
        <div id="card-errors"></div>
      </div>
      <button>Submit Payment</button>
    </form>

<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File / vår-->
<script src="charge.js"></script>

</body>
</html>

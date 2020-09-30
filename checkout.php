
<title>Stripe php</title>

<?php
  include 'includes/header.php';
  require_once('class/csv.php');

  $csv = new Upload();
  $msg = NULL;
?>

<div class="container">
  <div class="table">
    <br>
    Dina uppladdade uppgifter:
    <br>
    <?php
      $file_details = $csv->showFile();
      echo $file_details;
    ?>
  </div>
  <div class="form">
  <form action="charge.php" method="post" id="payment-form">
    <p class="my-4 text-center">Kostnad för nedladdning - 20 kr</p>
    <div class="form-row">
      <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Förnamn">
      <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Efternamn">
      <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email-adress">
      <label for="card-element">Fyll i dina kontokortsuppgifter nedan</label>
      <div id="card-element" class="form-control">
        <!-- a Stripe Element will be inserted here. -->
      </div>
      <!-- Used to display form errors -->
      <div id="card-errors" role="alert"></div>
    </div><br>
    <button>Betala</button>
  </form>
</div>

<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File / vår-->
<script src="./js/charge.js"></script>
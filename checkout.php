
<title>Stripe php</title>

<?php

include 'includes/header.php';
require_once ('class/csv.php');

$csv = new Upload();

$msg = NULL;

?>

<div class="container">
  <div class="table">
    <p>Dina uppladdade uppgifter:</h4>
    <?php

    $file_details = $csv->showFile();
    echo $file_details;
    ?>

  </div>

  <br>
  <div class="form">
    <form action="checkout.php" method="post" id="payment-form">
    <p>Kostnad 20 kr</p><br>
    <!-- posta till sidan charge.php -->
      <div class="form-row">

      <br>

        <label for="card-element">Fyll i dina kontokortsuppgifter:</label>
        <br>
        <div id="card-element">
          <!-- a Stripe Element will be inserted here. Id till card. stripe använda i javascript-->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors"></div>
      </div>
      <br>
      <button>Betala</button>
    </form>
  </div>
</div>

<!-- The needed JS files -->
<!-- JQUERY File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Your JS File / vår-->
<script src="charge.js"></script>


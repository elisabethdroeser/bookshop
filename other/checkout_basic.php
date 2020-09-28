<title>Stripe php</title>

<?php include "includes/header.php";?>

<div class="container">
  <div class="table">
    <h4>Dina uppladdade uppgifter:</h4>
    <?php

     function fill_post($info) {
      $post = [];
      $post[0] = $info;
      $post[1] = "lorem ipsum";
      $post[2] = "hej hopp";
      $post[3] = "finimang";


      return $post;
      /*$post[1] = $id;
      $post[2] = $title;
      $post[3] = $body;*/
    }
      $filename = 'posts.csv';

      //The nested array to hold all the arrays
      $posts = [];
      //skapa ett nytt array item
      $posts[] = ['userId', 'id', 'Title', 'Body'];

      //Open the file for reading
      if ($file_handle = fopen($filename, 'r')) {

        //Read one line from the csv file, use comma as separator
        // while ($data = fgetcsv($hfile_handle, 100, ','))
        while ($data = fgetcsv($file_handle)) {
          //var_dump($data[0]);
          /*fill_post är funktionen som ska skrivas, ska lägga till data till oss. skicka ett isbn in,
          skicka tillbaka arrayen med information
          */
          $posts[] = fill_post($data[0]);
        }

        //Close the file
        fclose($file_handle);
      }

      var_dump($posts);
        //$file_details = $csv->showFile();
        //echo $file_details;
        */
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


<?php include "includes/header.php" ?>

<section class="main">
  <div class="info">
    <form action="checkout.php" method="post" enctype="multipart/form-data" >

      Välj aktuell fil att ladda upp: <br>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Ladda upp"><br><br>

    </form>
  <pre>
  <?php
    //var_dump($_POST);
    //var_dump($_FILES);

    if (isset($_FILES)) {
      $check = true;
      //var_dump($_FILES['fileToUpload']['type']);
      if ($_FILES['fileToUpload']['type'] !== 'text/csv') {
        $check = false;
      }
      //var_dump($check);
      if ($check) {
        $date = date('Ymd_His');
        $file_id = uniqid();
        $path = realpath('./') . '/uploaded_files/' . $file_id;
        //print_r($_FILES['fileToUpload']['tmp_name']);
        //echo $path . '/uploaded_files/';
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$path");

      }
    }

  ?>
  </div>
</section>


<?php include "includes/header.php" ?>
<div class="container">

  <div class="select_file">
    <form method="post" action="checkout.php" enctype="multipart/form-data">
      Välj aktuell fil att ladda upp: <br>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" name="Ladda upp"><br><br>
    </form>

  <?php
  $msg = NULL;
    //var_dump($_POST);
    //var_dump($_FILES);
    if ( isset($_POST["submit"]) ) {
        if (!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
        {
            $msg = '<div class="alert alert-danger">Vänligen välj en fil!</div>';

        } else {

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
  }
}
  ?>
  </div>
</div>


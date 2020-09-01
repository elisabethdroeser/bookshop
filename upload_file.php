<?php

?>

<?php include "includes/header.php" ?>

<section class="main">
  <div class="info">
   <form action="upload_file.php" method="post" enctype="multipart/form-data">
  <p>Välj aktuell fil att ladda upp: </p>
  <br>  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Ladda upp" name="submit">
</form>
  </div>
</section>
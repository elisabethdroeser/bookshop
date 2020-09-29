<?php
  include 'includes/header.php';
  if(!empty($_GET['tid'] && !empty($_GET['product']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
  } else {
    header('Location: index.php');
  }
?>
<title>Receipt</title>
<div class="container">
  <div>
      <p>Tack för att ni köpt: <br><?php echo $product; ?></p>
   <br>
      <p>Your transaction ID is <?php echo $tid; ?></p>
      <p>Check your email for more info</p>
    <p><a href="index.php" class="btn btn-light mt-2">Tillbaka</a></p>
    </div>
</div>

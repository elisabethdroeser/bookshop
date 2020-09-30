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
    <p>Ditt transaktionsnr är: <?php echo $tid; ?></p>
    <a href="confirm.php" class="btn btn-primary">Här ser du din information för nedladdning</a>
  </div>
</div>
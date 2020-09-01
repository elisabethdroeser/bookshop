<?php
?>

<?php include "includes/header.php" ?>

<div class="container">
  <p>Dina böcker:</p><br>
  <table class="books-table">
    <tbody>
      <tr>
        <td>ISBN</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>



  <form method="post" id="logIn" action="upload_file.php">
    <h2>Fyll i dina uppgifter: </h2>
    <input type="text" name="email" placeholder="E-mail"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="text" name="fname"placeholder="First Name"><br>
    <input type="text" name="lname" placeholder="Last Name"><br>
    <input type="text" name="address" placeholder="Address"><br>
    <input type="text" name="zip" placeholder="Zip-code"><br>
    <input type="text" name="city" placeholder="City"><br>
    <input type="country" name="country" placeholder="Country"><br>
    <input type="text" name="phone" placeholder="Phone"><br><br>
    <input type="submit" name="register" value="Register">
  </form>
</div>
<?php
?>

<?php include "includes/header.php" ?>

  <table class="table table-striped table-hover" style="padding: 0px;">
    <thead class="thead-dark">
      <tbody>
        <tr>
          <td>ISBN</td>
        </tr>
        <tr>
          <td>1</td>
        </tr>
        <tr>
          <td>2</td>
        </tr>
        <tr>
          <td>3</td>
        </tr>
        <tr>
          <td>3</td>
        </tr>
      </tbody>
    </thead>
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

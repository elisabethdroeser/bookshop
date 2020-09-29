<?php
session_start();
if(!isset($_SESSION['user'])){
    session_destroy();
    header('Location: index.php');
}
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
        <h1>Error!</h1>
        <div>
        <p>Your card did not function. Please try again!</p>
        <p><a href="upload_file.php"><-Back</a></p>
        </div>
    </body>
</html>
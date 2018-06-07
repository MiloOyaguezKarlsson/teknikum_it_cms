<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Image.php");
require_once("Image-fileupload.php");
require_once("DatabaseHandler.php");

$image;
$login;

session_start();

if(isset($_SESSION)) {
  if(!isset($_SESSION["image"])) {
    var_dump("new image");
    $_SESSION["image"] = new Image();
  }
  $connection = new DatabaseHandler();
  $image = $_SESSION["image"];
  $imagepopup = new ImageUpload();

  if(!$_SESSION["loggedIn"]){
      header("Location: login.php");
  } else {
      echo "<form action='Authorization.php'>
<input type='submit' value='Logout'>
<input type='hidden' name='do' value='logout'>
</form>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Teknikum.it - CMS</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
  </body>
</html>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Image.php");
require_once("Image-fileupload.php");
require_once("DatabaseHandler.php");
require_once("Image-popup.php");

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

  if(!isset($_SESSION["loggedIn"])){
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
<html lang="se">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="bower_components/jquery/dist/jquery.min.js" charset="utf-8"></script>
    <script src="bower_components/bootstrap/js/collapse.js" charset="utf-8"></script>
    <script src="components/js/animatescroll.min.js" charset="utf-8"></script>
    <script src="components/js/highlightnav.js" charset="utf-8"></script>
    <script src="components/js/bildspel.js" type="text/javascript"></script>
    <script src="components/js/showimages.js" charset="utf-8"></script>
    <title>Teknikum.it</title>
  </head>
  <body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once("components/View.php");

      $view = new View();
      $view->render();
    ?>
    <script src="js/editable.js" charset="utf-8"></script>
    <script src="js/deleter.js" charset="utf-8"></script>
  </body>
</html>

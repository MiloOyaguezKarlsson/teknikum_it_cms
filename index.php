<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Image.php");
require_once("DatabaseHandler.php");

$image;

session_start();

if(isset($_SESSION)) {
  if(!isset($_SESSION["image"])) {
    var_dump("new image");
    $_SESSION["image"] = new Image();
  }
  $connection = new DatabaseHandler();
  $image = $_SESSION["image"];
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if (isset($image)) {
      echo $image->render();
    }
    ?>
  </body>
</html>

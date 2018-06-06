<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("Image.php");
require_once("image-fileupload.php");
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
      echo "logged in";
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
      <p id="edit1" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p id="edit2" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <div>
          <p id="edit3" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <button type="button" name="button" class="material-icons deleteButton" onclick="deleteObject(this)">close</button>
      </div>


      <?php
          if (isset($imagepopup)) {
            echo $imagepopup->render();
          }
      ?>
      <!--
    <?php
        if (isset($image)) {
          echo $image->render();
        }
    ?>
-->
    <script type="text/javascript" src="js/editable.js"></script>
    <script type="text/javascript" src="js/deleter.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>

<?php
/**
 *
 */
require_once("Constants.php");
require_once("DatabaseHandler.php");

class Image
{

  function __construct()
  {

  }

  function render() {
    return '<form class="" action="HandleEvents.php?do=addImage" method="post" enctype="multipart/form-data">
      <input name="alt" type="text" required>
      <input name="image" type="file" accept="image/*" required>
      <button type="submit">SPARA</button>
    </form>';
  }

  function addImage() {
    if(isset($_FILES["image"]["name"])) {
      $new_file_name = mt_rand(0, 9999) . strtolower($_FILES["image"]["name"]);
      move_uploaded_file($_FILES["image"]["tmp_name"], Constants::IMAGE_PATH . $new_file_name);

      $alt = $_POST["alt"];
      if($this->insertImage($new_file_name, $alt)) {
        echo "yey det fungerade";
      }
    }
  }

  private function insertImage(string $src, string $alt) {
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $sql = "INSERT INTO bilder (src, alt) VALUES ('" . $src ."', '" . $alt ."')";
    if($connection->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  function getImage() {

  }
}
 ?>

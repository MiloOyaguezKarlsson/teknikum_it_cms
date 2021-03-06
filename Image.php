<?php
/**
 * Author: Fia
 */
require_once("Constants.php");

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

  // add image to IMAGE_PATH with a random number before the name to make it unique
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

  // insert image to database
  private function insertImage(string $src, string $alt) {
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $stmt = $connection->prepare("INSERT INTO bilder (src, alt) VALUES (?, ?)");
    $stmt->bind_param("ss", $src, $alt);

    if($stmt->execute() === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  //get image from database with the given id
  private function getImage(int $id) {
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $stmt = $conn->prepare("SELECT * FROM bilder WHERE ?");
    $stmt->bind_param("i", $id);

    $result = $stmt->execute();

    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $image->id = $row["id"];
        $image->src = $row["src"];
        $image->alt = $row["alt"];

      }
    } else {
      return null;
    }

    return $image;
  }

  // get all images in the "bilder" folder
  public function getAllImages() {
    $directory = "bilder/";
    $images = glob($directory . "*.jpg");

    $imageList = "";
    foreach($images as $image)
    {
      $imageList .= "<li><img src=" . $image . "></li>";
    }

    return $imageList;
  }

  // delete image in database on the given id
  private function deleteImage(int $id) {
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $stmt = $conn->prepare("DELETE * FROM bilder WHERE ?");
    $stmt->bind_param("i", $id);

    $result = $stmt->execute();

    if($result == TRUE) {
      return true;
    } else {
      return null;
    }
  }
}
 ?>

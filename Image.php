<?php
/**
 *
 */
include "Constants.php";

class Image
{

  function __construct()
  {

  }

  function render() {
    return '<form class="" action="HandleEvents.php?do=addImage" method="post" enctype="multipart/form-data">
      <input name="image" type="file" accept="image/*">
      <button type="submit">SPARA</button>
    </form>';
  }

  function addImage() {
    if(isset($_FILES["image"]["name"])) {
      $new_file_name = mt_rand(0, 9999) . strtolower($_FILES["image"]["name"]);
      move_uploaded_file($_FILES["image"]["tmp_name"], Constants::IMAGE_PATH .$new_file_name);
    }
  }

  function getImage() {

  }
}
 ?>

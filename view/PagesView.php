<?php
/**
 *
 */
 require_once("Constants.php");

class PagesView
{

  function render()
  {

  }

  private function getAllPages() {
    $databaseHandler = new DatabaseHandler();
    $connection = $databaseHandler->get_connection();

    $stmt = $conn->prepare("SELECT * FROM sidor");
    $stmt->bind_param("i", $id);

    $result = $stmt->execute();

    if($result->num_rows > 0) {
      return true;
      while($row = $result->fetch_assoc()) {
        $image->id = $row["id"];
        $image->src = $row["src"];
        $image->alt = $row["alt"];
        echo $image;
        var_dump($image);
      }
    } else {
      return null;
    }
  }

}

?>

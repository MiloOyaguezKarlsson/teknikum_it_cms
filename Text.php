<?php
/**
 * Author: Sebastian
 *
 * Copied functions from Textredigering/connection.php
 */
class Text
{

  function __construct()
  {
  }

  function updateTextarea($id, $text) {

      //open connection
      $databaseHandler = new DatabaseHandler();
      $conn = $databaseHandler->get_connection();

      //insert new textareas and update existing ones
      $sql = "INSERT INTO textareas(id, content) VALUES (?, ?) ON DUPLICATE KEY UPDATE id = VALUES(id), content = VALUES(content)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ss", $id, $text);
      $stmt->execute();

      //close connection
      $conn->close();
  }

  function getTextarea($id) {

      //open connection
      $databaseHandler = new DatabaseHandler();
      $conn = $databaseHandler->get_connection();

      //get textarea content
      $sql = "SELECT content FROM textareas WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $id);
      $stmt->execute();

      //bind result
      $textarea = "";
      $stmt->bind_result($textarea);
      $stmt->fetch();

      //close connection and return value
      $conn->close();
      header('Content-Type: application/json');
      echo json_encode($textarea);
  }

  //deletes all existing fields from DB, then inserts the given range of Sponsors
  function updateSponsors(array $sponsors) {

      //open connection
      $databaseHandler = new DatabaseHandler();
      $conn = $databaseHandler->get_connection();


      //delete existing sponsors
      $deleteSql = "DELETE FROM sponsors";
      $conn->query($deleteSql);

      //add new sponsors
      $addSql = "INSERT INTO sponsors(text, image_url, image_alt) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($addSql);

      foreach($sponsors as $sponsor) {
          $stmt->bind_param("sss", $sponsor->text, $sponsor->url, $sponsor->alt);
          $stmt->execute();
      }
  }

  //deletes all existing fields from DB, then inserts the given range of Fields
  function updateFields(array $fields) {

      //open connection
      $databaseHandler = new DatabaseHandler();
      $conn = $databaseHandler->get_connection();


      //delete existing sponsors
      $deleteSql = "DELETE FROM utbildningar";
      $conn->query($deleteSql);

      //add new sponsors
      $addSql = "INSERT INTO utbildningar(text, image_url, image_alt) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($addSql);

      foreach($fields as $field) {
        var_dump($field);
          $stmt->bind_param("sss", $field["text"], $field["img"]["src"], $field["img"]["alt"]);
          $stmt->execute();
      }
      $conn->close();
  }
}

 ?>

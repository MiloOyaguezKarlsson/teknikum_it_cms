<?php
/**
 * Author: Fia
 */
 require_once("Constants.php");

class DatabaseHandler
{
  private static $connection;

  public static function get_connection() {
    //Har detta sålänge så sätter var och en upp med den lokala databasen,
    //så slipper vi lägga upp den informationen på github
    $servername = Constants::servername;
    $username = Constants::username;
    $password = Constants::password;
    $dbname = Constants::dbname;

    self::$connection = new mysqli($servername, $username, $password, $dbname);

    if (self::$connection->connect_error) {
      die("Connection failed: " . self::$connection->connect_error);
    }

    return self::$connection;
  }
}

?>

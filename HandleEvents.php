<?php
/**
 * Author: Fia
 */

 require_once("Image.php");
 require_once("Text.php");
 require_once("Image-popup.php");
 require_once("DatabaseHandler.php");

 $image;

 session_start();

// Check what function to run depending of the given query parameter
 if(isset($_SESSION) && isset($_GET["do"])) {
   if($_GET["do"] == "addImage") {
     if(!isset($_SESSION["image"])) {
       $_SESSION["image"] = new Image();
     }
     $image = $_SESSION["image"];

     $image->addImage();
   }
   if($_GET["do"] == "save") {
     $text = new Text();
     $text->updateTextarea($_POST["id"], $_POST["text"]);
   }
   if($_GET["do"] == "get") {
     $text = new Text();
     $text->getTextarea($_POST["id"]);
   }
   if($_GET["do"] == "saveEducation") {
     $text = new Text();
     $text->updateFields($_POST["data"]);
   }
   if($_GET["do"] == "imagePopup") {
     $popup = new ImagePopup();
     echo $popup->render();
   }
 }

?>

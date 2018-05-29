<?php
/**
 *
 */

 require "Image.php";

 $image;

 session_start();

 if(isset($_SESSION) && isset($_GET["do"])) {
   if($_GET["do"] == "addImage") {
     if(!isset($_SESSION["image"])) {
       $_SESSION["image"] = new Image();
     }
     $image = $_SESSION["image"];

     $image->addImage();
   }
 }

?>

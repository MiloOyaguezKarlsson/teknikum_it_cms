<?php
/**
 *
 */

//check if user is logged in 
 if(!empty($_GET["do"])) {
   if($_GET["do"] == addImage) {
     echo "image";
   }
   else if($_GET["do"] == addText) {
     echo "text";
   }
 }

?>

<?php
/**
 *
 */

 require_once("Image.php");

class ImagePopup
{


    function __construct()
    {
        // code...
    }

    function render()
    {
      $image = new Image();
      $popup = "<div class='image-popup'>
            <div class='current-images'>
                <ul class='image-list'>
                    <!-- Lägg till metod för att generera LI tagger
                        med IMG tagger i för varje bild som ska visas -->
                </ul>
            </div>
            <div class='server-images'>
                <ul class='image-list'>
                    ". $image->getAllImages() ."<!-- Lägg till metod för att generera LI tagger
                        med IMG tagger i för varje bild som ska visas -->
                </ul>
            </div>
            <div class='image-upload'>
            <form class='' action='HandleEvents.php?do=addImage' method='post'>
                <label for='fileselect'>Välj fil...</label>
                <input type='file' name='image' value='Välj fil...' multiple>
                <input type='submit' name='submit' value='Välj'>
            </form>
                <div class='bottom-right'>
                    <button type='button' class='btn flat'>Klar</button>
                    <button type='button' class='btn flat'>Avbryt</button>
                </div>
            </div>
        </div>";

        header('Content-Type: application/json');
        echo json_encode($popup);
    }
}


 ?>

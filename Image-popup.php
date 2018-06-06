<?php
/**
 *
 */
class ImagePopup
{

    function __construct()
    {
        // code...
    }

    function render()
    {
        return "<div class='image-popup'>
            <div class='current-images'>
                <ul class='image-list'>
                    <!-- Lägg till metod för att generera LI tagger
                        med IMG tagger i för varje bild som ska visas -->
                </ul>
            </div>
            <div class='server-images'>
                <ul class='image-list'>
                    <!-- Lägg till metod för att generera LI tagger
                        med IMG tagger i för varje bild som ska visas -->
                </ul>
            </div>
            <div class='image-upload'>
                <button type='button' class='btn left'>Upload new images</button>
                <div class='bottom-right'>
                    <button type='button' class='btn flat'>Klar</button>
                    <button type='button' class='btn flat'>Avbryt</button>
                </div>
            </div>
        </div>";
    }
}


 ?>

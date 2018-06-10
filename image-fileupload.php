<?php
/**
 *File does not currently work and reason is unknown
 */
    class ImageUpload
    {

        function __construct()
        {
            // code...
        }

        function render()
        {
            return "<form class='' action='HandleEvents.php?do=addImage' method='post'>
                <label for='fileselect'>Välj fil...</label>
                <input type='file' name='image' value='Välj fil...' multiple>
                <input type='submit' name='submit' value='Välj'>
            </form>";
        }
    }
 ?>

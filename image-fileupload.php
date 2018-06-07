<?php
//File does not currently work and reason is unknown
    class ImageUpload
    {

        function __construct()
        {
            // code...
        }

        function render()
        {
            return "<form class='' action='index.html' method='post'>
                <label for='fileselect'>Välj fil...</label>
                <input type='file' name='fileselect' value='Välj fil...' multiple>
                <input type='submit' name='submit' value='Välj'>
            </form>";
        }
    }
 ?>

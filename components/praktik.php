<?php
/**
 *
 */
class Internship extends Components
{

  function __construct()
  {

  }

  public function render($args)
  {
    return '<section id="praktik">
        <div class="container">
            <div class="row">
                <div class="part col-md-6 col-sm-12">
                  <div>
                    <h1 id="internship-h1" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->h1 .'</h1>
                  </div>
                    <div class="divider"></div>
                    <p id="internship-p" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->p .'</p>
                </div>

                <div class="part form-right col-md-6 col-sm-12">
                    <form>
                        <input type="text" name="" value="" placeholder="Namn*">
                        <input type="text" name="" value="" placeholder="Företag*" required>
                        <input type="email" name="" value="" placeholder="Email*" required>
                        <input type="text" name="" value="" placeholder="Telefon*" required>
                        <input type="text" name="" value="" placeholder="Antal praktikanter*" required>
                        <input type="text" name="" value="" placeholder="Ämne*" required>
                        <textarea id="textarea" name="name" rows="8" cols="80" placeholder="Meddelande*" required></textarea>
                        <button type="submit" class="btn btn-default">Skicka</button>
                        <div class="clear-both"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>';
  }
}

?>

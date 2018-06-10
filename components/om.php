<?php
/**
 *
 */

class About extends Components
{

  function __construct()
  {

  }

  public function render($args)
  {
    $images = "";

    foreach ($args->images as $image) {
      $images .= '
      <li class="slide">
          <img src="'. $image[0] .'" alt="'. $image[1] .'"/>
      </li>';
    }

    return '<section id="om">
        <div class="container about-text part">
          <div>
              <h1 id="about-h1" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->h1 .'</h1>
          </div>
            <div class="divider"></div>
            <div class="row">

                <div class="col-md-6">
                  <div>
                    <h2 id="about-h2" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->h2 .'</h2>
                  </div>
                  <div>
                    <p id="about-p" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->p .'</p>
                  </div>
                </div>
                <div class="col-md-6">
                    <div id="bildspel">
                        <ul class="slides">
                            '. $images .'
                        </ul>
                    </div>

                </div>
            </div>
        </div>';
  }
}

?>

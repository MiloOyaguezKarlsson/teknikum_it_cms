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
            <h1>'. $args->h1 .'</h1>
            <div class="divider"></div>
            <div class="row">

                <div class="col-md-6">
                    <h2>'. $args->h2 .'</h2>
                    <p>'. $args->p .'</p>
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

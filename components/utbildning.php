<?php
/**
 *
 */

class Utbildning extends Components
{

  function __construct()
  {

  }

  public function render($args)
  {
    $components = "";

    foreach ($args as $component) {
      $components .= $this->getComponent($component);
    }

    return '<section class="utbildning part">
      <div class="container">
        <h1>Utbildningsinnehåll</h1>
        <div class="divider"></div>

        <section id="områden">
          <div class="row">

            ' . $components . '

          </div>
        </section>
      </div>
    </section>
    </section>';
  }

  private function getComponent($component)
  {
    return '<div class="col-xs-3 col-md-2 område">
      <div class="thumbnail">
        <img src="' . $component->url . '" alt="' . $component->alt . '">
        <p>' . $component->text .'</p>
      </div>
    </div>';
  }
}

?>

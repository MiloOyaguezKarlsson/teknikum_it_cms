<?php
/**
 *
 */
class Images extends Components
{

  function __construct()
  {

  }

  public function render($args)
  {
    $components = "";

    foreach ($args as $arg) {
      $components .= $this->getComponent($arg);
    }

    return '
    <section id="bilder" class="part">
      <div class="container">
        '. $components .'
      </div>
    </section>
    ';
  }

  private function getComponent($args)
  {
    $images = "";

    $count = 0;
    foreach ($args["images"] as $image)
    {
      $image["class"] = "always-show";
      if($count >= 4)
      {
        $image["class"] = "hidden";
      }

      $images .= $this->getImage($image);
      $count++;
    }

    return '<div class="row">
      <div class="bilder-header">
        <h2>'. $args["h2"] .'</h2>
        <p>'. $args["p"] .'</p>
      </div>
      <div class="bilder-header">
        <a class="show-more">Visa mer</a>
      </div>
      <div class="bilder">
        '. $images .'
      </div>
    </div>';
  }

  private function getImage($image) {
    return '<img src="'. $image["src"] .'" alt="'. $image["alt"] .'" class="'. $image["class"] .'"
    >';
  }
}

?>

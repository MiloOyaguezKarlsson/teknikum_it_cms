<?php
/**
 *
 */

class Companies extends Components
{

  function __construct()
  {
    # code...
  }

  public function render($args)
  {
    $companies = "";

    foreach ($args->companies as $company) {
      $companies .= $this->getComponent($company->url, $company->alt, $company->text);
    }

    return '<article id="wof" class="part">
        <div class="container">
            <h1 contenteditable="true">'. $args->h1 .'</h1>
            <div class="divider"></div>
            <div class="row">
            '. $companies .'
            </div>
        </div>
    </article>';
  }

  private function getComponent($url, $alt, $p)
  {
    return '
    <div class="well col-md-3 col-sm-6 col-xs-8">
        <div><img src="'. $url .'" alt="'. $alt .'"/></div>
        <p>'. $p .'</p>
    </div>';
  }
}

?>

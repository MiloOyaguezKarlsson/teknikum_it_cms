

<?php

/**
 *
 */

class Header extends Components
{

  function __construct()
   {

   }

  public function render($args) {
    return
      '<header id="hem">
        <div class="jumbotron">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1>' . $args->h1 . '</h1>
                <h3>' . $args->h3 . '</h3>
                <p>' . $args->p . '</p>
                <p><a clasas="btn btn-primary btn-lg" href="#om" role="button">Läs mer</a></p>
              </div>
            </div>
          </div>
        </div>
      </header>'
    ;
  }

  private function setParams() {

  }
}
?>

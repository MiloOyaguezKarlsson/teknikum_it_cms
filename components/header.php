

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
              <div>
                <h1 id="header-h1" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">' . $args->h1 . '</h1>
              </div>
              <div>
              <h3 id="header-h3" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">' . $args->h3 . '</h3>
              </div>
              <div>
              <p id="header-p" class="editable" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">' . $args->p . '</p>
              </div>
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

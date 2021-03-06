<?php
/**
 *
 */
class Footer extends Components
{

  function __construct()
  {

  }

  public function render($args)
  {
    return '<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="'. $args->logo->src .'" alt="'. $args->logo->alt .'" height="150px">
                </div>
                <div class="col-md-3">
                    <h3>Adress</h3>
                    <div class="divider"></div>
                    <ul class="footer-lista">
                        <li>IT-utb, B-korridoren</li>
                        <li>Gamla Norrvägen 6-8</li>
                        <li>352 43 VÄXJÖ</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Webbsidor</h3>
                    <div class="divider"></div>
                    <ul class="footer-lista">
                        <li><a href="http://www.teknikum.it">http://www.teknikum.it</a></li>
                        <li><a href="http://www.teknikum.se">http://www.teknikum.se</a></li>
                        <li><a href="http://www.iteducation.nu">http://www.iteducation.nu</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>E-post</h3>
                    <div class="divider"></div>
                    <ul class="footer-lista">
                        <li><a href="mailto:lars.mattson@teknikum.it">admin@teknikum.it</a></li>
                        <li><a href="mailto:lars.mattson@teknikum.it">webbmaster@teknikum.it</a></li>
                        <li><a href="mailto:lars.mattson@teknikum.it">abuse@teknikum.it</a></li>

                    </ul>

                </div>
            </div>
            <div>
              <p id="footer-p" class="editable align-right" contenteditable="true" onclick="editfieldClick(this)" data-hasbuttons="false">'. $args->p .'</p>
            </div>
        </div>
    </footer>';
  }
}

?>

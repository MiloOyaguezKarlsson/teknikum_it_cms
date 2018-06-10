<?php
/**
 *
 */
class Menu extends Components
{

  function __construct()
  {
  }

  public function render($args)
  {
    return '<nav class="navbar navbar-fixed-top">
      <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapse-navbar">
              <ul class="nav navbar-nav nav-pills nav-justified" contenteditable="true">
                <li class="active"><a onclick="$(\'#hem\').animatescroll({padding:50});" data-height="150" href="#hem" class="nav-element">HEM</a></li>
                <li><a onclick="$(\'#om\').animatescroll({padding:49});" data-height="0" href="#om" class="nav-element">OM</a></li>
                <li><a onclick="$(\'#wof\').animatescroll({padding:49});" data-height="0" href="#wof" class="nav-element">WOF</a></li>
                <li><a onclick="$(\'#bilder\').animatescroll({padding:49});" data-height="0" href="#bilder" class="nav-element">FOTO</a></li>
                <li><a onclick="$(\'#praktik\').animatescroll({padding:49});" data-height="0" href="#praktik" class="nav-element">PRAKTIK</a></li>
              </ul>
            </div>
      </div>
    </nav>';
  }
}
?>

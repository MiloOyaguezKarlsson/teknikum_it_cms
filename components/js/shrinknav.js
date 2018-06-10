var navHeadHeight;
var firstTime = true;
var navHeight;
var navClassHeight;

$(document).ready(function() {
  navHeight = $("nav").height();
  navHeadHeight = $(".navbar-header").height();
  navClassHeight = $(".nav").height();
});

$(window).scroll(function() {
  if ($(document).scrollTop() > 30 && firstTime) {
    $( "#navbar-header").stop().animate({
      height: 0,
    }, 400, setHeaderCss(navClassHeight));
    firstTime = false;
    $(".navbar-header").css("opacity", 0);
  }
  else if ($(document).scrollTop() == 0){
    $("#navbar-header").stop().animate({
      height: navHeadHeight
    }, 400, setHeaderCss(navHeight));
    firstTime = true;
    $(".navbar-header").css("opacity", 1);
  }
});

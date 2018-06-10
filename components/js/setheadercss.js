var navHeight;

$(document).ready(function(){
  navHeight = $("nav").height();
  $(".jumbotron").animate({
    marginTop: (navHeight + "px"),
    height: (($(window).height() - navHeight) + "px")
  }, 0);
});

function setHeaderCss(nav) {
  $(".jumbotron").animate({
    marginTop: (nav) + "px",
    height: (($(window).height() - nav) + "px")
  }, 400);
}

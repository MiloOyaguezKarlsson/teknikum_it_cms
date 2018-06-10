$(document).ready(function() {
  $(".show-more").click(function() {
    $(this).parent().siblings(".bilder").children().toggleClass("hidden");
  });
});

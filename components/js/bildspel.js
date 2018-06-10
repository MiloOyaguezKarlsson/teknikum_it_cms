$(document).ready(function () {

    var imgWidth = 356;
    var interval;
    var pause = 5000;
    var animateSpeed = 1000;
    var currentSlide = 1;
    
     //jquery-element

    var $bildspel = $("#bildspel");
    var $slideContainer = $bildspel.find(".slides");
    var $slides = $slideContainer.find(".slide");

    interval = setInterval(function(){
        $("#bildspel .slides").animate({"margin-left": "-="+ imgWidth}, animateSpeed, function(){
            currentSlide++;
            if(currentSlide === $slides.length){
                $slideContainer.css("margin-left", 0);
                currentSlide = 1;
            }
        });
    }, pause);
});


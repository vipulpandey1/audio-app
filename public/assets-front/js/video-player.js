$(function() {
	"use strict";



    // primary video play
    var video = document.getElementById("video_player");
    video.addEventListener("canplay", function () {
      setTimeout(function () {
        video.play();
      }, 5000);

    });

    video.addEventListener('ended',function(){
        video.load();
    });

    




// more episodes slider

$(document).ready(function(){
    $('.more-episodes').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        swipeToSlide: true,
        swipe: true,
        arrows: true,
        infinite: false,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='bi bi-chevron-left'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='bi bi-chevron-right'></i></button>",
        responsive: [
            {
              breakpoint: 1025,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
              }
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
              }
            },
            {
              breakpoint: 500,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false,
              }
            }
          ]
     });

     $('.more-episodes').on('afterChange', function (event, slick, currentSlide) {
    
        if(currentSlide === 2) {
            $('.slick-next').addClass('hidden');
        }
        else {
            $('.slick-next').removeClass('hidden');
        }

        if(currentSlide === 0) {
            $('.slick-prev').addClass('hidden');
        }
        else {
            $('.slick-prev').removeClass('hidden');
        }  
    })
});









});


$(function() {
	"use strict";



// slider

$(document).ready(function(){
 $('.movies-thumbs').slick({
    dots: false,
    arrows: true,
  infinite: true,
    speed: 200,
    slidesToShow:7,
    slidesToScroll: 1,
    autoplay: false,
    easing:  false, 
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='bi bi-chevron-left'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='bi bi-chevron-right'></i></button>",
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          infinite: true,
           speed: 300,
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,  
          speed: 300,
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          arrows: false,
         
      
        }
      } 
    ]
  });
 $('.webseries-thumb').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow:4,
    slidesToScroll: 1,
    autoplay:false,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='bi bi-chevron-left'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='bi bi-chevron-right'></i></button>",
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 2.1,
          slidesToScroll: 2,
          arrows: false,
        }
      }
    ]
  });
});

setInterval(function () {

$('.slick-track').find('.card').each(function(){
var width = $(this).find('img').css('width');
var f = parseInt(width, 10);
var i = parseFloat(f * .33);
var ff = parseFloat(i+f);
var innerDivId = $(this).find('img').attr('height',ff+'px');
});

var maxWidth = window.matchMedia("(max-width: 768px)");
 responsive(maxWidth);
 maxWidth.addListener(responsive);
 
}, 2000);
});

$(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('.top-header').addClass('black-navbar');
    } else {
       $('.top-header').removeClass('black-navbar');
    }
});

function responsive(maxWidth) {
  if (maxWidth.matches) { 
      console.log(maxWidth);
    $('.webseries-thumb').find('.card').each(function(){
//   var wid = $(this).width('125px');
    var width = $(this).find('img').css('width');
    var f = parseInt(width, 10);
    var i = parseFloat(f * .33);
    var ff = parseFloat(i+f);
    var innerDivId = $(this).find('img').attr('height','280px');
    var innerDivId = $(this).find('img').attr('width','100%');
    });
  }else{
        $('.webseries-thumb').find('.card').each(function(){
        var width = $(this).find('img').css('width');
        var f = parseInt(width, 10);
        var i = parseFloat(f * .33);
        var ff = parseFloat(i+f);
        var innerDivId = $(this).find('img').attr('height','465px');
        var innerDivId = $(this).find('img').attr('width','100%');
        });     
  }
  
}
 
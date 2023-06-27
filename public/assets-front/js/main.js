
$(function() {
	"use strict";



// Theme switcher 

$("#LightTheme").on("click", function() {
    $("html").attr("class", "light-theme")
  }),
  

$("#DarkTheme").on("click", function() {
  $("html").attr("class", "dark-theme")
}),


$("#BlueTheme").on("click", function() {
  $("html").attr("class", "blue-theme")
}),


$("#PurpleTheme").on("click", function() {
  $("html").attr("class", "purple-theme")
}),


$("#GreenTheme").on("click", function() {
  $("html").attr("class", "green-theme")
}),


$("#BlackTheme").on("click", function() {
  $("html").attr("class", "black-theme")
}),


/* Tooltip */
$(function () {
    $('[data-bs-toggle="popover"]').popover();
    $('[data-bs-toggle="tooltip"]').tooltip();
})


/* Back to top */
$(document).ready(function() {
  $(window).on("scroll", function() {
    $(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
  }), $(".back-to-top").on("click", function() {
    return $("html, body").animate({
      scrollTop: 0
    }, 600), !1
  })
})


/* list active */
$(function() {
  for (var e = window.location, o = $(".primary-menu li a").filter(function() {
      return this.href == e
    }).addClass("active").parent().addClass("active"); o.is("li");) o = o.parent("").addClass("show").parent("").addClass("active")
})


/* dropdown parent menu linking */
jQuery(function($) {
  if ($(window).width() > 769) {
    $('.primary-menu .navbar-nav .dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

    });

    $('.primary-menu .navbar-nav .dropdown > a').click(function() {
      location.href = this.href;
    });

  }
});





});



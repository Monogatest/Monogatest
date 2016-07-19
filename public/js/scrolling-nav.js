//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(document).scrollTop() > $(".home-header").outerHeight()+50) {
      //  navbar-fixed-top
        $(".navbar-late-stick").addClass("top-nav-collapse navbar-fixed-top");
    } else {
        $(".navbar-late-stick").removeClass("top-nav-collapse navbar-fixed-top");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

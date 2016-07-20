$( document ).ready(function() {
  // Handler for .ready() called.
  $("img").mousedown(function(){
    return false;
});

$('.collapse').on('show.bs.collapse', function(){
		$(this).prev('.panel-heading').addClass("collapsed");
});

$('.collapse').on('hide.bs.collapse', function(){
		$(this).prev('.panel-heading').removeClass("collapsed");
});

$('.content-animate-fadeInDown').addClass("hide-content").viewportChecker({
	classToAdd: 'show-content animated fadeInDown',
	offset: 100
});
$('.content-animate-fadeInLeft').addClass("hide-content").viewportChecker({
	classToAdd: 'show-content animated fadeInLeft',
	offset: 100
});$('.content-animate-fadeInRight').addClass("hide-content").viewportChecker({
	classToAdd: 'show-content animated fadeInRight',
	offset: 100
});


});

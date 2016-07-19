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
});

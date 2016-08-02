$( document ).ready(function() {
    var value = 1;
    var question_count = $("input[name^='question']").length;
    var testid = $(".test-page-content").data("testid");
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
});
$('.content-animate-fadeInRight').addClass("hide-content").viewportChecker({
	classToAdd: 'show-content animated fadeInRight',
	offset: 100
});


/**
    =====================================================================
    Test Page
    =====================================================================
*/




$(".footer-nav-buttons .icon-container-dark.previous").click(function(){
    if(value > 1){
        $("input[name^='question']").get(value-2).focus();
    }else{
        $("input[name^='question']").first().focus();
    }
});

$(".footer-nav-buttons .icon-container-dark.next").click(function(){
    if(value < question_count){
        $("input[name^='question']").get(value).focus();
    }else{
        $("input[name^='question']").last().focus();
    }
});

$("input[name^='question']").focus(function(){
    $("input[type='radio'][id^='answer']").prop('checked', false);
    $("input[id='test-input']").val('');
    value = $(this).index("input[name^='question']") + 1;

    $('.test-answers').empty();

    answers = $(this).data("answers").split('|');
    $.each(answers, function( index, value ) {
        $('.test-answers').append("<input name='answer' id='answer" + (index+1) + "' value='" + value + "' type='radio'><label for='answer" + (index+1) + "'>" + value + "</label>");
    });

    $(".footer-nav-buttons .icon-container-dark").removeClass('disabled');
    if(value == 1){
        $(".footer-nav-buttons .icon-container-dark:first-child").addClass('disabled');
    }if(value == question_count){
        $(".footer-nav-buttons .icon-container-dark:last-child").addClass('disabled');
    }
    answer = $(this).val();

    if(answer!=''){
        $("input[type='radio'][id^='answer']").each(function(index){
            if($(this).val() == answer){
                $(this).prop('checked', true);
                $("input[id='test-input']").val(answer);
            }
        });
    }
    beforeString = this.previousSibling.nodeValue;
    if(beforeString.length > 15){
        beforeString = "..." + beforeString.substring(beforeString.length - 15 + 1);
    }
    afterString = this.nextSibling.nodeValue;
    if(afterString.length > 15){
        afterString = afterString.substring(0, 15) + "...";
    }

    $(".question-before").text(beforeString);
    $(".question-after").text(afterString);


    $("input[type='radio'][id^='answer']").change(function(){
    if($(this).is(":checked")){
        question = $("input[name='question" + value + "']");
        $("input[id='test-input']").val($(this).val());
        question.val($(this).val());


        $.ajax({
          method: 'POST',
          url: url,
          data: {question_id: value, test_id: testid, answer: $(this).val(), _token: token}
        })
        .done(function(msg){
          console.log(JSON.stringify(msg));
        });
    }
    });

});

setInterval(
        function(){
            $.get( url2, function( data ) {
                 $('#session').text(JSON.stringify(data));
            });
        },500
    );



$("input[name^='question']").first().focus();

});

$( document ).ready(function() {
/**
    =====================================================================
    Test Page
    =====================================================================
*/


    var first_value = parseInt($("input[name^='question']").first().attr('name').substr(8));
    var value = first_value;
    var question_count = $("input[name^='question']").length + value -1;
    var testid = $(".test-page-content").data("testid");
    var total_questions = $(".icon-container-dark.submit").data("questions");

$(".footer-nav-buttons .icon-container-dark.previous").click(function(){
    if(value > first_value){
        $("input[name='question" + (value-1) + "']").focus();
    }else{
        $("input[name^='question']").first().focus();
    }
});

$(".footer-nav-buttons .icon-container-dark.next").click(function(){
    if(value < question_count){
         $("input[name='question" + (value+1) + "']").focus();
    }else{
        $("input[name^='question']").last().focus();
    }
});

$("input[name^='question']").focus(function(){
    $("input[type='radio'][id^='answer']").prop('checked', false);
    $("input[id='test-input']").val('');
    value = parseInt($(this).attr('name').substr(8));
    $('.test-answers').empty();


    answers = $(this).data("answers").split('|');
    $.each(answers, function( index, value ) {
        $('.test-answers').append("<input name='answer' id='answer" + (index+1) + "' value='" + value + "' type='radio'><label for='answer" + (index+1) + "'>" + value + "</label>");
    });

    $(".footer-nav-buttons .icon-container-dark.previous").removeClass('disabled');
    $(".footer-nav-buttons .icon-container-dark.next").removeClass('disabled');
    if(value == first_value){
        $(".footer-nav-buttons .icon-container-dark.previous").addClass('disabled');
    }if(value == question_count){
        $(".footer-nav-buttons .icon-container-dark.next").addClass('disabled');
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
          data: {question_number: value, test_id: testid, beforeString: beforeString, answer: $(this).val(), afterString: afterString, _token: token}
        })
        .done(function(msg){
            if(Object.keys(msg.qas).length == total_questions){
                $(".icon-container-dark.submit").removeClass("disabled");
                $(".icon-container-dark.submit").parent().attr("href", reviewUrl);
            }else{
                $(".icon-container-dark.submit").addClass("disabled");
                $(".icon-container-dark.submit").parent().removeAttr("href");
            }
            $('#session').text(msg.qas.length);
            console.log(JSON.stringify(msg));
        });
    }
    });

});

// setInterval(
//         function(){
//             $.get( url2, function( data ) {
//                 console.log(data);
//             });
//         },500
//     );




$(".collapse-footer").on('click', function(){
    $(this).children($('i')).toggleClass('fa-angle-down');
    $(this).children($('i')).toggleClass('fa-angle-up');
    $('.sticky-footer').toggleClass('collapsed');
});


$("input[name^='question']").first().focus();
$(".test-page-content").delay(500).css( "margin-bottom", $(".sticky-footer").outerHeight());
});

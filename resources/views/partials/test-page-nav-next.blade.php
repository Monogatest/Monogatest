@if($page_number == $page_count)
    <div class="icon-container-dark disabled"><i class="fa fa-step-forward"></i></div>
@else
    <a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $page_number+1]) }}"><div class="icon-container-dark"><i class="fa fa-step-forward"></i></div></a>
@endif
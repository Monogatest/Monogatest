<nav class="navbar navbar-accent navbar-test">
	<div class="container">
		<a class="navbar-brand page-scroll" href="/">MonogaTest</a>
        <ul class="nav navbar-nav navbar-right navbar-icons">
            <li>
							@if($page_number == 1)
									<div class="icon-container-dark disabled"><i class="fa fa-step-backward"></i></div>
							@else
									<a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $page_number-1]) }}"><div class="icon-container-dark"><i class="fa fa-step-backward"></i></div></a>
							@endif
            </li>
            <li>
							@if($page_number == $page_count)
									<div class="icon-container-dark disabled"><i class="fa fa-step-forward"></i></div>
							@else
									<a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $page_number+1]) }}"><div class="icon-container-dark"><i class="fa fa-step-forward"></i></div></a>
							@endif
            </li>
        </ul>
		<ul class="nav navbar-nav navbar-right">
            <li><a class="disabled">Page: {{ $page_number }} / {{ $page_count }}</a></li>
        </ul>
	</div>
</nav>

<nav class="navbar navbar-accent navbar-test">
	<div class="container">

	  <ul class="nav navbar-nav navbar-right">
	  	@if($page_number == 1)
	  	<li>
			<div class="icon-container-dark disabled"><i class="fa fa-angle-double-left"></i></div>
	  	</li>
		@else
	  	<li>
			<a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $page_number-1]) }}"><div class="icon-container-dark"><i class="fa fa-angle-double-left"></i></div></a>
	  	</li>
	  	@endif

	  	@if($page_number == $page_count)
	  	<li>
			<div class="icon-container-dark disabled"><i class="fa fa-angle-double-right"></i></div>
	  	</li>
		@else
	  	<li>
			<a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $page_number+1]) }}"><div class="icon-container-dark"><i class="fa fa-angle-double-right"></i></div></a>
	  	</li>
	  	@endif

	    
	  </ul>
	</div>
</nav>

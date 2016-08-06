<nav class="navbar navbar-accent navbar-test">
	<div class="container">
		<a class="navbar-brand page-scroll" href="/">MonogaTest</a>
				<ul class="nav navbar-nav">
					<li>
						<span>Page: {{ $page_number }} / {{ $page_count }}</span>
					</li>
				</ul>
        <ul class="nav navbar-nav navbar-right">
            	<li>
                @include('partials.test-page-nav-back')
            </li>
            <li>
                @include('partials.test-page-nav-next')
            </li>
        </ul>
	</div>
</nav>

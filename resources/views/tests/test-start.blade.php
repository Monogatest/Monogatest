@extends('layouts.master')

@section('title')
{{ $test->title }} | MonogaTest
@endsection

@section('content')
	@include('partials.test-nav')
	<div class="container section">
    <section lang="ja" class="col-md-12">
			<div id="session"></div>
			<h2>{{ $test->title }}</h2>
		<div class="row">
	    <div class="test-page-image">
	    	<img src="{{ $page->image }}" alt="{{ $page->test->title }}" />
	    </div>
			<article class="col-lg-12 test-page-content" data-testid="{{ $test->id }}">
                <?php
                $page->content = preg_replace_callback(
                    "^\[(question*?)(\d)+\]^",
                    function ($matches) use ($answers, $session_answers){
                        $user_answer = isset($session_answers[$matches[2]])?  $session_answers[$matches[2]] : '';
                        return "<input class='form-control' type='text' value='$user_answer' name='question$matches[2]' data-answers='{$answers[$matches[2]]}' readonly />";
                    },
                     $page->content);
                ?>
				{!! $page->content !!}
			</article>
    </div><!-- Row -->
    </section>
	</div>

	 @include('partials.test-footer')
	 <script type="text/javascript">
	 var token = '{{ Session::token() }}';
	 var url = "{{ route('storeTestAnswer') }}";
	 var url2 = "{{ route('getTestAnswer') }}";
	 </script>
@endsection

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
				// $question_number = 5;
				// $answers1 = $questions->where('question_number', $question_number)->keyBy('question_number');
				// $answers1 = $answers1[$question_number]->answers->shuffle()->implode('value', '|');

	      $page->content = preg_replace_callback(
	          "^\[(question*?)(\d)+\]^",
	          function ($matches) use ($questions, $session_answers){
								$question_number = intval($matches[2]);
	              $user_answer = isset($session_answers[$question_number])?  $session_answers[$question_number]["answer"] : '';
								$answers1 = $questions->where('question_number', $question_number)->keyBy('question_number')[$question_number]->answers->shuffle()->implode('value', '|');
								// $answers1 = $answers1;
								// dd($answers1);
	              return "<input class='form-control' type='text' value='$user_answer' name='question$question_number' data-answers='{$answers1}' readonly />";
	          }, $page->content);
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
	 var reviewUrl = "{{ route('tests.test.review', ['test_id' => $test->id]) }}";
	 </script>
@endsection

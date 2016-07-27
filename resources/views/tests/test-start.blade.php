@extends('layouts.master')

@section('title')
{{ $test->title }} | MonogaTest
@endsection

@section('content')
	@include('partials.test-nav')
	<div class="container section">
    <section lang="ja" class="col-md-12">
			<h2>{{ $test->title }}</h2>
		<div class="row">
	    <div class="test-page-image">
	    	<img src="{{ $page->image }}" alt="{{ $page->test->title }}" />
	    </div>
			<article class="col-lg-12 test-page-content">
				{!! $page->content !!}
				@foreach($questions as $question)
					<div>{{ $question->id }}</div>
					<ul>
						@foreach($answers as $answer)
							@if ($answer->question_id == $question->id)
							<li>
								{{$answer->value}}
							</li>
							@endif
						@endforeach
					</ul>
				@endforeach
			</article>

    </div><!-- Row -->
    </section>
	</div>
	 @include('partials.test-footer')
@endsection

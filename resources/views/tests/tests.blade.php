@extends('layouts.master')

@section('title')
Tests | MonogaTest
@endsection

@section('content')
	@include('partials.app-nav')
	<div class="container section">
    <section class="col-md-9">
          <div class="col-lg-12">
            <h1>Recent Tests</h1>
            <div class="row">
							@foreach($tests as $test)
              <div class="col-md-3 col-sm-4">
               <div class="monogatest-card-small">
									<a href="{{ route('tests.test', ['test_id' => $test->id]) }}">
		                <img src="{{ $test->poster }}" alt="{{ $test->title }}" class="card-image">
                	</a>
                    <div class="test-description">
                      <a href="{{ route('tests.test', ['test_id' => $test->id]) }}">
                        <h4 class="title" lang="ja">{{ $test->title }}</h3>
                      </a>
                      <a class="test-author" href="{{ route('getUser', ['username' => $test->user->username]) }}">{{ $test->user->username }}</a>
                    </div>
              	</div>
              </div>
              @endforeach
            </div><!-- Row -->
        </div>
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.home-footer')
@endsection

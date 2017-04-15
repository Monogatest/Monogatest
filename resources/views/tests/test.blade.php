@extends('layouts.master')

@section('title')
{{ $test->title }} | MonogaTest
@endsection

@section('content')
	@include('partials.nav._app')
	<div class="container section">
    <section class="col-md-9">
			@if(Session::has('abort'))
				<div class="alert alert-danger" role="alert">
					{!! Session::get('abort') !!}
				</div>
			@endif
    	@if(!Auth::check())
    		<div class="alert alert-danger" role="alert">
				  <a href="{{ route('auth.login') }}" class="alert-link">Login</a> To save this test in your history
				</div>
			@endif
		<div class="row">
	      <div class="col-md-6">
	        	<h3>{{ $test->title }}</h3>
						<div class="test-page-image">
							<img class="image-responsive" src="{{ $test->poster }}" alt="{{ $test->title }}" />
						</div>
	      </div>
	      <div class="col-md-6">
	        	<div class="article text-left">
    	        	<div class="">
    	        		<h3 class="text-center text-center">Details</h3>
                        <i class="fa fa-copyright"></i> Reference: <a target="_blank" href="{{ $test->reference_url }}">{{ $test->reference_name }}</a><br />
                        <i class="fa fa-files-o"></i> Number of Pages: <strong>{{$pages}}</strong><br />
                        <i class="fa fa-question"></i> Number of Questions: <strong>{{$questions}}</strong><br />
						<i class="fa fa-user"></i> Author: <a href="{{ route('getUser', ['username' => $test->user->username]) }}">{{ $test->user->username }}</a><br />
						<i class="fa fa-calendar"></i> Publish Date: {{$test->created_at->format('d/M/Y')}}
    	        	</div>
                    <div class="text-center margin-top"><a href="{{ route('tests.test.prepare', ['test_id'=>$test->id]) }}" class="btn btn-monogatest-lg">START TEST</a></div>
	        	</div>
	      </div>
    	</div><!-- Row -->
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.footer._home')
@endsection

@extends('layouts.master')

@section('title')
{{ $test->title }} | MonogaTest
@endsection

@section('content')
	@include('partials.app-nav')
	<div class="container section">
    <section class="col-md-9">
    	@if(!Auth::check())
    		<div class="alert alert-danger" role="alert">
			  <a href="{{ route('auth.login') }}" class="alert-link">Login</a> To save this test in your history
			</div>
		@endif
		<div class="row">
	      <div class="col-md-6">
	        	<h3>{{ $test->title }}</h3>
						<img src="{{ $test->poster }}" alt="{{ $test->title }}" />
	      </div>
	      <div class="col-md-6">
	        	<div class="article text-left">
	        	<div class="text-center">
	        		<h3 class="text-center">Details</h3>
		        	<a href="{{ route('tests.test.prepare', ['test_id'=>$test->id]) }}" class="btn btn-monogatest-lg">START TEST</a>
	        	</div>
	        		Reference: <a target="_blank" href="{{ $test->reference_url }}">{{ $test->reference_name }}</a><br />
							Author: {{ $test->user->first_name }} at: {{$test->created_at->format('d/M/Y')}}

	        	</div>
	      </div>
    	</div><!-- Row -->
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.home-footer')
@endsection

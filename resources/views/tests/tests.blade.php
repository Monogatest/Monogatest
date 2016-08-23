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
                @include('partials.foreach.dump_test_card')
              @endforeach
            </div><!-- Row -->
        </div>
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.home-footer')
@endsection

@extends('layouts.master')

@section('title')
Tests | MonogaTest
@endsection

@section('content')
	@include('partials.nav._app')
	<div class="container section">
    <section class="col-md-9">
          <div class="col-lg-12">
            <h1>Tests By: {{$user->username}}</h1>
            <div class="row">
							@foreach($tests as $test)
                @include('partials.foreach.dump_test_card')
              @endforeach
            </div><!-- Row -->
        </div>
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.footer._home')
@endsection

@extends('layouts.master')

@section('title')
Create Test | MonogaTest
@endsection

@section('content')
	@include('partials.app-nav')
	<div class="container section">
    <section class="col-md-9">
      <h1>Create Test</h1>



      Reference link
      Poster
    <div class="row">
      {{Form::open(['route' => 'postCreateTest'])}}
      {{ csrf_field() }}
      <div class="col-md-12">
        <div class="form-group">
          {{ Form::label('Title', 'Test Title (Required)') }}
          {{ Form::password('Title',  array('class' => 'form-control')) }}
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          {{ Form::label('Referece', 'Referece Name (Required)') }}
          {{ Form::password('Referece',  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('new_password', 'New password (Required)') }}
          {{ Form::password('new_password',  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
          {{ Form::label('password_confirmation', 'Confirm new password (Required)') }}
          {{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
        </div>
      </div>

    </div>
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.home-footer')
@endsection

@extends('layouts.master')

@section('title')
Create Test | MonogaTest
@endsection

@section('content')
	@include('partials.nav._app')
	<div class="container section">
    <section class="col-md-9">
      <h1>Create Test</h1>
			Reference link
      Poster
    <div class="row">
			<form action="{{route('postCreateTest')}}" method="post">
				{{ csrf_field() }}

      <div class="col-md-12">
        <div class="form-group">
					<label for="title">Test Title (Required)</label>
					<input type="text" name="title" placeholder="Test Title" id="title" class="form-control">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
					<label for="reference">Referece Name (Required)</label>
					<input type="text" name="reference" placeholder="Test Title" id="reference" class="form-control">
        </div>
      </div>
			</form>
    </div>
    </section>
		@include('partials.sidebar')
	</div>
	 @include('partials.footer._home')
@endsection

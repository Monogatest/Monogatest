@extends('layouts.master')

@section('title')
Register | MonogaTest
@endsection

@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1>Monogatest Registeration</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body text-left">
          {{ Form::open(['route' => 'auth.register', 'class' => 'clearfix']) }}
            {{ csrf_field() }}
            <div class="form-group col-md-6">
              {{ Form::label('first_name', 'First Name (Required)') }}
              {{ Form::text('first_name', null,  array('class' => 'form-control')) }}
              @if ($errors->has('first_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              {{ Form::label('last_name', 'Last Name (Required)') }}
              {{ Form::text('last_name', null,  array('class' => 'form-control')) }}
              @if ($errors->has('last_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-12">
              {{ Form::label('email', 'Email Address (Required)') }}
              {{ Form::email('email', null, array('class' => 'form-control')) }}
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="col-md-12">
              {{ Form::label('Gender (Required)') }}
            </div>
            <div class="form-group">
              <div class="col-md-6">
                {{ Form::radio('gender', 'M', false, array('id' => 'male', 'class' => 'with-font')) }}
                {{ Form::label('male', 'Male') }}
              </div>
              <div class="col-md-6">
                {{ Form::radio('gender', 'F', false, array('id' => 'female', 'class' => 'with-font')) }}
                {{ Form::label('female', 'Female') }}
              </div>
            </div>
            <div class="form-group col-md-6">
              {{ Form::label('password', 'Password (Required)') }}
              {{ Form::password('password',  array('class' => 'form-control')) }}
            </div>
            <div class="form-group col-md-6">
              {{ Form::label('password_confirmation', 'Confirm Password (Required)') }}
              {{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
            </div>
            <div class="col-md-12">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-md-12">
              {{ Form::submit('Sign up', array('class' => 'btn btn-monogatest')) }}
            </div>
            {{ Form::hidden('private', '0') }}
          {{ Form::close() }}
        </div>
      </div>
      <p>
        Already have an account? <a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
      </p>
    </div>
@endsection

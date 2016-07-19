@extends('layouts.master')

@section('title')
Reset Password | MonogaTest
@endsection

@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1>Monogatest Reset Password</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body text-left">
          {{ Form::open(['route' => 'auth.password.reset']) }}
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {{ Form::label('email', 'Email address') }}
              {{ Form::email('email', null,  array('class' => 'form-control')) }}
              @if ($errors->has('email'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {{ Form::label('password', 'Password') }}
              {{ Form::password('password',  array('class' => 'form-control')) }}
              @if ($errors->has('password'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {{ Form::label('password_confirmation', 'Confirm Password') }}
              {{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-monogatest">
                      <i class="fa fa-btn fa-refresh"></i> Reset Password
                  </button>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
@endsection

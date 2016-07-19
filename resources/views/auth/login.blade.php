@extends('layouts.master')

@section('title')
Login | MonogaTest
@endsection

@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1>Monogatest Login</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body text-left">
          {{ Form::open(['route' => 'auth.login']) }}
            {{ csrf_field() }}
            <div class="form-group">
              {{ Form::label('email', 'Email address') }}
              {{ Form::email('email', null,  array('class' => 'form-control')) }}
              @if ($errors->has('email'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              {{ Form::label('password', 'Password') }}
              {{ Form::password('password',  array('class' => 'form-control')) }}
              @if ($errors->has('password'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              {{ Form::checkbox('remember', 'remember', false, ['id'=>'remember', 'class'=>'with-font'])}}
              {{ Form::label('remember', 'Remember me') }}
            </div>
            <div class="form-group">
              {{ Form::submit('Login', array('class' => 'btn btn-monogatest')) }}
            </div>
          {{ Form::close() }}
          <div class="text-center"><a class="btn btn-link" href="{{ route('auth.password.reset') }}">Forgot Your Password?</a></div>
        </div>
      </div>
      <p>
        Don't have an account? sign up for FREE! <a href="{{ route('auth.register') }}" class="btn btn-primary">Register</a>
      </p>
    </div>
@endsection

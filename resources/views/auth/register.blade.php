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
          <form class="clearfix" action="{{route('auth.register')}}" method="post">

            {{ csrf_field() }}

            <div class="form-group col-md-6">
              <label for="first_name">First Name (Required)</label>
              <input type="text" name="first_name" id="first_name" class="form-control">
              @if ($errors->has('first_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">Last Name (Required)</label>
              <input type="text" name="last_name" id="last_name" class="form-control">
              @if ($errors->has('last_name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="username">Username (Required)</label>
              <input type="text" name="username" id="username" class="form-control">
              <small class="text-muted">The username will be visible for other users</small>
              @if ($errors->has('username'))
                  <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email Address (Required)</label>
              <input type="email" name="email" id="email" class="form-control">
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="col-md-12">
              <label>Gender (Required)</label>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <input type="radio" name="gender" value="M" id="male" class="with-font">
                <label for="male">Male</label>
              </div>
              <div class="col-md-6">
                <input type="radio" name="gender" value="F" id="female" class="with-font">
                <label for="female">Female</label>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="password">Password (Required)</label>
              <input type="password" name="password" id="password" class="with-font">
            </div>
            <div class="form-group col-md-6">
              <label for="password_confirmation">Confirm Password (Required)</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="with-font">
            </div>
            <div class="col-md-12">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-md-12">
              <input type="submit" name="submit" value="Sign up" class="btn btn-monogatest">
            </div>
            <input type="hidden" name="private" value="0">
          </form>
        </div>
      </div>
      <p>
        Already have an account? <a href="{{ route('auth.login') }}">Login</a>
      </p>
    </div>
@endsection

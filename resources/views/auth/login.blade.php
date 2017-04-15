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
        <form method="post" action="{{route('auth.login')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" id="email" name="email" class="form-control">
              @if ($errors->has('email'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control">
              @if ($errors->has('password'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
            <input type="checkbox" id="remember" name="remember" class="with-font">
            <label for="remember">Remember me</label>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Sign up" class="btn btn-monogatest">
            </div>
          </form>
          <div class="text-center"><a class="btn btn-link" href="{{ route('auth.password.reset') }}">Forgot Your Password?</a></div>
        </div>
      </div>
      <p>
        Don't have an account? sign up for FREE! <a href="{{ route('auth.register') }}">Register</a>
      </p>
    </div>
@endsection

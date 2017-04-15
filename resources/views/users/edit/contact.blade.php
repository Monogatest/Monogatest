@extends('layouts.master')
@section('title')
Contact Settings {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.nav._app')
    <div class="clearfix">
      <section class="profile-cp col-md-2">
        @include('partials.profile-cp')
      </section>
      <section class="col-md-7">
        <section class="user-info-container clearfix">
          <h2>Contact Settings</h2>
          @if(Session::has('edited'))
            <div class="alert alert-success" role="alert">
              {!! Session::get('edited') !!}
            </div>
          @endif
        <div class="row">
          <form action="/user/{{$user->username}}/edit/contact_settings" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="col-sm-6">
            <h4>Updates</h4>
            <div class="form-group">
              <input type="checkbox" id="new_test" name="new_test" value="{{$user->new_test == 1 ? true : false}}" id="new_test" class="with-font">
              <label for="new_test">When a new Test is released</label>
            </div>
            <h4>Community</h4>
            <div class="form-group">
              <input type="checkbox" id="test_submitted" name="test_submitted" value="{{$user->test_submitted == 1 ? true : false}}" id="test_submitted" class="with-font">
              <label for="test_submitted">When someone submits my test</label>
            </div>
            <div class="form-group">
              <input type="checkbox" id="test_spammed" name="test_spammed" value="{{$user->test_spammed == 1 ? true : false}}" id="test_spammed" class="with-font">
              <label for="test_spammed">When one of my tests is marked as spam</label>
            </div>
            <div class="form-group">
              <input type="checkbox" id="test_reported" name="test_reported" value="{{$user->test_reported == 1 ? true : false}}" id="test_reported" class="with-font">
              <label for="test_reported">When one of my tests is reported</label>
            </div>
            <h4>Account</h4>
            <div class="form-group">
              <input type="checkbox" id="password_changed" name="password_changed" value="{{$user->password_changed == 1 ? true : false}}" id="password_changed" class="with-font">
              <label for="password_changed">When my password is changed</label>
            </div>
          </section>
        </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Submit" class="btn btn-monogatest">
            </div>
          </form>
        </section>
      </section>
      @include('partials.sidebar')
    </div>
     @include('partials.footer._home')
@endsection

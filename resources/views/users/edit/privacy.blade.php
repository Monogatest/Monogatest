@extends('layouts.master')
@section('title')
Privacy Settings {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.nav._app')
    <div class="clearfix">
      <section class="profile-cp col-md-2">
        @include('partials.profile-cp')
      </section>
      <section class="col-md-7">
        <section class="user-info-container clearfix">
          <h2>Privacy Settings</h2>
          @if(Session::has('edited'))
            <div class="alert alert-success" role="alert">
              {!! Session::get('edited') !!}
            </div>
          @endif
        <div class="row">
          <form action="/user/{{$user->username}}/edit/privacy_settings" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="text-center">
            <div class="form-group">
              <input type="checkbox" name="private" {{$user->private == 1 ? 'checked' : ''}} id="private" class="with-font">
              <label for="private">Private: Prevent other members from viewing my profile information</label>
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

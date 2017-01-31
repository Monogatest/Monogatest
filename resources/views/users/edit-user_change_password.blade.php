@extends('layouts.master')
@section('title')
Change Password {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
    <div class="clearfix">
      <section class="profile-cp col-md-2">
        @include('partials.profile-cp')
      </section>
      <section class="col-md-7">
        <section class="user-info-container clearfix">
          <h2>Change Password</h2>
          @if(Session::has('edited'))
            <div class="alert alert-success" role="alert">
              {!! Session::get('edited') !!}
            </div>
          @endif
        <div class="row">
          <form action="{{route('postEditUser')}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="username" value="{{$user->username}}">
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="col-sm-6">
            <div class="form-group">
              <label for="current_password">Current password (Required)</label>
              <input type="password" name="current_password" id="current_password" class="form-control">
            </div>
            <div class="form-group">
              <label for="new_password">New password (Required)</label>
              <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirm new password (Required)</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
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
     @include('partials.home-footer')
@endsection

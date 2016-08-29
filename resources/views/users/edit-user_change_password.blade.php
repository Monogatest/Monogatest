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
          {{Form::open(['route' => 'postEditUser'])}}
          {{ csrf_field() }}
          {{ Form::hidden('username', $user->username) }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="col-sm-6">
            <div class="form-group">
              {{ Form::label('current_password', 'Current password (Required)') }}
              {{ Form::password('current_password',  array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('new_password', 'New password (Required)') }}
              {{ Form::password('new_password',  array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              {{ Form::label('password_confirmation', 'Confirm new password (Required)') }}
              {{ Form::password('password_confirmation',  array('class' => 'form-control')) }}
            </div>

          </section>

        </div>
        <div class="form-group">
          {{ Form::submit('Submit', array('class' => 'btn btn-monogatest')) }}
        </div>
        {{Form::close()}}
        </section>
      </section>
      @include('partials.sidebar')
    </div>
     @include('partials.home-footer')
@endsection

@extends('layouts.master')
@section('title')
Contact Settings {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
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
          {{Form::open(['route' => 'postEditUser'])}}
          {{ csrf_field() }}
          {{ Form::hidden('username', $user->username) }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="col-sm-6">
            <h4>Updates</h4>
            <div class="form-group">
              {{ Form::checkbox('new_test', 'true', $user->new_test == 1 ? true : false, array('id' => 'new_test', 'class' => 'with-font')) }}
              {{ Form::label('new_test', 'When a new Test is released') }}
            </div>

            <h4>Community</h4>
            <div class="form-group">
              {{ Form::checkbox('test_submitted', 'true', $user->test_submitted == 1 ? true : false, array('id' => 'test_submitted', 'class' => 'with-font')) }}
              {{ Form::label('test_submitted', 'When someone submits my test') }}
            </div>
            <div class="form-group">
              {{ Form::checkbox('test_spammed', 'true', $user->test_spammed == 1 ? true : false, array('id' => 'test_spammed', 'class' => 'with-font')) }}
              {{ Form::label('test_spammed', 'When one of my tests is marked as spam') }}
            </div>
            <div class="form-group">
              {{ Form::checkbox('test_reported', 'true', $user->test_reported == 1 ? true : false, array('id' => 'test_reported', 'class' => 'with-font')) }}
              {{ Form::label('test_reported', 'When one of my tests is reported') }}
            </div>

            <h4>Account</h4>
            <div class="form-group">
              {{ Form::checkbox('password_changed', 'true', $user->password_changed == 1 ? true : false, array('id' => 'password_changed', 'class' => 'with-font')) }}
              {{ Form::label('password_changed', 'When my password is changed') }}
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

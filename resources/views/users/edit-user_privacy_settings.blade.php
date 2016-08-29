@extends('layouts.master')
@section('title')
Privacy Settings {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
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
          {{Form::open(['route' => 'postEditUserPrivacy'])}}
          {{ csrf_field() }}
          {{ Form::hidden('username', $user->username) }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="text-center">
            <div class="form-group">
              {{ Form::checkbox('private', 'true', $user->private == 1 ? true : false, array('id' => 'private', 'class' => 'with-font')) }}
              {{ Form::label('private', 'Private: Prevent other members from viewing my profile information') }}
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

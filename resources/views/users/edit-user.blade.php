@extends('layouts.master')
@section('title')
Edit Profile {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
    <div class="clearfix">
      <section class="profile-cp col-md-2">
        @include('partials.profile-cp')
      </section>
      <section class="col-md-7">
        <section class="user-info-container clearfix">
          <h2>Personal Information</h2>
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
            <h4>Profile Photo (Avatar)</h4>
            <div class="profile-photo-container">
                <img src="{{$user->avatar}}" alt="{{$user->username}}">
                {{ Form::hidden('avatar', $user->avatar) }}
            </div>
            <div class="uploadcare">
              UploadCare
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {{ Form::label('first_name', 'First Name (Required)') }}
                {{ Form::text('first_name', $user->first_name,  array('class' => 'form-control')) }}
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group col-md-6">
                {{ Form::label('last_name', 'Last Name (Required)') }}
                {{ Form::text('last_name', $user->last_name,  array('class' => 'form-control')) }}
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                {{ Form::label('Gender (Required)') }}
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  {{ Form::radio('gender', 'M', $user->gender == 'M' ? true : false, array('id' => 'male', 'class' => 'with-font')) }}
                  {{ Form::label('male', 'Male') }}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  {{ Form::radio('gender', 'F', $user->gender == 'F' ? true : false, array('id' => 'female', 'class' => 'with-font')) }}
                  {{ Form::label('female', 'Female') }}
                </div>
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('bio', 'Biography') }}
              {{ Form::textarea('bio', $user->bio,  array('class' => 'form-control vertical-textarea')) }}
              @if ($errors->has('bio'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('bio') }}</strong>
                  </span>
              @endif
            </div>

          </section>
          <section class="col-sm-6">
            <h4>Social media accounts</h4>
            <div class="form-group">
              {{ Form::label('facebook', 'Facebook username') }} <i class="fa fa-facebook text-primary"></i> <span class="text-muted"> (e.g. MonogaTest)</span>
              {{ Form::text('facebook', $user->facebook,  array('class' => 'form-control')) }}
              @if ($errors->has('facebook'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('facebook') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              {{ Form::label('instagram', 'Instagram username') }} <i class="fa fa-instagram text-primary"></i> <span class="text-muted"> (e.g. MonogaTest)</span>
              {{ Form::text('instagram', $user->instagram,  array('class' => 'form-control')) }}
              @if ($errors->has('instagram'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('facebook') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              {{ Form::label('twitter', 'Twitter username') }} <i class="fa fa-twitter text-primary"></i> <span class="text-muted"> (e.g. MonogaTest)</span>
              {{ Form::text('twitter', $user->twitter,  array('class' => 'form-control')) }}
              @if ($errors->has('twitter'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('twitter') }}</strong>
                  </span>
              @endif
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

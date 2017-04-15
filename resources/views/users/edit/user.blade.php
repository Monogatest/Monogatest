@extends('layouts.master')
@section('title')
Edit Profile {{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.nav._app')
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
          <form action="/user/{{$user->username}}/edit/profile" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <h3 class="text-center">Username: {{$user->username}}</h3>
          <section class="col-sm-6">
            <h4>Profile Photo (Avatar)</h4>
            <div class="profile-photo-container">
                <img src="{{Storage::disk('s3images')->get('avatar/' . $user->avatar)}}" alt="{{$user->username}}">
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="avatar">Avatar</label>
                <input id="avatar" type="file" name="avatar" value="{{$user->avatar}}" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="username">Username (Required)</label>
                <input id="username" type="text" name="username" value="{{$user->username}}" class="form-control">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="first_name">First Name (Required)</label>
                <input id="first_name" type="text" name="first_name" value="{{$user->first_name}}" class="form-control">
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="last_name">Last Name (Required)</label>
                <input id="last_name" type="text" name="last_name" value="{{$user->last_name}}" class="form-control">
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label>Gender (Required)</label>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="radio" name="gender" value="M" {{$user->gender == 'M' ? 'checked' : ''}} id="male" class="with-font">
                  <label for="male">Male</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="radio" name="gender" value="F" {{$user->gender == 'F' ? 'checked' : ''}} id="female" class="with-font">
                  <label for="female">Female</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="bio">Biography</label>
              <textarea id="bio" name="bio" class="form-control vertical-textarea">{{$user->bio}}</textarea>
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
              <label for="facebook">Facebook username <i class="fa fa-facebook text-primary"></i></label> <span class="text-muted"> (e.g. MonogaTest)</span>
              <input type="text" name="facebook" id="facebook" value="{{$user->social->facebook}}" class="form-control">
              @if ($errors->has('facebook'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('facebook') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="instagram">Instagram username <i class="fa fa-instagram text-primary"></i></label> <span class="text-muted"> (e.g. MonogaTest)</span>
              <input type="text" id="instagram" name="instagram" value="{{$user->social->instagram}}" class="form-control">
              @if ($errors->has('instagram'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('instagram') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="snapchat">Snapchat username <i class="fa fa-snapchat-ghost text-primary"></i></label> <span class="text-muted"> (e.g. MonogaTest)</span>
              <input type="text" id="snapchat" name="snapchat" value="{{$user->social->snapchat}}" class="form-control">
              @if ($errors->has('snapchat'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('snapchat') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label for="twitter">Twitter username <i class="fa fa-twitter text-primary"></i></label> <span class="text-muted"> (e.g. MonogaTest)</span>
              <input type="text" id="twitter" name="twitter" value="{{$user->social->twitter}}" class="form-control">
              @if ($errors->has('twitter'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('twitter') }}</strong>
                  </span>
              @endif
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
    <script>
      UPLOADCARE_LOCALE = "en";
      UPLOADCARE_LIVE = false;
      UPLOADCARE_PUBLIC_KEY = "433c81261bbe0d482bab";
      UPLOADCARE_TABS = "file url dropbox";
    </script>
    <script src="https://ucarecdn.com/widget/2.10.0/uploadcare/uploadcare.full.min.js" charset="utf-8"></script>

     @include('partials.footer._home')
@endsection

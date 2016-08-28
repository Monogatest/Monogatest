@extends('layouts.master')
@section('title')
{{ $user->username }} | MonogaTest
@endsection

@section('content')
    @include('partials.app-nav')
    <div class="container section">
      <section class="col-md-9">
        <section class="user-info-container clearfix">
        <div class="row">
            <div class="col-sm-4">
            <div class="profile-photo-container">
                <img src="{{$user->avatar}}" alt="{{$user->username}}">
            </div>
            </div>
            <article class="bio col-sm-8">
                <h3>{{$user->username}}</h3>
                <strong>{{$user->first_name}} {{$user->last_name}}</strong>
                {{$user->bio or ''}}
            </article>
        </div>
            @if(Auth::check())
                @if(Auth::user()->id == $user->id)
                <a href="{{ route('getEditUser', ['username' => Auth::user()->username]) }}" class="pull-right btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                @endif
            @endif
        </section>
        <section class="test-by-user clearfix">
            @if($user->tests->count())
            <h2>Tests By {{ $user->username }}</h2>
            <div class="row tests-container">
                @foreach($user->tests->take(4) as $test)
                    @include('partials.foreach.dump_test_card')
                @endforeach
            </div>
            <div class="col-md-12"><a href="" class="btn btn-monogatest">View All</a></div>
            @else
                <h2>{{ $user->username }} Have not submitted any tests yet</h2>
            @endif
        </section>

        <section class="test-by-user clearfix">
            <div class="row tests-container">
                <h2>Recently {{$user->username}} took the following tests</h2>
                @foreach($user->tests_taken->sortByDesc('created_at')->take(4) as $test)

                    <div class="recent-test-container">
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <h3 class="title">{{$test->title}}</h3>
                                <img src="{{$test->poster}}" alt="{{$test->title}}">
                            </div><div class="col-md-8 score-container">
                                <h4 class="score">{{$test->pivot->score}}</h4>
                                <?php
                                    $mark = $test->pivot->score;
                                    $color = 'danger';
                                    if($mark >= 90) $color = 'success active';
                                    else if($mark >= 80) $color = 'info';
                                    else if($mark >= 50) $color = 'warning';
                                ?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-{{$color}} progress-bar-striped" role="progressbar"
                                    aria-valuenow="{{$mark}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$mark}}%">
                                      {{$mark}}%
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- @include('partials.foreach.dump_test_card') --}}
                @endforeach
            </div>
        </section>

      </section>
      @include('partials.sidebar')
    </div>
     @include('partials.home-footer')
@endsection

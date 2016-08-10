@extends('layouts.master')

@section('title')
{{ $test->title }} - Result | MonogaTest
@endsection
@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1><span lang="ja">{{ $test->title }}</span> Result</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <p class="text-right margin-zero">{{ Auth::check() ? "Logged in as " . Auth::user()->first_name : "Not Logged in"}}</p>
          <h3>Your Answers</h3>
          <p lang="ja">
          @foreach($user_answers as $key => $answer)
            {{$key}}. <strong class="{{$answer['status'] ? 'text-info' : 'text-danger'}}">{{$answer['answer']}}</strong>
          @endforeach
          </p>
          <h3>your score: {{$mark}}/{{$total}}</h3>
          <?php
            $mark = $mark*100/$total;
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
          <div class="buttons-containter clearfix">
            <a class="btn btn-monogatest margin-top col-md-3 col-md-push-2" href="{{ route('tests') }}">Back to tests</a>
            <a class="btn btn-default margin-top col-md-3 col-md-push-4" href="{{ route('tests.test', ['test_id' => $test->id]) }}">Retake this test</a>
          </div>
          @if(Auth::check())
            <p class="text-right text-muted margin-zero">{!! $last_score !!}</p>
          @endif
        </div>
      </div>
    </div>
@endsection

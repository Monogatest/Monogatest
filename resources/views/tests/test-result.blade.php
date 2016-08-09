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
          <p class="text-right">{{ Auth::check() ? "Logged in as " . Auth::user()->first_name : "Not Logged in"}}</p>
          <h3>Your Answers</h3>
          <p lang="ja">
          @foreach($user_answers as $key => $answer)

            {{$key}}. <span class="{{$answer['status'] ? 'text-info' : 'text-danger'}}">{{$answer['answer']}}</span>
          @endforeach
          </p>
          <h3>Test Key Answers</h3>
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
        </div>
      </div>
    </div>
@endsection

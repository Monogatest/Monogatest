@extends('layouts.master')

@section('title')
{{ $test->title }} - Submit | MonogaTest
@endsection

@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1><span lang="ja">{{ $test->title }}</span> Submit</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body text-left">
          @if(Auth::check())
          Logged in as: {{ Auth::user()->first_name }}
          @else
          Not Logged in
          @endif
          <h3>Your Answers</h3>
          <ol lang="ja">
            @foreach($session_answers as $answer)
              <li>{{ $answer['answer'] }}</li>
            @endforeach
          </ol>
          <h3>Test Key Answers</h3>
          <ol>
            @foreach($questions as $question)
            <li>
              @foreach($question->answers as $answer)
                v: {{ $answer->value }} s: {{$answer->status}} | 
              @endforeach
            </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
@endsection

@extends('layouts.master')

@section('title')
{{ $test->title }} - Review | MonogaTest
@endsection

@section('content')
  <div class="container section">
    <div class="col-md-12 text-center">
      <a href="/"><img class="logo" src="/images/home-title.svg" alt="MonogaTest" /></a>
      <h1><span lang="ja">{{ $test->title }}</span> Review</h1>
    </div>
    <div class="col-md-8 col-md-push-2">
      <div class="panel panel-default">
        <div class="panel-body text-left">
          <ol lang="ja">
            @foreach($session_answers as $answer)
              <li>{{ $answer['beforeString'] }} <strong class="text-info">{{ $answer['answer'] }}</strong> {{$answer['afterString']}}</li>
            @endforeach
          </ol>
          <div class="buttons-containter">
            <a href="{{ route('tests.test.start', ['test_id' => $test->id, 'page_number' => $pages->count()]) }}" class="btn btn-default col-md-3 col-md-push-2"><i class="fa fa-chevron-left"></i> Edit Answers</a>
            <a href="{{ route('tests.test.submit', ['test_id' => $test->id]) }}" class="btn btn-monogatest col-md-3 col-md-push-4"><i class="fa fa-check-square"></i> Submit Test</a></div>
        </div>
      </div>
    </div>
@endsection

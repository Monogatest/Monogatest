<div class="col-md-3 col-sm-4">
   <div class="monogatest-card-small">
      <a href="{{ route('tests.test', ['test_id' => $test->id]) }}">
        <img src="{{ $test->poster }}" alt="{{ $test->title }}" class="card-image">
      </a>
      <div class="test-description">
        <a href="{{ route('tests.test', ['test_id' => $test->id]) }}">
          <h4 class="title" lang="ja">{{ $test->title }}</h4>
        </a>
        <a class="test-author" href="{{ route('getUser', ['username' => $test->user->username]) }}">{{ $test->user->username }}</a>
      </div>
  </div>
</div>
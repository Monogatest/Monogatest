<footer class="sticky-footer">
	<div class="collapse-footer">
		<i class="fa fa-angle-down"></i>
	</div>
	<div class="container">
		<div class="col-md-3 col-md-push-9">
			<div class="footer-nav-buttons">
				<div class="icon-container-dark previous"><i class="fa fa-angle-left"></i></div>
				<div class="icon-container-dark next"><i class="fa fa-angle-right"></i></div>
				<?php $isActive = count($session_answers) == $question_count; ?>
				<a @if($isActive) href="{{ route('tests.test.review', ['test_id' => $test->id]) }}" @endif><div class="icon-container-dark submit {{ $isActive? '' : 'disabled' }}" data-questions="{{ $question_count }}"><i class="fa fa-list"></i> Review</div></a>
			</div>
		</div>
		<div class="col-md-9 col-md-pull-3">
			<p class="question-excerpt"><span class="question-before"></span> <input id="test-input" class="form-control" type="text" readonly value="" lang="ja" /> <span class="question-after"></span></p>
		</div>
		<div class="col-md-12">
			<div class="test-answers">
			</div>
		</div>
	</div>
</footer>

<footer class="sticky-footer">
	<div class="collapse-footer">
		<i class="fa fa-angle-down"></i>
	</div>
	<div class="container">
		<div class="col-md-3 col-md-push-9">
			<div class="footer-nav-buttons">
				<div class="icon-container-dark previous"><i class="fa fa-angle-left"></i></div>
				<div class="icon-container-dark next"><i class="fa fa-angle-right"></i></div>
				<div class="icon-container-dark submit disabled" data-questions="{{ $question_count }}"><i class="fa fa-share-square"></i> Submit</div>
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

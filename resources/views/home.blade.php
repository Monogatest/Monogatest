@extends('layouts.master')

@section('title')
MonogaTest
@endsection

@section('content')
<header class="home-header">
	@if(Session::has('status'))
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  {{Session::get('status')}}
	</div>
	@endif
	 <div class="logo-title">
		 <img src="/images/home-title.svg" alt="MonogaTest" />
	 </div>
	 <div class="go-down"><a href="#about" class="page-scroll"><i class="fa fa-angle-double-down fa-5x" aria-hidden="true"></i></a></div>
</header>
	@include('partials.home-nav')
	 <!-- About Section -->
	 <section id="about" class="section about-section">
			 <div class="container">
				 <h1>About MonogaTest</h1>
					<div class="row text-center">
						<div class="col-lg-8 vcenter content-animate-fadeInDown">
							<p class="about-us">MonogaTest (<span lang="ja"><ruby><rb>物</rb><rp>(</rp><rt>もの</rt><rp>)</rp></ruby>がテスト</span>) aims to provide certain intermediate japanese language skills. The website provides various types of tests through reading stories, articles, or general questions and then starting the exam to test your knowledge, memory, and skills in the Japanese language.</p>
							<p class="about-us">By signing up to the MonogaTest website you will be able to: Save your exams history, track your language skills improvement, and submit your own test for others to solve. You will also be able to contact the authors of the exams and make full use of the MonogaTest website features.</p>
						</div>
						<div class="col-lg-4 vcenter content-animate-fadeInLeft">
							<img src="/images/test-sample.png" alt="MonogaTest" />
						</div>
					 </div>
			 </div>
	 </section>

	 <!-- Services Section -->
	 <section id="test" class="section test-section">
			 <div class="container">
					 <div class="row">
							 <div class="col-lg-12">
									 <h1>Take a Test</h1>
									 <div class="row">
										 <div class="col-md-4 col-sm-6">
	 									 	<div class="monogatest-card"><a href="#">
	 									 			<img src="/images/warashibe.jpg" alt="" class="card-image">
	 									 			<h2 class="title" lang="ja">わらしべ長者</h2>
	 									 		</a></div>
	 									 </div>
	 									 <div class="col-md-4 col-sm-6">
	 									 	<div class="monogatest-card"><a href="#">
	 									 			<img src="/images/warashibe.jpg" alt="" class="card-image">
	 									 			<h2 class="title">Weeew hrar C++</h2>
	 									 		</a></div>
	 									 </div>
										 <div class="clearfix visible-sm-block"></div>
	 									 <div class="col-md-4 col-sm-6">
	 									 	<div class="monogatest-card"><a href="#">
	 									 			<img src="/images/warashibe.jpg" alt="" class="card-image">
	 									 			<h2 class="title">Weeew hrar C++</h2>
	 									 		</a></div>
	 									 </div>
									 </div>
										 <div class="row">
											 <div class="col-lg-12">
												 <h4 class="text-center">or visit the Tests Page to view all tests</h4>
												 <a href="{{ route('tests') }}" class="btn btn-monogatest">Visit Tests Page</a>
											 </div>
										 </div>
							 </div>
					 </div>
			 </div>
	 </section>

	 <!-- Contribute Section -->
	 <section id="contribute" class="section contribute-section">
			 <div class="container">
					 <div class="row">
							 <div class="col-lg-12">
								 <h1>Contribute</h1>
								 <p>
								 	Want to share your own test? Just submit your story/article with the prefered questions and answers and we will post your test under your name.
								 </p>
								 <div class="contribute-container clearfix">
								 	<div class="contribute-item content-animate-fadeInLeft" data-toggle="modal" data-target="#askModal">
										<span class="icon"><img class="contribute-image" src="/images/ask-a-question.svg" alt="Ask a Question"></i></span>
										<span class="title">Ask a Question</span>
										<p class="description">Have trouble in MonogaTest? feel free to ask us a question! also visit the "FAQ section" to see the frequently asked questions</p>
									</div>
								 	<div class="contribute-item content-animate-fadeInLeft" data-toggle="modal" data-target="#createTestModal">
										<span class="icon"><img class="contribute-image" src="/images/create-test.svg" alt="Create a Test"></i></span>
										<span class="title">Create a Test</span>
										<p class="description">From here you can submit your own test and share it with other MonogaTest members. The submitted tests will be received by MonogaTest auditing team then we will post the test under your name</p>
									</div>
								 	<div class="contribute-item content-animate-fadeInLeft" data-toggle="modal" data-target="#volunteerModal">
										<span class="icon"><i class="glyphicon glyphicon-heart"></i></span>
										<span class="title">Volunteer</span>
										<p class="description">You can volunteerly join MonogaTest team and help us by: auditing, developing and overall improving our website to give other MonogaTest members the best experience</p>
									</div>
								 	<div class="contribute-item content-animate-fadeInLeft" data-toggle="modal" data-target="#requestModal">
										<span class="icon"><i class="glyphicon glyphicon-check"></i></span>
										<span class="title">Submit a Request</span>
										<p class="description">Have any ideas you would like us to add to the website? Please submit them from here</p>
									</div>
								 </div>
							 </div>
					 </div>
			 </div>
			 <!-- Ask Modal -->
		  <div class="modal fade" id="askModal" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Ask a Question</h4>
		        </div>
		        <div class="modal-body text-left">
							@if(! Auth::check())
							<p>
								Please <a href="/login">Login</a> or provide the following information to help us contact you and answer your question
							</p>
							@endif
							<form role="form">
								@if(! Auth::check())
							 <div class="form-group">
								 <label for="email">Email address (Required):</label>
								 <input type="email" class="form-control" id="email">
							 </div>
							 <div class="form-group">
								 <label for="name">Name (Required):</label>
								 <input type="text" class="form-control" id="name">
							 </div>
							 @endif
							 <div class="form-group">
								 <label for="question">Question (Required):</label>
								 <textarea class="form-control" id="question"></textarea>
							 </div>
							 <button type="submit" class="btn btn-monogatest">Submit</button>
							</form>
		        </div>
		      </div>
		    </div>
		  </div>
			 <!-- Volunteer Modal -->
		  <div class="modal fade" id="volunteerModal" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Volunteer</h4>
		        </div>
						<div class="modal-body text-left">
							<p>
								Only members of MonogaTest can join the volunteer team, Please <a href="/login">Login</a>
							</p>
		        </div>
		      </div>
		    </div>
		  </div>

			 <!-- Submit a Request Modal -->
		  <div class="modal fade" id="requestModal" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Submit a Request</h4>
		        </div>
						<div class="modal-body text-left">
							<p>
								Please <a href="/login">Login</a> or provide the following information to help us contact you and answer your question
							</p>
							<form role="form">
							 <div class="form-group">
								 <label for="email">Email address (Required):</label>
								 <input type="email" class="form-control" id="email">
							 </div>
							 <div class="form-group">
								 <label for="name">Name (Required):</label>
								 <input type="text" class="form-control" id="name">
							 </div>
							 <div class="form-group">
								 <label for="request">Request (Required):</label>
								 <textarea class="form-control" id="request"></textarea>
							 </div>
							 <button type="submit" class="btn btn-monogatest">Submit</button>
							</form>
		        </div>
		      </div>
		    </div>
		  </div>
	 </section>
	 <!-- FAQ Section  -->
	 <section id="faq" class="section faq-section">
			 <div class="container">
					 <div class="row">
							 <div class="col-lg-12">
								 <h1>FAQ</h1>
								 <div id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingOne">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ1" aria-expanded="false" aria-controls="FAQ1">
								          Do I need to sign up to start a test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ1" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingOne">
											<div class="panel-collapse">
								      	It is <em>not mandatory</em> to sign up to MonogaTest to start a test, however it is <strong>highly recommended</strong> to sign up, because by signing up you will be able to trace your progress, rate, and comment on the tests
								  	  </div>
							    	</div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ2" aria-expanded="false" aria-controls="FAQ2">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ2" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the <a href="#contribute" class="page-scroll">contribute section</a>, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ3" aria-expanded="false" aria-controls="FAQ3">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ3" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the contribute section, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ4" aria-expanded="false" aria-controls="FAQ4">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ4" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the contribute section, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ5" aria-expanded="false" aria-controls="FAQ5">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ5" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the contribute section, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ6" aria-expanded="false" aria-controls="FAQ6">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ6" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the contribute section, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								  <div class="panel panel-default content-animate-fadeInDown">
								    <div class="panel-heading" role="tab" id="FAQHeadingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#FAQ7" aria-expanded="false" aria-controls="FAQ7">
								          How can I create my own test?
								        </a>
								      </h4>
								    </div>
								    <div id="FAQ7" class="collapse" role="tabpanel" aria-labelledby="FAQHeadingTwo">
											<div class="panel-collapse">
												To create your own test you need to go to the contribute section, then click on the "Create a Test" button. Then fill up the fields in the "Create a Test" page. Your test will be sent to our team via email, and once we confirm the test we will post it under your name on the website.
											</div>
								    </div>
								  </div>
								</div>
							 </div>
					 </div>
			 </div>
	 </section>
	 @include('partials.home-footer')
@endsection

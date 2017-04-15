<nav class="navbar navbar-accent navbar-late-stick" role="navigation">
			 <div class="container">
					 <div class="navbar-header page-scroll">
							 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									 <span class="sr-only">Toggle navigation</span>
									 <span class="icon-bar"></span>
									 <span class="icon-bar"></span>
									 <span class="icon-bar"></span>
							 </button>
							 <a class="navbar-brand page-scroll" href="#page-top">MonogaTest</a>
					 </div>

					 <!-- Collect the nav links, forms, and other content for toggling -->
					 <div class="collapse navbar-collapse navbar-ex1-collapse">
							 <ul class="nav navbar-nav">
									 <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
									 <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
									 <li><a class="page-scroll" href="#about">About</a></li>
									 <li><a class="page-scroll" href="#test">Take a Test</a></li>
									 <li><a class="page-scroll" href="#contribute">Contribute</a></li>
									 <li><a class="page-scroll" href="#faq">FAQ</a></li>
							 </ul>
							 @if(Auth::check())
							 <ul class="nav navbar-nav navbar-right">
									 <li><a href="{{ route('getUser', ['username' => $username]) }}">{{$username}}</a></li>
									 <li><a href="{{ route('auth.logout')}}">Logout</a></li>
							 </ul>
							 @else
							 <ul class="nav navbar-nav navbar-right">
									 <li><a href="{{ route('auth.login') }}">Login</a></li>
									 <li><a href="{{ route('auth.register') }}">Register</a></li>
							 </ul>
							 @endif

					 </div>
					 <!-- /.navbar-collapse -->
			 </div>
			 <!-- /.container -->
	 </nav>

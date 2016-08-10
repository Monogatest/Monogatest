<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="description" content="Multi-level Japanese language tests meant to improve your japanese skills">
	<meta name="author" content="mohdkhalilsabba">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/earlyaccess/notosansjapanese.css' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-accent">
	@yield('content')
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.easing.min.js"></script>
	<script src="/js/scrolling-nav.js"></script>
	<script src="/js/viewportchecker.js"></script>
	<script src="/js/script.js"></script>
	@stack('test')
</body>
</html>

<html>
	<head>
		<title>@yield('titlebar')</title>
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-theme.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('css/custom.css')}}">
		{{HTML::script('js/jQuery.js')}}
		{{HTML::script('js/bootstrap.js')}}
		{{HTML::script('js/custom.js')}}
		{{HTML::script('js/testResult.js')}}
	</head>
	<body>
		@yield('content')
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>{{ $data['title'] }}</title>
</head>
<body>

	<a href="{{ url('/') }}">Index</a>
	<a href="{{ url('/home') }}">Home</a>
	<a href="{{ url('/about') }}">About</a>
	<a href="{{ url('/contact') }}">Contact</a>

	<h1>{{ $data['heading'] }}</h1>

</body>
</html>
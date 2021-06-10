<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
</head>
<body>

	@section('header')
		<div class="header">
			<h1>Header</h1>
		</div>
	@show


	<div class="content">
		@yield('content')
	</div>


	@section('footer')
	<div class="footer">
		<h1>Footer</h1>
	</div>
	@show

</body>
</html>
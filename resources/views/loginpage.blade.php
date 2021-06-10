<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>

	<form method="post" action="{{ url('/contact') }}" class="form-control">
		{{ csrf_field() }}

		@if(Session('msg'))
			{{ Session('msg') }}
		@endif

		<input type="text" name="agec">

		<input type="submit" name="submit" value="submit"> 

	</form>

</body>
</html>
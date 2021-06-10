<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
</head>
<body>

	<a href="{{ url('showCategory')}}">Show Category</a><br><br>

	@if(Session('msg'))
		{{ Session('msg')}}
	@endif

	<form method="post" action="{{ url('/categoryData') }}">
		{{ csrf_field() }}

		<input type="text" name="category">
		<input type="submit" name="submit" value="submit">

	</form>

</body>
</html>
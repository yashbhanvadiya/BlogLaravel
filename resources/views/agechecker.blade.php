<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="post" action="{{ url('/about') }}">
		{{ csrf_field() }}
		
		<input type="text" name="agec">

		<input type="submit" name="submit" value="submit" >

	</form> 


</body>
</html>
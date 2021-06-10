<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	@if(Session('msg'))
		{{ Session('msg') }}
	@endif

	<form method="post" action="{{ url('/checklogin') }}">
		{{ csrf_field() }}

		<table border="1px" width="500px" style="margin:auto;">
			
			<tr>
				<td>Enter Email</td>
				<td><input type="text" name="email"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Login"></td>
			</tr>

		</table>

	</form>

</body>
</html>
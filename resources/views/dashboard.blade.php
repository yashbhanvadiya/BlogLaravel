<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>

	<h1>This Is Dashboard Page</h1>

	{{ session('record')[0]->name }}

	<br><br>
	<a href="{{ url('/logout') }}">Logout</a>

</body>
</html>
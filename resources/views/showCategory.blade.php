<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="{{ url('/category')}}">Add Category</a><br><br>

		<table width="auto" border="1px">
			
			<tr>
				<td>Category Id</td>
				<td>Category Name</td>
			</tr>

			@foreach($AllCategory as $val)
			<tr>
				<td>{{ $val->category_id }}</td>
				<td>{{ $val->category_name }}</td>
			</tr>
			@endforeach

		</table>


</body>
</html>
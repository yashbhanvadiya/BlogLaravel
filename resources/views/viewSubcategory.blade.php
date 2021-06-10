<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="{{ url('/subcategory')}}">Add SubCategory</a><br><br>

		<table width="auto" border="1px">
			
			<tr>
				<td>SubCategory Id</td>
				<td>Category Id</td>
				<td>SubCategory Name</td>
			</tr>

			@foreach($suball as $val)
			<tr>
				<td>{{ $val->subcategory_id }}</td>
				<td>{{ $val->category_name }}</td>
				<td>{{ $val->subcategory_name }}</td>
			</tr>
			@endforeach

		</table>


</body>
</html>
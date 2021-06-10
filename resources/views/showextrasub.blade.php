<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="{{ url('/extracategory')}}">Add ExtraCategory</a><br><br>

		<table width="auto" border="1px">
			
			<tr>
				<td>Extra Cat Id</td>
				<td>Extra Category Id</td>
				<td>Extra SubCategory Id</td>
				<td>Extra Name</td>
			</tr>

			@foreach($suball as $val)
			<tr>
				<td>{{ $val->extra_cat_id }}</td>
				<td>{{ $val->category_name }}</td>
				<td>{{ $val->subcategory_name }}</td>
				<td>{{ $val->extra_sub_name }}</td>
			</tr>
			@endforeach

		</table>


</body>
</html>
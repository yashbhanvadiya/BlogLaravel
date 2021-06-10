<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@if(Session('msg'))
		{{ Session('msg')}}
	@endif

	<a href="{{ url('/showsubcategory')}}">Show SubCategory</a><br><br>

	<form method="post" action="{{ url('/subcategoryData') }}">
		{{ csrf_field() }}

		<select name="category_sub_id">
				
			<option value="">--Select Category--</option>

			@foreach($category as $cat)
				<option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
			@endforeach

		</select><br><br>

		<input type="text" name="subcategory_name">

		<input type="submit" name="submit" value="submit">

	</form>

</body>
</html>
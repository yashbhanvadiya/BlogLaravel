<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	@if(Session('msg'))
		{{ Session('msg')}}
	@endif

	<a href="{{ url('/show_extrasubcategory')}}">Show ExtraCategory</a><br><br>

	<form method="post" action="{{ url('/extrasubcategoryData') }}">
		{{ csrf_field() }}

		<select name="category_sub_id" id="category_sub_id" onclick="return getSubcategory()">
				
			<option value="">--Select Category--</option>

			@foreach($category as $cat)
				<option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
			@endforeach

		</select><br><br>

		<select name="extra_subcategory_data" id="extra_subcategory_data">
				
			<option value="">--Select SubCategory--</option>

		</select><br><br>

		<input type="text" name="extra_category_name">

		<input type="submit" name="submit" value="submit">

	</form>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function getSubcategory()
{
	var category_id = $('#category_sub_id').val();
	var _token = $('input[name="_token"]').val();
	$.ajax({
		url : "/get_subcategory_record",
		method : "POST",
		data :{
			_token : _token, cat_id : category_id
		},
		success:function(res)
		{
			$('#extra_subcategory_data').html(res);
		}
	});
	
}



</script>
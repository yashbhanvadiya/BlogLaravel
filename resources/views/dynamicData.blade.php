<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	Country <select name="country" id="country" class="dynamic" data-dependent="state">
		
		<option value="">Select Country</option>

		@foreach($country as $val)

			<option value="{{ $val->country}}">{{ $val->country}}</option>

		@endforeach

	</select><br><br>


	State <select name="state" id="state" class="dynamic" data-dependent="city">

	</select><br><br>


	City <select name="city" id="city">

		{{ csrf_field() }}

	</select>


</body>

<script>
	
$(document).ready(function(){
	$('.dynamic').change(function(){
		var select = $(this).attr('id');
		var value = $(this).val();
		var dependent = $(this).data('dependent');
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url : "/dynamicdepe",
			method : "POST",
			data :{
				select : select, value : value, dependent : dependent, _token : _token
			},
			success:function(result)
			{
				$('#'+dependent).html(result);
			}
		});
	});
});

</script>
</html>
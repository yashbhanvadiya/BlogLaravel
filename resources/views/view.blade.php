<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		td{
			padding: 3px 8px;
		}
	</style>
</head>
<body>

<a href="{{ url('/register') }}">Form</a> <br><br>

	@if(session('msg'))

	<p>{{ session('msg') }}</p>

	@endif

	<form method="post" action="/searching">
		{{ csrf_field() }}
		<input type="text" name="search">
		<input type="submit" name="searching" value="searching">
	</form>

	<form method="post" action="{{ url('/multipleDeleteRecord') }}">
		{{ csrf_field() }}
		<table width="auto" border="1px">
			
			<tr>
				<td><input type="checkbox" name="multipleDelete1" id="checkAll">&nbsp;<input type="submit" name="submit" value="DeleteAll"></td>
				<td>Id</td>
				<td>Name</td>
				<td>Email</td>
				<td>Gender</td>
				<td>Hobby</td>
				<td>City</td>
				<td>Textarea</td>
				<td>Image</td>
				<td>Mimages</td>
				<td>Action</td>
			</tr>

	<?php foreach($allData as $val) { ?>

			<tr>
				<td><input type="checkbox" name="MultipleD[]" value="{{ $val->id }}"></td>
				<td>{{ $val->id }}</td>
				<td>{{ $val->name}}</td>
				<td>{{ $val->email}}</td>
				<td>{{ $val->gender}}</td>
				<td>{{ $val->hobby}}</td>
				<td>{{ $val->city}}</td>
				<td>{{ $val->textarea}}</td>
				<td><img src="/images/{{ $val->image }}" height="50px" width="50px"></td>
				<td>
					<?php $mimage = explode(',',$val->mimages);
						foreach($mimage as $mim) { ?>
							<img src="/mimages/{{ $mim }}" width="50px" height="50px">
					<?php } ?>		
				</td>
				<td><a href='{{ url("/delete_record/$val->id") }}'>Delete</a>
				    | <a href='{{ url("/update_record/$val->id") }}'>Update</a></td>
			</tr>

	<?php } ?>

			<tr>
				<td colspan="11">
					{{ $allData->links() }}
				</td>
			</tr>

		</table>
	</form>	

</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
	$("#checkAll").click(function(){
	    $('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
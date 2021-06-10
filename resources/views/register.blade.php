<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		td {
 		   padding: 5px 10px;
		}
	</style>
</head>
<body>

	<h1>User Registration</h1>

<a href="{{ url('/fetch_data')}}">Fetch Record</a><br><br>

	@if(session('msg'))

		<div>{{ session('msg') }}</div>

	@endif


	<!-- @if($errors->any())
		<ul>
			@foreach($errors->all() as $error)

				<li>{{ $error }}</li>

			@endforeach
		</ul>
	@endif -->

	<form method="post" action="{{ url('/data_insert') }}" enctype="multipart/form-data">

		{{ csrf_field() }}
		<table border="1px">
			
			<tr>
				<td>Enter Name</td>
				<td><input type="text" name="name" value="@if(old('name')){{ old('name') }}@endif"> <span style="color: red;">{{ $errors->first('name') }}</span></td>
			</tr>

			<tr>
				<td>Enter Email</td>
				<td><input type="text" name="email" value="@if(old('email')){{ old('email')}}@endif"> <span style="color: red;">{{ $errors->first('email') }}</span></td>
			</tr>

			<tr>
				<td>Select Gender</td>
				<td><input type="radio" name="gender" value="male" <?php if(old('gender')) { if(old('gender')=='male') { echo "checked";}} ?>>Male
					<input type="radio" name="gender" value="female" <?php if(old('gender')) { if(old('gender')=='female') { echo "checked";}}?>>Female
					<span style="color: red;">{{ $errors->first('gender') }}</span>
				</td>
			</tr>

			<?php $hobby = old('hobby'); ?>
			<tr>
				<td>Select Hobby</td>
				<td><input type="checkbox" name="hobby[]" value="reading" <?php if(old('hobby')) { if(in_array('reading',$hobby)) { echo "checked"; }} ?>>Reading
					<input type="checkbox" name="hobby[]" value="swimming" <?php if(old('hobby')) { if (in_array('swimming',$hobby)) { echo "checked"; }} ?>>Swimming
					<input type="checkbox" name="hobby[]" value="playing" <?php if(old('hobby')) { if(in_array('playing',$hobby)) { echo "checked"; }}?>>Playing
					<span style="color: red;">{{ $errors->first('hobby') }}</span>
				</td>
			</tr>

			<tr>
				<td>Select City</td>
				<td>
					<select name="city">
						<option value=''>--Select City--</option>
						<option value="surat" <?php if(old('city')){ if(old('city')=='surat') { echo "selected"; }} ?>>Surat</option>
						<option value="rajkot" <?php if(old('city')){ if(old('city')=='rajkot') { echo "selected"; }} ?>>Rajkot</option>
						<option value="ahemdabad" <?php if(old('city')){ if(old('city')=='ahemdabad') { echo "selected"; }} ?>>Ahemdabad</option>
						<option value="vadodara" <?php if(old('city')){if(old('city')=='vadodara') { echo "selected"; }} ?>>Vadodara</option>
					</select>
					<span style="color: red;">{{ $errors->first('city') }}</span>
				</td>
			</tr>

			<tr>
				<td>Text Area</td>
				<td><textarea rows="4" cols="30" name="textarea" type="textarea"></textarea></td>
			</tr>

			<tr>
				<td>Select Image</td>
				<td><input type="file" name="image"></td>
			</tr>

			<tr>
				<td>Select Multiple Images</td>
				<td><input type="file" name="mimages[]" multiple></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="submit"></td>
			</tr>

		</table>

	</form>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>User Registration</h1>

<a href="{{ url('/fetch_data')}}">Fetch Record</a><br><br>

	@if(session('msg'))

		<div>{{ session('msg') }}</div>

	@endif


	<form method="post" action="{{ url('/update_register_record') }}" enctype="multipart/form-data">

		{{ csrf_field() }}
		<table border="1px">
			
			<input type="hidden" name="id" value="<?php if(isset($single->id)) { echo $single->id; } ?>">

			<tr>
				<td>Enter Name</td>
				<td><input type="text" name="name" value="<?php if(isset($single->name)) { echo $single->name; } ?>"></td>
			</tr>

			<tr>
				<td>Enter Email</td>
				<td><input type="text" name="email" value="@if(isset($single->email)){{$single->email }} @endif"></td>
			</tr>

			<tr>
				<td>Select Gender</td>
				<td><input type="radio" name="gender" value="male" @if(isset($single->gender)) @if($single->gender == 'male') {{ 'checked' }} @endif @endif>Male
					<input type="radio" name="gender" value="female" @if(isset($single->gender)) @if($single->gender == 'female') {{ 'checked' }} @endif @endif>Female</td>
			</tr>

			<?php $hobby = explode(',',$single->hobby); ?>
			<tr>
				<td>Select Hobby</td>
				<td><input type="checkbox" name="hobby[]" value="reading" @if(isset($single->hobby)) @if(in_array('reading',$hobby)) {{ 'checked' }} @endif @endif>Reading
					<input type="checkbox" name="hobby[]" value="swimming" @if(isset($single->hobby)) @if(in_array('swimming',$hobby)) {{ 'checked' }} @endif @endif>Swimming
					<input type="checkbox" name="hobby[]" value="playing" @if(isset($single->hobby)) @if(in_array('playing',$hobby)) {{ 'checked' }} @endif @endif>Playing</td>
			</tr>

			<tr>
				<td>Select City</td>
				<td>
					<select name="city">
						<option value=''>--Select City--</option>
						<option value="surat" @if(isset($single->city)) @if($single->city == 'surat') {{ 'selected' }} @endif @endif>Surat</option>
						<option value="rajkot" @if(isset($single->city)) @if($single->city == 'rajkot') {{ 'selected' }} @endif @endif>Rajkot</option>						
						<option value="ahemdabad" @if(isset($single->city)) @if($single->city == 'ahemdabad') {{  'selected' }} @endif @endif>Ahemdabad</option>
						<option value="vadodara" @if(isset($single->city)) @if($single->city == 'vadodara') {{ 'selected' }} @endif @endif>Vadodara</option>
					</select>
				</td>
			</tr>

			<tr>
				<td>Text Area</td>
				<td><textarea rows="4" cols="30" name="textarea" type="textarea" value="@if(isset($single->textarea)) {{$single->textarea}} @endif"></textarea></td>
			</tr>

			<tr>
				<td>Select Image</td>
				<td><input type="file" name="image">
					<img src="/images/{{ $single->image }}" height="50px" width="50px"></td>
			</tr>

			<tr>
				<td>Select Multiple Images</td>
				<td><input type="file" name="mimages[]" multiple>
					<?php $mimage = explode(',',$single->mimages);
						foreach($mimage as $mim) { ?>
							<img src="/mimages/{{ $mim }}" width="50px" height="50px">
					<?php } ?>	
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="update"></td>
			</tr>

		</table>

	</form>

</body>
</html>
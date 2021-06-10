<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.col-md-12 {
		    display: flex;
		}
    </style>

</head>
<body> 

	<div class="container">
			
		<div class="col-md-12">
				
			<div class="col-md-6">
				
				<table class="table table-hover">
					<thead>
				    	<tr>
					      <th scope="col">Id</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Phone</th>
					    </tr>
					</thead>

					<tbody>
						
					</tbody>
				</table>		
			</div>

			<div class="col-md-6"> 

				<form method="post">

					<input type="text" name="id" id="id" class="form-control id" readonly="">

					<div class="form-group">
					  <label class="col-form-label" for="inputDefault">Enter Name</label>
					  <input type="text" name="name" id="name" class="form-control">
					  <span style="color: red" id="error_name"></span>
					</div>

					<div class="form-group">
					  <label class="col-form-label" for="inputDefault">Enter Email</label>
					  <input type="text" name="name" id="email" class="form-control">
					  <span style="color: red" id="error_email"></span>
					</div>

					<div class="form-group">
					  <label class="col-form-label" for="inputDefault">Enter Phone</label>
					  <input type="text" name="name" id="phone" class="form-control">
					  <span style="color: red" id="error_phone"></span>
					</div>

					<div class="form-group">
					  <input type="button" name="submit" id="submit" value="submit" class="btn btn-success"  onclick="return saveData()">
					  <input type="button" name="update" id="update" value="update" class="btn btn-success" onclick="return updateData()">
					</div>
				</form>

			</div>

		</div>

	</div>

</body>
</html>



<script>

	$('#update').hide();
	$('.id').hide();

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	}); 

	viewData(); 

	function viewData()
	{
		$.ajax({
			type : "GET",
			dataType : "json",
			url : "/cruds",
			success:function(responce)
			{
				var rows = '';
				$.each(responce, function(key,value){
					rows = rows + "<tr>";
					rows = rows + "<td>"+value.id+"</td>";
					rows = rows + "<td>"+value.name+"</td>";
					rows = rows + "<td>"+value.email+"</td>";
					rows = rows + "<td>"+value.phone+"</td>";
					rows = rows + "<td><button type='button' onclick='deleteData("+value.id+")'>Delete</button></td>";
					rows = rows + "<td><button type='button' onclick='editData("+value.id+")'>Edit</button></td>";
					rows = rows + "</tr>";
				});

				$('tbody').html(rows);
			}
		})
	}


	function editData(id)
	{
		$.ajax({
			type : "GET",
			dataType : "json",
			url : "/cruds/"+id+"/edit",
			success:function(response)
			{
				$('.id').show();
				$('#update').show();
				$('#submit').hide();	
				// console.log(response.name);
				$('#name').val(response.name);
				$('#email').val(response.email);
				$('#phone').val(response.phone);
				$('#id').val(response.id);
			}
		});
	}


	function saveData()
	{
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		$.ajax({
			type : "POST",
			dataType : "json",
			url : "/cruds",
			data : { name : name, email : email, phone : phone },
			success:function(response)
			{
				viewData();
				clearData();
				console.log(response.error['name']);

				if(response.error['name'] != '')
				{
					$('#error_name').html(response.error['name']);
				}
				else
				{
					$('#error_name').html('');
				}

				if(response.error['email'] != '')
				{
					$('#error_email').html(response.error['email']);
				}
				else
				{
					$('#error_email').html('');
				}

				if(response.error['phone'] != '')
				{
					$('#error_phone').html(response.error['phone']);
				}
				else
				{
					$('#error_phone').html('');
				}
			}
		});
	}

	function clearData()
	{
		$('#name').val('');
		$('#email').val('');
		$('#phone').val('');
	}

	function deleteData(id)
	{
		$.ajax({
			type : "DELETE",
			dataType : "json",
			url : "/cruds/"+id,
			success:function(response)
			{
				viewData();
			}
		})
	}

	function updateData()
	{
		var id = $('#id').val();
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		$.ajax({
			type : "PUT",
			dataType : "json",
			url : "/cruds/"+id,
			data : { name : name, email : email, phone : phone },
			success:function(response)
			{
				viewData();
				clearData();
				$('.id').hide();
				$('#update').hide();
				$('#submit').show();
			}
		});
	}

</script>
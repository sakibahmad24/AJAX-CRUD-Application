<!DOCTYPE html>
<html>
<head>
	<title>PHP AJAX CRUD</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity=">sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<style>
		body{
			margin: 0;
			padding: 0;
			background-color: #f1f1f1;
		}
		.box{
			width: 750px;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-top: 100px;
		}
	</style>
</head>
<body>
	<div class="container box">
		<h3 align="center">PHP AJAX Crud</h3>
		<hr>
		<hr>
		<label>Enter First Name:</label>
		<input type="text" name="first_name" id="first_name" class="form-control"/>
		<br/>
		<label>Enter Last Name:</label>
		<input type="text" name="last_name" id="last_name" class="form-control"/>
		<br /><br />
		<div align="center">
			<input type="hidden" name="id" id="user_id"/>
			<button type="button" name="action" id="action" class="btn btn warning"></button>
		</div>
		<hr>
			<h3 align="center">All the updated data from table</h3>
		<hr>
		<div id="result" class="table-responsive">
			
		</div>
	</div>	
</body>
</html>

<script>
	$(document).ready(function(){
		fetchUser();
		function fetchUser()
		{
			var action = "select";
			$.ajax({
				url : "select.php",
				method: "POST",
				data:{action:action},
				success:function(data){
					$('#first_name').val('');
					$('#last_name').val('');
					$('#action').text("Add");
					$('#result').html(data);
				}
			});
	}

	$('#action').click(function(){
			var firstName = $('#first_name').val();
			var lastName = $('#last_name').val();
			var id = $('#user_id').val();
			var action = $('#action').text();

			if (firstName != '' && lastName != '') {

				$.ajax({
					url: "action.php",
					method:"POST",
					data:{firstName:firstName, lastName:lastName, id:id, action:action},
					success:function(data){
						alert(data);
						fetchUser();
					}
				});
			}
			else{
				alert("Both Fields are required");
			}


		});

		$(document).on('click','.update', function(){
			var id = $(this).attr("id");
			$.ajax({
				url : "fetch.php",
				method:"POST",
				data:{id;id},
				dataType:"json",
				success:function(data){
					$('#action').text("Edit");
					$('#user_id').val(id);
				}
			})
		});
	});
		

</script>
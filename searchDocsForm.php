<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Search Form</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<script>
		$(document).ready(function(){

			load_data();

			function load_data(input)
			{
			$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{input},
			success:function(data)
			{
				$('#showdata').html(data);
			}
			});
			}
						
			$('#mysearch').keyup(function(){
				var search = $(this).val();
				if(search != ''){
					load_data(search);
				}
				else{
					load_data();
					//$('#showdata').css('display','none');
				}
				});
		});
</script>
	</head>
	<body>

	
		<div class="container">
			<br/>
			<a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button> </a>
			<h2 align="center">Search a doctor</h2><br/>
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="mysearch" id="mysearch" placeholder="Enter name, surname, specialisation or location" class="form-control" />
					<span class="input-group-addon"></span>
				</div>
			</div>
			<br />
			<div id="showdata"></div>
		</div>
		
		
		
	
	</body>
</html>
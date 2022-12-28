<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search Form</title>
	</head>
	<body>
		
		<h1 style="text-align:center">Define Your Search Terms</h1>
		<form method="post" action="searchDB.php"> 
			Location: <input type="text" name="loc">
			<br><br>
			Expertise: <input type="text" name="exp">
			<input type="submit" name="Select" value="Select"> 
			<br><br>
		</form>
		<?php
			echo '<body style="background-color:rgb(207,185,151)">'
		?>
	</body>
</html>
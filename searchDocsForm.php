<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search Form</title>
	</head>
	<body>
		
		<h1 style="text-align:center">Define Your Search Terms</h1>
		<form method="post" action="searchDB.php"> 
			<label for="Location">Choose a Location:</label>
			<select name="locs" id="locs">
				<?php 
					$result = $conn->query("SELECT DISTINCT loc FROM docs");
					while ($row = $result->fetch_assoc()){
						$loc = $row['loc']; 
						echo '<option value="'.$loc.'">'.$loc.'</option>';
					}
				?>
			 </select>
			<br><br>
			<label for="Expertise">Choose a Profession:</label>
			<select name="exp" id="exp">
				<?php 
					$result = $conn->query("SELECT DISTINCT exp FROM docs");
					while ($row = $result->fetch_assoc()){
						$exp = $row['exp']; 
						echo '<option value="'.$exp.'">'.$exp.'</option>';
					}
				?>
			 </select>
			<input type="submit" name="Select" value="Select"> 
			<br><br>
		</form>
		<?php
			echo '<body style="background-color:rgb(207,185,151)">'
		?>
	</body>
</html>
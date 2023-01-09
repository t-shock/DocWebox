<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
			table, th, td {
			border: 1px solid black;
			}
		</style>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		
	</head>
	<body>
	<div class="container">
	<br/>
	<a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button></a>
	<br/><br/>
		<?php
			$sql = "SELECT id, fname, lname, exp, loc FROM docs";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<div class='table-responsive'><table class='table table bordered'><tr><th>ID</th><th>Όνομα</th><th>Ειδικότητα</th><th>Περιοχή</th></tr>";
			// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."
					".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td></tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</div>
	</body>
</html>
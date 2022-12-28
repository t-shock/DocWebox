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
	</head>
	<body>
		<?php
			$sql = "SELECT id, fname, lname, exp, loc FROM docs";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>ID</th><th>Name</th><th>Expertise</th><th>Location</th></tr>";
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
	</body>
</html>
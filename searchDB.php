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
						
			if(empty($_POST["exp"])){
				$exp = "";
			}
			else{
				$exp = $_POST['exp'];
			}

			if(empty($_POST["loc"])){
				$loc = "";
			}
			else{
				$loc = $_POST['loc'];
			}
			
			
			if(empty($_POST["loc"])){
				$sql = "SELECT fname, lname, exp, loc FROM docs 
					WHERE exp = '$exp'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table><tr><th>Name</th><th>Expertise</th><th>Location</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["fname"]."
						".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td></tr>";
					}
					echo "</table>";
				} else {
					echo "Τα Φίλτρα Αναζήτης Σης Δεν Αντιστοιχούν Σε Κάποιον Ιατρό";
				}
				$conn->close();
			}
			else if(empty($_POST["exp"])){
				$sql = "SELECT fname, lname, exp, loc FROM docs 
					WHERE loc = '$loc' ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table><tr><th>Name</th><th>Expertise</th><th>Location</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["fname"]."".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td></tr>";
					}
					echo "</table>";
				} else {
					echo "Τα Φίλτρα Αναζήτης Σης Δεν Αντιστοιχούν Σε Κάποιον Ιατρό";
				}
				$conn->close();
			}
			else{
				$sql = "SELECT fname, lname, exp, loc FROM docs  
						WHERE exp = '$exp'  AND loc = '$loc' ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table><tr><th>Name</th><th>Expertise</th><th>Location</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["fname"]."".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td></tr>";
					}
					echo "</table>";
				} else {
					echo "Τα Φίλτρα Αναζήτης Σης Δεν Αντιστοιχούν Σε Κάποιον Ιατρό";
				}
				$conn->close();
			}
		?>
		<a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button>
	</body>
</html>

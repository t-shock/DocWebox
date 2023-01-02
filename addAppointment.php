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
            .green-color {
                color:green;
            }
		</style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="addAppointment.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

	</head>
	<body>
        <div id ="tag">Επιλέξτε ιατρό:</div>
        <form name="form" action="submit.php" method="post"> 
			<?php
				$sql = "SELECT id, fname, lname, exp, loc FROM docs";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table><tr><th>ID</th><th>Name</th><th>Expertise</th><th>Location</th><th>Επιλογή</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["id"]."</td><td>".$row["fname"]."
						".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td> 
						<td class='checkbox-group required'> <input type='checkbox' class='radio' id='doc".$row["id"]."' value=".$row["id"]." name='docid'></td></tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
			<br>
			<div id ="tag">Επιλέξτε ημερομηνία και ώρα:</div>
			
			<input type="date" id="date" name="date" max="2030-12-31" required>
            <input type="time" id="appt" name="appt"  min="09:00" max="19:00" value="09:00" step="3600" required>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>

	</body>
</html>
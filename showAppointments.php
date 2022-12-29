<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
	<head>

		<style>
		th, td {
			border: 1px solid black;
			}
		.blue-color {
        	color:blue;
   		 }
		</style>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
	</head>
	<body>

		<?php
			$sql = "SELECT id,id_doc, hour, day, month,year FROM calendar WHERE id_pat = 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>Doctor</th><th>Date</th></tr>";
			// output data of each row
				while($row = $result->fetch_assoc()) {
					$num = $row["id"];
                    $docId = $row["id_doc"];
                    $sql2 = "SELECT fname,lname FROM docs WHERE id = $docId";
			        $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
					echo "<tr><td>".$row2["fname"]." ".$row2["lname"]."</td>
                    <td>".$row["day"]."/".$row["month"]."/".$row["year"]."</td>
                    <td>"."<a href='delete.php?playerID=".$num."'><button class='btn btn-primary'><span class='bi bi-trash blue-color'></span></button></a>"."</td>
                    </tr>";
                }
				echo "</table> <br> <a href='addAppointment.php'><button type='button' id ='add'>Προσθήκη</button>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</body>
</html>
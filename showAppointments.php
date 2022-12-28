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
		</style>
          <script src="https://code.jquery.com/jquery-3.5.0.js"></script>


	</head>
	<body>

		<?php
			$sql = "SELECT id_doc, hour, day, month,year FROM calendar WHERE id_pat = 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table><tr><th>Doctor</th><th>Date</th></tr>";
			// output data of each row
            $num = 0;
				while($row = $result->fetch_assoc()) {
                    $num= $num+1;
                    $docId = $row["id_doc"];
                    $sql2 = "SELECT fname,lname FROM docs WHERE id = $docId";
			        $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
					echo "<tr><td>".$row2["fname"]." ".$row2["lname"]."</td>
                    <td>".$row["day"]."/".$row["month"]."/".$row["year"]."</td>
                    <td>"."<button type='button' id ='".$num."'>Τροποποίηση</button>"."</td>
                    </tr>";

                }
				echo "</table> <br> <button type='button' id ='add'>Προσθήκη</button>";
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
        <script>
            $( "button" ).click(function() {
                alert( "Handler for .click() called." );
            });
        </script>
	</body>
</html>
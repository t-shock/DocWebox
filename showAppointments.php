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
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<script>
			$(document).ready(function(){
				$('.delete').attr("onclick","return confirm('Θέλετε σίγουρα να διαγράψετε το ραντεβού; Θα ενημερώσουμε τον γιατρό');");
			});
		</script>
	</head>
	<body>
	<div class="container">
	<br/>
	<a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button></a>
	<div class='table-responsive'>
   <table class="table table bordered">
		<?php
			session_start();
			$patid = $_SESSION['patid'];
			$sql = "SELECT id,id_doc, time, date FROM calendar WHERE id_pat = $patid";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table class='table table bordered'><tr><th>Όνομα</th><th>Ώρα</th><th>Ημερομινία</th><th>Διαγραφή ραντεβού</th></tr>";
			// output data of each row
				while($row = $result->fetch_assoc()) {
					$num = $row["id"];
                    $docId = $row["id_doc"];
                    $sql2 = "SELECT fname,lname FROM docs WHERE id = $docId";
			        $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
					echo "<tr><td>".$row2["fname"]." ".$row2["lname"]."</td>
					<td>".$row["time"]."</td>
                    <td>".$row["date"]."</td>
                    <td class='text-center'>"."<a href='delete.php?playerID=".$num."' class = delete><button class='btn btn-primary'><span class='bi bi-trash text-danger'></span></button></a>"."</td>
                    </tr>";
                }
				echo "</table>"; 
			} else {
				echo "Δεν Έχετε Προγραμματίσει Κανένα Ραντεβού";
			}
			$conn->close();
		?>
		</div>
		</body>
</html>
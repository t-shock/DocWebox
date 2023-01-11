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
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
		<script>
			$(document).ready(function(){
				$('.delete').attr("onclick","return confirm('Θέλετε σίγουρα να διαγράψετε το ραντεβού; Θα ενημερώσουμε τον γιατρό');");
			});
		</script>
	</head>
	<body>
	<div class="container">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">DocWebox</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				<a class="nav-item nav-link " href="welcome.php">Αρχική</a>
				<a class="nav-item nav-link " href="showDocs.php">Προβολή γιατρών</a>
				<a class="nav-item nav-link " href="addAppointment.php">Προσθήκη ραντεβού</a>
				<?php
					session_start();
					$patid = $_SESSION['patid'];
					$fetchPatData = 'SELECT fname FROM patients WHERE id='.$patid;
				$result = $conn->query($fetchPatData);
				$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
				foreach ($resultsFromDB as $event) {
					$name = $event['fname'];
				}
					$fetchPatData = 'SELECT fname FROM patients WHERE id='.$patid;
				$result = $conn->query($fetchPatData);
				$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
				foreach ($resultsFromDB as $event) {
					$name = $event['fname'];
				}
					echo "<a class='nav-item nav-link active' aria-current='page' href='showAppointments.php'>Προβολή προσωπικών ραντεβού</a>"; 
				?>
				<div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε <?php echo $name?>.    Δεν είστε ο <?php echo $name?>;</div>
				<a class="nav-item nav-link" href="">Σύνδεση χρήστη</a>
				</div>
			</div>
		</div>
    </nav>

		
		<br/>
		<div class='table-responsive'>
		<table class="table table bordered">
			<?php
				$sql = "SELECT id,id_doc, DATE_FORMAT(time, '%H:%i') AS time, date FROM calendar WHERE id_pat = $patid";
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
						<td >"."<a href='delete.php?playerID=".$num."' class = delete><button class='btn btn-primary'>Διαγραφή</button></a>"."</td>
						</tr>";
					}
					echo "</table>"; 
				} else {
					echo "Δεν Έχετε Προγραμματίσει Κανένα Ραντεβού";
				}
				$conn->close();
		?>
		</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		</body>
</html>
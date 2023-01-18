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
		<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
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
				<a class="nav-item nav-link active" aria-current="page" href="showDocs.php">Προβολή γιατρών</a>
				<a class="nav-item nav-link" href="addAppointment.php">Προσθήκη ραντεβού</a>
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
					echo "<a class='nav-item nav-link' href='showAppointments.php'>Προβολή προσωπικών ραντεβού</a>"; 
				?>
					<a class="nav-item nav-link " href="login_register.html">Αποσύνδεση</a>
				</div>
			</div>
		</div>
    </nav>

	<br/>
	<br/>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>
</html>
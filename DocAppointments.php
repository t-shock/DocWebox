<?php
	include "connect.php";
	
	$docid = 2; // $docid = get from login page
	//$fetchDocData = 'SELECT fname FROM docs WHERE id='.$docid;
	//$result = $conn->query($fetchDocData);
	//$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
	// ($resultsFromDB as $event) {
	//    $name = $event['fname'];
	//  }
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
				
				<?php
				
					session_start();
					$_SESSION['docid'] = $docid;
					$docid = $_SESSION['docid'];
					$fetchDocData = 'SELECT fname FROM docs WHERE id='.$docid;
					$result = $conn->query($fetchDocData);
					$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
					
					foreach ($resultsFromDB as $event) {
						$name = $event['fname'];
					}
					
					$fetchDocData = 'SELECT fname FROM docs WHERE id='.$docid;
					$result = $conn->query($fetchDocData);
					$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
					
					foreach ($resultsFromDB as $event) {
						$name = $event['fname'];
					}
				?>
				
				<div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε Dr. <?php echo $name?>.    Δεν είστε ο Dr. <?php echo $name?>;</div>
				<a class="nav-item nav-link " href="welcomeDoc.php">Αρχική</a>
				<a class='nav-item nav-link active' aria-current='page' href='DocAppointments.php'>Προβολή προσωπικών ραντεβού</a>
				<a class="nav-item nav-link " href="DocProfUpdFront.php">Προβολή Προφίλ</a>
				<a class="nav-item nav-link" href="login_register.html">Αποσύνδεση χρήστη</a>
				</div>
			</div>
		</div>
    </nav>

	<br/>
		<div class='table-responsive'>
		<table class="table table bordered">
		
			<?php
			
				$sql = 'SELECT c.id, c.id_doc, c.id_pat, DATE_FORMAT(time, "%H:%i") AS time, date FROM calendar c INNER JOIN patients p ON c.id_pat = p.id WHERE id_doc =' .$docid;
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table class='table table bordered'><tr><th>Όνομα/Επώνυμο Ασθενή</th><th>Ώρα</th><th>Ημερομηνία</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						$num = $row["id"];
						$patId = $row["id_pat"];
						$sql2 = 'SELECT fname,lname FROM patients WHERE id =' .$patId;
						$result2 = $conn->query($sql2);
						$row2 = $result2->fetch_assoc();
						echo "<tr><td>".$row2["fname"]." ".$row2["lname"]."</td>
						<td>".$row["time"]."</td>
						<td>".$row["date"]."</td>
						</tr>";
					}
					echo "</table>"; 
				} else {
					echo "Δεν Έχετε Προγραμματισμένο Κανένα Ραντεβού";
				}
				$conn->close();
				
		?>
		
		</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>
</html>
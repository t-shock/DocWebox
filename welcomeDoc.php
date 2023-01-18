<?php 
	
	include "connect.php";
	include "Calendar.php";
	$calendar = new Calendar();
	
	session_start();
	//$_SESSION['docid'] = $docid;
	$docid = 1; // $docid = get from login page
	$docid = $_SESSION['docid'];
	
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
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
				
				<div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε Dr. <?php echo $name?>.</div>
				<a class='nav-item nav-link active' aria-current='page' href="welcomeDoc.php">Αρχική</a>
				<a class="nav-item nav-link " href="DocAppointments.php">Προβολή προσωπικών ραντεβού</a>
				<a class="nav-item nav-link " href="DocProfUpdFront.php">Προβολή Προφίλ</a>
				<a class="nav-item nav-link" href="login_register.html">Αποσύνδεση χρήστη</a>
				</div>
			</div>
		</div>
    </nav>

	<br/>
		<center>
	
		<?php 
		
			$sql = 'SELECT id_doc, time, date FROM calendar WHERE id_doc =' .$docid;
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				
					while($row = $result->fetch_assoc()) {
						echo $docid;
						$calendar->add_event('Ραντεβού', $row["date"]);
					}
				}
			
			echo $calendar;
		
		?>
		
					
		</center>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script></body>

</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
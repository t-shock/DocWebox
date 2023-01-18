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
        <script src="addAppointment.js" type="text/javascript"></script>
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
				<a class="nav-item nav-link " href="showDocs.php">Προβολή γιατρών</a>
				<a class="nav-item nav-link active" aria-current="page" href="addAppointment.php">Προσθήκη ραντεβού</a>
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
				<div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε <?php echo $name?>.    Δεν είστε ο <?php echo $name?>;</div>
				<a class="nav-item nav-link" href="">Σύνδεση χρήστη</a>
				</div>
			</div>
		</div>
    </nav>
		<div id ="tag">Επιλέξτε ιατρό:</div>
		<div>Παραθέστε Φίλτρα Αναζήτησης:</div>
		<div id = "searchTerms">
			<label for="Expertise">Επιλέξτε ειδικότητα:</label>
			<select name="exp" id="exp">
				<option value="">Όλα</option>
					<?php 
						$result = $conn->query("SELECT DISTINCT exp FROM docs ORDER BY exp");
						while ($row = $result->fetch_assoc()){
							$exp = $row['exp']; 
							echo '<option value="'.$exp.'">'.$exp.'</option>';
						}
					?>
			 </select>
			 <br>
			 <label for="Location">Επιλέξτε περιοχή:</label>
			 <select name="loc" id="loc">
				<option value="">Όλα</option>
				<?php 
					$result = $conn->query("SELECT DISTINCT loc FROM docs ORDER BY loc");
					while ($row = $result->fetch_assoc()){
						$loc = $row['loc']; 
						echo '<option value="'.$loc.'">'.$loc.'</option>';
					}
					
				?>
				
			 </select>	
		</div>
        <form name="form" action="submit.php" onsubmit="return validation()" method="post">
			<div id="noResults"> </div>
			<?php
				$sql = "SELECT id, fname, lname, exp, loc FROM docs";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<div class='table-responsive'><table class='table table bordered' id='tb'><tr><th>Όνομα</th><th>Ειδικότητα</th><th>Περιοχή</th><th>Επιλογή</th></tr>";
				// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>".$row["fname"]."
						".$row["lname"]."</td><td>".$row["exp"]."</td><td>".$row["loc"]."</td> 
						<td class='checkbox-group required'> <input type='checkbox' class='radio' id='doc'".$row["id"]."' value=".$row["id"]." name='docid'></td></tr>";
					}
					echo "</table>";
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
			<div id ="tag">Επιλέξτε ημερομηνία και ώρα:</div>
			
			<input type="date" id="date" name="date" max="2030-12-31" required>
            <input type="time" id="appt" name="appt"  min="09:00" max="19:00" value="09:00" step="3600" required>
			<p>Ώρες εργασίας: 09:00-19:00</p>
			<p>Παρακαλούμε επιλέξτε ραντεβού ανά ώρα</p>
			<br>
            <input type="submit" name="submit" value="Επικύρωση">
        </form>
		
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	</body>
</html>

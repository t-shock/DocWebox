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
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		
		<script>
				$(document).ready(function() {
					$('#exp, #loc').change(function() {
						// Get the filter values from the dropdowns
						var filterValue1 = $('#exp').val();
						var filterValue2 = $('#loc').val();
						// Hide all table rows
						$('#tb tr').hide();
						// Show the rows that contain either or both filter values
						if (filterValue1 == '' && filterValue2 == '') {
						// Show all rows
							$('#tb tr').show();
						} else if (filterValue1 && filterValue2) {
							// Show the rows that contain both filter values
							var filteredRows = $('#tb td:contains("' + filterValue1 + '")').parent().filter(function() {
								return $(this).find('td:contains("' + filterValue2 + '")').length > 0;
							});
							filteredRows.show();
						} else if (filterValue1 == '') {
							// Show the rows that contain the second filter value
							$('#tb td:contains("' + filterValue2 + '")').parent().show();
						} else if (filterValue2 == '') {
							// Show the rows that contain the first filter value
							$('#tb td:contains("' + filterValue1 + '")').parent().show();
						} else {
							// Show the rows that contain either filter value
							var filteredRows = $('#tb td:contains("' + filterValue1 + '")').parent();
							filteredRows.add('#tb td:contains("' + filterValue2 + '")').parent().show();
						}
						if (filteredRows.length == 0) {
							$("#noResults").html("<br>Τα Φίλτρα Αναζήτησης Δεν Αντιστοιχούν Σε Κάποιον Ιατρό");
    					}
					});
				});
		</script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

	</head>
	<body>
	<div class="container">
	<br/>
	<a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button></a>
	<br/><br/>
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
			 <button id="filterButton">Αναζήτηση</button>
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
	</body>
</html>
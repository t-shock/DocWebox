<?php
	include "connect.php";
	$date = ""; 
	$time = "";
	$docid = "";
	session_start();
	$patid = $_SESSION['patid'];
	if (!empty($_POST['date']) && !empty($_POST['appt']) && !empty($_POST['docid']) ) {
		$date = $_POST['date'];
		$time = $_POST['appt'];
		$docid = $_POST['docid'];
	$rightTime = false;
		if ($date==date("Y-m-d")){//true means appointment is set for today, check if time is in future
			if ($time<date("H:i:s")){
				echo "<script>alert('Η ώρα που επιλέξατε είναι στο παρελθόν. Επιστροφή...');</script>";
			}else{
				$rightTime = true;
			}
		}elseif ($date<date("Y-m-d")){//is past
			echo "<script>alert('Η ώρα που επιλέξατε είναι στο παρελθόν. Επιστροφή...');</script>";
		}elseif ($date>date("Y-m-d")){//is future
			$rightTime = true;

	}

	if($rightTime){
		$fetchDataInCertainDatetimeIfExistsForDoc = mysqli_query($conn, "SELECT * FROM calendar WHERE id_doc='$docid' AND date='$date' AND time = '$time'");
		if (mysqli_num_rows($fetchDataInCertainDatetimeIfExistsForDoc)==0){//if true it means thah no data were returned, so datetime is free for doc
			
			$fetchDataInCertainDatetimeIfExistsForPat = mysqli_query($conn, "SELECT * FROM calendar WHERE id_pat='$patid' AND date='$date' AND time = '$time'");
			if (mysqli_num_rows($fetchDataInCertainDatetimeIfExistsForPat)==0){//if true it means thah no data were returned, so datetime is free for pat as well
				
				$insertData = "INSERT INTO calendar (id_doc, id_pat, time, date) VALUES ('$docid', '$patid', '$time', '$date')";
				if ($conn->query($insertData) === TRUE) {
					echo "<script>alert('Επιτυχία καταχώρισης ραντεβού.');</script>";
				} else {
					echo "Error: " . $insertData . "<br>";
				}
			}else{
				echo '<script>alert("Έχετε άλλο ραντεβού εκείνη την στιγμή.");</script>';
			}
		}else{
			echo '<script>alert("Μη διαθέσιμη ώρα ή ημερομηνία για τον γιατρό.");</script>';
		}
	}
	}

echo "<script>
	window.setTimeout(function() {
		window.location = 'addAppointment.php';
	  }, 000);
	</script>";
	?>
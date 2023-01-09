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


		$fetchData = mysqli_query($conn, "SELECT * FROM calendar WHERE id_doc='$docid' AND date='$date' AND time = '$time'");
		if (mysqli_num_rows($fetchData)==0){
			$insertData = "INSERT INTO calendar (id_doc, id_pat, time, date) VALUES ('$docid', '$patid', '$time', '$date')";
			if ($conn->query($insertData) === TRUE) {
				echo "Επιτυχία καταχώρισης ραντεβού";
			} else {
				echo "Error: " . $insertData . "<br>";
			}
		}else{
			echo 'Μη διαθέσιμη ώρα ή ημερομηνία για τον γιατρό.';
		}
		
	}
    echo "<br><a href='addAppointment.php'><button>Επιστροφη στην προσθηκη ραντεβου</button></a> <br> <a href='welcome.php'><button type='button' id ='add'>Επιστροφή στην αρχική σελίδα</button></a>";
?>
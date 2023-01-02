<?php
	include "connect.php";
	$date = ""; 
	$time = "";
	$docid = "";
	$patid = "2";
	if (!empty($_POST['date']) && !empty($_POST['date']) && !empty($_POST['docid']) ) {
		$date = $_POST['date'];
		$time = $_POST['appt'];
		$docid = $_POST['docid'];


		$fetchData = mysqli_query($conn, "SELECT * FROM calendar WHERE id_doc='$docid' AND date='$date' AND time = '$time'");
		if (mysqli_num_rows($fetchData)==0){
			$insertData = "INSERT INTO calendar (id_doc, id_pat, time, date)
			VALUES ('$docid', '$patid', '$time', '$date')";
			if ($conn->query($insertData) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $insertData . "<br>" . $conn->error;
			}
		}else{
			echo 'Date or time not available for this doctor.';
		}
		
	}
    echo "<a href='addAppointment.php'><button>Return</button></a>";
?>
<?php
    include "connect.php";
    if(isset($_GET['playerID'])){
        $id = $_GET['playerID']; 
    }

    // Delete the row from the database
    $sql = "DELETE FROM calendar WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
        echo "Επιτυχής διαγραφή.";
    } else {
        echo "Error deleting record: " . $conn;
    }
    // Close the connection
    $conn->close();

?>
<!DOCTYPE html>
<html>
	<head>
         <style>
		.blue-color {
        	color:blue;
   		 }
		</style>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
	</head>
	<body>
    <script>
	window.setTimeout(function() {
		window.location = 'showAppointments.php';
	  }, 1250);
	</script>
    Επιστροφή...
	</body>
</html>
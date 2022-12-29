<?php
    include "connect.php";
    if(isset($_GET['playerID'])){
        $id = $_GET['playerID']; 
    }

    // Delete the row from the database
    $sql = "DELETE FROM calendar WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
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
        <a href='showAppointments.php'><button class='btn btn-primary'><span class='bi bi-box-arrow-left blue-color'></span></button></a>
	</body>
</html>
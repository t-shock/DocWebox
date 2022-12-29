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
    echo "<a href='showAppointments.php'><button class='btn btn-primary'>GO BACK</button></a>";
    // Close the connection
    $conn->close();

?>
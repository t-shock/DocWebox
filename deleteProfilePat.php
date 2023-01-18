<?php
	include "connect.php";

    session_start();
    $patid = $_SESSION['patid'];
	
    $sql = mysqli_query($conn,"DELETE FROM patients WHERE id =" .$patid);
	$sql = mysqli_query($conn,"DELETE FROM credentinals WHERE  role ='pat' AND id_role =" .$patid);
	$sql = mysqli_query($conn,"DELETE FROM calendar WHERE id_pat =" .$patid);
    echo "Η διαγραφή του λογαριασμού σας έγινε με επιτυχία...";
    echo "<script>
        window.setTimeout(function() {
            window.location = 'main.php';
        },3000);
    </script>";

?>
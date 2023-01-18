<?php
	include "connect.php";

	session_start();
	$docid = $_SESSION['docid'];
	
    $sql = mysqli_query($conn,"DELETE FROM docs WHERE id =" .$docid);
	$sql = mysqli_query($conn,"DELETE FROM credentinals WHERE  role ='doc' AND id_role =" .$docid);
	$sql = mysqli_query($conn,"DELETE FROM calendar WHERE id_doc =" .$docid);
    echo "Η διαγραφή του λογαριασμού σας έγινε με επιτυχία...";
    echo "<script>
        window.setTimeout(function() {
            window.location = 'main.php';
        },3000);
    </script>";

?>
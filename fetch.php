<?php
include "connect.php";

if(isset($_POST["docid"]))
{
	
	$docid=$_POST["docid"];
    $date=$_POST["date"];
    $time=$_POST["time"];
	
 $query = "
  SELECT * FROM calendar 
  WHERE id_doc = $docid AND date = $date AND time=$times";
}

$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<script>alert('Time and date is occupied. Please select another.')</script>";
}else{

    $sql = "INSERT INTO calendar (id_doc, id_pat, time, date)
        VALUES ('$docid', 1, '$time', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New appointment created successfully')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}



?>
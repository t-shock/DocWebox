<?php
include "connect.php";

$output = '';
if(isset($_POST["input"])){
	
	$input=$_POST["input"];
	
 $query = "
  SELECT * FROM docs 
  WHERE fname LIKE '".$input."%' 
  OR lname LIKE '".$input."%' 
  OR loc LIKE '".$input."%'
  OR exp LIKE '".$input."%'
   
  ";
}
else{
 $query = "
  SELECT * FROM docs ORDER BY lname
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Όνομα</th>
     <th>Επίθετο</th>
     <th>Ειδικότητα</th>
     <th>Περιοχή</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)){
  $output .= '
   <tr>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["exp"].'</td>
    <td>'.$row["loc"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else{
 echo '<span class="text-danger">Δεν βρέθηκε</span>';
}

?>
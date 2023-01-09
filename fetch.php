<?php
include "connect.php";

//echo 'test';
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
     <th>First</th>
     <th>Last</th>
     <th>Specialisation</th>
     <th>Location</th>
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
 echo '<span class="text-danger">Data Not Found</span>';
}

?>
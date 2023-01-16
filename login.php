<?php

include ('connect.php');


if(isset($_POST['submit'])){
    //require_once "validate.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from credentinals where username='$username' and password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo "success";
    } else{
        echo "failure";
    }
}
else{
    echo "something went wrong";
}


?>
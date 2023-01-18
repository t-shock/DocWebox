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
        session_start();
        $row = mysqli_fetch_array($result);
        echo $row['role'];
        if ($row['role'] === 'pat') {
            echo "1234";
            $_SESSION['patid'] = $row['id_role'];
            header("Location: welcome.php");
            exit();
        }else{
            
        }
    } else{
        
        echo "<script> alert ('Wrong username or password');</script>";
        echo "<script>
        window.setTimeout(function() {
            window.location = 'login_register.html';
          });
        </script>";
    }
}
else{
    echo "something went wrong";
}


?>
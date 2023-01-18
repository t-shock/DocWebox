<?php

include ('connect.php');


if(isset($_POST['submit'])){
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
            $_SESSION['patid'] = $row['id_role'];
            header("Location: welcome.php");
            exit();
        }else{
            $_SESSION['docid'] = $row['id_role'];
            header("Location: welcomeDoc.php");
            exit();
        }
    } else{
        
        echo "<script> alert ('Λάθος username ή κωδικός πρόσβασης');</script>";
        echo "<script>
        window.setTimeout(function() {
            window.location = 'login_register.html';
          });
        </script>";
    }
}
else{
    echo "Κάτι πήγε λάθος!";
}


?>
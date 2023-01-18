<?php

include('connect.php');

function checkIfAvailable($aUsername){

    include('connect.php');
    $sql = "select * from credentinals where username='$aUsername'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo "<script> alert ('Υπάρχει ήδη χρήστης με αυτό το username! Δοκιμάστε κάτι διαφορετικό.');</script>";
        echo "<script>
        window.setTimeout(function() {
            window.location = 'login_register.html';
          });
        </script>";
        return FALSE;
    } else{
        return TRUE;
    }
}

if(isset($_POST['submit1'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = 0;
    
    if(checkIfAvailable($username)){
        $sql = "insert into patients values('', '$fname', '$lname')";
        if(!$conn->query($sql)){
            echo "failure when adding patient";
            echo "<script> alert ('Κάτι πήγε λάθος!');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";
        } else {
            echo "success";
        }
        $result = mysqli_query($conn,"SELECT * FROM patients ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        
        if(!$conn->query($sql)){
            echo "failure";
        } else {
            echo "success";
        }

        $sql = "insert into credentinals values('','pat','$username','$password','$id')";

        if(!$conn->query($sql)){
            echo "failure when adding patient to credentinals";
            echo "<script> alert ('Κάτι πήγε λάθος');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";
        } else {
            echo "<script> alert ('Επιτυχής εγγραφή! Μπορείτε τώρα να συνδεθείτε!');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";

        }
    }
}
else if(isset($_POST['submit2'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = 0;
    $prof = $_POST['prof'];
    $addr = $_POST['address'];

    if(checkIfAvailable($username)){
        $sql = "insert into docs values('', '$fname', '$lname', '$prof', '$addr')";
        if(!$conn->query($sql)){
            echo "<script> alert ('Something went wrong');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";
        } else {
            echo "1";
        }

        $result = mysqli_query($conn,"SELECT * FROM docs ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $sql = "insert into credentinals values('','doc','$username','$password','$id')";
        if(!$conn->query($sql)){
            echo "failure when adding doc to credentinals";
            echo "<script> alert ('Κάτι πήγε λάθος!');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";
        } else {
            echo "<script> alert ('Επιτυχής εγγραφή! Μπορείτε τώρα να συνδεθείτε!');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'login_register.html';
            });
            </script>";
        }
    }

}

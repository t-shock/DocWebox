<?php

include('connect.php');

if(isset($_POST['submit1'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = 0;
    
    $sql = "insert into patients values('', '$fname', '$lname')";
    if(!$conn->query($sql)){
        echo "failure when adding patient";
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
    } else {
        echo "success";
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
    $sql = "insert into docs values('', '$fname', '$lname', '$prof', '$addr')";
    if(!$conn->query($sql)){
        echo "failure when adding doc";
    } else {
        echo "success";
    }

    $result = mysqli_query($conn,"SELECT * FROM docs ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $sql = "insert into credentinals values('','doc','$username','$password','$id')";
    if(!$conn->query($sql)){
        echo "failure when adding doc to credentinals";
    } else {
        echo "success";
    }

}
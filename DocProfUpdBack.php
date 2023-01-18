<?php
	include "connect.php";
	session_start();
	$docid = $_SESSION['docid'];
	
	$fname = $_POST['fname'];
	if(isset($_POST['fname']) && $_POST['fname'] != ""){
		$sql = mysqli_query($conn,"UPDATE `docs` SET `fname` = '".$fname."' WHERE docs.id =" .$docid);
	}
	
	$lname = $_POST['lname'];
	if(isset($_POST['lname']) && $_POST['lname'] != ""){
		$sql = mysqli_query($conn,"UPDATE `docs` SET `lname` = '".$lname."' WHERE docs.id =" .$docid);
	}
	
	$username = $_POST['username'];
	if(isset($_POST['username']) && $_POST['username'] != ""){
		$sql = mysqli_query($conn,"UPDATE `credentinals` SET `username` = '".$username."' WHERE credentinals.id_role =" .$docid." AND credentinals.role = 'doc'");
	}

	$exp = $_POST['exp'];
	if(isset($_POST['exp']) && $_POST['exp'] != ""){
		$sql = mysqli_query($conn,"UPDATE `docs` SET `exp` = '".$exp."' WHERE docs.id =" .$docid);
	}
	
	$loc = $_POST['loc'];
	if(isset($_POST['loc']) && $_POST['loc'] != ""){
		$sql = mysqli_query($conn,"UPDATE `docs` SET `loc` = '".$loc."' WHERE docs.id =" .$docid);
	}

	header("Location: DocProfUpdFrontFreeze.php");

?>
<?php

	session_start();
	
	$link = mysqli_connect("localhost", "root", "", "doc");
	
	$fname = $_POST['fname'];
	if(isset($_POST['fname']) && $_POST['fname'] != ""){
		$sql = mysqli_query($link,"UPDATE `docs` SET `fname` = '".$fname."'");
	}
	
	$lname = $_POST['lname'];
	if(isset($_POST['lname']) && $_POST['lname'] != ""){
		$sql = mysqli_query($link,"UPDATE `docs` SET `lname` = '".$lname."'");
	}
	
	$loc = $_POST['loc'];
	if(isset($_POST['loc']) && $_POST['loc'] != ""){
		$sql = mysqli_query($link,"UPDATE `docs` SET `loc` = '".$loc."'");
	}
	
	$exp = $_POST['exp'];
	if(isset($_POST['exp']) && $_POST['exp'] != ""){
		$sql = mysqli_query($link,"UPDATE `docs` SET `exp` = '".$exp."'");
	}
	
	$tel = $_POST['tel'];
	if(isset($_POST['tel']) && $_POST['tel'] != ""){
		$sql = mysqli_query($link,"UPDATE `docs` SET `tel` = '".$tel."'");
	}
	
	
	
	header("Location: DocProf.html");

?>
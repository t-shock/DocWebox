<?php

	session_start();
	
	$link = mysqli_connect("localhost", "root", "", "doc");
	
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
	
	if($uname && $psw){
		$check = mysqli_query($link,"SELECT * FROM credentinals WHERE username='".$uname."'");
		$rows = mysqli_num_rows($check);
		if(mysqli_num_rows($check) != 0){ //αν βρέθηκε εγγραφή
			while ($row = mysqli_fetch_assoc($check)){
				$db_username = $row['username'];
				$db_password = $row['password'];
				if ($db_password == $psw) {
					header("Location: DocProf.html");
				}
				else {
					header("Location: DocLogin.html");
				}
			}
		}	
	}		
?>
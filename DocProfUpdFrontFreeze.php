<?php 
	
	include "connect.php";
	
	session_start();
	//$_SESSION['docid'] = $docid;
	$docid = $_SESSION['docid'];
	  
	$findresult = mysqli_query($conn, 'SELECT * FROM docs d INNER JOIN credentinals c ON c.id_role = d.id AND c.role = "doc" WHERE d.id =' .$docid);
	if($res = mysqli_fetch_array($findresult))
	{
		$username = $res['username']; 
		$oldusername =$res['username']; 
		$fname = $res['fname'];   
		$lname = $res['lname'];
		$exp = $res['exp']; 
		$loc = $res['loc'];   
	}
 ?> 
 
 <!DOCTYPE html>
 
<html>
<head>
	
	<style>
		table, th, td {
		border: 1px solid black;
		}
	</style>
	
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">DocWebox</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				
				<?php
				
					$fetchDocData = 'SELECT fname FROM docs WHERE id='.$docid;
					$result = $conn->query($fetchDocData);
					$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
					
					foreach ($resultsFromDB as $event) {
						$name = $event['fname'];
					}
					
					$fetchDocData = 'SELECT fname FROM docs WHERE id='.$docid;
					$result = $conn->query($fetchDocData);
					$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
					
					foreach ($resultsFromDB as $event) {
						$name = $event['fname'];
					}
				?>
				
				<div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε Dr. <?php echo $name?>.</div>
				<a class="nav-item nav-link " href="welcomeDoc.php">Αρχική</a>
				<a class="nav-item nav-link " href="DocAppointments.php">Προβολή προσωπικών ραντεβού</a>
				<a class='nav-item nav-link active' aria-current='page' href="DocProfUpdFrontFreeze.php">Προβολή Προφίλ</a>
				<a class="nav-item nav-link" href="login_register.html">Αποσύνδεση χρήστη</a>
				</div>
			</div>
		</div>
    </nav>

	<br/>
		<center>
	
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
			   
				<form action="" method="POST" enctype='multipart/form-data'>
					<div class="login_form">

					<br> 
					
					</div>
				
					<div class="form-group">
						<div class="row"> 
							<div class="col-3">
								<label>Όνομα:</label>
							</div>
							 <div class="col">
								<?php echo $fname;?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row"> 
							<div class="col-3">
								<label>Επώνυμο:</label>
							</div>
							<div class="col">
								<?php echo $lname;?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row"> 
							<div class="col-3">
								<label>Username:</label>
							</div>
							<div class="col">
								<?php echo $username;?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row"> 
							<div class="col-3">
								<label>Ειδικότητα:</label>
							</div>
							<div class="col">
								<?php echo $exp;?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row"> 
							<div class="col-3">
								<label>Περιοχή:</label>
							</div>
							<div class="col">
								<?php echo $loc;?>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-6">
						</div>
						<div class="col-sm-6">
							<form>
								<button type="submit" formaction="DocProfUpdFront.php" target="_blank" class="btn btn-success">Ενημέρωση Profile</button>
							</form>
						</div>
					</div>
				</form>
			</div>
		</div> 
	</div>
	</center>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script></body>

</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
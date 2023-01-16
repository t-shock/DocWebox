<?php
include "connect.php";
$patid = 2; // $patid = get from login page
$fetchPatData = 'SELECT fname FROM patients WHERE id='.$patid;
$result = $conn->query($fetchPatData);
$resultsFromDB = $result->fetch_all(MYSQLI_ASSOC);
foreach ($resultsFromDB as $event) {
    $name = $event['fname'];
  }
?>
<!DOCTYPE html>
<html>
	<head>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script>
		$(document).ready(function(){

			load_data();

			function load_data(input)
			{
			$.ajax({
			url:"fetchDataFromSearching.php",
			method:"POST",
			data:{input},
			success:function(data)
			{
				$('#showdata').html(data);
			}
			});
			}
						
			$('#mysearch').keyup(function(){
				var search = $(this).val();
				if(search != ''){
					load_data(search);
				}
				else{
					load_data();
					//$('#showdata').css('display','none');
				}
				});
		});
</script>
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
                    <a class="nav-item nav-link active" aria-current="page" href="welcome.php">Αρχική</a>
                    <a class="nav-item nav-link" href="showDocs.php">Προβολή γιατρών</a>
                    <a class="nav-item nav-link" href="addAppointment.php">Προσθήκη ραντεβού</a>
                    <?php
                        session_start();
                        $_SESSION['patid'] = $patid;
                        echo "<a class='nav-item nav-link' href='showAppointments.php'>Προβολή προσωπικών ραντεβού</a>"; 
                    ?>
                    <div class="nav-item nav-link disabled" id="welcome">Καλωσήρθατε <?php echo $name?>.    Δεν είστε ο <?php echo $name?>;</div>
                    <a class="nav-item nav-link" href="">Σύνδεση χρήστη</a>
                </div>
            </div>
        </div>
    </nav>

    <h2 align="center">Αναζήτηση γιατρού</h2><br/>
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="mysearch" id="mysearch" placeholder="Εισάγετε όνομα, επίθετο, ειδικότητα ή περιοχή" class="form-control" />
			<span class="input-group-addon"></span>
		</div>
	</div>
	<br />
	<div id="showdata"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
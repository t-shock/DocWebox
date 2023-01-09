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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		
    <script>
        $("document").ready(function(){
            // $("#welcome").append("Welcome "$name);
            
            // $.ajax({
            //     type: "GET",
            //     url: "patNameFromDB.php",
            //     dataType: "html",                  
            //     success: function(name){                    
            //         $("#welcome").append(name);
                
            //     }
            // });
            // var request;
            // if (window.XMLHttpRequest) {
            //     request = new XMLHttpRequest();
            // } else {
            //     request = new ActiveXObject("Microsoft.XMLHTTP");
                
            // }
            
            // request.open('GET', 'fetchPatData.php');


            // request.onreadystatechange = function() {
            //     if ((request.readyState===4) && (request.status===200)) {
            //         $("#welcome").append(request.responseText);
            //     }
            // }
            // request.send();
        });
    </script>
	</head>
	<body>
    <div class="container">
    <br/>
    <div id="welcome">Welcome <?php echo $name?></div>
    <br/>
    <p>Τι θέλετε να κανετε;</p>
    <div id="showDocs"><a href="showDocs.php"><input type="button" value="Show all doctors"></a></div>
    <div id="SearchDocs"><a href="searchDocsForm.php"><input type="button" value="Search a doctor"></a></div>
    <?php
        session_start();
        $_SESSION['patid'] = $patid;
        echo "<div id='showAppointments'><a href='showAppointments.php'><input type='button' value='See your appointments'></a></div>"; 
    ?>
    <a href='addAppointment.php'><button type='button' id ='add'>Προσθήκη</button>
    </div>
</body>
</html>
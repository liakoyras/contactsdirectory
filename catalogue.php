<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="19 Jul 2018">
		
		<title>Κατάλογος</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/catalogue.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
		<script src="jscr/buttons.js"></script>
		
	</head>
	
	<body>

	    <div class="navbar" id="myTopnav">
	    	
			<a href="index.php">Αρχική</a>
			<a class="active" href="php/chooser.php">Κατάλογος</a>
			<a href="contact.php">Επικοινωνία</a>
			<a href="javascript:void(0);" class="icon" onclick="hamburger()">
   				<i id="hamburger" class="fa fa-bars"></i>
  			</a>
  			
  			<div id ="right" >

				<?php 
						error_reporting(0);
						session_start();
						if($_SESSION["authorized"] == 1){
							
							echo "Γεια σου " . $_SESSION["username"] . "&nbsp;<a href='php/logout.php'>Αποσύνδεση</a>";
							
						}else{
							
							echo "&nbsp;<a href='php/login.php'><i class='fa'>&#xf007;&nbsp;&nbsp;</i>Σύνδεση</a>";
							
						}
						
				?>
					
			</div>
  			
	    </div>
		
		<section id="main">
			
			<a href="php/newcon.php">Δημιουργία Επαφής</a>
			
			<?php
			
				$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
				$username = "57337";
				$password = "lostre123";
				$dbname = "db_57337";

				$connection = mysqli_connect($servername, $username, $password, $dbname);
				if (!$connection){
					die("Προέκυψε κάποιο σφάλμα. " . mysqli_connect_error() . " Παρακαλούμε επικοινωνήστε μαζί μας.");
				}
				
				$userid = $_SESSION["ID"];

				$query = "SELECT * FROM `catalogue` WHERE USERID='$userid'";

				$result = mysqli_query($connection, $query);

				if(mysqli_num_rows($result) == 0){
	
					echo "Δεν έχετε δημιουργήσει καμία επαφή.";

				}
			
			?>
		
		</section>
		
		<div class="footer">
    	
	    	<br>Copyright © 2018 · Ilias Chanis · All Rights Reserved
	    	
		</div>
		
	</body>
	
</html>
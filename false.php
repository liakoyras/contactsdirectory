<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="16 Jul 2018">
		
		<title>Κατάλογος</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/false.css">
		
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
		
			<h1 class="center">Λυπούμαστε :(</h1>
			
			<h3 class="center"><br>Για να έχετε πρόσβαση στην υπηρεσία καταλόγου, πρέπει να συνδεθείτε.</h3>

			<p class="center">Εαν δεν έχετε λογαριασμό χρήστη, για να εγγραφείτε πατήστε <a href="php/signup.php">εδώ</a>.<br>Για να συνδεθείτε και να δείτε τις επαφές σας, πατήστε <a href="php/login.php">εδώ</a>.</p>
			
			<p class="center">Για να δείτε περισσσότερες πληροφορίες για την υπηρεσία που παρέχουμε, πατήστε <a href="index.php#main">εδώ</a>.</p>
		
		</section>
		
		<div class="footer">
    	
	    	<br>Copyright © 2018 · Ilias Chanis
	    	
		</div>
		
		<script src="jscr/collapsible.js"></script>
		
	</body>
	
</html>
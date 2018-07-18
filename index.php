<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="16 Jul 2018">
		
		<title>Αρχική</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/hero.css">
		<link rel="stylesheet" type="text/css" href="css/icons.css">
		<link rel="stylesheet" type="text/css" href="css/collapsible.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
		<script src="jscr/buttons.js"></script>
		
	</head>

	<body>

		<div class="hero-image">
		
			<div class="hero-text">
			
				<h1>Υπηρεσία Καταλόγου</h1>
				<h4 style="font-size:20px"><a onClick="scrollHome()">Δείτε περισσότερα για την υπηρεσία μας!</a></h4>ή<br>
				<a id="but" href="php/getstarted.php">Ξεκινήστε</a>
				
			</div>
			
		</div>
		
	    <div class="navbar" id="myTopnav">
	    	
			<a class="active" href="#main">Αρχική</a>
			<a href="php/chooser.php">Κατάλογος</a>
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
							
							echo "&nbsp;<a href='php/login.php'><i class='fa'>&#xf007;&nbsp; </i>Σύνδεση</a>";
							
						}
						
				?>
					
			</div>
  			
	    </div>
	    
		
		
		<section id="main">
		
			<h1 class="center">Καλώς ήρθατε!</h1>
			
			<div class="col-container">
							
				<div class="col">

					<i class="fa">&#xf0c7;</i>
					<p>Απεριόριστος αποθηκευτικός χώρος</p>

				</div>

				<div class="col">

					<i class="fa">&#xf2be;</i>
					<p>Φιλικό προς τον χρήστη</p>

				</div>

				<div class="col">

					<i class="fa">&#xf108;</i>
					<p>Άριστη Τεχνική Υποστήριξη</p>

				</div>
				
			</div>
			
			<h3 class="center"><br>Περισσότερες πληροφορίες για την υπηρεσία καταλόγου που παρέχεται μπορείτε να βρείτε παρακάτω.</h3>
			<button class="collapsible">Η υπηρεσία</button>
			<div class="content">

				<p>Παρέχουμε υπηρεσίες Καταλόγου Επαφών στους εγγεγραμμένους χρήστες.<br> Ο κάθε χρήστης έχει την δυνατότητα να:<br>
				<ul>
					<li>Δημιουργήσει μια επαφή</li>
					<li>Επεξεργαστεί ή διαγράψει τις υπάρχουσες επαφές</li>
					<li>Αναζητήσει την επαφή που ψάχνει</li>
				</ul>
				</p>

			</div>

			<button class="collapsible">Οδηγίες Χρήσης</button>
			<div class="content">

				<p></p>

			</div>

			<p class="center">Για να έχετε πρόσβαση στην υπηρεσία καταλόγου πρέπει να συνδεθείτε. <br><br>Εαν δεν έχετε λογαριασμό χρήστη, για να εγγραφείτε πατήστε <a href="php/signup.php">εδώ</a>.<br>Για να συνδεθείτε και να δείτε τις επαφές σας, πατήστε <a href="php/login.php">εδώ</a>.</p>
		
		</section>
		
		<div class="footer">
    	
	    	<br>Copyright © 2018 · Ilias Chanis
	    	
		</div>
		
		<script src="jscr/collapsible.js"></script>
		
	</body>
	
</html>
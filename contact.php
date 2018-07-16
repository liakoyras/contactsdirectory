<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="29 Jan 2018">
		
		<title>Eπικοινωνία</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/social.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
		<style>
			
			
			body {

				margin-top: 100px;
				
				
			}
						
			.footer{
				
				position: fixed;
    			left: 0;
   				bottom: 0;
				
			}
			
		</style>
		
		<script src="jscr/buttons.js"></script>
		
	</head>

	<body>
		
		<div class="navbar" id="myTopnav">
	    	
			<a href="index.php">Αρχική</a>
			<a href="php/chooser.php">Κατάλογος</a>
			<a class="active"  href="contact.php">Επικοινωνία</a>
			<a href="javascript:void(0);" class="icon" onclick="hamburger()">
   				<i class="fa fa-bars"></i>
  			</a>
  			
  			<div id ="right" >

				<?php 
						error_reporting(0);
						session_start();
						if($_SESSION["authorized"] == 1){
							
							echo "Γεια σου " . $_SESSION["username"] . "&nbsp;<a href='php/logout.php'>Αποσύνδεση</a>";
							
						}else{
							
							echo "&nbsp;<a href='php/login.php'>Σύνδεση</a>";
							
							
						}
						
				?>
					
			</div>
  			
	    </div>

		
		<h3 class="center">Υπεύθυνος Επικοινωνίας</h3>
		<p class="center">Ηλίας Χανής <br>
		Τηλέφωνο: 6987084405<br><br>
		<a href="mailto:iliashanis@gmail.com?Subject=Υπηρεσία%20Καταλόγου" target="_blank"><i class="fa">&#xf0e0;</i>Στείλτε μας email</a><br>
		<a href="https://www.facebook.com/ilias.hanis" target="_blank" class="fa fa-facebook"><br></a> Βρείτε μας στο Facebook<br><br></p>
			
		
		<div class="footer">
    	
	    	<br>Copyright © 2018 · Ilias Chanis
	    	
		</div>
		
	</body>
	
</html>
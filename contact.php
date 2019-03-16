<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="29 Jan 2018">
		
		<title>Contact Us</title>
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
	    	
			<a id="navhome" href="index.php">Home</a>
			<a id="navcat" href="php/chooser.php">Directory</a>
			<a id="navcont" class="active" href="contact.php">Contact us</a>
			<a href="javascript:void(0);" class="icon" onclick="hamburger()">
   				<i id="hamburger" class="fa fa-bars"></i>
  			</a>
  			
  			<div id ="right" >
  			
				<div class="pull-right" style="margin-left: 5px;" onClick="return translateEN()" >
					<a href="" onClick="return false;"><img style="height: 11px;" src="img/UK.png"></a>
            	</div>
           		<div class="pull-right" style="margin-left: 15px;" onClick="return translateGR()">
                	<a href="" onClick="return false;"><img style="height: 12.5px;" src="img/Greece.png"></a>
            	</div>
            	
				<?php 
						error_reporting(0);
						session_start();
						if($_SESSION["authorized"] == 1){
							
							echo "<p style='all: unset; font-family: 'Roboto', sans-serif;' id='navhi'>Hello </p>" . $_SESSION["username"] . "&nbsp;<a href='php/logout.php'><p style='all: unset; font-family: 'Roboto', sans-serif;' id='navlogout'>Log out</p></a>";
							
						}else{
							
							echo "&nbsp;<a href='php/login.php'><i class='fa' style='padding: 0;'>&#xf007;&nbsp;&nbsp;</i><p style='all: unset; font-family: 'Roboto', sans-serif;' id='navlogin'>Log in</p></a>";
							
						}
						
				?>
					
			</div>
  			
	    </div>
		
		<h3 id="responsible" class="center">Contact Person</h3>
		<p id="contactinfo" class="center">
			Ilias Chanis<br><br>
			Tel. 1234567890<br>
		  <a href='mailto:iliashanis@gmail.com?Subject=Contact%20Directory' target='_blank'><i style='color: black; font-size: 30px;' class='fa'>&#xf0e0;</i></a> Send us an email<br>
			<a href='https://www.facebook.com/' target='_blank' class='fa fa-facebook'><br></a> Find us on Facebook<br><br>
		</p>
			
		
		<div class="footer">
    	
	    	<br>Copyright © 2018 · Ilias Chanis
	    	
		</div>
		
		<script src="jscr/translate.js"></script>
		
	</body>
	
</html>
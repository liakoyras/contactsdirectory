<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="16 Jul 2018">
		
		<title>Ooops...</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/false.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="jscr/buttons.js"></script>
		
	</head>
	
	<body>

	    <div class="navbar" id="myTopnav"><a id="navhome" href="index.php">Home</a> <a id="navcat" href="php/chooser.php">Directory</a> <a id="navcont" href="contact.php">Contact us</a> <a href="javascript:void(0);" class="icon" onClick="hamburger()"> <em id="hamburger" class="fa fa-bars"></em> </a>
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
							
							echo "&nbsp;<a href='php/login.php'><i class='fa'>&#xf007;&nbsp;&nbsp;</i><p style='all: unset; font-family: 'Roboto', sans-serif;' id='navlogin'>Log in</p></a>";
							
						}
						
				?>
				
					
		  </div>
  			
	    </div>
		
		<section id="main">
		
			<h1 id="sorry" class="center">We are sorry :(</h1>
			
			<h3 id="falsehelp" class="center"><br>In order to gain access, please log in.</h3>

			<p id="bottomhelp" class="center">In order to access the service you must log in.<br><br>If you don't have a user account, you can sign up <a href='php/signup.php'>here</a>.<br>You can log in and view your contacts, <a href='php/login.php'>here</a>.</p>
		
		</section>
		
		<div class="footer">
    	
	    	<br>Designed and Developed by Ilias Chanis 2018-2019
	    	
		</div>
		
		<script src="jscr/translate.js"></script>
		
	</body>
	
</html>
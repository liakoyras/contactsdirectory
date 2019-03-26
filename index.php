<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="16 Jul 2018">
		
		<title>Home</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/hero.css">
		<link rel="stylesheet" type="text/css" href="css/icons.css">
		<link rel="stylesheet" type="text/css" href="css/collapsible.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="jscr/buttons.js"></script>
		
	</head>

	<body>

		<div class="hero-image">
		
			<div class="hero-text">
			
				<h1 id="herotext">Contacts Directory Service</h1>
				<h4 style="font-size:20px"><a id="herolink" onClick="scrollHome()">See more about the service!</a></h4><p id="or">or</p><br>
				<a id="but" href="php/getstarted.php">Get Started</a>
				
			</div>
			
		</div>
		
	    <div class="navbar" id="myTopnav">
		  <a id="navhome" class="active" href="#main">Home</a>
		  <a id="navcat" href="php/chooser.php">Directory</a>
		  <a id="navcont" href="contact.php">Contact us</a>
		  <a href="javascript:void(0);" class="icon" onClick="hamburger()"><em id="hamburger" class="fa fa-bars"></em></a>
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
		
			<h1 id="welcome" class="center">Welcome!</h1>
			
			<div class="col-container">
							
				<div class="col">

					<i class="fa">&#xf0c7;</i>
					<p id="storage">Unlimited Storage Space</p>

				</div>

				<div class="col">

					<i class="fa">&#xf2be;</i>
					<p id="friendly">User Friendly</p>

				</div>

				<div class="col">

					<i class="fa">&#xf108;</i>
					<p id="support">Excellent Support</p>

				</div>
				
			</div>
			
			<h3 id="moreinfo" class="center"><br>Do you have a question?</h3>
			<button id="colservice"class="collapsible">What;</button>
			<div class="content">

				<p id="services">This website offers Contact Directory services.<br>Each user has the ability to:<br>
				<ul>
					<li id="slist1">Create Contacts</li>
					<li id="slist2">Update or delete existing contacts</li>
					<li id="slist3">Perform a search in existing contacts</li>
				</ul>
				</p>

			</div>

			<button id="colinstructions" class="collapsible">How?</button>
			<div class="content">

				<p id="instructions">In order to use the service, you must be logged in to your user account (you can register <a href='php/signup.php'>here</a>).<br>From the 'Directory' option on the menu, you have access to every service described above.<br>You can use the buttons in order to create, edit or delete a contact and the search bar to search a contact's name.</p>

			</div>

			<p id="bottomhelp" class="center">In order to access the service you must log in.<br><br>If you don't have a user account, you can sign up <a href='php/signup.php'>here</a>.<br>You can log in and view your contacts, <a href='php/login.php'>here</a>.</p>
		
		</section>
		
		<div class="footer">
    	
	    	<br>Designed and Developed by Ilias Chanis 2018-2019
	    	
		</div>
		
		<script src="jscr/collapsible.js"></script>
		<script src="jscr/translate.js"></script>
		
	</body>
	
</html>
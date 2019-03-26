<?php 
	
	session_start();
	
	if($_SESSION["authorized"] != 1){
		
		header('Location: false.php');
		
	}

?>
<!DOCTYPE html>
<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="19 Jul 2018">
		
		<title>Directory</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/catalogue.css">
		
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="jscr/buttons.js"></script>
		<script src="jscr/ajaxtable.js"></script>
		<script src="jscr/confirmation.js"></script>
		
	</head>
	
	<body>
		<div id="container">
			<div class="navbar" id="myTopnav">
			 	<a id="navhome" href="index.php">Home</a>
			 	<a id="navcat" class="active" href="php/chooser.php">Directory</a>
				<a id="navcont" href="contact.php">Contact us</a>
				<a href="javascript:void(0);" class="icon" onClick="hamburger()"><em id="hamburger" class="fa fa-bars"></em></a>
			  	<div id ="right" >

						<div class="pull-right" style="margin-left: 5px;margin-top: 6px;" onClick="return translateEN()" >
						<a href="" onClick="return false;"><img style="height: 11px;" src="img/UK.png"></a>
					</div>
					<div class="pull-right" style="margin-left: 15px;margin-top: 6px;" onClick="return translateGR()">
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

				<h1 id="cataloguehead" class="center">This is your Directory page.</h1>
				<h3 id="cataloguebody" class="center">Here, you can view your contacts and search for, edit and delete them.<br><br></h3>

				<p class="center"><a id="newbutton" href="php/newcon.php">Create New Contact</a></p>

				<h3 id="searchprompt" class="center">Type the first or last name of the contact you want to search for.</h3>

				<form>

					<input type="text" value="" onkeyup="showContacts(this.value)">

				</form>

				<div id="contactTable">

	

				</div>
									
			</section>	
			
			
			
			<div id="footer">
				
				<div id="deleteacc">
					<p class="center"><a id="catquestion" href="php/deleteuser.php">Do you want to delete your account?</a></p>	
				</div>
				
				<br>Designed and Developed by Ilias Chanis 2018-2019

			</div>
		
		</div>
		
		<script src="jscr/translate.js"></script>
		
	</body>
	
</html>
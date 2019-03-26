<!DOCTYPE html>
<?php
	session_start();

	if($_SESSION["authorized"] != 1){
		
		header('Location: ../false.php');
		
	}

	$userid = $_SESSION["ID"];

	include_once 'connect.php';
	include_once 'validation.php';

    if(isset($_POST["password"])){
        
        $pass = validateInput($_POST["password"], "password");
        
        try{
			$dbconnect = new Connection();
			$db = $dbconnect->openConnection();
		}catch(PDOException $error){
			echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
			$dbconnect->closeConnection();
		}
		
		try{
			$passquery = $db->prepare("SELECT `password` FROM `users` WHERE `userID`=:id");
			$passquery->execute(['id' => $userid]);
			$result = $passquery->fetch();
			$dbpassword = $result["password"];

			if($dbpassword == $pass){
				session_destroy();
				$query = $db->prepare("DELETE FROM `users` WHERE `userID`=:id");
				$query->execute(['id' => $userid]);
				
				$query = $db->prepare("DELETE FROM `catalogue` WHERE `USERID`=:id");
				$query->execute(['id' => $userid]);		
	
				$dbconnect->closeConnection();
				echo "<script>window.location.href='../index.php';</script>";
			}else{
				$dbconnect->closeConnection();
				echo "<script>alert('Wrong Password!');</script>";
			}
		}catch(PDOException $error){
			echo "<p id='dberror'>A database error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		}

	}
	
?>


<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="16 Jul 2018">
		
		<title>Are you sure?</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/delete.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
	</head>
	
	<body>
		<div class="navbar" id="myTopnav">
    		<a id="navhome" href="../index.php">Home</a>
			<a id="navcat" href="chooser.php">Directory</a>
			<a id="navcont" href="../contact.php">Contact us</a>
			<a href="javascript:void(0);" class="icon" onClick="hamburger()"><em id="hamburger" class="fa fa-bars"></em></a>
	      	<div id ="right" >
  			
				<div class="pull-right" style="margin-left: 5px;" onClick="return translateEN()" >
					<a href="" onClick="return false;"><img style="height: 11px;" src="../img/UK.png"></a>
           		</div>
           		<div class="pull-right" style="margin-left: 15px;" onClick="return translateGR()">
                	<a href="" onClick="return false;"><img style="height: 12.5px;" src="../img/Greece.png"></a>
            	</div>
            	
				<?php
						error_reporting(0);
						session_start();
						if($_SESSION["authorized"] == 1){
							
							echo "<p style='all: unset; font-family: 'Roboto', sans-serif;' id='navhi'>Hello </p>" . $_SESSION["username"] . "&nbsp;<a href='logout.php'><p style='all: unset; font-family: 'Roboto', sans-serif;' id='navlogout'>Log out</p></a>";
							
						}else{
							
							echo "&nbsp;<a href='login.php'><i class='fa'>&#xf007;&nbsp;&nbsp;</i><p style='all: unset; font-family: 'Roboto', sans-serif;' id='navlogin'>Log in</p></a>";
							
						}
				?>
				
					
		  </div>
  			
	    </div>
		
		<section id="main">
		
			<h1 id="warning" class="center">Warning! This action cannot be undone.</h1>
			
			<h3 id="question" class="center"><br>Are you sure you want to delete your acount?</h3>

			<p id="passprompt" class="center">To confirm the action, please enter your password in the field below and press enter.</p>
			
			<form accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  onSubmit="return validateDelete()" method="POST" name="delete">
				
				<input type="password" id="passfield" name="password" ><br>

			</form>
			
		</section>
		
		<div class="footer">
    	
	    	<br>Designed and Developed by Ilias Chanis 2018-2019
	    	
		</div>
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/translate.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</body>
	
</html>
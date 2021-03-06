<!DOCTYPE html>
<?php
	include_once 'connect.php';
	include_once 'validation.php';

    if(isset($_POST["login"])){
       
		$login = validateInput($_POST["login"], "username");
        $pass = validateInput($_POST["password"], "password");
		$email = validateInput($_POST["email"], "email");
		$fname = validateInput($_POST["fname"], "name");
		$lname = validateInput($_POST["lname"], "name");
        
 		try{
			$dbconnect = new Connection();
			$db = $dbconnect->openConnection();
		}catch(PDOException $error){
			echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
			$dbconnect->closeConnection();
		}
		
		try{
			$exists = $db->prepare("SELECT count(*) FROM `users` WHERE `username` = :login");
			$exists->execute(['login' => $login]);
			$count = $exists->fetchColumn();
			
			if($count){
				echo "<script src='../jscr/translate.js'></script>";
				echo "<script>if(getCookie('lang')){if (getCookie('lang') == 'GR'){prompt = 'Το όνομα χρήστη χρησιμοποιείται ήδη. Παρακαλούμε επιλέξτε κάποιο άλλο.';}else{prompt = 'This username is already in use. Please select another one.';}}else{prompt = 'This username is already in use. Please select another one.';}alert(prompt);window.history.go(-1);</script>";
			}else{
				$insert = $db->prepare("INSERT INTO `users` (`username`, `password`, `email`, `firstname`, `lastname`) VALUES (:login, :pass, :email, :fname, :lname)");
				
				$insert->execute(['login' => $login, ':pass' => $pass, ':email' => $email, ':fname' => $fname, ':lname' => $lname]);
								
				session_start();
				$_SESSION["authorized"] = 1;
				$_SESSION["username"] = "$login";

				$select = $db->prepare("SELECT `userID` FROM `users` WHERE `username` = :login");
				$select->execute(['login' => $login]);
				$id = $select->fetch();
				
				$_SESSION["ID"] = $id["userID"];
				
				$dbconnect->closeConnection();
				echo "<script>window.location.href='../catalogue.php';</script>";
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
		<meta name="last modified" content="18 Jul 2018">
		
		<title>Sign up</title>
		<link rel="icon" href="../favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onClick ="home()">&larr;  Back</button>
	
		<form accept-charset="utf-8" name="signup" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onSubmit="return validateUser()" method="POST">
		
			<div class="fcontainer">
				
				<h1 id="sformtitle">Sign up</h1>
				<p id="sformcontents">Fill in the following form and press 'Sign up' in order to register for our service.<br> Your username must contain only alphanumeric characters. If you make a mistake, press the 'Cancel' button.<br>Fields marked with * are obligatory.<br>Do you already have an account? <a href='login.php'>Log in</a>
				</p>
				<hr>
				<label for="login"><b id="username">Username *</b></label>
				<span id="unerror" class="error"></span>
				<input type="text" name="login"><br>
				<label for="password"><b id="pass">Password *</b></label>
				<span id="passerror" class="error"></span>
				<input type="password" id="passfield" name="password" ><br>
				<label for="passrep"><b id="passrepeat">Repeat Password *</b></label>
				<input type="password" id="reppassfield" name="passrep">
				<input name="showpass" type="checkbox" onClick ="showPassword()"><b id="passshow">Show Password</b><br>
				<label for="email"><b>Email *</b></label>
				<span id="mailerror" class="error"></span>
				<input type="text" name="email"><br>
				<label for="fname"><b id="firstname">First Name</b></label>
				<input type="text" name="fname"><br>
				<label for="lname"><b id="lastname">Last Name</b></label>
				<input type="text" name="lname"><br>
				
				<div class="clearfloat">
				
					<button id="cancel" type="reset" class="clearbtn">Cancel</button>
					<button id="sformsubmit" type="submit" class="signupbtn">Sign up</button>
					
				</div>
				
				
			</div>
			
		</form>
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/translate.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</body>
	
</html>
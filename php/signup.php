<?php
	session_start();

    if(isset($_POST["login"])){
        
        $login = trim($_POST["login"]);        
        $pass = md5(trim($_POST["password"]));
    	$email = trim($_POST["email"]);
		$fname = trim($_POST["fname"]);
		$lname = trim($_POST["lname"]);		

        $servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
        $username = "57337";
        $password = "lostre123";
        $dbname = "db_57337";
        
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        if(!$connection){
			die("<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection));
		}
		
        mysqli_set_charset($connection,"utf8");
		
        $check = "SELECT `userID` FROM `users` WHERE `username` = '$login'";
		
		$checkresult = mysqli_query($connection, $check);
		
		
		if(mysqli_num_rows($checkresult) == 0){
			
			$query = "INSERT INTO `users` (`username`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login', '$pass', '$email', '$fname', '$lname')";

			if (mysqli_query($connection, $query)){
				
				$_SESSION["authorized"] = 1;
				$_SESSION["username"] = "$login";
				
				$result = mysqli_query($connection, "SELECT `userID` FROM `users` WHERE `username` = '$login'");
				$row = mysqli_fetch_array($result);
				$_SESSION["ID"] = $row["userID"];
				
				echo "<script>window.location.href='../catalogue.php';</script>";
				
			}else{
				
				echo "<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection);
			}
			
		}else{
			
			mysqli_close($connection);
			echo '<script>alert("This username is already in use. Please select another one."); window.history.go(-1);</script>';
			
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
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onClick ="home()">&larr;  Back</button>
	
		<form accept-charset="utf-8" name="signup" action="" onSubmit="return validation()" method="POST">
		
			<div class="fcontainer">
				
				<h1 id="sformtitle">Sign up</h1>
				<p id="sformcontents">Fill in the following form and press 'Sign up' in order to register for our service.<br> Your user name must contain only alphanumeric characters. If you make a mistake, press the 'Cancel' button.<br>Fields marked with * are obligatory.<br>Do you have a user account? <a href='login.php'>Log in</a>
				</p>
				<hr>
				<label for="login"><b id="username">User Name *</b></label>
				<input type="text" name="login" required><br>
				<label for="password"><b id="pass">Password *</b></label>
				<input type="password" id="passfield" name="password" required><br>
				<label for="passrep"><b id="passrepeat">Repeat Password *</b></label>
				<input type="password" id="reppassfield" name="passrep" required>
				<input name="showpass" type="checkbox" onClick ="showPassword()"><b id="passshow">Show Password</b><br>
				<label for="email"><b>Email *</b></label>
				<input type="text" name="email" required><br>
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
		
		<script src="../jscr/translate.js"></script>
		
	</body>
	
</html>
<?php

	include_once 'connect.php';
	include_once 'validation.php';

    if(isset($_POST["username"])){
        
        $login = validateInput($_POST["username"], "username");
        $pass = validateInput($_POST["password"], "password");
        
        try{
			$dbconnect = new Connection();
			$db = $dbconnect->openConnection();
		}catch(PDOException $error){
			echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
			$dbconnect->closeConnection();
		}
        
        try{
			$exists = $db->prepare("SELECT count(*) FROM `users` WHERE `username` = :login AND `password`=:pass");
			$exists->execute(['login' => $login, 'pass' => $pass]);
			$count = $exists->fetchColumn();
			
			if($count == 1){
				session_start();
				$_SESSION["authorized"] = 1;
				$_SESSION["username"] = "$login";
				
				$id = $db->prepare("SELECT `userID` FROM `users` WHERE `username` = :login");
				$id->execute(['login' => $login]);
				$result = $id->fetch();
				
				$_SESSION["ID"] = $result["userID"];
				
				$dbconnect->closeConnection();
				echo "<script>window.location.href='../catalogue.php';</script>";
			}elseif($count == 0){
				$dbconnect->closeConnection();
				echo "<script src='../jscr/translate.js'></script>";
				echo "<script>var prompt;if(getCookie('lang')){if (getCookie('lang') == 'GR'){prompt = 'Λάθος όνομα χρήστη ή κωδικός.';}else{prompt = 'Wrong username or password.';} }else{prompt = 'Wrong username or password.';}alert(prompt);</script>";
			}else{
				$dbconnect->closeConnection();
				echo "<script src='../jscr/translate.js'></script>";
				echo "<script>if(getCookie('lang')){if (getCookie('lang') == 'GR'){prompt = 'Παρακαλούμε εισάγετε και πάλι τα στοιχεία σας.';}else{prompt = 'Please insert your credentials again.';}}else{prompt = 'Please insert your credentials again.';}alert(prompt);</script>";
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
		
		<title>Log in</title>
		<link rel="icon" href="../favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onclick="home()">&larr;  Back</button>
	
		<form accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  onSubmit="return validateLogin()" method="POST" name="login">

			<div class="fcontainer">
				
				<h1 id="lformtitle">Log in</h1>
				<p id="lformcontents">Fill the following form to log in.<br>Don't have a user account? <a href='signup.php'>Sign up</a></p>
				<hr>
				<label for="username"><b id="lusername">Username</b></label>
				<input type="text" name="username"><br>
				<label for="password"><b id="lpass">Password</b></label>
				<input type="password" name="password"><br>
				
				<div class="clearfloat">
				
					<button id="lformsubmit" type="submit">Log in</button>
				
				</div>
				
			</div>
			
		</form>
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/translate.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</body>
	
</html>
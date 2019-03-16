<?php

    if(isset($_POST["login"])){
        
        $login = trim($_POST["login"]);
        $pass = trim($_POST["password"]);
        
        $pass = md5($pass);
    
        
        $servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
        $username = "57337";
        $password = "lostre123";
        $dbname = "db_57337";
        
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        if (!$connection){
			die("<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection));
		}
        
        
        $query = "SELECT `userID` FROM `users` WHERE username='$login' AND password='$pass'";
        
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1){
            
            
            session_start();
			$_SESSION["authorized"] = 1;
			$_SESSION["username"] = "$login";
			
			$row = mysqli_fetch_array($result);
			$_SESSION["ID"] = $row["userID"];
			
			mysqli_close($connection);
			
			echo "<script>window.location.href='../catalogue.php';</script>";
			
		}else{
			
			echo "<script>alert('Wrong user name or password!');</script>";
			
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
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="../jscr/buttons.js"></script>
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onclick="home()">&larr;  Back</button>
	
		<form accept-charset="utf-8" action="" method="POST">

			<div class="fcontainer">
				
				<h1 id="lformtitle">Log in</h1>
				<p id="lformcontents">Fill the following form to log in.<br>Don't have a user account? <a href='signup.php'>Sign up</a></p>
				<hr>
				<label for="login"><b id="lusername">User Name</b></label>
				<input type="text" name="login" required><br>
				<label for="password"><b id="lpass">Password</b></label>
				<input type="password" name="password" required><br>
				
				<div class="clearfloat">
				
					<button id="lformsubmit" type="submit">Log in</button>
					
				</div>
							
			</div>
			
		</form>
		
		<script src="../jscr/translate.js"></script>
		
	</body>
	
</html>
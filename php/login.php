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
			die("Προέκυψε κάποιο σφάλμα." . mysqli_connect_error() . "Παρακαλούμε επικοινωνήστε μαζί μας.");
		}
        
        
        $query = "SELECT `userID` FROM `users` WHERE username='$login' AND password='$pass'";
        
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1){
            
            
            session_start();
			$_SESSION["authorized"] = 1;
			$_SESSION["username"] = "$login";
			
			$row = $result->fetch_assoc();
			$_SESSION["ID"] = $row["userID"];
			
			mysqli_close($connection);
			
			echo "<script>alert('Συνδεθήκατε με επιτυχία!');window.location.href='../catalogue.php';</script>";
			
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
		
		<title>Σύνδεση</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
		<script src="../jscr/buttons.js"></script>
		
	</head>
   
    <body>
    
		<button class="back_button" onclick="home()">&larr;  Πίσω</button>
	
		<form accept-charset="utf-8" action="" method="POST">

			<div class="fcontainer">
				
				<h1>Σύνδεση</h1>
				<p>Συμπληρώστε την παρακάτω φορμα για να συνδεθείτε.<br>Δεν έχετε λογαριασμό χρήστη; <a href="signup.php">Κάντε Εγγραφή</a></p>
				<hr>
				<label for="login"><b>Όνομα Χρήστη</b></label>
				<input type="text" name="login" required><br>
				<label for="password"><b>Κωδικός</b></label>
				<input type="password" name="password" required><br>
				
				<div class="clearfloat">
				
					<button type="submit">Σύνδεση</button>
					
				</div>
							
			</div>
			
		</form>
		
	</body>
	
</html>
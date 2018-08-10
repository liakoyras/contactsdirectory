<?php

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
        if (!$connection){
			die("Προέκυψε κάποιο σφάλμα." . mysqli_connect_error() . "Παρακαλούμε επικοινωνήστε μαζί μας.");
		}
		
        mysqli_set_charset($connection,"utf8");
		
        $check = "SELECT `userID` FROM `users` WHERE `username` = '$login'";
		
		$result = mysqli_query($connection, $check);
		
		
		if($result->num_rows == 0){
			
			$query = "INSERT INTO `users` (`username`, `password`, `email`, `firstname`, `lastname`)   VALUES ('$login', '$pass', '$email', '$fname', '$lname')";

			if (mysqli_query($connection, $query)){
				
				session_start();
				$_SESSION["authorized"] = 1;
				$_SESSION["username"] = "$login";

				$row = $result->fetch_assoc();
				$_SESSION["ID"] = $row["userID"];
				echo "<script>alert('Η εγγραφή σας ήταν επιτυχής!');window.location.href='../index.php';</script>";
					
			}else{
				
				echo "Σφάλμα:<br>" . mysqli_error($connection) . "<br>Παρακαλούμε επικοινωνήστε μαζί μας.";
			}
			
		}else
			
			mysqli_close($connection);
			echo "<script>alert('Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη, επιλέξτε κάποιο άλλο.'); goback();</script>";
        
    }


?>


<html>

	<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="Online Directory Services">
		<meta name="author" content="Ilias Chanis">
		<meta name="last modified" content="18 Jul 2018">
		
		<title>Φόρμα Εγγραφής</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</head>
   
    <body>
    
		<button class="back_button" onClick ="home()">&larr;  Πίσω</button>
	
		<form accept-charset="utf-8" name="signup" action="" onSubmit="return validation()" method="POST">
		
			<div class="fcontainer">
				
				<h1>Φορμα Εγγραφής</h1>
				<p>Συμπληρώστε την παρακάτω φορμα και πατήστε στο κουμπί Εγγραφή για να εγγραφείτε και να χρησιμοποιήσετε την υπηρεσία μας. Το όνομα χρήστη πρέπει να περιέχει μόνο λατινικούς χαρακτήρες και αριθμούς. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά. <br>Έχετε ήδη λογαριασμό χρήστη; <a href="login.php">Συνδεθείτε</a></p>
				<hr>
				<label for="login"><b>Όνομα Χρήστη *</b></label>
				<input type="text" name="login" required><br>
				<label for="password"><b>Κωδικός *</b></label>
				<input type="password" name="password" required><br>
				<label for="passrep"><b>Επανάληψη Κωδικού *</b></label>
				<input type="password" name="passrep" required><br>
				<label for="email"><b>Email *</b></label>
				<input type="text" name="email" required><br>
				<label for="fname"><b>Όνομα</b></label>
				<input type="text" name="fname"><br>
				<label for="lname"><b>Επώνυμο</b></label>
				<input type="text" name="lname"><br>
				
				<div class="clearfloat">
				
					<button type="reset" class="clearbtn">Αναίρεση</button>
					<button type="submit" class="signupbtn">Εγγραφή</button>
					
				</div>
				
				
			</div>
			
		</form>
		
	</body>
	
</html>
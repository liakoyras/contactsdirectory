<?php

	session_start();

    if(isset($_POST["fname"])){
        
        $fname = trim($_POST["fname"]);
 		$lname = trim($_POST["lname"]);
		$tel = trim($_POST["tel"]);
		$email = trim($_POST["email"]);
		$address = trim($_POST["address"]);
		$userid = $_SESSION["ID"];
		
        $servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
        $username = "57337";
        $password = "lostre123";
        $dbname = "db_57337";
        
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        if (!$connection){
			die("Προέκυψε κάποιο σφάλμα." . mysqli_connect_error() . "Παρακαλούμε επικοινωνήστε μαζί μας.");
		}
		
        mysqli_set_charset($connection, "utf8");
		
		$query = "INSERT INTO `catalogue` (`FIRSTNAME`, `LASTNAME`, `PHONE`, `ADDRESS`, `EMAIL`, `USERID`) VALUES ('$fname', '$lname', '$tel', '$address', '$email', '$userid')";
		
		if (mysqli_query($connection, $query)){
			
			mysqli_close($connection);
			echo "<script>alert('Η επαφή αποθηκεύτηκε επιτυχώς!');window.location.href='../catalogue.php';</script>";
			
		}else{
			
			echo "Σφάλμα:<br>" . mysqli_error($connection) . "<br>Παρακαλούμε επικοινωνήστε μαζί μας.";
			
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
		
		<title>Νέα Επαφή</title>
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
    
		<button class="back_button" onclick="home()">&larr;  Πίσω</button>
	
		<form accept-charset="utf-8" name="newcon" action="" onSubmit="return conVal()" method="POST">
		
			<div class="fcontainer">
				
				<h1>Δημιουργία Νέας Επαφής</h1>
				<p>Συμπληρώστε τα στοιχεία της επαφής που θέλετε να αποθηκεύσετε στην παρακάτω φορμα και πατήστε στο κουμπί Αποθήκευση για να την αποθηκεύσετε. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά.</p>
				<hr>
				<label for="fame"><b>Όνομα *</b></label>
				<input type="text" name="fname" required><br>
				<label for="lname"><b>Επώνυμο</b></label>
				<input type="text" name="lname"><br>
				<label for="tel"><b>Τηλέφωνο *</b></label>
				<input type="text" name="tel" required><br>
				<label for="email"><b>Email</b></label>
				<input type="text" name="email"><br>
				<label for="address"><b>Διεύθυνση</b></label>
				<input type="text" name="address"><br>

				
				<div class="clearfloat">
				
					<button type="reset" class="clearbtn">Αναίρεση</button>
					<button type="submit" class="signupbtn">Αποθήκευση</button>
					
				</div>
				
				
			</div>
			
		</form>
		
	</body>
	
</html>
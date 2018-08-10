<?php
	
	session_start();
	
	$contactid = $_GET["contactid"];
	$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
	$username = "57337";
	$password = "lostre123";
	$dbname = "db_57337";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		
		die("Προέκυψε κάποιο σφάλμα. " . mysqli_connect_error() . " Παρακαλούμε επικοινωνήστε μαζί μας.");
		
	}
	
	mysqli_query($connection, "SET NAMES 'utf8'");

	$query = "SELECT * FROM `catalogue` WHERE ID='$contactid'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result);
	
	if(isset($_POST["fname"])){
        
        $fname = trim($_POST["fname"]);
 		$lname = trim($_POST["lname"]);
		$tel = trim($_POST["tel"]);
		$email = trim($_POST["email"]);
		$address = trim($_POST["address"]);
		$userid = $_SESSION["ID"];
		
        mysqli_set_charset($connection,"utf8");
		
		$query = "UPDATE `catalogue` SET `FIRSTNAME` = '$fname', `LASTNAME` = '$lname', `PHONE` = '$tel', `ADDRESS` = '$address', `EMAIL` = '$email' WHERE ID='$contactid'";
		
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
		
		<title>Επεξεργασία Επαφής</title>
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
				
				<h1>Επεξεργασία Επαφής</h1>
				<p>Κάντε τις αλλαγές που επιθυμείτε και πατήστε στο κουμπί Αποθήκευση Αλλαγών για να αλλάξετε την επαφή σας. Εάν κάνετε κάποιο λάθος, μπορείτε να πατήσετε στο κουμπί Αναίρεση.<br>Τα πεδία σημειωμένα με * είναι υποχρεωτικά.</p>
				<hr>
				<label for="fame"><b>Όνομα *</b></label>
				<input type="text" name="fname" value="<?php echo $row['FIRSTNAME'];?>"required><br>
				<label for="lname"><b>Επώνυμο</b></label>
				<input type="text" name="lname" value="<?php echo $row['LASTNAME'];?>"><br>
				<label for="tel"><b>Τηλέφωνο *</b></label>
				<input type="text" name="tel" value="<?php echo $row['PHONE'];?>"required><br>
				<label for="email"><b>Email</b></label>
				<input type="text" name="email" value="<?php echo $row['EMAIL'];?>"><br>
				<label for="address"><b>Διεύθυνση</b></label>
				<input type="text" name="address" value="<?php echo $row['ADDRESS'];?>"><br>

				
				<div class="clearfloat">
				
					<button type="reset" class="clearbtn">Αναίρεση</button>
					<button type="submit" class="signupbtn">Αποθήκευση Αλλαγών</button>
					
				</div>
				
			</div>
			
		</form>
		
	</body>
	
</html>
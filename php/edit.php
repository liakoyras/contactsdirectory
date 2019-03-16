<?php
	
	session_start();
	
	$contactid = $_GET["contactid"];
	$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
	$username = "57337";
	$password = "lostre123";
	$dbname = "db_57337";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		
		die("<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection));
		
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
		
		
		$query = "UPDATE `catalogue` SET `FIRSTNAME` = '$fname', `LASTNAME` = '$lname', `PHONE` = '$tel', `ADDRESS` = '$address', `EMAIL` = '$email' WHERE ID='$contactid'";
		
		if (mysqli_query($connection, $query)){
			
			mysqli_close($connection);
			echo "<script>window.location.href='../catalogue.php';</script>";
			
		}else{
			
			echo "<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection);
			
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
		
		<title>Edit Contact</title>
		<link rel="icon" href="favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onclick="home()">&larr;  Back</button>
	
		<form accept-charset="utf-8" name="newcon" action="" onSubmit="return conVal()" method="POST">
		
			<div class="fcontainer">
				
				<h1 id="edith">Edit Contact</h1>
				<p id="editcon">Fill the form with the contact information you want to save and press Create Contact. If you make a mistake, press the Cancel button.<br>Fields marked with * are obligatory.</p>
				<hr>
				<label for="fame"><b id="cfname">First Name *</b></label>
				<input type="text" name="fname" value="<?php echo $row['FIRSTNAME'];?>"required><br>
				<label for="lname"><b id="lastname">Last Name</b></label>
				<input type="text" name="lname" value="<?php echo $row['LASTNAME'];?>"><br>
				<label for="tel"><b id="ctel">Telephone *</b></label>
				<input type="text" name="tel" value="<?php echo $row['PHONE'];?>"required><br>
				<label for="email"><b>Email</b></label>
				<input type="text" name="email" value="<?php echo $row['EMAIL'];?>"><br>
				<label for="address"><b id="conaddress">Address</b></label>
				<input type="text" name="address" value="<?php echo $row['ADDRESS'];?>"><br>

				
				<div class="clearfloat">
				
					<button id="cancel" type="reset" class="clearbtn">Cancel</button>
					<button id="savech" type="submit" class="signupbtn">Save Changes</button>
					
				</div>
				
			</div>
			
		</form>
		
		<script src="../jscr/translate.js"></script>
		
	</body>
	
</html>
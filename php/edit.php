<?php
	
	session_start();
	$userid = $_SESSION["ID"];
	$contactid = $_GET["contactid"];

	include_once 'connect.php';
	include_once 'validation.php';

	try{
		$dbconnect = new Connection();
		$db = $dbconnect->openConnection();
	}catch(PDOException $error){
		echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		$dbconnect->closeConnection();
	}
	
	try{

		$checkq = $db->prepare("SELECT `USERID` FROM `catalogue` WHERE `ID`=:contactid");
		$checkq->execute(['contactid' => $contactid]);
		$check = $checkq->fetchColumn();

		if($check != $userid) echo "<script>window.location.href='../catalogue.php';</script>;";

		$result = $db->prepare("SELECT * FROM `catalogue` WHERE `ID`=:contactid");
		$result->execute(['contactid' => $contactid]);
		$row = $result->fetch();

		if(isset($_POST["fname"])){

			$fname = validateInput($_POST["fname"], "name");
			$lname = validateInput($_POST["lname"], "name");
			$tel = validateInput($_POST["tel"], "telephone");
			$email = validateInput($_POST["email"], "email");
			$address = validateInput($_POST["address"], "address");

			$updateq = $db->prepare("UPDATE `catalogue` SET `FIRSTNAME`=:fname, `LASTNAME`=:lname, `PHONE`=:tel, `ADDRESS`=:address, `EMAIL`=:email WHERE ID=:contactid");
			$updateq->execute(['fname' => $fname, 'lname' => $lname, 'tel' => $tel, 'address' => $address, 'email' => $email, 'contactid' => $contactid]);
			$dbconnect->closeConnection();
			echo "<script>window.location.href='../catalogue.php';</script>";
		}
	}catch(PDOException $error){
		echo "<p id='dberror'>An error in the database has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		$dbconnect->closeConnection();
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
		
	</head>
   
    <body>
    
		<button id="backbutton" class="back_button" onclick="directory()">&larr;  Back</button>
	
		<form accept-charset="utf-8" name="contact" action="" onSubmit="return validateContact()" method="POST">
		
			<div class="fcontainer">
				
				<h1 id="edith">Edit Contact</h1>
				<p id="editcon">Fill the form with the contact information you want to save and press Create Contact. If you make a mistake, press the Cancel button.<br>Fields marked with * are obligatory.</p>
				<hr>
				<label for="fame"><b id="cfname">First Name *</b></label>
				<span id="fnameerror" class="error"></span>
				<input type="text" name="fname" value="<?php echo $row['FIRSTNAME'];?>"><br>
				<label for="lname"><b id="lastname">Last Name</b></label>
				<span id="lnameerror" class="error"></span>
				<input type="text" name="lname" value="<?php echo $row['LASTNAME'];?>"><br>
				<label for="tel"><b id="ctel">Telephone</b></label>
				<span id="telerror" class="error"></span>
				<input type="text" name="tel" value="<?php echo $row['PHONE'];?>"><br>
				<label for="email"><b>Email</b></label>
				<span id="mailerror" class="error"></span>
				<input type="text" name="email" value="<?php echo $row['EMAIL'];?>"><br>
				<label for="address"><b id="conaddress">Address</b></label>
				<span id="addrerror" class="error"></span>
				<input type="text" name="address" value="<?php echo $row['ADDRESS'];?>"><br>

				
				<div class="clearfloat">
				
					<button id="cancel" type="reset" class="clearbtn">Cancel</button>
					<button id="savech" type="submit" class="signupbtn">Save Changes</button>
					
				</div>
				
			</div>
			
		</form>
		
		<script src="../jscr/buttons.js"></script>
		<script src="../jscr/translate.js"></script>
		<script src="../jscr/validation.js"></script>
		
	</body>
	
</html>
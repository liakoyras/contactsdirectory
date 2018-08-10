<?php
	
	$contactid = $_GET["contactid"];

	$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
	$username = "57337";
	$password = "lostre123";
	$dbname = "db_57337";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		
		die("Προέκυψε κάποιο σφάλμα. " . mysqli_connect_error() . " Παρακαλούμε επικοινωνήστε μαζί μας.");
		
	}
	
	$query = "DELETE FROM `catalogue` WHERE ID='$contactid'";
	
	mysqli_query($connection, $query);
	
	header('Location: ../catalogue.php');
	
?>
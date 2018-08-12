<?php

	session_start();

	$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
	$username = "57337";
	$password = "lostre123";
	$dbname = "db_57337";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		
		die("Προέκυψε κάποιο σφάλμα. " . mysqli_connect_error() . " Παρακαλούμε επικοινωνήστε μαζί μας.");
		
	}

	$userid = $_SESSION["ID"];
	
	mysqli_query($connection, "SET NAMES 'utf8'");
	
	$query = "SELECT * FROM `catalogue` WHERE USERID='$userid'";
	
	$result = mysqli_query($connection, $query);
	$contactnum = mysqli_num_rows($result);
	
	if($contactnum == 0){
		
		$response = "<p class='center'>Δεν έχετε καταχωρήσει καμία επαφή.</p>";	
		
	}else{
		
		$q = $_GET["q"];
		$contactresult = "";
		
		if(strlen($q) == 0){
			
			$contactresult = "<table>";
			
			while($row = mysqli_fetch_array($result)){
				
					$contactid = $row["ID"];

					$contact = "<tr>" .
					"<td>" . $row['FIRSTNAME'] . "</td>" .
					"<td>" . $row['LASTNAME'] . "</td>" .
					"<td>" . $row['PHONE'] . "</td>" .
					"<td>" . $row['ADDRESS'] . "</td>" .
					"<td>" . $row['EMAIL'] . "</td>" .
					"<td> <a id='editor' onClick='confirmDelete(".$contactid.")'>Διαγραφή</a> <a id='editor' href='php/edit.php?contactid=".$contactid."'>Επεξεργασία</a> </td>" .
					"</tr>";
					
					$contactresult = $contactresult . $contact;
					
				}
			
			$contactresult = $contactresult . "</table>";
						
			
		}else{
			
			$contactresult = "ΟΥΑΟΥ";
			
		}
		
		if($contactresult == ""){
			
			$response = "Δεν βρέθηκαν επαφές που ταιριάζουν στην αναζήτησή σας.";			
			
		}else{
			
			$response = $contactresult;
			
		}
		
	}
		

	echo $response;

?>
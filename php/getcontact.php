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
	
	if(!($contactnum == 0)){
		
		echo "<table>
			<tr>
			<th>Όνομα</th>
			<th>Επώνυμο</th>
			<th>Τηλέφωνο</th>
			<th>Διεύθυνση</th>
			<th>Email</th>
			<th>Επεξεργασία</th>
			</tr>";
		
			while($row = mysqli_fetch_array($result)){
				
				$contactid = $row["ID"];
				
				echo "<tr>";
				echo "<td>" . $row['FIRSTNAME'] . "</td>";
				echo "<td>" . $row['LASTNAME'] . "</td>";
				echo "<td>" . $row['PHONE'] . "</td>";
				echo "<td>" . $row['ADDRESS'] . "</td>";
				echo "<td>" . $row['EMAIL'] . "</td>";
				echo "<td> <a id='editor' onClick='confirmDelete(".$contactid.")'>Διαγραφή</a><a id='editor' href='edit.php'>Επεξεργασία</a> </td>";
				echo "</tr>";
				
			}
		
			echo "</table>";
		
	}else{
		
		echo "<p class='center'>Δεν έχετε καταχωρήσει καμία επαφή.</p>";	
		
	}

?>
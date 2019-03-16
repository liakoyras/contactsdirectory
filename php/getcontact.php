<?php

	session_start();

	$servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
	$username = "57337";
	$password = "lostre123";
	$dbname = "db_57337";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		
		die("<p id='connerror'>An error has occured.<br>Please contact us.<br>Error code: </p>". mysqli_error($connection));
		
	}

	$userid = $_SESSION["ID"];
	
	mysqli_query($connection, "SET NAMES 'utf8'");
	
	$query = "SELECT * FROM `catalogue` WHERE USERID='$userid'";
	
	$result = mysqli_query($connection, $query);
	$contactnum = mysqli_num_rows($result);
	
	if($contactnum == 0){
		
		$response = "<p id='nocontacts' class='center'>You have not created any contacts.</p>";	
		
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
					"<td> <a id='editor1' onClick='confirmDelete(".$contactid.")'>Delete</a> <a id='editor2' href='php/edit.php?contactid=".$contactid."'>Edit</a> </td>" .
					"</tr>";
					
					$contactresult = $contactresult . $contact;
					
				}
			
			$contactresult = $contactresult . "</table>";
						
			
		}else{
			
			$searchq = "SELECT * FROM `catalogue` WHERE (FIRSTNAME LIKE '%".$q."%' OR LASTNAME LIKE '%".$q."%') AND USERID='$userid'";
			$sresult = mysqli_query($connection, $searchq);
			
			if(mysqli_num_rows($sresult) > 0){
				
				$contactresult = "<table>";
				
				while($row = mysqli_fetch_array($sresult)){
					
					$contactid = $row["ID"];

					$contact = "<tr>" .
					"<td>" . $row['FIRSTNAME'] . "</td>" .
					"<td>" . $row['LASTNAME'] . "</td>" .
					"<td>" . $row['PHONE'] . "</td>" .
					"<td>" . $row['ADDRESS'] . "</td>" .
					"<td>" . $row['EMAIL'] . "</td>" .
					"<td> <a id='editor1' onClick='confirmDelete(".$contactid.")'>Delete</a> <a id='editor2' href='php/edit.php?contactid=".$contactid."'>Edit</a> </td>" .
					"</tr>";
					
					$contactresult = $contactresult . $contact;
					
				}
				
				$contactresult = $contactresult . "</table>";
				
			}
			
		}
		
		if($contactresult == ""){
			
			$response = "<p id='notfound'>No contacts match your search.</p>";			
			
		}else{
			
			$response = $contactresult;
			
		}
		
	}
		

	echo $response;

?>
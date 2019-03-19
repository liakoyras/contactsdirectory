<?php

	session_start();
	include_once 'connect.php';

	try{
		$dbconnect = new Connection();
		$db = $dbconnect->openConnection();
	}catch(PDOException $error){
		echo "<p id='connerror'>A connection error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		$dbconnect->closeConnection();
	}

	$userid = $_SESSION["ID"];

	try{
		$exists = $db->prepare("SELECT count(*) FROM `catalogue` WHERE USERID= :userid");
		$exists->execute(['userid' => $userid]);
		$contactnum = $exists->fetchColumn();


		if($contactnum == 0){

			$response = "<p id='nocontacts' class='center'>You have not created any contacts.</p>";	

		}else{

			$q = $_GET["q"];

			$contactresult = "";

			if(strlen($q) == 0){

				$query = $db->prepare("SELECT * FROM `catalogue` WHERE USERID= :userid");
				$query->execute(['userid' => $userid]);
				$result = $query->fetchAll(PDO::FETCH_ASSOC);

				$contactresult = "<table><tr>" .
					"<th id='tabfname'>First Name</th>" .
					"<th id='tablname'>Last Name</th>" .
					"<th id='tabtel'>Telephone</th>" .
					"<th id='tabaddr'>Address</th>" .
					"<th id='tabemail'>Email</th>" .
					"<th id='tabmod'>Modify</th>" .
					"</tr>";

				foreach ($result as $index=>$row) {
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

				$searchq = $db->prepare("SELECT * FROM `catalogue` WHERE (FIRSTNAME LIKE :search OR LASTNAME LIKE :search) AND USERID=:userid");
				$searchq->execute(['search' => "%".$q."%",'userid' => $userid]);
				$result = $searchq->fetchAll(PDO::FETCH_ASSOC);

				//$strue = $db->prepare("SELECT count(*) FROM `catalogue` WHERE (FIRSTNAME LIKE :search OR LASTNAME LIKE :search) AND USERID=:userid");
				//$strue->execute(['search' => '%'.$q.'%', 'userid' => $userid]);
				//$searccount = $strue->fetchColumn();

				if($result){

					$contactresult = "<table><tr>" .
						"<th id='tabfname'>First Name</th>" .
						"<th id='tablname'>Last Name</th>" .
						"<th id='tabtel'>Telephone</th>" .
						"<th id='tabaddr'>Address</th>" .
						"<th id='tabemail'>Email</th>" .
						"<th id='tabmod'>Modify</th>" .
						"</tr>";

					foreach ($result as $index=>$row) {
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

				$response = "<p id='notfound' class='center'>No contacts match your search.</p>";			

			}else{

				$response = $contactresult;

			}
		
		}
	}catch(PDOException $error){
		echo "<p id='dberror'>A database error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		$dbconnect->closeConnection();
	}

	echo $response;

?>
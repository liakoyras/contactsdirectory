<?php
	
	session_start();
	$userid = $_SESSION["ID"];
	$contactid = $_GET["contactid"];

	include_once 'connect.php';

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

		if($check != $userid) {
			echo "<script>window.location.href='../catalogue.php';</script>;";
		}
		else{
			$query = $db->prepare("DELETE FROM `catalogue` WHERE ID=:contactid");
			$query->execute(['contactid' => $contactid]);
		
			$dbconnect->closeConnection();			
		}
	}catch(PDOException $error){
		echo "<p id='dberror'>A database error has occured.<br>Please contact us.<br>Error code: </p>" . $error->getMessage();
		$dbconnect->closeConnection();
	}
	
	$dbconnect->closeConnection();

	header('Location: ../catalogue.php');
	
?>
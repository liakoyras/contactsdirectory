<?php
	session_start();
	
	if($_SESSION["authorized"] == 1){
<<<<<<< HEAD
		
=======

>>>>>>> catalogue
		header('Location: ../catalogue.php');
		
	}else{
		
		header('Location: ../php/signup.php');
		
	}

?>
<?php
	session_start();
	
	if($_SESSION["authorized"] == 1){
		
		header('Location: //catalogue.php');
		
	}else{
		
		header('Location: //false.php');
		
	}

?>
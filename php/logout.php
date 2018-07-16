<?php

	session_start();
	session_destroy();

	echo "<script>alert('Έχετε πλέον αποσυνδεθεί.');window.location.href='../index.php';</script>";

?>	
	
	
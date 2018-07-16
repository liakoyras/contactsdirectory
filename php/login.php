<?php

    if(isset($_POST["login"])){
        
        $login = trim($_POST["login"]);
        $pass = trim($_POST["password"]);
        
        $pass = md5($pass);
    
        
        $servername = "localhost"; //do not change to dalab.ee.duth.gr (!)
        $username = "57337";
        $password = "lostre123";
        $dbname = "db_57337";
        
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        if (!$connection){
			die("Προέκυψε κάποιο σφάλμα." . mysqli_connect_error() . "Παρακαλούμε επικοινωνήστε μαζί μας.");
		}
        
        
        $query = "SELECT `userID` FROM `users` WHERE username='$login' AND password='$pass'";
        
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1){
            
            
            session_start();
			$_SESSION["authorized"] = 1;
			$_SESSION["username"] = "$login";
			
			$row = $result->fetch_assoc();
			$_SESSION["ID"] = $row["userID"];
			echo "<script>alert('Συνδεθήκατε με επιτυχία!');window.location.href='../index.php';</script>";
			
		}
		
	}


?>



<body>

    <form action="" method="POST">

        Login: <input type="text" name="login"><br>
        Password: <input type = "password" name = "password"><br>
        <input type="submit" value="login">

    </form>

</body>
<?php
 // define variables and set to empty values
         $lUsernameErr = $lPasswordErr = "";
         $err=0;
		 $resMessage="";
		 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["lUsername"])) {
               $lUsernameErr = "Name is required";
			   $err++;
            }
	
            if (empty($_POST["lPassword"])) {
               $lPasswordErr = "Password is required";
			   $err++;
			   
            }
			
			if($err==0)					//se non c'è nessun errore mi connetto al database
			{
				require "dbconn.php";   


				
	$username = ""; 
			if (isset($_POST['lUsername'])) { 
			$username = $_POST['lUsername']; 
			} 
			
	$password = "";
			if (isset($_POST['lPassword'])) { 
			$password = $_POST['lPassword']; 
			}  

	
	//query per cercare l'utente che tenta il login
$checkIfExistingUser = "SELECT * FROM users WHERE users.Nome='$username' AND users.Password='$password'";

//invio la query al database
$result = mysqli_query($conn, $checkIfExistingUser);



if (mysqli_num_rows($result) > 0) 
	{
		$_SESSION['Username'] = $username;
		header("location: /progetto/home.php");
	}
	else 
		$resMessage="Nome utente o Password errati";
	
	
	$conn->close();
}

	}
?>
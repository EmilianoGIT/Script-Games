<?php
	// define variables and set to empty values
         $rUsernameErr = $rEmailErr = $rPasswordErr = "";
         $err=0;
		 $resMessage="";
		 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["rUsername"])) {
               $rUsernameErr = "Name is required";
			   $err++;
            }
            
            if (empty($_POST["rEmail"])) {
               $rEmailErr = "Email is required";
			   $err++;
            }else {
               $rEmail = test_input($_POST["rEmail"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($rEmail, FILTER_VALIDATE_EMAIL)) {
                  $rEmailErr = "Invalid email format"; 
				  $err++;
               }
            }
	
            if (empty($_POST["rPassword"])) {
               $rPasswordErr = "Password is required";
			   $err++;
			   
            }
			else if($_POST["rPassword"]!=$_POST["rCheckPassword"])
			{
				$rPasswordErr = "Password doesn't match";
				$err++;
				}	
			
			
			if($err==0)
			{
				require "dbconn.php";


				
	$username = ""; 
			if (isset($_POST['rUsername'])) { 
			$username = $_POST['rUsername']; 
			}  
	$email = "";
			if (isset($_POST['rEmail'])) { 
			$email = $_POST['rEmail']; 
			}  

		

	$password = "";
			if (isset($_POST['rPassword'])) { 
			$password = $_POST['rPassword']; 
			}	
	
	//query per l'inserimento dell'utente della tabella users
	$insert = "INSERT INTO users (Nome, Password, Email) VALUES ('$username','$password','$email')";
	
	//cotrollo che l'utente è stato inserito
	if($conn -> query($insert) == TRUE) 
		$resMessage="Registrazione effettuata";
	else
		$resMessage="Utente già registrato, registrazione non effettuata.";
	
	
	$conn->close();
}

	}
?>

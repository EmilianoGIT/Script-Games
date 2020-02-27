<?php
	$resDel="";
	if (isset($_SESSION['Username']))		//imposto che solo se il client è in sessione allora può eliminare, perchè può succedere che un client non loggato prepari l'url per eliminare un gioco
	{
	 if (isset($_GET['gametodelete']))		
		 {
			require "dbconn.php";
			$checkIfICanDelete="SELECT* FROM giochi WHERE giochi.NomeGioco='$_GET[gametodelete]' AND giochi.Uploader='$_SESSION[Username]'";
			$result = mysqli_query($conn, $checkIfICanDelete);
			if ($result->num_rows > 0) {
   
				$delete="DELETE FROM giochi WHERE giochi.NomeGioco='$_GET[gametodelete]'";
					//vedo se l'eliminazione è stata fatta
				if($conn -> query($delete) == TRUE)
				{
					$resDel="Il gioco è stato eliminato dal database";	
					$base_Dir="Giochi/";
					$path= $base_Dir . $_GET['gametodelete']."/";	//Giochi/nomegioco da eliminare/
					rrmdir($path);
				}						
				else $resDel="Il gioco che hai selezionato non esiste";
					
					$conn->close();
			} 
		 }
	}
	else header("location: /progetto/home.php");
	
					

?>
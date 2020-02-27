<?php
// Functions required by index.php
function doAction($action) {
	// Load functions
	require('functions.php');
	if (!is_numeric($action)) {
		// Error
		echo"Error: Bad Action";
		return;
	}
	switch($action) {
		case 0: 								//Visualizza la home(Pagina di login o di profilo, a seconda della sessione o no)
		 if (!isset($_SESSION['Username']))
			doLoginPage();
		else header("location: /ScriptGames/home.php");
			break;
		case 1: 								//Visualizza la pagina di registrazione
		 if (!isset($_SESSION['Username']))
			doSignUpPage();
		else header("location: /ScriptGames/home.php");
			break;
		case 2: 								//Visualizza la pagina di profilo
			doProfilePage();
			break;
		case 3: 								//Esegue il logout
			doLogout();
			break;
      	
      	default: // Unknown action
      		echo "Error: Bad Action Number";
    }
}
?>

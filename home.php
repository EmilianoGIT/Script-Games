<!DOCTYPE html>
<html lang="it-IT">
<head>

<link href = "style.css" rel = "stylesheet" type = "text/css">
<link href = "icon.ico" rel = "shortcut icon" >
<title>Home</title>
</head>

<body>
<?php
session_start();
require('functions.php');
if (isset($_SESSION['Username'])) //se sono loggato allora la home è la pagina di profilo
		doProfilePage();
	else 						  //altrimenti la home è la pagina di accesso
		doLoginPage();	

?>
</body>

</html>
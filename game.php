<?php
echo'	<!DOCTYPE html>';
echo'<html lang="it-IT">';
echo'<head>';
echo'<link href = "style.css" rel = "stylesheet" type = "text/css">';
echo'<link href = "icon.ico" rel = "shortcut icon" >';
echo'</head>';
echo'<h1 id ="gameTitle"></h1>Torna alla <a href="home.php">Home</a>';

echo'<p id ="gameDes">Descrizione del gioco</p>';
echo'<body>';
$gamename = $_GET['name'];
$path_name_ftype='Giochi/' .$_GET['name']. '/*.js';
foreach (glob($path_name_ftype) as $filename) 		//con questo ciclo prendo ogni nome di file nella cartella di gioco e li richiamo con <script>
{
	echo '<script type="text/javascript" src="'.$filename. '"></script>';
}
echo'</body>';
echo'</html>';


?>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function doLoginPage() {
	
	require "formValidatorAndLoginOperation.php";		//formValidator ed Eventualmente il login
	
echo'<!DOCTYPE html>';
echo'<html lang="it-IT">';
echo'<head>';
echo'<link href = "style.css" rel = "stylesheet" type = "text/css">';
echo'<link href = "icon.ico" rel = "shortcut icon" >';
echo'<title>Home</title>';
echo'</head>';
echo'<body>';
echo'<h1>Script Games</h1>';
echo'<div id="div1">';
echo'<p>Giochi caricati dagli utenti:</p>';
echo'<ul>';						
 
	require "listOfUploadedGames.php";			//lista dei giochi caricati
 
echo'</ul>';
echo'</div>';
echo'<div id="div2">';
echo'<p>Accedi</p>';
echo'<form id="login" action="index.php?action=0" method="post" accept-charset="utf8">';
echo'<p><span class="error">* campo richiesto.</span></p>';
echo'Username:';
echo'<input type="text" name="lUsername">';
	
	if ($lUsernameErr != "")
		echo $lUsernameErr . '</span>';
	else echo '</span>';
	
echo'<span class = "error">* <?php echo $lUsernameErr;?></span>';
echo'<br><br>';
echo'Password: ';
echo'<input type="password" name="lPassword">';
	
	if ($lPasswordErr != "")
	 	 echo $lPasswordErr . '</span>';
	 else echo '</span>';
echo'<br><br>';
echo'</form>';
echo'<br>';
echo'<button type="submit" form="login">Login</button>';

	if ($resMessage!= "") echo '<p>'.$resMessage.'</p>';

	echo'<p>Non sei registrato? Allora <a href="index.php?action=1">Registrati</a>!</p>';	
echo'</div>';
echo'</body>';
echo'</html>'; 
}

function doSignUpPage() {
	
	require "formValidatorAndRegisterOperation.php";
	
echo'<!DOCTYPE html>';
echo'<html lang="it-IT">';
echo'<head>';
echo'<link href = "style.css" rel = "stylesheet" type = "text/css">';
echo'<link href = "icon.ico" rel = "shortcut icon" >';
echo'<title>Home</title>';
echo'</head>';
echo'<body>';
echo'<h1>Script Games</h1>';
echo'<div id="div3">';
echo "<p>Registrati</p>";
echo '<form id="signup" action="index.php?action=1" method="post" accept-charset="utf8">';
echo'<p><span class="error">* campo richiesto.</span></p>';
echo 'Username: ';
echo '<input type="text" name="rUsername" value="" >';

	if ($rUsernameErr != "")
	 	 echo $rUsernameErr . '</span>';
     else echo '</span>';
 
echo '<br><br>';
echo 'E-mail: <input type="text" name="rEmail"  value="" >';
	if ($rEmailErr != "") 
	 	 echo $rEmailErr . '</span>';
	 else echo '</span>';
	 
echo '<br><br>';
echo  'Password:<input type="password" name="rPassword" value="" >';
	
	if ($rPasswordErr != "") 
	 	 echo $rPasswordErr . '</span>';
	 else echo '</span>';
	 
echo '<br><br>';
echo 'Ripeti Password: <input type="password" name="rCheckPassword" value="" >';
echo '<br><br>';
echo '</form>';
echo '<br>';
echo '<button type="submit" form="signup">Invia</button>';
if ($resMessage!= "") echo $resMessage;
echo'<p>Torna alla pagina di <a href="index.php?action=0">Login</a></p>';	
echo'</div>';
echo'</body>';
echo'</html>'; 
}

function doProfilePage() {

		require	"deleteGame.php";		
		require "uploadGame.php";
	
echo'<!DOCTYPE html>';
echo'<html lang="it-IT">';
echo'<head>';
echo'<link href = "style.css" rel = "stylesheet" type = "text/css">';
echo'<link href = "icon.ico" rel = "shortcut icon" >';
echo'<title>Profilo</title>';
echo'</head>';
echo'<body>';
echo'<h3 class="sectiontitle">';
echo "<p>Benvenuto " . $_SESSION["Username"] . "! questa è la tua pagina di profilo.";
echo'<a href="index.php?action=3">Log out</a>';
echo'</p>';
echo'</body>';
echo'<div id="div4">';
echo'<form action="index.php?action=2" method="post" enctype="multipart/form-data">';
echo'<input type="file" id="file" name="files[]" multiple="multiple"/>';
echo'<br>';
echo'Nome del gioco: <input type="text" name="NomeGioco" value="" >';
echo'<input type="submit" value="Verifica e Carica!" />';
echo'</form>';
echo'<br><p id="ptlist">Nota: Il sito accetta solo file di questo tipo e altre convenzioni:</p>';
echo'<ul>';
echo'<li><p id="plist">Javascript(js), almeno 1 : possibilmente codice js che genera elementi html</p></li>';
echo'<ul>';
echo'<li><p id="plist">Per fare il riferimento a file con url(), come immagini e altro, bisogna usare il percorso "Giochi/NomeDelGiocoCheInseriteNelForm/file.formato", altrimenti i fogli js non troveranno mai quei file</p></li>';
echo'</ul>';
echo'<li><p id="plist">Immagini(png,gif,jpg,bmp) almeno 1 : anteprima visualizzata nella lista dei giochi chiamata "thumbnail.png"</p></li>';
echo'<li><p id="plist">Audio(wma,mp3) opzionali</p></li>';
echo'</ul>';

if ($resUp != "") echo '<p id="ptlist">'.$resUp.'</p>';
	 
echo'</div>';

echo'<div id="div5">';
echo'<table >';
echo'<tbody>';
echo'<tr>';
echo'<th><font color="yellow">Nome del gioco</font></th>';
echo'<th><font color="yellow">Operazioni</font></th>';
echo'</tr>';

require "listOfMyUploadedGames.php";

echo'</tbody>';
echo'</table>';

if ($resDel != "") echo '<p id="ptlist">'.$resDel.'</p>';
	 
echo'</div>';

echo'<div id="div1">';
require "listOfUploadedGames.php";
echo'</div>';
echo'</html>';
}
	
function rrmdir($dir) { 				//funzione che elimina cartelle contenenti file(rmdir darebbe un warning)
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
   } 
} 

function doLogout() {
	  	  session_unset();
	  	  session_destroy();
	  	  header("location: /ScriptGames/home.php");
	  }
?>

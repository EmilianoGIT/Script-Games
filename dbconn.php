<?php 
$servername = "localhost";
$dbUsername = "utenteprogetto";
$dbPassword = "password";
$dbName = "progetto";

//creo una connessiome al DB
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

//controllo la connessione 
if (!$conn) {
	die("Connessione al database fallita: " . mysqli_connect_error());
}

?>
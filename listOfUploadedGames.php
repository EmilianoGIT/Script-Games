<?php
require "dbconn.php";
 //query per tirare fuori la lista dei giochi
$query = "SELECT * FROM giochi";
//invio la query al database
$result = mysqli_query($conn, $query);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 echo'<li><a href="game.php?name=' .$row["NomeGioco"]. '">' .$row["NomeGioco"]. '</a>, caricato da ' .$row["Uploader"];		
		 echo'</li>';	
		 echo'<img src="Giochi/'.$row["NomeGioco"].'/thumbnail.png" style="width:128px;height:128px;">';		//immagine da sistemare ancora
    }
} 
else echo'<li>Nessun gioco..</li>';
$conn->close();
?>
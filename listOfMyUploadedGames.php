<?php

require "dbconn.php";
//query per tirare fuori la lista dei giochi
$query = "SELECT * FROM giochi WHERE giochi.Uploader='$_SESSION[Username]'";
//invio la query al database
$result = mysqli_query($conn, $query);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 
		 echo'<tr>';
		 echo'<td>'.$row["NomeGioco"].'</td>';
		 echo'<td><a href="index.php?action=2&gametodelete='.$row["NomeGioco"].'">Elimina</a></td>';
		 echo'</tr>';
		 
    }
} 
else echo'<li>Nessun gioco..</li>';

$conn->close();	

?>
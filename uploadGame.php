<?php
		  $resUp="";
		  $valid_formats = array("js", "png", "gif", "jpg", "bmp", "wma","mp3");	//per adesso sono questi, in futuro possiamo aggiungerne altri
			
			$newDir = ""; 
			if (isset($_POST['NomeGioco'])) { 
			$newDir = $_POST['NomeGioco']; 
			}  
		  
          $base_Dir="Giochi/";
          $path= $base_Dir . $newDir."/";	//Giochi/newDir/
		  $err=0;		//variabile che tiene conto di quanti file di formato errato vengono caricati
		  $JsFile=0; //variabile che tiene conto di quanti JS si caricano
		  $thumbnail=FALSE; //variabile che tiene conto della presUpenza dell'antemprima

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	
	foreach ($_FILES['files']['name'] as $f => $name) {     	//inizio lettura di un file    
	       if( !in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){	//se ci sono formati non validi segno come errore
				$err++;
				continue;
		   }
			else if( pathinfo($name, PATHINFO_EXTENSION)=="js" )		//se un file Javascript
			{
				$JsFile++;
				continue;
			}
			else if($name=="thumbnail.png" )		//se ho il file thumbnail.png ok
			{
				$thumbnail=TRUE;
				continue;
			}
	}			//fine lettura di un file
	
	if($JsFile>=1 && $thumbnail==TRUE && $err==0)//se c'è almeno un Javascript e non ci sono altri formati non validi allora puoi provare a caricare
	{
		if (!is_dir($path)) {	//se non esiste un directory con lo stesso nome del gioco allora creala e carica i files, altrimenti non caricare niente
			mkdir($path);
			chdir($path);
		
	
	foreach ($_FILES['files']['name'] as $f => $name) {     	//inizio lettura di un file
		
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $name))
	            {
					
					//query per l'inserimento del gioco nel db
					require "dbconn.php";
					$insert = "INSERT INTO giochi (NomeGioco, Uploader) VALUES ('$newDir','$_SESSION[Username]')";
	
					//cotrollo che il gioco non esista già
					if($conn -> query($insert) == TRUE) 
					$resUp="Gioco memorizzato nel db";
					//else
					//	echo "Gioco già presUpente nel db";
					$conn->close();
				}
				else		//se l'upload non viene effettuato correttamente elimino la cartella appena creata
				{ 
				rrmdir($path);
				$resUp="C'è stato qualche problema con l'upload..Riprova";
				break;
				}
	 }			//fine upload di un file
		}
			else $resUp='Un gioco con il nome "' .$newDir.'" esiste già';		
	}
	else $resUp="C'è qualche file che non hai inserito correttamente";
	     
	}			//fine lettura di tutti i file
	
?>
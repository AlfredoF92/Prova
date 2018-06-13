<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		
		$myLife_manager = new MyLifeManager();
		
		session_start();
	
		if(isset($_SESSION['id'])){
				$myLife_manager = new MyLifeManager();
				$utente = $myLife_manager->getUtenteByID($_SESSION['id']);
				$nomeUtente = $utente->username;
		}

		$nomeFileDaSalvare = ""; 
		// per prima cosa verifico che il file sia stato effettivamente caricato
		if (!isset($_FILES['file']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
		   echo 'Non hai inviato nessun file...';   
		   $nomeFile = ""; 
		}else{
			//percorso della cartella dove mettere i file caricati dagli utenti
			$uploaddir = 'http://localhost/MyLife/image/' . $_SESSION['id'] . '/diario/';

			//Recupero il percorso temporaneo del file
			$userfile_tmp = $_FILES['file']['tmp_name'];

			//recupero il nome originale del file caricato
			$userfile_name = $_FILES['file']['name'];
			
			$ext = explode(".", $userfile_name);
			
			$path = 'http://localhost/MyLife/image/' . $_SESSION['id'] . '/diario/';
			
			if (!is_dir("../../image/" . $_SESSION['id'] )) {
				if(mkdir("../../image/" . $_SESSION['id'] )) {
				//  echo 'La cartella ID è stata creata <br>';
				}else echo "La cartella ID non è stata creata <br>";
			}	
			
			if (!is_dir("../../image/" . $_SESSION['id'] . "/diario")) {
				if(mkdir("../../image/" . $_SESSION['id'] . "/diario")) {
				//  echo 'La cartella Diario è stata creata <br>';
				}else echo "La cartella Diario non è stata creata <br>";
			}	
			$nomeFileDaSalvare = date("Y-m-d-H-i-s") . "." . $ext[count($ext)-1];
			//copio il file dalla sua posizione temporanea alla mia cartella upload
			if (move_uploaded_file($userfile_tmp, "../../image/" . $_SESSION['id'] . "/diario/" . $nomeFileDaSalvare)) {
			  //Se l'operazione è andata a buon fine...
			 // echo 'File inviato con successo.';
			  $nomeFile = $_FILES['file']['name'];	
			}else{
			  //Se l'operazione è fallta...
			  echo 'Upload NON valido!'; 
			  $nomeFile = ""; 
			}
		}
		
		$titolo = $_REQUEST[ 'titolo' ];
		$descrizione = $_REQUEST[ 'descrizione' ];
		$commentoInvestitori = $_REQUEST[ 'commentoInvestitori' ];
		$percentualeInvestitori = $_REQUEST[ 'percentualeInvestitori' ];	
		
		
		//echo mktime(0, 0, 0, date("m"), date("d")-1, date("Y")); 
		$date = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));	
		$date = $date . " " . date("H:i:s");
		$myLife_manager->addDay($titolo, $descrizione, $date, $commentoInvestitori, $percentualeInvestitori, $nomeFileDaSalvare, $_SESSION['id']);
		
		echo "Salvato!";
?>
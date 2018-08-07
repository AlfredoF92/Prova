

<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		include_once( "../model/Goal.php" );
		
		$myLife_manager = new MyLifeManager();


		session_start();
		$idUser = "";
		if ( isset( $_SESSION[ 'id' ] ) ) {
			$myLife_manager = new MyLifeManager();
			$user = $myLife_manager->getUserByID( $_SESSION[ 'id' ] );
			$nomeUtente = $user->username;
			$idUser = $_SESSION[ 'id' ];

		} else {
			header( "location: http://localhost/iambrand/iambrand/pages/login.php" );
			// redirect verso pagina interna
		}



		$manager = new MyLifeManager();
	
			/*
				########## IMAGE MANAGEMENT #########
			*/
			$urlMedia = ""; 
			// per prima cosa verifico che il file sia stato effettivamente caricato
			if (!isset($_FILES['urlMedia']) || !is_uploaded_file($_FILES['urlMedia']['tmp_name'])) {
			   echo 'Non hai inviato nessun file...';   
			   $nomeFile = ""; 
			}else{
				//percorso della cartella dove mettere i file caricati dagli utenti
				$uploaddir = 'http://localhost/iambrand/iambrand/image/' . $_SESSION['id'] . '/diario/';

				//Recupero il percorso temporaneo del file
				$userfile_tmp = $_FILES['urlMedia']['tmp_name'];

				//recupero il nome originale del file caricato
				$userfile_name = $_FILES['urlMedia']['name'];

				$ext = explode(".", $userfile_name);

				$urlMedia = date("Y-m-d-H-i-s") . "." . $ext[count($ext)-1];

				//copio il file dalla sua posizione temporanea alla mia cartella upload
				if (move_uploaded_file($userfile_tmp, "../../image/" . $urlMedia)) {
				  //Se l'operazione è andata a buon fine...
				  //echo 'File inviato con successo.';
				  $nomeFile = $_FILES['urlMedia']['name'];	
				}else{
				  //Se l'operazione è fallta...
				  echo 'Upload NON valido!'; 
				  $nomeFile = ""; 
				}
			}
			
			$idStory = $_REQUEST["idStory"];

			if($urlMedia=="") echo "-1";
			else {
				$manager->updateNewImagesStory($idStory, $urlMedia);
				echo "immagine aggiunta";
			}
			
?>
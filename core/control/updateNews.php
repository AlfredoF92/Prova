<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		include_once( "../model/Goal.php" );
		
		$myLife_manager = new MyLifeManager();
		
		/*
			########## GET IDUTENTE #########
		*/
		session_start();
		if(isset($_SESSION['id'])){
				$myLife_manager = new MyLifeManager();
				$user = $myLife_manager->getUserByID($_SESSION['id']);
			
		}
		$idUser =  $_SESSION['id']; 
		$idPost =  $_REQUEST['idNews']; 
		

		/*
			########## IMAGE MANAGEMENT #########
		*/
		$urlMedia = ""; 
		// per prima cosa verifico che il file sia stato effettivamente caricato
		if (!isset($_FILES['urlMedia']) || !is_uploaded_file($_FILES['urlMedia']['tmp_name'])) {
		   echo 'Non hai inviato nessun file...';   
		   $urlMedia = $_REQUEST['urlMediaOld']; 
		}else{
			//percorso della cartella dove mettere i file caricati dagli utenti
			$uploaddir = 'http://localhost/iambrand/iambrand/image/' . $_SESSION['id'] . '/diario/';

			//Recupero il percorso temporaneo del file
			$userfile_tmp = $_FILES['urlMedia']['tmp_name'];

			//recupero il nome originale del file caricato
			$userfile_name = $_FILES['urlMedia']['name'];

			$ext = explode(".", $userfile_name);

			$path = 'http://localhost/iambrand/iambrand/image/' . $_SESSION['id'] . '/diario/';

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
			$urlMedia = date("Y-m-d-H-i-s") . "." . $ext[count($ext)-1];

			//copio il file dalla sua posizione temporanea alla mia cartella upload
			if (move_uploaded_file($userfile_tmp, "../../image/" . $_SESSION['id'] . "/diario/" . $urlMedia)) {
			  //Se l'operazione è andata a buon fine...
			  //echo 'File inviato con successo.';
			  $nomeFile = $_FILES['urlMedia']['name'];	
			}else{
			  //Se l'operazione è fallta...
			  echo 'Upload NON valido!'; 
			  $nomeFile = ""; 
			}
		}
		
		/*
			########## GET $_REQUEST #########	
		*/
		$title = $_REQUEST[ 'title' ];
		//$subtitle = $_REQUEST[ 'subtitle' ];
		$description = $_REQUEST[ 'description' ];
		
		$subtitle = $_REQUEST[ 'subTitle' ];
		$datePost = $_REQUEST[ 'datePost' ];
		$commentUser = $_REQUEST[ 'commentUser' ];	
		$commentInvestitors = "";	$lifeMood = 0;	
		$percentage = $_REQUEST[ 'percentage' ];	
		$lifeCareer = $_REQUEST[ 'lifeCareer' ];	
		$lifeRelationships = $_REQUEST[ 'lifeRelationships' ];	
		$lifeYourself = $_REQUEST[ 'lifeYourself' ];	
		
		//$type = $_REQUEST[ 'type' ];	

		//echo mktime(0, 0, 0, date("m"), date("d")-1, date("Y")); 
		$date = date( 'Y-m-d H:i:s', time() );
			
		

		/*
			########## SAVE IN DATABASE #########
		updatePost($datePost, $urlMedia, $title, $subTitle, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost, $idUser)
		
		*/

		$myLife_manager->updatePost($datePost, $urlMedia, $title, $subtitle, $description, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost, $idUser);
		
		echo "Salvato nel database!";
?>
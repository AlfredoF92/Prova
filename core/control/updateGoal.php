<?php
		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		
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
		}


		/*
		########## GET $_REQUEST #########
		*/
		$idGoal = $_REQUEST[ 'idGoal' ];
		$title = $_REQUEST[ 'title' ];
		//$subtitle = $_REQUEST[ 'subtitle' ];
		$description = $_REQUEST[ 'description' ];

		$idlabelColor = "";
		$newLabel = ""; 
		$newLabelColor = ""; 

		$dateBegin = $_REQUEST[ 'dateBegin' ];	
		$dateFinal= $_REQUEST[ 'dateFinal' ];

		$lifeCareer = $_REQUEST[ 'lifeCareer' ];	
		$lifeRelationships = $_REQUEST[ 'lifeRelationships' ];	
		$lifeYourself = $_REQUEST[ 'lifeYourself' ];	
		
		$percentage = $_REQUEST[ 'percentage' ];	
		
		
		$labelOperation = $_REQUEST[ 'labelOperation' ];	
		
		$idLabel="";
		if($labelOperation == 0){
			
			$idLabel = $_REQUEST[ 'idLabel' ];
			/*echo "HAI LASCIATO/CAMBIATO ETICHETTA " . "<br>";
			echo "idlabel: " . $idLabel . "<br>";*/
			
		}else if($labelOperation == 1){
			$newLabel = $_REQUEST[ 'newLabel' ];
			$newLabelColor = $_REQUEST[ 'newLabelColor' ];
			
			/*echo "STAI CREANDO UNA NUOVA ETICHETTA. " . "<br>";
			echo "newLabel: " . $newLabel . "<br>";
			echo "newLabelColor " . $newLabelColor . "<br>";*/
			$idLabel = $myLife_manager->newLabel($newLabel, $newLabelColor);
			
		}else if($labelOperation == 2){
			$idLabel = $_REQUEST[ 'idEditLabel' ];
			
			$labelEditName = $_REQUEST[ 'labelEditName' ];
			$labelEditColor = $_REQUEST[ 'labelEditColor' ];
			$myLife_manager->updateLabel($idLabel, $labelEditName, $labelEditColor);
			
			/*echo "HAI CAMBIATO E MODIFICATO L'ETICHETTA ATTUALE" . "<br>";
			echo "id: " . $idEditLabel . "<br>";
			echo "Nuovo nome: " . $labelEditName . "<br>";
			echo "Edit color: " . $labelEditColor . "<br>";*/
			
		}
		
		$myLife_manager->updateGoal($idGoal, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentage);
		echo "Salvato";
?>
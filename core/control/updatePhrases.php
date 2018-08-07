

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

		$idStory = $_REQUEST["idStory"];
		$phrases = $_REQUEST["phrases"];

		$manager->updatePhrases($idStory, $phrases);
		
		echo "Frasi aggiornate";
		
			
?>
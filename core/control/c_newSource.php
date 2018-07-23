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
			

		$mainName = $_REQUEST[ 'np1' ];
		$secondaryMame = $_REQUEST[ 'ns2' ];
		$founders = $_REQUEST[ 'f3' ];
		$email1 = $_REQUEST[ 'e4' ];
		$email2 = $_REQUEST[ 'es5' ];
		$tel = $_REQUEST[ 'ts6' ];
		$urlBlog = $_REQUEST[ 'url7' ];
		$comment = $_REQUEST[ 'c8' ];
		$urlLogo = $_REQUEST[ 'img9' ];
		
		
		
?>
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
			

		$mainName = $_REQUEST[ 'f1' ];
		$secondaryMame = $_REQUEST[ 'c2' ];
		$founders = $_REQUEST[ 't3' ];
		$email1 = $_REQUEST[ 'l4' ];
		$email2 = $_REQUEST[ 'da5' ];
		$tel = $_REQUEST[ 'd6' ];
		$urlBlog = $_REQUEST[ 'ant7' ];
		$comment = $_REQUEST[ 'url8' ];
		$urlLogo = $_REQUEST[ 'y9' ];
		$urlBlog = $_REQUEST[ 'c10' ];
		$comment = $_REQUEST[ 'r11' ];

		$urlLogo = $_REQUEST[ 'obj1' ];
		$urlBlog = $_REQUEST[ 'obj2' ];
		$comment = $_REQUEST[ 'obj3' ];

		
?>

<?php

session_start();
$idUser = "";
if ( isset( $_SESSION[ 'id' ] ) ) {
	header( "location: http://localhost/iambrand/iambrand/pages/dashboard.php" );
	$myLife_manager = new MyLifeManager();
	$user = $myLife_manager->getUserByID( $_SESSION[ 'id' ] );
	$nomeUtente = $user->username;
	$idUser = $_SESSION[ 'id' ];

} else {
	header( "location: http://localhost/iambrand/iambrand/pages/login.php" );
	// redirect verso pagina interna
}

	$manager = new MyLifeManager();
	$idStory = 0; 
?>


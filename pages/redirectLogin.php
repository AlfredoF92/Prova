
<?php include_once("headerlink.php"); ?>
<?php include_once("include_core.php"); ?>

<?php

session_start();
echo $_SESSION[ 'id' ];
if ( isset( $_SESSION[ 'id' ] ) ) {
	$myLife_manager = new MyLifeManager();
	$user = $myLife_manager->getUserByID( $_SESSION[ 'id' ] );
	
	
	$role = $user->role;
	if($role==1){
		header( "location: http://localhost/iambrand/iambrand/pages/admin/index.php" );
	}else if($role==3){
		header( "location: http://localhost/iambrand/iambrand/pages/index.php" );
	}
	
} else {
	header( "location: http://localhost/iambrand/iambrand/pages/login.php" );
	// redirect verso pagina interna
}

echo "Errore: 3847";
?>

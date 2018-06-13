<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		
		$myLife_manager = new MyLifeManager();
		
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];

		$check = $myLife_manager->checkLogin($email, $password);
		
		echo $check;
		
		session_start();
		session_unset();
		
		if($check>0)
			$_SESSION['id']=$check;
		else session_unset();		
	
?>
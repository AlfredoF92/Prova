<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		
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

		$myLife_manager->deleteGoal($_REQUEST["idGoal"]);
		echo "Eliminato!";
?>
<?php

		include_once( "../manager/Manager.php" );
		include_once( "../manager/MyLifeManager.php" );
		include_once( "../model/Utente.php" );
		
		$myLife_manager = new MyLifeManager();
		
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];

		$user = $myLife_manager->checkLogin($email, $password);
		
		
		//echo $user->id;
		
		if($user->id==-1){
			session_start();
			session_unset();		
			echo 0;
		}else if($user->id > 0){
			
			session_start();
			$_SESSION['id']=$user->id;
			echo 1;
			/*$_SESSION['id']=$user->id;
			$_SESSION['role']=$user->role;*/
		
			//header( "location: http://localhost/iambrand/iambrand/pages/index.php" );
		}
		
		//session_start();
		//session_unset();
		
		/*if($check>0)
			$_SESSION['id']=$check;
		else session_unset();		
	*/
?>
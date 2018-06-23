	<?php
	

	class MyLifeManager extends Manager{
		
		/*
		public function addInvestitori($commento, $percentualeInvestitori){
		
			$commento = addslashes($commento);
			
			$query = "INSERT INTO `investitori` (`ID`, `Commento`, `percentuale`) VALUES (NULL, '$commento', '$percentualeInvestitori');";
			
			$result = Manager::getDB()->query($query);
					
			//$commento = stripslashes($commento);
			//$commento = nl2br($commento);
			//$commento = htmlspecialchars($commento);
			//$commento = ereg_replace("&lt;br /&gt;","",$commento);
			//$commento = ereg_replace("&lt;br&gt;","",$commento);
			
			if (!$result) {
				echo "addInvestitori-Description Error: " . Manager::getDB()->error . " <br>";
				echo "addInvestitori-Description Error: " . Manager::getDB()->errno . " <br>";	
				exit;
			}
			
			$query = "Select Max(ID) From Investitori";
			$result = Manager::getDB()->query($query);
			
			//LAST ID
			$obj = $result->fetch_row(); 
			return $obj[0];
			
		}
		*/
		
		public function addDay($titolo, $descrizione, $date, $commentoInvestitori, $percentualeInvestitori, $urlImage, $idUtente){
			
			$ID = $this->addInvestitori($commentoInvestitori, $percentualeInvestitori);
			
			$descrizione = addslashes($descrizione);
			//echo "URLImage: " . $urlImage;
			
			//echo "<p>IERI: </p>" + date("l-m-d", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
			$query = "INSERT INTO `day` (`ID`, `Titolo`, `Sottotitolo`, `Descrizione`, `Data`, `idInvestitori`, `image`,`idUtente`) VALUES (NULL, '$titolo', '', '$descrizione', '$date', '$ID', '$urlImage', '$idUtente' )";
						
			$result = Manager::getDB()->query($query);
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
		}
		
		
		public function addGoal($idUser, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor){
			
			$title = addslashes($title);
			$description = addslashes($description);
			//echo "URLImage: " . $urlImage;
			
			//echo "<p>IERI: </p>" + date("l-m-d", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
			$query = "INSERT INTO `goal` (`id`, `idUser`, `title`, `description`, `dateBegin`, `dateFinal`, `idLabel`, `idNameState`, `lifeYourself`, `lifeCareer`, `lifeRelationships`, `percentageInvestor`) VALUES (NULL, '$idUser', '$title', '$description', '$dateBegin', '$dateFinal', '$idLabel', 'open', '$lifeYourself', '$lifeCareer', '$lifeRelationships', '$percentageInvestor');";
			
			echo $query;
			
			$result = Manager::getDB()->query($query);
			if (!$result) {
				echo "Description Error addGoal(): " . Manager::getDB()->error . " <br>";
				echo "Description Error addGoal(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
		}
		
		public function getGoals($idUser){
			
				$query = "SELECT goal.id, idUser, title, description, dateBegin, dateFinal, idLabel, idNameState, lifeYourself, lifeCareer, lifeRelationships, percentageInvestor, name, color FROM `goal`,`labelgoal` WHERE `idUser`=$idUser AND `idLabel` = labelgoal.id";
				
				$result = Manager::getDB()->query($query);
				if (!$result) {
					echo "Description Error: " . Manager::getDB()->error . " <br>";
					echo "Description Error: " . Manager::getDB()->errno . " <br>";

					exit;
				}
			
				$goals = ""; 
				while ($obj = $result->fetch_assoc()) {
					
					$goals[] = new Goal( 
										 $obj["id"],
										 $obj["idUser"],
										 $obj["title"],
										 $obj["description"],
										 $obj["dateBegin"],
										 $obj["dateFinal"],
										 $obj["idLabel"],
										 $obj["name"],
										 $obj["color"],
										 $obj["idNameState"],
										 $obj["lifeYourself"],
										 $obj["lifeCareer"],
										 $obj["lifeRelationships"],
										 $obj["percentageInvestor"]
									 );
				}
				
				if($goals == "") return -1; 
				return $goals; 
			
		}
		
		public function getGoal($idGoal){
			
				$query = "SELECT goal.id, idUser, title, description, dateBegin, dateFinal, idLabel, idNameState, lifeYourself, lifeCareer, lifeRelationships, percentageInvestor, name, color FROM `goal`,`labelgoal` WHERE goal.id=$idGoal AND `idLabel` = labelgoal.id";
				
				$result = Manager::getDB()->query($query);
				if (!$result) {
					echo "Description Error: " . Manager::getDB()->error . " <br>";
					echo "Description Error: " . Manager::getDB()->errno . " <br>";

					exit;
				}
			
				$goals = ""; 
				
				$obj = $result->fetch_assoc();	
				$goal = new Goal( 
										 $obj["id"],
										 $obj["idUser"],
										 $obj["title"],
										 $obj["description"],
										 $obj["dateBegin"],
										 $obj["dateFinal"],
										 $obj["idLabel"],
										 $obj["name"],
										 $obj["color"],
										 $obj["idNameState"],
										 $obj["lifeYourself"],
										 $obj["lifeCareer"],
										 $obj["lifeRelationships"],
										 $obj["percentageInvestor"]
								);
				
			
				return $goal; 
			
		}
		
		
		public function addPost($idUser, $date, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type){
			
			//$description = addslashes($description);
			//echo "URLImage: " . $urlImage;
			/*
			echo "idUser: " . $idUser .  " <br>\n"; 
			echo "Date: " . $date .  " <br>\n"; 
			echo "Title: " . $title .  " <br>\n"; 
			echo "Description: " . $description .  " <br>\n" ; 
			echo "UrlMedia: " . $urlMedia .  " <br>\n" ;
			echo "Comment: " . $commentUser .  " <br>\n" ; 
			echo "Percentage " . $percentage .  " <br>\n"; 
			echo "LifeMood " . $lifeMood .  " <br>\n";
			echo "LifeCareer " . $lifeCareer .  " <br>\n";
			echo "LifeRelationship " . $lifeRelationships .  " <br>\n";
			echo "LifeYourself " . $lifeYourself .  " <br>\n";
			*/
			//echo "<p>IERI: </p>" + date("l-m-d", mktime(0, 0, 0, date("m"), date("d")-1, date("Y")));
			$query = "INSERT INTO `post` (`id`, `idUser`, `datePost`, `title`, `subtitle`, `description`, `urlMedia`, `commentUser`, `commentInvestitors`, `percentage`, `lifeMood`, `lifeCareer`, `lifeRelationships`, `lifeYourself`, `type`) VALUES (NULL, '$idUser', '$date', '$title', '$subtitle', '$description', '$urlMedia', '$commentUser', '$commentInvestitors', '$percentage', '$lifeMood', '$lifeCareer', '$lifeRelationships', '$lifeYourself', '$type');";
				
			$result = Manager::getDB()->query($query);
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return; 
		}
		
		public function deleteGoal($idGoal){
			
			$query = "DELETE FROM `goal` WHERE `goal`.`id` = $idGoal";
			
			$result = Manager::getDB()->query($query);
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return;
		}
				
		public function getPosts($idUser){
			
			$query = "SELECT * FROM `post` WHERE `idUser` = '$idUser' ORDER BY datePost DESC";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                
				$posts[] = new Post( 
								 	 $obj["id"],
									 $obj["idUser"],
									 $obj["datePost"],
									 $obj["dateNewPost"],
									 $obj["title"],
									 $obj["subtitle"],
									 $obj["description"],
									 $obj["urlMedia"],
									 $obj["commentUser"],
									 $obj["commentInvestitors"],
									 $obj["percentage"],
									 $obj["lifeMood"],
									 $obj["lifeCareer"],
									 $obj["lifeRelationships"],
									 $obj["lifeYourself"],
									 $obj["type"]
								 );
            
			}
			
			return $posts;
		}
		
		
		public function getDays($idUtente){
			
			$query = "SELECT * FROM `day` JOIN `investitori` ON day.idInvestitori = investitori.ID WHERE 
			`idUtente` = '$idUtente' ORDER BY Data DESC";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                
				$days[] = new Day($obj["ID"],
								 $obj["Titolo"],
								 $obj["Sottotitolo"],
								 $obj["Descrizione"],
								 $obj["Data"],
								 $obj["idInvestitori"],
								 $obj["Commento"],
								 $obj["percentuale"],
								 $obj["image"],
								 $obj["idUtente"]
								 );
            
			}
			
			return $days;
		}
		
		
		
		public function checkLogin($email, $password){
			
			$query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
				
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$obj = $result->fetch_assoc();
						
			if($obj["id"]==""){
				return 0; 
			}
			
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			return $obj["id"];
		}
		
		
		public function getUserByID($id){
			
			$query = "SELECT * FROM `user` WHERE `id` = '$id' ";
				
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$obj = $result->fetch_assoc();
			$utente = new Utente($obj["id"],  $obj["username"], $obj["email"], $obj["password"] );
			
			return $utente;
		}
		
		
		
		public function getPercentage($idUser){
			
			$query = "SELECT id, datePost, title, urlMedia, percentage FROM `post` WHERE `idUser` = '$idUser' ORDER BY datePost ASC";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                
				$posts[] = new Post( 
								 	 $obj["id"],
									 
									 $obj["datePost"],
									 
									 $obj["title"],
									
									 $obj["urlMedia"],
								
									 $obj["percentage"]
									
								 );
            
			}
			
			return $posts;
		}
		
		public function getLabels($idUser){
			
			$query = "SELECT DISTINCT(name), labelgoal.id, labelgoal.color FROM `goal`,`labelgoal` WHERE `idUser`=$idUser AND `idLabel` = labelgoal.id";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                
				$labels[] = new Label( 
								 	 $obj["id"],
									 $obj["name"],
					 				 $obj["color"]
								 );
			}
			
			return $labels;
		}
		
		public function getColors(){
			
			$query = "SELECT * FROM colors";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                
				$colors[] = $obj["name"];
								
			}
			
			return $colors;
		}
		
		public function newLabel($name, $color){
			
			$name = addslashes($name);
			$query = "INSERT INTO `labelgoal` (`id`,`name`,  `color`) VALUES (NULL, '$name',  '$color')";
			$result = Manager::getDB()->query($query);
			echo($query);
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return Manager::getDB()->insert_id;;
		}
		
		public function updateLabel($idLabel, $name, $color){
			
			$name = addslashes($name);
			$query = "UPDATE `labelgoal` SET `name` = '$name', `color` = '$color' WHERE `id` = $idLabel";
			
			$result = Manager::getDB()->query($query);
			echo $query;	
			if (!$result) {
				echo "Description Error updateLabel(): " . Manager::getDB()->error . " <br>";
				echo "Description Error updateLabel(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return; 
		}
		
		public function updateGoal($idGoal, $idUser, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor){
			
			$title = addslashes($title);
			$description = addslashes($description);
			
			$query = "UPDATE `goal` SET `idUser` = '$idUser', `title` = '$title', `description` = '$description', `dateBegin` = '$dateBegin', `dateFinal` = '$dateFinal', `idLabel` = '$idLabel', `lifeYourself` = '$lifeYourself', `lifeCareer` = '$lifeCareer', `lifeRelationships` = '$lifeRelationships', `percentageInvestor` = '$percentageInvestor' WHERE `goal`.`id` = $idGoal;";
			
			
			$result = Manager::getDB()->query($query);
			echo $query;
			if (!$result) {
				echo "Description Error updateLabel(): " . Manager::getDB()->error . " <br>";
				echo "Description Error updateLabel(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return; 
		}
		/**
		
			MANAGER DATE
		
		
		***/
		function getPercentageInGoal( $dateBegin, $dateFinal, $dateToday ) {

			/*$datetime1 = new DateTime( $dateBegin );
			$datetime2 = new DateTime( $dateFinal );
			
			$interval = $datetime1->diff( $datetime2 );
			$total = $interval->format( '%a' );
			*/
			$days = $this->getDaysDiff($dateBegin, $dateFinal);
			
			$datetime3 = new DateTime( $dateToday );
			$daysFromBegin = $this->getDaysDiff($dateBegin, $dateToday);
			//$percentageDay = $daydiff * 100 / $total;
			$unitàDiMisura = 100/$days;
			$percentageGoals = $unitàDiMisura * $daysFromBegin;
			
			return $percentageGoals;
		}
		
		function getPercentageInMinutes( $dateBegin, $dateFinal, $dateToday ) {

			/*$datetime1 = new DateTime( $dateBegin );
			$datetime2 = new DateTime( $dateFinal );
			
			$interval = $datetime1->diff( $datetime2 );
			$total = $interval->format( '%a' );
			*/
			$minutes = $this->getMinutesDiff($dateBegin, $dateFinal);
			
			$datetime3 = new DateTime( $dateToday );
			$minutesFromBegin = $this->getMinutesDiff($dateBegin, $dateToday);
			//$percentageDay = $daydiff * 100 / $total;
			$unitàDiMisura = 100/$minutes;
			$percentageGoals = $unitàDiMisura * $minutesFromBegin;
			
			return $percentageGoals;
		}
		
		
		function getDaysDiff( $dateBegin, $dateFinal ) {

			$datetime1 = new DateTime( $dateBegin );
			$datetime2 = new DateTime( $dateFinal );
			
			$interval = $datetime1->diff( $datetime2 );
			$total = $interval->format( '%a' );
			
			return $total;
		}
		
		
		function getMinutesDiff( $dateBegin, $dateFinal ) {

			$start_date = new DateTime($dateBegin);
			$since_start = $start_date->diff(new DateTime($dateFinal));
			/*echo $since_start->days.' days total<br>';
			echo $since_start->y.' years<br>';
			echo $since_start->m.' months<br>';
			echo $since_start->d.' days<br>';
			echo $since_start->h.' hours<br>';
			echo $since_start->i.' minutes<br>';
			echo $since_start->s.' seconds<br>';
			*/
			$minutes = $since_start->days * 24 * 60;
			$minutes += $since_start->h * 60;
			$minutes += $since_start->i;
			//echo $minutes.' minutes';
			
			//echo "Ciao";
			
			
			return $minutes;
		}
		
		function getStringITA($dateBegin, $dateFinal, $dateToday ){
			
			$days = $this->getPercentageInGoal($dateBegin, $dateFinal, $dateToday);
			
			if($days<1){
				return "Manca 1 giorno";
			}else if($days>1){
				return "Mancano " . $days . " giorni";
			}
		}
		
		/*
		public function getRandomWord(){
			$query = "";
			
			$result = Manager::getDB()->query("SELECT * FROM `parole` ORDER BY RAND() LIMIT 1");
			
			if (!$result) {
				echo "Description Error: " + Manager::getDB()->error + " <br>";
				echo "Description Error: " + Manager::getDB()->errno + " <br>";
				
				exit;
			}
			
			while ($obj = $result->fetch_assoc()) {
                $messaggio = new FraseVocabolario($obj["ID"],$obj["Inglese"],$obj["Italiano"], $obj["Valore"]);
				
            }
			
			return $messaggio;
		}
		
		
		public function getPlaylistByLingua($linguaParole, $linguaTraduzione){
						
			$query = "SELECT * FROM `playlist` WHERE (`LinguaParole`= '$linguaParole' AND `LinguaTraduzione` = '$linguaTraduzione')";	
			
			$result = Manager::getDB()->query($query);	
			
			while ($obj = $result->fetch_assoc()) {
                
				$playlist[] = new Playlist($obj["ID"], $obj["IDUtente"], $obj["Nome"], $obj["LinguaParole"], $obj["LinguaTraduzione"], $obj["Dettato"], $obj["Valutazione"]);
            }
			return $playlist;
		}
		
		
		public function getParoleByIDPlaylist($id_playlist){
			
			$query = "SELECT * FROM `parole` WHERE `IDPlaylist` = $id_playlist";
			
			$result = Manager::getDB()->query($query);	
			
			while ($obj = $result->fetch_assoc()) {
                
				$parole[] = new FraseVocabolario($obj["ID"], $obj["Parola"], $obj["Traduzione"], $obj["InMind"]);
            }
			
			return $parole;
		}
		*/
		
	}


?>

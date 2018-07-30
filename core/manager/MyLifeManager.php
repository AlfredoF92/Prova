	<?php
	

	class MyLifeManager extends Manager{
		
		/*
			MANAGER GOALS
		*/
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
			
				$query = "SELECT goal.id, idUser, title, description, dateBegin, dateFinal, idLabel, idNameState, lifeYourself, lifeCareer, lifeRelationships, percentageInvestor, name, color FROM `goal`,`labelgoal` WHERE `idUser`= ? AND `idNameState`= 'open' AND `idLabel` = labelgoal.id" ;
				 
				$stmt = Manager::getDB()->prepare($query);
				$stmt->bind_param("i", $idUser);
				$stmt->execute();
				$result = $stmt->get_result();
				
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
		
		public function updateGoal($idGoal, $idUser, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor){
			
			$title = addslashes($title);
			$description = addslashes($description);
			
			$query = "UPDATE `goal` SET `idUser` = '$idUser', `title` = '$title', `description` = '$description', `dateBegin` = '$dateBegin', `dateFinal` = '$dateFinal', `idLabel` = '$idLabel', `lifeYourself` = '$lifeYourself', `lifeCareer` = '$lifeCareer', `lifeRelationships` = '$lifeRelationships', `percentageInvestor` = '$percentageInvestor' WHERE `goal`.`id` = $idGoal;";
			
			
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error updateLabel(): " . Manager::getDB()->error . " <br>";
				echo "Description Error updateLabel(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			return; 
		}
		
		public function updateGoalState($idGoal, $idNameState, $dateLastEdit){
			
			$query = "UPDATE `goal` SET `idNameState` = ?, `dateLastEdit` = ? WHERE `goal`.`id` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("ssi", $idNameState, $dateLastEdit, $idGoal);
			
			if (!$stmt->execute()) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			
			return;
		}
		
		public function goalAchieved(){
			
			//UpdateGoal per settare NameState ad achieeved	
			//addPost per creare un post con obiettivo raggiunto 
			//mi prendo l'id e me lo salvo da qualche parte
			
			
			return;
		}
		
	
		
		/*
			MANAGER POST
		*/
		public function addPost($idUser, $date, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type){
					
			$query = "INSERT INTO `post` (`id`, `idUser`, `datePost`, `title`, `subtitle`, `description`, `urlMedia`, `commentUser`, `commentInvestitors`, `percentage`, `lifeMood`, `lifeCareer`, `lifeRelationships`, `lifeYourself`, `type`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				
			$stmt = Manager::getDB()->prepare($query);
			
			$stmt->bind_param("isssssssddddds", $idUser, $date, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type);
			
			if (!$stmt->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt->close();
			return; 
		}
		
		public function getPosts($idUser){
			
			$query = "SELECT * FROM `post` WHERE `idUser` = ? ORDER BY datePost DESC";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUser);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) exit('No rows');

			while ($obj = $result->fetch_assoc()) {
                
				$posts[] = new Post( 
								 	 $obj["id"],
									 $obj["idUser"],
									 $obj["datePost"],
									 $obj["dateNewPost"],
									 $obj["title"],
									 $obj["subtitle"],
									 html_entity_decode($obj["description"]),
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
			
			$stmt->close();

			return $posts;
		}
		
		public function getPost($idUser, $idPost){
			
			$query = "SELECT * FROM `post` WHERE idUser = ? AND id = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("ii", $idUser, $idPost);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) exit('No rows');

			$obj = $result->fetch_assoc();
                
			$post = new Post( 
								 	 $obj["id"],
									 $obj["idUser"],
									 $obj["datePost"],
									 $obj["dateNewPost"],
									 $obj["title"],
									 $obj["subtitle"],
									 html_entity_decode($obj["description"]),
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
            
			
			$stmt->close();
			
			return $post;
		}
		
		/*
			MANAGER LOGIN 
		*/
		public function checkLogin($email, $password){
			
			$query = "SELECT * FROM `user` WHERE `email` = ? AND `password` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("ss", $email, $password);
			$stmt->execute();
			
			$result = $stmt->get_result();
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			if($stmt->affected_rows === 0) 
				return new Utente(-1, -1, -1, -1, -1);;
			
			
			$obj = $result->fetch_assoc();
			
			$user = new Utente($obj["id"], $obj["username"], $obj["email"], $obj["password"], $obj["role"]);
			
			/*
			$obj = $result->fetch_assoc();
			if($obj["id"]==""){
				return 0; 
			}*/
			
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			return $user;
		}
		
		/*
			MANAGER LOGIN 
		*/
		public function getSumLifeRelationships($idUtente){
			
			$query = "SELECT SUM(lifeRelationships) FROM `post` WHERE idUser = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUtente);
			$stmt->execute();
			
			$result = $stmt->get_result();
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
						
			$obj = $result->fetch_array(MYSQLI_NUM);
			
				
			/*
				$obj = $result->fetch_assoc();
				if($obj["id"]==""){
					return 0; 
				}
			*/
			
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			return $obj[0];
		}
		
		/*
			MANAGER LOGIN 
		*/
		public function getSumLifeCareer($idUtente){
			
			$query = "SELECT SUM(lifeCareer) FROM `post` WHERE idUser=?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUtente);
			$stmt->execute();
			
			$result = $stmt->get_result();
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
						
			$obj = $result->fetch_array(MYSQLI_NUM);
				
			/*
				$obj = $result->fetch_assoc();
				if($obj["id"]==""){
					return 0; 
				}
			*/
			
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			return $obj[0];
		}
		
		
		/*
			MANAGER LOGIN 
		*/
		public function getSumLifeYourself($idUtente){
			
			$query = "SELECT SUM(lifeYourself) FROM `post` WHERE idUser=?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUtente);
			$stmt->execute();
			
			$result = $stmt->get_result();
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
						
			$obj = $result->fetch_array(MYSQLI_NUM);
			
				
			/*
				$obj = $result->fetch_assoc();
				if($obj["id"]==""){
					return 0; 
				}
			*/
			
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			return $obj[0];
		}
		
		/*
			MANAGER USER 
		*/
		public function getUserByID($id){
			
			$query = "SELECT * FROM `user` WHERE `id` = '$id' ";
				
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$obj = $result->fetch_assoc();
			$utente = new Utente($obj["id"],  $obj["username"], $obj["email"], $obj["password"], $obj["role"] );
			
			return $utente;
		}
		
		
		/*
			MANAGER LABELS 
		*/
		public function getLabels($idUser){
			
			$query = "SELECT DISTINCT(name), labelgoal.id, labelgoal.color FROM `goal`,`labelgoal` WHERE `idUser`=$idUser AND `idLabel` = labelgoal.id";
			
			$result = Manager::getDB()->query($query);

			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			$labels = "";
			while ($obj = $result->fetch_assoc()) {
                
				$labels[] = new Label( 
								 	 $obj["id"],
									 $obj["name"],
					 				 $obj["color"]
								 );
			}
			
			return $labels;
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
		
		
		public function updatePost($datePost, $urlMedia, $title, $subTitle, $description, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost, $idUser){
			
			
			$query = "UPDATE `post` SET `datePost` = ?, `urlMedia` = ?, `title` = ?, `subtitle` = ?, `description` = ?, `commentUser` = ?, `percentage` = ?, `lifeCareer` = ?, `lifeRelationships` = ?, `lifeYourself` = ? WHERE `post`.`id` = ? AND idUser = ?";
			
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("ssssssiiiiii", $datePost, $urlMedia, $title, $subTitle, $description, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost, $idUser);
			
			$stmt->execute();
			
			/*
			$result = $stmt->get_result();
			if (!$result) {
				echo "Description Error updatePost(): " . Manager::getDB()->error . " <br>";
				echo "Description Error updatePost(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}*/
			
			return; 
		}
		
		
		/*
			GET PERCENTAGE 
		*/
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
		
		
		/*
			GENERAL FUNCTIONS
		*/
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
		
		
		
		/*
			MANAGER DATE
		*/
		function getPercentageInGoal( $dateBegin, $dateFinal, $dateToday ) {

			/*$datetime1 = new DateTime( $dateBegin );
			$datetime2 = new DateTime( $dateFinal );
			
			$interval = $datetime1->diff( $datetime2 );
			$total = $interval->format( '%a' );
			*/
			
		 	if($dateBegin > $dateFinal) return -1;
			else if($dateFinal < $dateToday) return 100; 
			
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
			
			if($dateBegin > $dateFinal) return -1;
			else if($dateFinal < $dateToday) return 100; 
				
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
		
		function getStringITA($dateBegin, $dateFinal, $dateToday){
			
			$percentageGoal = $this->getPercentageInMinutes($dateBegin, $dateFinal, $dateToday);
			
			$minutes = $this->getMinutesDiff($dateToday, $dateFinal);
			
			//return $dateToday . " - " . $dateFinal . " - " . $percentageGoal . " - " . $minutes;
			if($percentageGoal == 100) return "100% - Completato";
			
			if($percentageGoal>40){
				if($minutes<60){
					return "Mancano pochi minuti";

				}else if($minutes<1440){
					return "Mancano poche ore";

				}else if($minutes>1440 && $minutes<2880){
					return "Manca circa 1 giorno";

				}else if($minutes>1440){
					return "Mancano circa " . round(($minutes/60)/24, 0) . " giorni";
				}
			}
			
		}
		
		
	}


?>

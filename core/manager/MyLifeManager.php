	<?php
	

	class MyLifeManager extends Manager{
		
		/*
			CREA UN NUOVO OBIETTIVO
		*/
		public function newGoal($idStory, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor){
			
			
			$query = "INSERT INTO `goal` (`id`, `idStory`, `title`, `description`, `dateBegin`, `dateFinal`, `idLabel`, `idNameState`, `lifeYourself`, `lifeCareer`, `lifeRelationships`, `percentageInvestor`) VALUES (NULL, ?, ?, ?, ?, ?, ?,  'open', ?, ?, ?, ?);";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("issssiiiii", $idStory, $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor);
			
			if (!$stmt->execute()) {
				echo "Description Error newGoal(): " . Manager::getDB()->error . " <br>";
				echo "Description Error newGoal(): " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$result = $stmt->get_result();
			
		}
		
		public function getGoals($idStory){
			
				$query = "SELECT goal.id, idStory, title, description, dateBegin, dateFinal, idLabel, idNameState, lifeYourself, lifeCareer, lifeRelationships, percentageInvestor, name, color FROM `goal`,`labelgoal` WHERE `idNameState`= 'open' AND `idLabel` = labelgoal.id AND `idStory` = ?" ;
				 
				$stmt = Manager::getDB()->prepare($query);
				$stmt->bind_param("i", $idStory);
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
										 $obj["idStory"],
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
			
				$query = "SELECT goal.id, idStory, title, description, dateBegin, dateFinal, idLabel, idNameState, lifeYourself, lifeCareer, lifeRelationships, percentageInvestor, name, color FROM `goal`,`labelgoal` WHERE goal.id=$idGoal AND `idLabel` = labelgoal.id";
				
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
										 $obj["idStory"],
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
		
		public function getMotivationAllImg($idStory){
			$query = "SELECT img FROM `motivation` WHERE `idStory` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1; 

			$obj = $result->fetch_assoc();
                
									
			$stmt->close();

			return $obj['img'];
		}
		
		
		public function getMotivationImg($idStory){
			$query = "SELECT * FROM `motivation` WHERE `idStory` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				exit;
			}
			
			if($result->num_rows === 0) return -1; 

			$obj = $result->fetch_assoc();
                
			$image = $obj['img'];
            $images = explode(";", $image);
						
			$stmt->close();

			return $images;
		}
		
		public function getMotivationPhrases($idStory){
			$query = "SELECT * FROM `motivation` WHERE `idStory` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1; 

			$obj = $result->fetch_assoc();
                
			$phrase = $obj['phrases'];
            $phrases = explode(";", $phrase);
						
			$stmt->close();

			return $phrases;
		}
		
		
		public function updateGoal($idGoal,  $title, $description, $dateBegin, $dateFinal, $idLabel, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor){
			
			$title = addslashes($title);
			$description = addslashes($description);
			
			$query = "UPDATE `goal` SET `title` = '$title', `description` = '$description', `dateBegin` = '$dateBegin', `dateFinal` = '$dateFinal', `idLabel` = '$idLabel', `lifeYourself` = '$lifeYourself', `lifeCareer` = '$lifeCareer', `lifeRelationships` = '$lifeRelationships', `percentageInvestor` = '$percentageInvestor' WHERE `goal`.`id` = $idGoal;";
			
			
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
			NUOVO POST
		*/
		public function newPost($date, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type, $idStory){
					
			$query = "INSERT INTO `post` (`id`, `datePost`, `title`, `subtitle`, `description`, `urlMedia`, `commentUser`, `commentInvestitors`, `percentage`, `lifeMood`, `lifeCareer`, `lifeRelationships`, `lifeYourself`, `type`, `idStory`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				
			$stmt = Manager::getDB()->prepare($query);
			
			$stmt->bind_param("sssssssdddddsi", $date, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type, $idStory);
			
			if (!$stmt->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt->close();
			return; 
		}
		
		/*
			NUOVA IMMAGINE MOTIVAZIONE
		*/
		public function getPhrases($idStory){
			
			$query2 = "SELECT phrases FROM motivation WHERE `idStory` = ?";
			
			$stmt2 = Manager::getDB()->prepare($query2);
			$stmt2->bind_param("i", $idStory);
			if (!$stmt2->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			$result = $stmt2->get_result();
			$obj = $result->fetch_assoc();
			$stmt2->close();
			return $obj["phrases"]; 
		}
		
		/*
			
		*/
		public function updatePhrases($idStory, $phrases){
			
			$query2 = "UPDATE `motivation` SET `phrases` = ? WHERE `idStory` = ?";
			
			$stmt2 = Manager::getDB()->prepare($query2);
			$stmt2->bind_param("si", $phrases, $idStory);
			if (!$stmt2->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt2->close();
			return ; 
		}
		
		/*
			NUOVA IMMAGINE MOTIVAZIONE
		*/
		public function updateNewImagesStory($idStory, $urlMedia){
					
			//PRENDI LE IMMAGINI PERCEDENTI
			$query = "SELECT img FROM `motivation` WHERE `idStory`= ?";
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			if (!$stmt->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			$result = $stmt->get_result();
			$obj = $result->fetch_assoc();
			
			$old_images = $obj["img"];
			$new_images = $old_images . ";" . $urlMedia;
			
			$query2 = "UPDATE `motivation` SET `img` = ? WHERE `idStory` = ?";
			
			$stmt2 = Manager::getDB()->prepare($query2);
			$stmt2->bind_param("si", $new_images, $idStory);
			if (!$stmt2->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt2->close();
			return; 
		}
		
		public function updateDeleteImagesStory($idStory, $images){
					
			
			$query2 = "UPDATE `motivation` SET `img` = ? WHERE `idStory` = ?";
			
			$stmt2 = Manager::getDB()->prepare($query2);
			$stmt2->bind_param("si", $images, $idStory);
			if (!$stmt2->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt2->close();
			return; 
		}
		
		public function hasPosts($idStory){
			
			$query = "SELECT * FROM `post` WHERE `idStory` = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt->close();

			
			if($result->num_rows === 0) return -1; 
			else return 1; 
			
			
		}
		
		public function getIdDashboard($idUser){
			
			$query = "SELECT id FROM `story` WHERE idUser=? AND idTypeStory=0";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUser);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1; 
			
			$obj = $result->fetch_assoc();
			
			
			$stmt->close();

			
			
			return $obj["id"]; 
			
		}
		
		public function getDashboard($idUser){
			
			$query = "SELECT post.id, post.title, post.subtitle, post.idStory, post.datePost, post.dateNewPost, post.description, post.urlMedia, post.commentUser, post.commentInvestitors, post.percentage, post.lifeMood, post.lifeCareer, post.lifeRelationships, post.lifeYourself, post.type, story.idUser FROM `post`,`story` WHERE post.idStory=story.id AND story.idUser=? AND story.idTypeStory=0 ORDER BY datePost DESC";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUser);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1; 

			while ($obj = $result->fetch_assoc()) {
                
				$posts[] = new Post( 
								 	 $obj["id"],
									 $obj["idStory"],
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
									 $obj["type"],
									 $obj["idUser"]
					
								 );
            
			}
			
			$stmt->close();

			return $posts;
		}
		
		public function getPostsByIdStory($idStory){
			
			$query = "SELECT * FROM `post` WHERE `idStory` = ? ORDER BY datePost DESC";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1; 

			while ($obj = $result->fetch_assoc()) {
                
				$posts[] = new Post( 
								 	 $obj["id"],
									 $obj["idStory"],
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
									 $obj["type"],
									 ""
								 );
            
			}
			
			$stmt->close();

			return $posts;
		}
		
		public function getPost($idPost){
			
			$query = "SELECT * FROM `post` WHERE id = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idPost);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) exit('No rows');
			   
			while ($obj = $result->fetch_assoc()) {

					$post = new Post( 
											 $obj["id"],
											 $obj["idStory"],
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
											 $obj["type"],
											 ""
										 );
			}
			
			$stmt->close();
			
			return $post;
		}
		
		
		
		public function getStoryById($idStory){
			
			$query = "SELECT * FROM `story` WHERE id = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1;

			$obj = $result->fetch_assoc();

			$story = new Story( 
								 	 $obj["id"],
									 $obj["title"],
									 html_entity_decode($obj["description"]),
									 $obj["urlPhoto"],
									 $obj["date"],
									 $obj["idUser"],
									 $obj["idTypeStory"]
								 );
			
			
			$stmt->close();
			
			return $story;
		}
		
		public function checkStory($idStory, $idUser){
			
			$query = "SELECT * FROM `story` WHERE id = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			if($result->num_rows === 0) return 3;

			$obj = $result->fetch_assoc();

			$story = new Story( 
								 	 $obj["id"],
									 $obj["title"],
									 html_entity_decode($obj["description"]),
									 $obj["urlPhoto"],
									 $obj["date"],
									 $obj["idUser"],
									 $obj["idTypeStory"]
								 );
			
			
			if(($obj["idUser"]==$idUser)&&($obj["idTypeStory"]==0)){
				return 0; //LA STORIA E' LA TUA DASHBOARD
			}
			
			if(($obj["idUser"]==$idUser)){
				return 1;
			}
			
			if(($obj["idUser"]<>$idUser)&&($obj["idTypeStory"]!=0)){
				return 2;
			}
			
			return 3; 
			
			$stmt->close();
			
			return $story;
		}
		public function getStoriesByUser($idUser){
			
			$query = "SELECT * FROM `story` WHERE idUser = ? AND idTypeStory<>0";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUser);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1;

			while ($obj = $result->fetch_assoc()) {

				$stories[] = new Story( 
								 	 $obj["id"],
									 $obj["title"],
									 html_entity_decode($obj["description"]),
									 $obj["urlPhoto"],
									 $obj["date"],
									 $obj["idUser"],
									 $obj["idTypeStory"]	
								 );
			}
			
			$stmt->close();
			
			return $stories;
		}
		
		public function getStoriesCommunity($idUser){
			
			$query = "SELECT * FROM `story` WHERE idUser <> ? AND idTypeStory <> 0";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idUser);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if (!$result) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			if($result->num_rows === 0) return -1;

			while ($obj = $result->fetch_assoc()) {

				$stories[] = new Story( 
								 	 $obj["id"],
									 $obj["title"],
									 html_entity_decode($obj["description"]),
									 $obj["urlPhoto"],
									 $obj["date"],
									 $obj["idUser"],
									 $obj["idTypeStory"]
								 );
			}
			
			$stmt->close();
			
			return $stories;
		}
		
		
		/*
			MANAGER POST
		*/
		public function newStory($title, $description, $urlPhoto, $idUser){
			echo $urlPhoto;
			$query = "INSERT INTO `story` (`id`, `title`, `description`, `urlPhoto`, `date`, `idUser`, `idTypeStory`) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP, ?, 4);";
				
			$stmt = Manager::getDB()->prepare($query);
			
			$stmt->bind_param("sssi", $title, $description, $urlPhoto, $idUser);
			
			if (!$stmt->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt->close();
			return; 
		}
		
		
		
		/*
			MANAGER POST
		*/
		public function updateStory($title, $description, $public, $investitorUser, $urlPhoto, $idStory){
					
			$query = "UPDATE `story` SET `title` = ?, `description` = ?, `urlPhoto` = ? WHERE `story`.`id` = ? ";
		
			echo $idStory;
			
			$stmt = Manager::getDB()->prepare($query);
			
			$stmt->bind_param("sssi", $title, $description, $urlPhoto, $idStory);
			
			if (!$stmt->execute()) {
				echo "<br>Description Error: " . Manager::getDB()->error . " <br>\n";
				echo "<br>Description Error: " . Manager::getDB()->errno . " <br>\n";
				
				exit;
			}
			
			$stmt->close();
			return; 
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
		public function getSumLifeRelationships($idStory){
			
			$query = "SELECT SUM(lifeRelationships) FROM `post` WHERE idStory = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
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
		public function getSumLifeCareer($idStory){
			
			$query = "SELECT SUM(lifeCareer) FROM `post` WHERE idStory = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
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
		public function getSumLifeYourself($idStory){
			
			$query = "SELECT SUM(lifeYourself) FROM `post` WHERE idStory = ?";
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i",  $idStory);
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
			
			$query = "SELECT DISTINCT(name), labelgoal.id, labelgoal.color FROM `goal`,`labelgoal`,`story`  WHERE story.`idUser`=$idUser AND story.`id` = goal.`idStory` AND `idLabel` = labelgoal.id";
			
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
		
		
		public function updatePost($datePost, $urlMedia, $title, $subTitle, $description, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost){
			
			
			$query = "UPDATE `post` SET `datePost` = ?, `urlMedia` = ?, `title` = ?, `subtitle` = ?, `description` = ?, `commentUser` = ?, `percentage` = ?, `lifeCareer` = ?, `lifeRelationships` = ?, `lifeYourself` = ? WHERE `post`.`id` = ? ";
			
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("ssssssiiiii", $datePost, $urlMedia, $title, $subTitle, $description, $commentUser, $percentage, $lifeCareer, $lifeRelationships, $lifeYourself, $idPost);
			
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
		public function getPercentage($idStory){
			
			$query = "SELECT id, datePost, title, urlMedia, percentage FROM `post` WHERE  `idStory` = ? ORDER BY datePost ASC";
			
			
			$stmt = Manager::getDB()->prepare($query);
			$stmt->bind_param("i", $idStory);
			$stmt->execute();
			
			$result = $stmt->get_result();
						
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

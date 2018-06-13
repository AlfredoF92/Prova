	<?php
	

	class MyLifeManager extends Manager{
		
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
			
			$query = "SELECT * FROM `utente` WHERE `email` = '$email' AND `Password` = '$password'";
				
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$obj = $result->fetch_assoc();
			
			
			if($obj["ID"]==""){
				return 0; 
			}
			//$login = new Utente($obj["ID"], $obj["email"], $obj["Username"], $obj["Password"] );
			
			
			return $obj["ID"];
		}
		
		
		public function getUtenteByID($id){
			
			$query = "SELECT * FROM `utente` WHERE `id` = '$id' ";
				
			$result = Manager::getDB()->query($query);
			
			if (!$result) {
				echo "Description Error: " . Manager::getDB()->error . " <br>";
				echo "Description Error: " . Manager::getDB()->errno . " <br>";
				
				exit;
			}
			
			$obj = $result->fetch_assoc();
			
			$utente = new Utente($obj["ID"],  $obj["Username"], $obj["email"], $obj["Password"] );
			
			return $utente;
		}
		
		
		public function getPercentuale($id){
			
			$query = "SELECT * FROM `day` JOIN `investitori` ON day.idInvestitori = investitori.ID WHERE 
			`idUtente` = '$id' ORDER BY Data ASC";
			
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

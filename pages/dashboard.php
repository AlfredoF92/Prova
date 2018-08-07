<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>I AM BRAND</title>

	<?php include_once("headerlink.php"); ?>
	<?php include_once("include_core.php"); ?>

	<script src="../node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
	<link rel="stylesheet" href="../node_modules/trumbowyg/dist/ui/trumbowyg.min.css">

	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

</head>

<?php

session_start();
$idUser = "";
if ( isset( $_SESSION[ 'id' ] ) ) {
	$myLife_manager = new MyLifeManager();
	$user = $myLife_manager->getUserByID( $_SESSION[ 'id' ] );
	$nomeUtente = $user->username;
	$idUser = $_SESSION[ 'id' ];

} else {
	header( "location: http://localhost/iambrand/iambrand/pages/login.php" );
	// redirect verso pagina interna
}
	
	$manager = new MyLifeManager();
	

	$checkStory = 0;
	$story = "";
	if(isset($_GET["idStory"])){
		$idStory = $_GET["idStory"]; 
		
		/*
			0: E' LA TUA DASHBOARD
			1: E' UNA DELLE TUE STORIE
			2: E' UNA STORIE DEGLI ALTRI
			3: LA STORIA NON ESISTE
		*/
		$checkStory = $manager->checkStory($idStory, $idUser);
		echo $checkStory;
		//Non ho trovato nessuna storia
		if($checkStory==3){
			header( "location: http://localhost/iambrand/iambrand/pages/index.php" );
		}
		
				
	}else {
		
		$checkStory = 0;
		$idStory = $manager->getIdDashboard($idUser); 
		
	}; 
	
	
	//$isMyStory = $manager->isMyStory($idStory, $idUser);
	$hasPost = $manager->hasPosts($idStory);	
	
	//RECUPERO I POST|NEWS DA PUBBLICARE. 
	if($checkStory==0){
		$array_post = $manager->getDashboard( $idUser );
		
	}else if(($checkStory==1)||($checkStory==2)){
		$array_post = $manager->getPostsByIdStory($idStory);
		$story = $manager->getStoryById($idStory);
	}
		
	$array_goal = $manager->getGoals($idStory);
	
	if($hasPost==1){
		//percentuali per il grafico
		$array_posts_ASC = $manager->getPercentage($idStory); 


		//Dati per il grafico delle 3 life
		$sumRelationship = $myLife_manager->getSumLifeRelationships($idStory);

		$sumCareer = $myLife_manager->getSumLifeCareer($idStory);

		$sumYourself = $myLife_manager->getSumLifeYourself($idStory);
    }
	
?>
	
<body>
	<!--										
	################################################
	SOMMARIO: 
	0. Modal investitor: exampleModal
	1. ROW - TITOLO
	2. I 4 RETTANGOLI
	3. CHART INVESTITORS
	4. PANEL GOAL
	5. PANEL NEWS	
	6. GALLERY AND PHRASES
	7. GRAFO LIFE
	8. SCRIPT					 
	################################################							
	-->

	<!--										
		################################################
					  0. MODAL INVESTITORS
		################################################		
	-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">La notizia è su tutti i giornali! Gli investitori valuteranno la tua notizia a breve.</h3>

				</div>
				<div class="modal-body">

									
					<div id="imgInvestitor">
						<span class="newsTitle">Ciao</span>
						<span class="title">Ciao</span>
						<span class="description">Ciao</span>
						<div id="commentsInvestitors" class="row" >
							<div>
								<span id="comment1">"Se ho investito, è perchè era giusto farlo..."</span>
							</div>
							<div>
								<span id="comment2">"Oggi mi aspetto grandi news..."</span>
							</div>
							<div >
								<span id="comment3">"Non so se continuare ad investire su questa persona! Devo?"</span>
							</div>
						</div>
						
						<img class="center-block" src="../image/demo/Fumetto_Investitore_05.jpg" width="100%" height="auto" alt=""/>
						
					</div>

					<hr>	
					<div class="row">
					
						<div class="col-lg-4">	
						<div class="form-group">
							<textarea class="form-control" rows="1" style="height:80px" id="p_commentUser" placeholder="Lascia un commento per gli investitori"></textarea>
						</div>

						
							
						<div class="row" style="display: none">
							<div class="col-lg-2">
								<span>Umore</span>
							</div>

							<div class="col-lg-5">
								<div class="slidecontainer-mood">
									<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeMood">
								</div>
							</div>
							<div class="col-lg-5">
								<span id="answer-mood">0</span>

							</div>

						</div>
						</div>
					
					
					
						<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<span>Aumenta/diminuisci il tuo valore societario: %</span>
							</div>

							<div class="col-lg-12">
								<div class="slidecontainer-mood">
									<input type="range" min="-12" max="12" value="0" class="slider" id="p_percentage">
								</div>
							</div>
							<div class="col-lg-12 text-right">
								<span id="dayPercentageSpan" style="font-size: 50px">0%</span>
							</div>
						</div>

						</div>	
				
					
					</div>	
				</div>
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
					<button id="save_in_database" type="button" class="btn btn-primary">Salva nel database</button>
					<div id="risposta"></div>
				</div>

			</div>
		</div>
	</div>
	
	<script>

		$("#p_percentage").change(function(){
		
			$("#dayPercentageSpan").text($("#p_percentage").val() + "%");
		})
	
	</script>
	
	
	<!-- MODAL PER MODIFICARE UNA STORIA-->
	<div class="modal fade" id="updateStoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel"> </h3>

				</div>
				<div class="modal-body">
				
						
					  <div class="form-group">
						<label for="story_title" >Titolo</label> 
						<div>
						  <input id="story_title" name="story_title" value="<?php echo $story->title; ?>" type="text" class="form-control">
						</div>
					  </div>
					  <div class="form-group">
						<label for="story_description" class="control-label ">Descrizione</label> 
						<div >
						  <textarea id="story_description" name="story_description"  rows="3" class="form-control"><?php echo $story->description; ?></textarea>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="story_investitor" class="control-label">Permetti agli utenti di partecipare alla tua storia come investitori?</label> 
						<div>
						  <label class="radio-inline">
							<input type="radio" checked name="story_investitor" value="si">
								  si
						  </label>
						  <label class="radio-inline">
							<input type="radio" name="story_investitor" value="no">
								  no
						  </label>
						</div>
					  </div> 
					  
					  <div class="form-group">
						<label for="story_public" class="control-label">Pubblica o privata? </label> 
						<div>
						  <label class="radio-inline">
							<input type="radio" checked name="story_public" value="si">
								  si
						  </label>
						  <label class="radio-inline">
							<input type="radio" name="story_public" value="no">
								  no
						  </label>
						</div>
					  </div> 
					  
					 <div class="form-group">
						 <label for="exampleFormControlFile1"></label>
							<input type="file" class="form-control-file" name="file" id="story_urlImg">
					 </div> 						
											
				</div>
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
					
					<button id="updateStory" type="button" class="btn btn-primary">Salva nel database</button>
					
					<div id="risposta"></div>
				</div>

			</div>
		</div>
	</div>
	
	<script>
	$( document ).ready( function () {
			$( "#updateStory" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();
					
					datiForm.append( 'idStory', <?php echo $idStory; ?> );
					
					datiForm.append( 'title', $( "#story_title" ).val() );
					datiForm.append( 'description', $( "#story_description" ).val() );
					
					datiForm.append( 'urlMedia', $( "#story_urlImg" )[ 0 ].files[ 0 ] );
					
					datiForm.append( 'investitorUser', $('input[type=radio][name=story_investitor]:checked').val()  );
					datiForm.append( 'publicStory', $('input[type=radio][name=story_public]:checked').val()  );
					//datiForm.append( 'type', $( "#p_type" ).val() );

					$.ajax( {
						url: "../core/control/updateStory.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							alert(risposta);
							//$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi
							/*	
							setTimeout( function () {
								window.location.reload()
							}, 1000 );
							*/	
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);

		} );	
	</script>
	<div id="wrapper">
		
		<!-- MENU LATERALE -->
		<?php include_once("nav.php") ?>
		
		<div id="page-wrapper">
			<!--										
				################################################
						      1. ROW - TITOLO									
				################################################				
			-->
			<div class="row header-story">
				<div class="col-lg-8">
					
						<?php 
							
							//dashboard
							if($checkStory==0)
								echo '<h1 class="title"> Ciao ' . $nomeUtente . '</h1>';
							
							if(($checkStory==1)||($checkStory==2))
								echo '<h1 class="title">' . $story->title . '</h1>';

						?>
					
				</div>
				<div class="col-lg-4 text-right" style="padding-top: 20px">
						<?php
						
							//dashboard
							if($checkStory==0){
								
							}
							if($checkStory==1){
								echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateStoryModal">MODIFICA</button>';
							}
							if($checkStory==2){
								echo '<button  type="button" class="btn btn-primary">SEGUI</button>';
							}
						?>
				</div>
			</div>
	
			<div class="row header-bottom">
				<div class="col-lg-12">
					
						<?php 
							
							//dashboard
							if($checkStory==0){
								
							}
							if($checkStory==1){
								echo $story->description; 
								
							}
							if($checkStory==-1){
								
							}
						?>
					
				</div>
			</div>	
				
				
				<!-- /.col-lg-12 -->
			<!-- /.row -->

			<!--										
				################################################
						      2. I 4 RETTANGOLI										
				################################################				
			-->
			<?php include_once("fourRectangle.php") ?>


			<!--										
				################################################
						      3. CHART INVESTITORS						
				################################################				
			-->
			<div class="row">
				<div class="col-lg-8">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> 
							<span id="valSc">Valore societario: PK 1000,00 </span>
							<div class="pull-right">
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Menu
                                        <span class="caret"></span>
                                    </button>
							
									<ul class="dropdown-menu pull-right" role="menu">
										<li><a href="#">Action</a>
										</li>
										<li><a href="#">Another action</a>
										</li>
										<li><a href="#">Something else here</a>
										</li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div id="myfirstchart" style="height: 250px;"></div>
							
							<?php 
	
								
								if($hasPost==1){
									include_once("graphicInvestitor.php"); 
								}
							?>
						</div>
						<!-- /.panel-body -->
					</div>
					
					
					<!--								
					################################################						4. PANEL GOAL				
					################################################		
					-->
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-tasks fa-fw"></i> Obiettivi
									<div class="pull-right">
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Menu
                                        <span class="caret"></span>
                                    </button>
							
									<ul class="dropdown-menu pull-right" role="menu">
										<li id="getModalNewGoal"><a href="#">Crea obiettivo</a>
										</li>
										
									</ul>
								</div>
							</div>
								</div>

								<?php include_once("goalPanels.php"); ?>
							</div>
							<!-- .panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<script>
					
						$( "#getModalNewGoal" ).click( function () {

						var datiForm = new FormData();
						datiForm.append( 'idStory', <?php echo $idStory; ?> );

						//idGoal = $( this ).attr( "id" );
						//$("#modalGoal .modal-title").html("Ciao");

						$.ajax( {
									url: "../core/control/getModalNewGoal.php",
									type: 'POST', //Le info testuali saranno passate in POST
									data: datiForm, //I dati, forniti sotto forma di oggetto FormData
									cache: false,
									processData: false, //Serve per NON far convertire l’oggetto
									//FormData in una stringa, preservando il file
									contentType: false, //Serve per NON far inserire automaticamente
									//un content type errato
									success: function ( risposta ) {
										//alert(risposta);
										$( "#modalNewGoal" ).html( risposta );
										$( "#modalNewGoal" ).modal( 'show' );

									},
									error: function () {
										alert( "Chiamata fallita!!!" );
									}

								} );

					} );
			     	</script>	
					
					<div class="modal fade" id="modalNewGoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						
					</div>
	
					<!-- /.col-lg-12 -->
				
				
					<!--										
						################################################
									 5. PANEL NEWS
						################################################
					-->
						<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-clock-o fa-fw"></i> NEWS
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<ul class="timeline">

								<?php
									
									if(($checkStory==0)||($checkStory==1)){
								?>		
								
										<li class="timeline-inverted">
										<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
										</div> -->

										<div class="timeline-panel">

											<div class="timeline-heading">
												<span class="info"><span class="fa fa-info-circle"></span> Crea due post giornalieri ore 21-08</span>

												<h4 class="timeline-title" style="width: 100%; margin-top: 3px">NUOVA NEWS</h4>

												<input id="p_title" type="text" style="width: 100%; margin-top: 3px" placeholder="TITOLO" name="usrname">

												<input id="p_subTitle" type="text" style="width: 100%; margin-top: 10px" placeholder="SOTTOTITOLO" name="usrname">

												<br>
												<label for="exampleFormControlFile1"></label>
												<input type="file" class="form-control-file" name="file" id="p_urlMedia">

												<br>
											</div>

											<div class="timeline-body">

												<textarea id="p_description" style="width: 100%; height: 200px" name="comment" form="usrform"></textarea>
												<script>
													$( '#p_description' ).trumbowyg( {
														btns: [
															[ 'viewHTML' ],
															[ 'undo', 'redo' ], // Only supported in Blink browsers
															//['formatting'],
															[ 'strong', 'em' ],
															[ 'justifyLeft', 'justifyCenter', 'justifyFull' ],
															[ 'unorderedList', 'orderedList' ],
															[ 'removeformat' ],
															[ 'fullscreen' ]
														],
														lang: 'it'
													} );
												</script>
												<div style="padding: 20px" class="text-center">

													<div class="row">
														<div class="col-lg-3">
															<span id="label_slider_Y">Yourself</span>
														</div>
														<div class="col-lg-9">
															<div class="slidecontainer">
																<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeYourself">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<span id="label_slider_C">Career</span>
														</div>
														<div class="col-lg-9">
															<div class="slidecontainer">
																<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeCareer">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-3">
															<span id="label_slider_R">Relationship</span>
														</div>
														<div class="col-lg-9">
															<div class="slidecontainer">
																<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeRelationships">
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- Button trigger modal -->
											<button id="sendInvestitors" style="padding-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											  PUBBLICA NOTIZIA
											</button>
										</div>
										
										<script>
											
											$( document ).ready( function () {
												$( "#save_in_database" ).click(
													function () {
														//Creazione di un oggetto FormData…
														var datiForm = new FormData();

														datiForm.append( 'title', $( "#p_title" ).val() );
														datiForm.append( 'subTitle', $( "#p_subTitle" ).val() );
														datiForm.append( 'description', $( "#p_description" ).val() );
														datiForm.append( 'urlMedia', $( "#p_urlMedia" )[ 0 ].files[ 0 ] );
														datiForm.append( 'commentUser', $( "#p_commentUser" ).val() );
														//datiForm.append( 'commentInvestitors', $( "#p_commentInvestitors" ).val() );
														datiForm.append( 'percentage', $( "#p_percentage" ).val() );
														datiForm.append( 'lifeMood', $( "#p_lifeMood" ).val() );
														datiForm.append( 'lifeCareer', $( "#p_lifeCareer" ).val() );
														datiForm.append( 'lifeRelationships', $( "#p_lifeRelationships" ).val() );
														datiForm.append( 'lifeYourself', $( "#p_lifeYourself" ).val() );
														datiForm.append( 'type', "day" );

														datiForm.append( 'idStory', <?php echo $idStory ?> );

														//datiForm.append( 'type', $( "#p_type" ).val() );

														$.ajax( {
															url: "../core/control/newPost.php",
															type: 'POST', //Le info testuali saranno passate in POST
															data: datiForm, //I dati, forniti sotto forma di oggetto FormData
															cache: false,
															processData: false, //Serve per NON far convertire l’oggetto
															//FormData in una stringa, preservando il file
															contentType: false, //Serve per NON far inserire automaticamente
															//un content type errato
															success: function ( risposta ) {
																$( "#risposta" ).html( risposta );
																// imposto un refresh di pagina dopo 60 secondi
																/*	
																setTimeout( function () {
																	window.location.reload()
																}, 1000 );
																*/	
															},
															error: function () {
																alert( "Chiamata fallita!!!" );
															}
														} );

													} //function click
												);

											} );
											
										</script>
											
									</li>
										
								<?php
									}
								?>
								<!--										
									################################################			PRINT POSTS	################################################
								-->
								<?php
								//include( "../core/manager/Manager.php" );
								//include( "../core/manager/MyLifeManager.php" );

								
								$max = sizeof( $array_post );
								
								if($hasPost==1) 								
								for ( $i = 0; $i < $max; $i++ ) {

									?>

								<li <?php if($i%2!=0) echo 'class="timeline-inverted"'; ?>>
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel news-print" id="<?php echo $array_post[$i]->id;	?>">
										<div class="timeline-heading">
											<p class="timeline-title text-left">
												<?php echo strtoupper($array_post[$i]->title);	?>
											</p>
											<p class="timeline-subTitle text-left">
												<?php echo strtoupper($array_post[$i]->subtitle);	?>
											</p>
											
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 
											<?php echo $array_post[$i]->datePost; ?></small>
											</p>

											<img src="<?php echo '../image/' . $idUser . '/diario/' .  $array_post[$i]->urlMedia; ?>" style="width: 100%; height: auto" alt=""/>
										</div>
										
										<div class="timeline-body" style="padding-top: 5px">

											<?php echo $array_post[$i]->description; ?>

										</div>
										<hr style="padding: 5px; margin: 5px">
										<?php
											$percentage = $array_post[$i]->percentage;
											$lifeCareer = $array_post[$i]->lifeCareer;
											$lifeRelationships = $array_post[$i]->lifeRelationships;
											$lifeYourself = $array_post[$i]->lifeYourself;
										?>
										
										<div class="row">
											<div class="col-lg-6">
												
												<!--
												<span class="color-relationships">	
												-3
												<span class="fa fa-heart"> 
												</span>
												</span>	
												+5
												<span class="fa fa-cogs"> 
												</span>
												</span>
												<span class="color-yourself">	
												+9
												<span class="fa fa-eye"> 
												</span>
												</span>
												-->
												
												<?php if($lifeRelationships!=0){		
												?>
													<span class="fa fa-heart color-relationships">
													<?php 
														if($lifeRelationships>0)
															echo "+";
											
															echo $lifeRelationships; 
													?>
													</span>
												<?php 
												}
												?>

												<?php if($lifeCareer!=0){				
												?>
												<span class="fa fa-cogs color-career"><?php
													
													if($lifeCareer>0)
													echo "+";
													echo $lifeCareer;
													
													?> </span>
												<?php 
												}
												?>

												<?php if($lifeYourself!=0){				
												?>
												<span class="fa fa-eye color-yourself"><?php
													
													if($lifeYourself > 0)
													echo "+";
													echo $lifeYourself; 
													
													?> </span>
												<?php 
												}
												?>
											</div>
											<div class="col-lg-6 text-right">
												<span style="font-size: 20px; font-weight: 700; padding-left: 20px">  
												<?php 
													if($percentage>0)
														echo "+" . $percentage . "%"; 
													else echo $percentage . "%"; 

												?></span>
											</div>	
										</div>
										
										
									</div>
								</li>

								<?php

								}

								?>

							</ul>

						</div>
						<!-- /.panel-body -->
					</div>
					
				 <!-- ----- BEGIN MODAL ----- -->
					<div id="modalPost" class="modal fade" role="dialog">

					</div>
				<!-- ----- END MODAL ----- -->
				
			
		<script>
	
	
		
		$( ".news-print" ).click( function () {
			
			
			var datiForm = new FormData();
			datiForm.append( 'idNews', $( this ).attr( "id" ) );
			
			//idGoal = $( this ).attr( "id" );
			//$("#modalGoal .modal-title").html("Ciao");
			
			$.ajax( {
						url: "../core/control/getModalPost.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							$( "#modalPost" ).html( risposta );
							$( "#modalPost" ).modal( 'show' );
							
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
				
					} );
			
		} );
		
		
</script>
					
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-8 -->
				<div class="col-lg-4">
					
					
					<!--										
						################################################
									 6. GALLERY AND PHRASES
						################################################
					-->
					<?php include_once("motivation.php"); ?>
					
					
					<!--										
						################################################
									 7. GRAFO LIFE
						################################################
					-->
					<!-- /.panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Grafo
						</div>
						<div class="panel-body">

							<?php
							
								$myLife_manager = new MyLifeManager();

								

							?>
							<div id="morris-donut-chart"></div>

							<script>
								Morris.Bar( {
									element: 'morris-donut-chart',
									data: [ {
											y: 'TeStesso',
											a: <?php echo $sumYourself;?>
										},

										{
											y: 'Relazioni',
											a: <?php echo $sumRelationship;?>
										},

										{
											y: 'Carriera',
											a: <?php echo $sumCareer;?>
										}
									],
									xkey: 'y',
									ykeys: [ 'a' ],
									labels: [ '#' ],
									/*axes: 'true',
									hideHover: 'true',
									stacked: 'true',
									gridTextSize: '10px',*/
									barColors: function ( row, series, type ) {
										console.log( "--> " + row.label, series, type );
										if ( row.label == "TeStesso" ) return "#00A000";
										else if ( row.label == "Relazioni" ) return "#FF421E";
										else if ( row.label == "Carriera" ) return "#6181FF";

									}
								} );
							</script>

							<div id="legendGraphLife">
								<ul id="yourSelfGraphUL" class="color-yourself">
									<span class="fa fa-eye color-yourself"></span> <span class="titleGraphUL">TE STESSO</span>
									<li>Mente</li>
									<li>Corpo</li>
									<li>Sport</li>
									<li>Dieta</li>
								</ul>
								<ul id="relationshipGraphUL" class="color-relationships">
									<span class="fa fa-heart color-relationships"></span>
									<span class="titleGraphUL">RELATIONI</span>
									<li>Amicizia</li>
									<li>Famiglia</li>
									<li>Amore</li>
									<li>Svago</li>
								</ul>
								<ul id="careerGraphUL" class="color-career">

									<span class="fa fa-cogs color-career"></span>
									<span class="titleGraphUL">CARRIERA</span>
									<li>Scuola</li>
									<li>Formazione</li>
									<li>Studio</li>
									<li>Denaro</li>
								</ul>
							</div>

							<!--<a href="#" class="btn btn-default btn-block">View Details</a>-->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel .chat-panel -->
				</div>
				<!-- /.col-lg-4 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php include_once("footerlinkscript.html")?>
	<?php include_once("commentIT.html")?>

	<!-- 8. SCRIPT-->
	<script>
		$( function () {
			$( "#select" ).click(
				function () {
					$( "#file" ).get( 0 ).click();
					return false;
				}
			);

		} );

		
		$( document ).ready( function () {
			$( "#sendInvestitors" ).click(
				function () {

					$( "#imgInvestitor .newsTitle" ).html( "NEWS DA <?php echo strtoupper($nomeUtente); ?>" );
					$( "#imgInvestitor .title" ).html( $( "#p_title" ).val() );
					$( "#imgInvestitor .description" ).html( $( "#p_description" ).val() );

				}
			);

		} );

		
	</script>


</body>

</html>
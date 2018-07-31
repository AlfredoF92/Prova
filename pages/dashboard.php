<!DOCTYPE html>
<html lang="en">

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
	
	$story = "";
	if(isset($_GET["idStory"])){
		$idStory = $_GET["idStory"]; 
		$story = $manager->getStoryById($idStory);
	
	}else $idStory = 0; 
	
	$hasPost = $manager->hasPosts( $idUser, $idStory );	
	
	
	
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
								<span id="comment1">"Sei un buon annulla!"</span>
							</div>
							<div>
								<span id="comment2">"Vaffanculo! Non investirò mai più su di te. "</span>
							</div>
							<div >
								<span id="comment3">"Ottimo amico. Vai avanti così."</span>
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
	

	<!-- MODAL INVESTITOR -->
	<div id="wrapper">

		<?php include_once("nav.php") ?>
		
		<div id="page-wrapper">
			<!--										
				################################################
						      1. ROW - TITOLO										
				################################################				
			-->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
					
						<?php 
							
							if($idStory>0)
								echo $story->title;
							else echo "Ciao, " . strtoupper($nomeUtente);	
						
						?>
					</h1>
						<?php 
							
							//if($idStory>0)
							//	echo $story->description;
							
						?>
				</div>
				<!-- /.col-lg-12 -->
			</div>
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
                                        Actions
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
					################################################				
										4. PANEL GOAL				
					################################################		
					-->
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-tasks fa-fw"></i> Obiettivi
									
								</div>

								<?php include_once("goalPanels.php"); ?>
							</div>
							<!-- .panel-body -->
						</div>
						<!-- /.panel -->
					</div>
					<!-- /.col-lg-12 -->
				
				
					<!--										
						################################################
									 5. PANEL NEWS
						################################################
					-->
					<?php include_once("news.php"); ?>
					
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

								$sumRelationship = $myLife_manager->getSumLifeRelationships( $idUser, $idStory );

								$sumCareer = $myLife_manager->getSumLifeCareer( $idUser, $idStory );

								$sumYourself = $myLife_manager->getSumLifeYourself( $idUser, $idStory );

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

		//$('#gm_idlabel').change(function() { alert($(this).val()); });
		$( document ).ready( function () {
			$( "#sendInvestitors" ).click(
				function () {

					//datiForm.append( 'title', $( "#p_title" ).val() );
					//datiForm.append( 'description', $( "#p_description" ).val() );

					$( "#imgInvestitor .newsTitle" ).html( "NEWS DA <?php echo strtoupper($nomeUtente); ?>" );
					$( "#imgInvestitor .title" ).html( $( "#p_title" ).val() );
					$( "#imgInvestitor .description" ).html( $( "#p_description" ).val() );

				}
			);

		} );

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
						url: "../core/control/addDay.php",
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


</body>

</html>
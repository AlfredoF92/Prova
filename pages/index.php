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
?>

<body>

	<?php include_once("modalInvestitors.php") ?>


	<!-- MODAL INVESTITOR -->
	<div id="wrapper">

		<?php include_once("nav.php") ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<?php echo "Ciao, " . strtoupper($nomeUtente);	?>
					</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<?php include_once("fourRectangle.php") ?>

			

			


			<!--										
				################################################
						      CHART INVESTITORS										
				################################################				
			-->
			<div class="row">
				<div class="col-lg-8">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> 
							<span id="val">Valore societario: PK 1000,00 </span>
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

							<?php include_once("graphicInvestitor.php"); ?>
						</div>
						<!-- /.panel-body -->
					</div>
					
					
					<!--								
					################################################				
										GOAL				
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

									  PANEL NEW POSTS

						################################################
					-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-clock-o fa-fw"></i> NEWS
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<ul class="timeline">

								<li class="timeline-inverted">
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel">

										<div class="timeline-heading">
											<span class="info"><span class="fa fa-info-circle"></span> Crea due post giornalieri ore 21-08</span>


											<h4 class="timeline-title">Titolo</h4>

											<input id="p_title" type="text" style="width: 100%" name="usrname"><br>
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
										  Invia agli investitori
										</button>
									




									</div>
								</li>
								<!--										
									################################################
												     PRINT POSTS
									################################################
								-->
								<?php
								//include( "../core/manager/Manager.php" );
								//include( "../core/manager/MyLifeManager.php" );

								$array_post = $manager->getPosts( $idUser );
								$max = sizeof( $array_post );

								for ( $i = 0; $i < $max; $i++ ) {

									?>

								<li <?php if($i%2!=0) echo 'class="timeline-inverted"'; ?>>
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">
												<?php echo $array_post[$i]->title;	?>
											</h4>
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 
											<?php echo $array_post[$i]->datePost; ?></small>
											</p>

											<img src="<?php echo '../image/' . $array_post[$i]->idUser . '/diario/' .  $array_post[$i]->urlMedia; ?>" style="width: 100%; height: auto" alt=""/>
										</div>
										
										<div class="timeline-body" style="padding-top: 5px">

											<?php echo $array_post[$i]->description; ?>

										</div>
										<hr>
										<?php
											echo $array_post[$i]->percentage . "<br>";
											echo $array_post[$i]->lifeCareer . "<br>";
											echo $array_post[$i]->lifeRelationships . "<br>";
											echo $array_post[$i]->lifeYourself . "<br>";
										?>
										
										<div class="text-right">
											<span class="fa fa-heart color-relationships">+3</span>
											<span class="fa fa-cogs color-career">+3</span>
											<span class="fa fa-eye color-yourself">+3</span>
											<span style="font-size: 17px; font-weight: 700">| +3%</span>
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
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-8 -->
				<div class="col-lg-4">
					
					<!--
					<?php //include_once("notificationPanel.php"); ?>
					-->
					
					<?php include_once("motivation.php"); ?>
					
					
					<!-- /.panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Grafo
						</div>
						<div class="panel-body">

							<?php
							
								$myLife_manager = new MyLifeManager();

								$sumRelationship = $myLife_manager->getSumLifeRelationships( $idUser );

								$sumCareer = $myLife_manager->getSumLifeCareer( $idUser );

								$sumYourself = $myLife_manager->getSumLifeYourself( $idUser );

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

	<!-- CARICA IMAGIEN-->
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
					//datiForm.append( 'subtitle', $( "#p_subtitle" ).val() );
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
							//$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi

							setTimeout( function () {
								window.location.reload()
							}, 1000 );

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
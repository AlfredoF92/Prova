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
	
	
	$id_story = $_GET["id"];
	echo $id_story;
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
					<?php include_once("news.php"); ?>
					
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
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	
	 <!-- Bootstrap Core CSS -->
    <!-- <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../../css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../js/bootstrap-3.3.7.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>
	<link href="../../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
    
    <!-- personal CSS -->
    <link href="../../css/style.css" rel="stylesheet">
	
	<script src="../../node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
	<link rel="stylesheet" href="../../node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
	
	


	
	
	
	
</head>

<?php
	
    include_once ("../../core/model/Post.php");
	include_once ("../../core/model/Utente.php");
	include_once ("../../core/model/Goal.php");
	include_once ("../../core/model/Label.php");


	include_once ("../../core/manager/Manager.php");
	include_once ("../../core/manager/MyLifeManager.php");
	include_once ("../../core/manager/ConnectionException.php");
	include_once ("../../core/manager/config.php");
	
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

	<!--										
		################################################
					  MODAL INVESTITORS
		################################################							
	-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" style="align-content: center; margin-left: 40%" id="exampleModalLabel">Investitori</h3>

				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="comment">Un commento per gli investitori</label>
						<textarea class="form-control" rows="1" id="p_commentUser"></textarea>
					</div>


					<div class="row">
						<div class="col-lg-2">
							<span>Mood</span>
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
					<hr>
					<img class="center-block" src="../../image/1/image/investitori.jpg" width="250" height="250" alt=""/>

					<div class="row">
						<div class="col-lg-4">
							<span>Valuta la tua giornata: %</span>
						</div>

						<div class="col-lg-8">
							<div class="slidecontainer-mood">
								<input type="range" min="-10" max="10" value="0" class="slider" id="p_percentage">
							</div>
						</div>

					</div>

					<div id="commentsInvestitors" class="row" style="padding-top: 20px">

						<div class="col-lg-4">
							<span id="comment1">"Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. "</span>
						</div>
						<div class="col-lg-4">
							<span id="comment2">"Ut enim ad minim veniam! amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna"</span>
						</div>
						<div class="col-lg-4">
							<span id="comment3">"Ut enim ad minim veniam! Ut enim ad minim veniam!"</span>
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
	
	
	<!-- MODAL INVESTITOR -->
	<div id="wrapper">

		<?php include_once("nav-admin.php") ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						AMMINISTRATORE
					</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->


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
						url: "../../core/control/addDay.php",
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

							
							/*setTimeout( function () {
								window.location.reload()
							}, 1000 );*/
							
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);
		
		});
		
		
	</script>
	
	
	<?php include_once("commentIT.html")?>
	
	
</body>

</html>
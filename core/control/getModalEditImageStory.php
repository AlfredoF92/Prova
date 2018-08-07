
<?php
	include_once( "../manager/Manager.php" );
	include_once( "../manager/MyLifeManager.php" );
	include_once( "../model/Goal.php" );
	include_once( "../model/Utente.php" );
	include_once( "../model/Label.php" );
	include_once( "../model/Post.php" );

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
	$idStory = $_REQUEST["idStory"];
	$images = $myLife_manager->getMotivationAllImg($idStory);
?>


		<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Elimina immagini</h3>
						</div>
						<div class="modal-body">
							<textarea id="description" style="width: 100%; height: 300px"><?php echo $images  ?>
							</textarea>	
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
							<button id="updateImgMotivation" type="button" class="btn btn-primary">Salva nel database</button>
							<div id="rispostaImg2"></div>
						</div>

					</div>
				</div>
	
<script>
		$( "#updateImgMotivation" ).click( function () {

			var datiForm = new FormData();
			
			datiForm.append( 'idStory', <?php echo $idStory; ?> );
			datiForm.append( 'images', $("#description").val() );
			
			
			$.ajax( {
				url: "../core/control/updateImagesStory.php",
				type: 'POST', //Le info testuali saranno passate in POST
				data: datiForm, //I dati, forniti sotto forma di oggetto FormData
				cache: false,
				processData: false, //Serve per NON far convertire l’oggetto
				//FormData in una stringa, preservando il file
				contentType: false, //Serve per NON far inserire automaticamente
				//un content type errato
				success: function ( risposta ) {
					//alert(risposta);
					$('#rispostaImg2').html(risposta);

					// imposto un refresh di pagina dopo 60 secondi
						
					setTimeout( function () {
						window.location.reload()
					}, 1000 );
						
				},
				error: function () {
					alert( "Chiamata fallita!!!" );
				}
			} );

		} )
		

</script>

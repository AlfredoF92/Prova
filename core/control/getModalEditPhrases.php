
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
	$phrases = $myLife_manager->getPhrases($idStory);
?>


		<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Modifica frasi</h3>
						</div>
						<div class="modal-body">
							<textarea id="descriptionP" style="width: 100%; height: 300px"><?php echo $phrases  ?>
							</textarea>	
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
							<button id="updatePhrases" type="button" class="btn btn-primary">Salva nel database</button>
							<div id="rispostaImg2"></div>
						</div>

					</div>
				</div>
	
<script>
		$( "#updatePhrases" ).click( function () {

			var datiForm = new FormData();
			
			datiForm.append( 'idStory', <?php echo $idStory; ?> );
			datiForm.append( 'phrases', $("#descriptionP").val() );
			
			
			$.ajax( {
				url: "../core/control/updatePhrases.php",
				type: 'POST', //Le info testuali saranno passate in POST
				data: datiForm, //I dati, forniti sotto forma di oggetto FormData
				cache: false,
				processData: false, //Serve per NON far convertire l’oggetto
				//FormData in una stringa, preservando il file
				contentType: false, //Serve per NON far inserire automaticamente
				//un content type errato
				success: function ( risposta ) {
					//alert(risposta);
					$('#rispostaImgmo2').html(risposta);

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

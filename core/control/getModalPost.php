<?php

include_once( "../manager/Manager.php" );
include_once( "../manager/MyLifeManager.php" );
include_once( "../model/Goal.php" );
include_once( "../model/Utente.php" );
include_once( "../model/Label.php" );
include_once( "../model/Post.php" );
/*
########## GET IDUTENTE #########
*/
session_start();
if ( isset( $_SESSION[ 'id' ] ) ) {
	$myLife_manager = new MyLifeManager();
	$user = $myLife_manager->getUserByID( $_SESSION[ 'id' ] );
}
$idUser = $_SESSION[ 'id' ];

?>

<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">
				<?php

				$idNews = $_REQUEST[ "idNews" ];
				
				$myLife_manager = new MyLifeManager();
				$news = $myLife_manager->getPost($idNews);

				echo $news->title;
				?>

			</h4>
		</div>
		<div class="modal-body">
				
							
				<div class="form-group">
			  	  <label for="usr">UrlImage:</label>	
				  <input id="pM_oldUrlMedia" type="text" class="form-control" value="<?php echo $news->urlMedia; ?>">
				  <input type="file" class="form-control-file" name="file" id="pM_urlMedia">
				</div>
				
				<div class="form-group">
			  	  <label for="usr">Titolo:</label>	
				  <input id="pM_title" type="text" class="form-control" value="<?php echo $news->title; ?>">
				</div>
				
				<div class="form-group">
				  <label for="pwd">Sottotitolo:</label>
				   <input id="pM_subTitle" type="text" class="form-control" value="<?php echo $news->subtitle; ?>">
				</div>
				
				<div class="form-group">
				  <label for="pwd">Data:</label>
				   <input id="pM_datePost" type="text" class="form-control" value="<?php echo $news->datePost; ?>">
				</div>
				
				<div class="form-group">
				  <label for="pwd">Descrizione:</label>
				   
				   <textarea id="newsM_description" style="width: 100%; height: auto"> <?php echo $news->description; ?> </textarea>
				   
				   <script>
												$( '#newsM_description' ).trumbowyg( {
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
				   
				</div>
				<div class="form-group">
				
					<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div style="padding: 20px" class="text-center">
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_Y">Yourself</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input  type="range" min="-10" max="10" value="<?php echo $news->lifeYourself; ?>" class="slider slider-lifeYourself" id="pM_lifeYourself">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_C">Career</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input  type="range" min="-10" max="10" value="<?php echo $news->lifeCareer; ?>" class="slider slider-lifeCareer" id="pM_lifeCareer">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_R">Relationship</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input  type="range" min="-10" max="10" value="<?php echo $news->lifeRelationships; ?>" class="slider slider-lifeRelationships" id="pM_lifeRelationships">
										</div>
									</div>
								</div>


							</div>
						</div>

					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12">
								<div class="slidecontainer">
									<input  type="range" min="-20" max="20" value="<?php echo $news->percentage; ?>" class="slider slider-percentage" id="pM_percentage">
								</div>
							</div>
							<div class="col-lg-12 text-right">
								<span id="postSpanM_percentage" style="font-size: 50px">
									<?php 
										
										if($news->percentage>0){
											$s = "+";
										}else if($news->percentage<0){
											$s = "-";
										}else $s = ""; 
										echo $s . $news->percentage; 
									?>%</span>
							</div>
						</div>
					</div>
					
					
				</div>

				</div>
				
				<div class="form-group">
				   <label for="pwd">Commento agli investitori:</label>
				   
				   <textarea id="pM_commentUser"style="width: 100%; height: 100px"> <?php echo $news->commentUser; ?> </textarea>
				  
				</div>
				
				<div class="row" style="padding: 30px">
					<div class="row text-right" >
							<button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
						<button id="saveNews" class="btn btn-warning">SALVA MODIFICHE</button>
					</div>
				</div>
				
		</div>
		
	</div>


	<script>

		$("#pM_percentage").change(function(){
			
			if($("#pM_percentage").val()>0){
				$("#postSpanM_percentage").text("+" + $("#pM_percentage").val() + "%");
			}else if($("#pM_percentage").val()<0){
				$("#postSpanM_percentage").text($("#pM_percentage").val() + "%");
			}else{
				$("#postSpanM_percentage").text("0%");
			}
			
		})
		
		
		
		
		$( "#saveNews" ).click( function () {

			var datiForm = new FormData();
			
			datiForm.append( 'idNews', <?php echo $idNews; ?> );
			
			datiForm.append( 'urlMediaOld', $( "#pM_oldUrlMedia" ).val() );
			datiForm.append( 'urlMedia', $( "#pM_urlMedia" )[ 0 ].files[ 0 ] );
			
			datiForm.append( 'title', $( "#pM_title" ).val() );
			datiForm.append( 'subTitle', $( "#pM_subTitle" ).val() );
			datiForm.append( 'datePost', $( "#pM_datePost" ).val() );
			datiForm.append( 'description', $( "#newsM_description" ).val() );
			datiForm.append( 'lifeYourself', $( "#pM_lifeYourself" ).val() );
			datiForm.append( 'lifeCareer', $( "#pM_lifeCareer" ).val() );
			datiForm.append( 'lifeRelationships', $( "#pM_lifeRelationships" ).val() );
			datiForm.append( 'percentage', $( "#pM_percentage" ).val() );	
			
			datiForm.append( 'commentUser', $( "#pM_commentUser" ).val() );
			
			
			$.ajax( {
				url: "../core/control/updatePost.php",
				type: 'POST', //Le info testuali saranno passate in POST
				data: datiForm, //I dati, forniti sotto forma di oggetto FormData
				cache: false,
				processData: false, //Serve per NON far convertire l’oggetto
				//FormData in una stringa, preservando il file
				contentType: false, //Serve per NON far inserire automaticamente
				//un content type errato
				success: function ( risposta ) {
					//alert(risposta);
					//$('#answerHtml').html(risposta);

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
	

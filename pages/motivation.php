<!-- /.panel -->	
				
				<?php 

						$manager = new MyLifeManager();
						$images = $manager->getMotivationImg($idStory);
						$phrases = $manager->getPhrases($idStory);
						
						$phrases = explode(";", $phrases);
						
				?>
			<!--
			   MODAL PER AGGIUNGERE UN IMMAGINE
			-->				
		   <div class="modal fade" id="addImgMotivationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Aggiungi un'immagine motivazionale</h3>

						</div>
						<div class="modal-body">
							 <div class="form-group">
								 <label for="exampleFormControlFile1"></label>
									<input type="file" class="form-control-file" name="file" id="motivation_urlImg">
							 </div> 		

						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
							<button id="newImgMotivation" type="button" class="btn btn-primary">Salva nel database</button>
							<div id="rispostaImg"></div>
						</div>

					</div>
				</div>
			</div>
		
		   
		   <!--
			   MODAL PER ELIMINARE UN IMMAGINE
		   -->				
		   <div class="modal fade" id="edtImgMotivationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				
			</div>
			  <div class="modal fade" id="editModalPhrases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				
			</div>
					
	
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Immagini motivazionali
							<div class="pull-right">
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
							
									<ul class="dropdown-menu pull-right" role="menu">
										<li data-toggle="modal" data-target="#addImgMotivationModal"><a href="#">Aggiungi immagine</a>
										</li>
										<li id="editImages"><a href="#">Modifica</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel-body" style="padding-bottom: 30px">

							<div class="main-carousel">
							
								<?php
									$max = sizeof($images);
									for($i=0; $i<$max; $i++){
								?>
								
									<div class="carousel-cell">

										<img src="<?php echo '../image/' .  $images[$i]; ?>" width="313" height="221" alt=""/>
									</div>
								
								<?php
									}
								?>
							</div>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Frasi motivazionali
							<div class="pull-right">
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
							
									<ul class="dropdown-menu pull-right" role="menu">
										<li id="editPhrases"><a href="#">Modifica</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel-body" style="padding-bottom: 30px">
								<div class="main-carousel-phrases">
							<?php
								
								$max = sizeof($phrases);
								for($i=0; $i<$max; $i++){
									$phrase = explode("|", $phrases[$i]);
							?>
							
						
								<div class="carousel-phrase">
									<h4><?php echo trim($phrase[0]); ?></h4>
									<?php
									if(sizeof($phrase)==2){
									?>	
										<p><?php echo trim($phrase[1]); ?></p>
									<?php
									}
									?>
									
								</div>
								
							<?php
								}
							?>

							</div>
						</div>
					</div>

<script>

		$( document ).ready( function () {
			$( "#newImgMotivation" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();
					
					datiForm.append( 'idStory', <?php echo $idStory; ?> );
					
					datiForm.append( 'urlMedia', $( "#motivation_urlImg" )[ 0 ].files[ 0 ] );
					
					$.ajax( {
						url: "../core/control/newImagesStory.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							//$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi
							if(risposta==-1){
								$( "#rispostaImg" ).html( "Errore nel caricamento dell'immagine." );
							}else{	
								$( "#rispostaImg" ).html( "Immagine inserita correttamente" );
								setTimeout( function () {
									window.location.reload()
								}, 1000 );
							}	
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);

		} );		
	
		
	   $( document ).ready( function () {
			$( "#editPhrases" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();
					
					datiForm.append( 'idStory', <?php echo $idStory; ?> );
					
					$.ajax( {
						url: "../core/control/getModalEditPhrases.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							//$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi
							$("#editModalPhrases").html(risposta);	
							$("#editModalPhrases").modal("show");	
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);

		} );	
	
	
	   $( document ).ready( function () {
			$( "#editImages" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();
					
					datiForm.append( 'idStory', <?php echo $idStory; ?> );
					
					$.ajax( {
						url: "../core/control/getModalEditImageStory.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							//$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi
							$("#edtImgMotivationModal").html(risposta);	
							$("#edtImgMotivationModal").modal("show");	
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);

		} );	
	
	
$( '.main-carousel' ).flickity( {
			// options
			cellAlign: 'left',
			
			freeScroll: true,
			contain: true,
			// disable previous & next buttons and dots
			prevNextButtons: false,
			pageDots: false,
			autoPlay: true,
			autoPlay: 6000,
			lazyLoad: 1
		} );

	
$( '.main-carousel-phrases' ).flickity( {
			// options
			cellAlign: 'left',
			
			freeScroll: true,
			contain: true,
			// disable previous & next buttons and dots
			prevNextButtons: false,
			pageDots: false,
			autoPlay: true,
			autoPlay: 6000,
			lazyLoad: 1
		} );

</script>
<?php

include_once( "../manager/Manager.php" );
include_once( "../manager/MyLifeManager.php" );
include_once( "../model/Goal.php" );
include_once( "../model/Utente.php" );
include_once( "../model/Label.php" );

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

				$idModal = $_REQUEST[ "idGoal" ];
				//echo strpos($idModal, "G");
				$idGoal = substr( $idModal, 0, strpos( $idModal, "G" ) );
				$myLife_manager = new MyLifeManager();
				$goal = $myLife_manager->getGoal( $idGoal );


				echo $goal->title;

				$dateBegin = $goal->dateBegin;
				$dateFinal = $goal->dateFinal;
				$dateToday = date( 'Y-m-d H:i:s', time() );

				$percentageGoal = $myLife_manager->getPercentageInMinutes( $dateBegin, $dateFinal, $dateToday );

				$stringPercentageGoal = $myLife_manager->getStringITA( $dateBegin, $dateFinal, $dateToday );

				?>

			</h4>
		</div>
		<div class="modal-body">


			<div id="bodyModalGoal">
				<span class="label label-danger" style="background-color: <?php echo $goal->color ?>">
					<?php echo $goal->name; ?>
				</span>

				<p id="g_title">
					<?php echo $goal->title; ?>
				</p>

				<p id="g_description">
					<?php echo $goal->description; ?>
				</p>


				<div class="progress">
					<div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php 	echo $percentageGoal . '%'; ?>; background-color: <?php echo $goal->color ?>">
						<?php echo $stringPercentageGoal; ?>
					</div>

				</div>
				<div style="line-height: 10px">
					<div class="row">
						<div class="col-lg-6">
							 <strong>Data inizio:</strong>
								<?php echo $goal->dateBegin; ?> 
						</div>
						<div class="col-lg-6 text-right" >
							<strong>Data fine:</strong>
								<?php echo $goal->dateFinal; ?> 
						</div>

					</div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-lg-6">
						<div class="form-group">
							<div style="padding: 20px" class="text-center">
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_Y">Yourself</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input disabled type="range" min="-10" max="10" value="<?php echo $goal->lifeYourself; ?>" class="slider" id="goal_lifeYourself">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_C">Career</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input disabled type="range" min="-10" max="10" value="<?php echo $goal->lifeCareer; ?>" class="slider" id="goal_lifeCareer">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_R">Relationship</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input disabled type="range" min="-10" max="10" value="<?php echo $goal->lifeRelationships; ?>" class="slider" id="goal_lifeRelationships">
										</div>
									</div>
								</div>


							</div>
						</div>

					</div>
					<div class="col-lg-6">
						<div class="row">
							
							<div class="col-lg-12">
								<div style="display: none" class="slidecontainer">
									<input disabled type="range" min="-10" max="10" value="<?php echo $goal->percentageInvestor; ?>" class="slider" id="goal_percentage">
								</div>
							</div>
							<div class="col-lg-12 text-right">
								<span style="font-size: 50px">+10%</span>
							</div>
						</div>

					</div>
				</div>


			</div>

			<!--		
						MODAL TO MODIFY			
					-->
			<div id="bodyModalGoalToModify" style="display: none;">
				<form>
					<div class="form-group">
						<label for="usr">Titolo:</label>
						<input type="text" class="form-control" id="gm_title" value="<?php echo $goal->title; ?>">
					</div>
					<div class="form-group">
						<label for="comment">Descrizione</label>
						<textarea class="form-control" rows="1" id="gm_description">
							<?php echo $goal->description;?>
						</textarea>
					</div>
				</form>

				<!--
							MANAGER LABEL
													
						-->
				<?php

				$array_labels = $myLife_manager->getLabels( $idUser );
				$max_labels = sizeof( $array_labels );

				?>

				<div class="form-group">
					<label for="sel1"><span id="spanLabel">Etichetta</span> 
													
							<button id="buttonNewLabel" class="btn btn-info btn-xs">Crea nuova</button>
							<button id="buttonEditLabel" class="btn btn-warning btn-xs">Modifica</button>
							</label>

					<div id="divEditLabel" style="display: none" class="well well-sm">

						<div class="row">

							<div class="col-lg-8">

								<input type="text" class="form-control" placeholder="Nome nuova etichetta" value="<?php echo $goal->name; ?>" id="gm_NameEditLabel">
							</div>
							<div class="col-lg-4">
								<select class="form-control" id="gm_newEditColor">
									<?php 
													$colors = $myLife_manager->getColors();
													for($k=0; $k<sizeof($colors); $k++){

														if($colors[$k] == $goal->color){
															echo '<option selected value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
														}else echo '<option value="'. $colors[$k] . '">' . 					$colors[$k] . '</option>';
													}
												?>

								</select>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-12" style="padding-top: 5px; ">
								<button id="cancelEditLabel" class="btn btn-info btn-xs">Annulla</button>
							</div>
						</div>
					</div>

					<div id="divNewLabel" style="display: none" class="well well-sm">

						<div class="row">
							<div class="col-lg-8">

								<input type="text" class="form-control" placeholder="Nome nuova etichetta" id="gm_newLabel">
							</div>
							<div class="col-lg-4">
								<select class="form-control" id="gm_newLabelColor">
									<?php 
													$colors = $myLife_manager->getColors();
													for($k=0; $k<sizeof($colors); $k++){
														if($colors[$k] == $goal->color){
															echo '<option selected value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
														}else echo '<option value="'. $colors[$k] . '">' . 					$colors[$k] . '</option>';
													}
												?>
								</select>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-12" style="padding-top: 5px; ">
								<button id="cancelNewLabel" class="btn btn-info btn-xs">Annulla</button>
							</div>
						</div>
					</div>
					<div class="row" id="oldLabel">
						<div class="col-lg-8">
							<select class="form-control" id="gm_idlabel">
								<?php 
											for($j=0; $j<$max_labels; $j++){
												
												if($array_labels[$j]->name==$goal->name){
													$idLabel = $array_labels[$j]->id; 
													$color = $array_labels[$j]->color; 
													echo '<option selected value="'. $idLabel . "_" . $color . '">' . $array_labels[$j]->name . '</option>';
												}else {
													$idLabel = $array_labels[$j]->id; 
													$color = $array_labels[$j]->color; 
													echo '<option value="'. $idLabel . "_" . $color .'">' . $array_labels[$j]->name . '</option>';
												}
											}
										?>
							</select>

						</div>
						<div class="col-lg-4">
							<!-- EDIT COLOR
									<select class="form-control" id="gm_idlabelColor">
										<?php 
											/*
											$colors = $myLife_manager->getColors();
											for($k=0; $k<sizeof($colors); $k++){
												if($colors[$k] == $goal->color){
													echo '<option selected value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
												}else echo '<option value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
											}*/
										?>
									</select>
									-->
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-lg-6">
							<label for="sel1">Data inizio</label>
							<input type="text" class="form-control" id="gm_dateBegin" value="<?php echo $goal->dateBegin; ?>">
						</div>
						<div class="col-lg-6">
							<label for="sel1">Data fine</label>
							<input type="text" class="form-control" id="gm_dateFinal" value="<?php echo $goal->dateFinal; ?>">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div style="padding: 20px" class="text-center">
						<div class="row">
							<div class="col-lg-6">

								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_Y">Yourself</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input type="range" min="-10" max="10" value="<?php echo $goal->lifeYourself; ?>" class="slider" id="gm_lifeYourself">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_C">Career</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input type="range" min="-10" max="10" value="<?php echo $goal->lifeCareer; ?>" class="slider" id="gm_lifeCareer">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_R">Relationship</span>
									</div>
									<div class="col-lg-9">
										<div class="slidecontainer">
											<input type="range" min="-10" max="10" value="<?php echo $goal->lifeRelationships; ?>" class="slider" id="gm_lifeRelationships">
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-3">
										<span id="label_slider_R">Percentage</span>
									</div>
									<div class="col-lg-9 text-right">
										<div class="slidecontainer">
											<input type="range" min="-10" max="10" value="<?php echo $goal->percentageInvestor; ?>" class="slider" id="gm_percentage">
										</div>
										<span style="font-size: 35px;">+10%</span>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- BODY -->
			<div class="modal-footer">


				<button type="button" class="btn btn-default" data-dismiss="modal">Annulla Modifiche</button>
				<button id="buttonModifyGoal" class="btn btn-info">Modifica</button>
				<button id="deleteGoal" class="btn btn-danger">Elimina</button>

				<button id="saveGoal" type="button" class="btn btn-warning">Salva</button>

				<button id="goalFailed" class="btn btn-danger">Ho fallito</button>
				<button id="publicGoal" class="btn btn-success">Obiettivo superato</button>

			</div>
			<div id="answerHtml"></div>
		</div>

	</div>


	<script>
		/*
							0 = label Goal
							1 = label New
							2 = label Edit
						*/
		var labelOperation = 0;
		$( "#saveGoal" ).hide();
		$( "#deleteGoal" ).hide();

		$( "#buttonEditLabel" ).click( function () {
			$( "#spanLabel" ).text( "Modifica Etichetta" );
			$( "#divEditLabel" ).show();
			$( "#oldLabel" ).hide();
			$( "#buttonNewLabel" ).hide();
			$( "#buttonEditLabel" ).hide();
			labelOperation = 2;
		} );

		$( "#cancelEditLabel" ).click( function () {
			$( "#spanLabel" ).text( "Etichetta" );
			$( "#buttonNewLabel" ).show();
			$( "#buttonEditLabel" ).show();
			$( "#divEditLabel" ).hide();
			$( "#oldLabel" ).show();
			labelOperation = 0;
		} );

		$( "#buttonNewLabel" ).click( function () {
			$( "#spanLabel" ).text( "Nuova Etichetta" );
			$( "#divNewLabel" ).show();
			$( "#oldLabel" ).hide();
			$( "#buttonNewLabel" ).hide();
			$( "#buttonEditLabel" ).hide();
			labelOperation = 1;
		} );

		$( "#cancelNewLabel" ).click( function () {
			$( "#spanLabel" ).text( "Etichetta" );
			$( "#buttonNewLabel" ).show();
			$( "#oldLabel" ).show();
			$( "#divNewLabel" ).hide();
			$( "#buttonEditLabel" ).show();
			labelOperation = 0;
		} );

		$( "#buttonModifyGoal" ).click( function () {
			$( "#spanLabel" ).text( "Etichetta" );
			$( "#bodyModalGoal" ).hide();
			$( "#bodyModalGoalToModify" ).show();
			$( "#buttonModifyGoal" ).hide();
			$( "#publicGoal" ).hide();
			$( "#goalFailed" ).hide();
			$( "#deleteGoal" ).show();
			$( "#saveGoal" ).show();

			labelOperation = 0;
		} );

		$( "#deleteGoal" ).click( function () {
			var datiForm = new FormData();
			datiForm.append( 'idGoal', <?php echo $idGoal; ?> );

			$.ajax( {
				url: "../core/control/deleteGoal.php",
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

		} );

		$( "#saveGoal" ).click( function () {

			var datiForm = new FormData();
			datiForm.append( 'idGoal', <?php echo $idGoal; ?> );
			datiForm.append( 'title', $( "#gm_title" ).val() );
			datiForm.append( 'description', $( "#gm_description" ).val() );

			datiForm.append( 'dateBegin', $( "#gm_dateBegin" ).val() );
			datiForm.append( 'dateFinal', $( "#gm_dateFinal" ).val() );

			datiForm.append( 'lifeYourself', $( "#gm_lifeYourself" ).val() );
			datiForm.append( 'lifeCareer', $( "#gm_lifeCareer" ).val() );
			datiForm.append( 'lifeRelationships', $( "#gm_lifeRelationships" ).val() );
			datiForm.append( 'percentage', $( "#gm_percentage" ).val() );


			//ETICHETTA
			datiForm.append( 'labelOperation', labelOperation );

			if ( labelOperation == 0 ) {
				val = $( "#gm_idlabel" ).val();
				id = val.substring( 0, val.indexOf( "_" ) );

				datiForm.append( 'idLabel', id );
				//datiForm.append( 'idlabelColor', $("#gm_idlabelColor").val() );

			} else if ( labelOperation == 1 ) {

				datiForm.append( 'newLabel', $( "#gm_newLabel" ).val() );
				datiForm.append( 'newLabelColor', $( "#gm_newLabelColor" ).val() );

			} else if ( labelOperation == 2 ) {
				val = $( "#gm_idlabel" ).val();
				id = val.substring( 0, val.indexOf( "_" ) );

				datiForm.append( 'idEditLabel', id );
				datiForm.append( 'labelEditName', $( "#gm_NameEditLabel" ).val() );
				datiForm.append( 'labelEditColor', $( "#gm_newEditColor" ).val() );

			}


			//idGoal = $( this ).attr( "id" );
			//$("#modalGoal .modal-title").html("Ciao");	
			$.ajax( {
				url: "../core/control/saveGoal.php",
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

		} );

		/*
			$('select').on('change', function() {
			  alert( this.value );
			});

			$('# option[value=val2]').attr('selected','selected');

			$('select_tags').on('change', function() {
				alert( $(this).find(":selected").val() );
			});
		*/

		$( '#oldLabel select' ).on( 'change', function () {
			val = $( this ).find( ":selected" ).val();
			id = val.substring( 0, val.indexOf( "_" ) );
			color = val.substring( val.indexOf( "_" ) + 1 );

			text = $( this ).find( ":selected" ).text();

			$( "#gm_NameEditLabel" ).val( text );

			selectorColor = '#divEditLabel option[value=' + color + ']';
			$( selectorColor ).attr( 'selected', 'selected' );



		} );
	</script>
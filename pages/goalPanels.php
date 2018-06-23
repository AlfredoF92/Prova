<!--LABEL BODY GOALS -->
<div class="panel-body ">


	<!--
		########################################
						   GOAL
					  Panel + modal
		########################################
	-->
	<?php
	//include( "../core/manager/Manager.php" );
	//include( "../core/manager/MyLifeManager.php" );
	$array_goal = $manager->getGoals( $idUser );
	$max = sizeof( $array_goal );
	

	
	for ( $i = 0; $i < $max; $i++ ) {
		if ($array_goal == -1) break; 
		
		
		$dateBegin = $array_goal[ $i ]->dateBegin;
		$dateFinal = $array_goal[ $i ]->dateFinal;
		$dateToday = date('Y-m-d H:i:s', time());
		
		$percentageGoal = $manager->getPercentageInMinutes($dateBegin, $dateFinal,$dateToday);
		$stringPercentageGoal = $manager->getStringITA($dateBegin, $dateFinal,$dateToday);
		
		
		?>

	<!-- ----- BEGIN PANEL ----- -->
	<div id="<?php echo $array_goal[ $i ]->id . 'Goal'; ?>" class="panel-body panelGoal" style="padding-bottom: 0px;">

		<div id="obiettivo-panel" class="panel panel-primary">

			<div id="obiettivo-panel-body" class="panel-body">
				<div class="row">
					<div class="col-lg-10">
						<span class="label" style="background-color: <?php echo $array_goal[$i]->color; ?>">
							<?php echo $array_goal[$i]->name; ?>
						</span>
						<p id="g_title">
							<?php echo $array_goal[$i]->title; ?>
						</p>

						<p id="g_description">
							<?php echo $array_goal[$i]->description; ?>
						</p>

					</div>
					<div class="col-lg-2 text-right">
						<p id="obiettivo-percentuale">+30%</p>

					</div>
				</div>
				<div class="progress ">
					<div class="progress-bar progress-bar-striped" style="width: <?php 	echo $percentageGoal . '%'; ?>;background-color: <?php echo $array_goal[$i]->color; ?>"><?php 	echo $stringPercentageGoal; ?></div>

				</div>

			</div>
		</div>

	</div>
	<!-- ----- END PANEL ----- -->
	<?php

	}

	?>

	<!-- ----- BEGIN MODAL ----- -->
	<div id="modalGoal" class="modal fade" role="dialog">
	
	</div>
	<!-- ----- END MODAL ----- -->

</div>
<!-- LABEL BODY GOALS -->

<script>
	
	
		
		$( ".panelGoal" ).click( function () {

			
			var datiForm = new FormData();
			datiForm.append( 'idGoal', $( this ).attr( "id" ) );
			
			//idGoal = $( this ).attr( "id" );
			//$("#modalGoal .modal-title").html("Ciao");
			
			$.ajax( {
						url: "../core/control/getModalGoal.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							$( "#modalGoal" ).html( risposta );
							$( "#modalGoal" ).modal( 'show' );
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
			
		} );


</script>
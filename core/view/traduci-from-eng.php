	<?php
	
	include_once( "../../control/header.php" );
	include_once( "../../control/core/manager/VocabolarioManager.php" );

	$vocabolario_manager = new VocabolarioManager();
	$parole = $vocabolario_manager->getParoleByIDPlaylist($_GET['id']);
	

	?>

<div class="container pt-5">
	<div class="row p-5">
		<div class="col"></div>
		<div class="col-6 text-center">
			<h1 id="f-eng">
				<?php echo $inglese; ?>
			</h1>
			<h2 id="f-ita-nascosto" style="display: none;">
				<?php echo $italiano;  ?>
			</h2>

			<input id="f-it" tpye="text" class="rounded" style="width: 100%;"></input>
			<div id="icona"></div>
			<div id="risposta"> </div>
			<div class="p-3">
				<button id="controlla" class="btn-success">controlla</button>
				<button class="btn-danger">Non lo so</button>
			</div>
		</div>
		<div class="col"></div>


	</div>
</div>
<script type="text/javascript">
	$( document ).ready( function () {

		$( "#controlla" ).click( function () {

			italiano = $( "#f-ita-nascosto" ).text().toUpperCase();
			risposta = $( "#f-it" ).val().toUpperCase();

			italiano = "<?php echo $frase_vocabolario->getItaliano(); ?>";
			alert(italiano);
			if ( italiano == risposta ) {
				alert( "Yee" );				
				$( "#f-it" ).addClass( "input-in-success" );
				$( "#f-it" ).attr("disabled");
			}

		} );

		$( "#avanti" ).click( function () {
			var f_eng = $( "#f-eng" ).html();
			var f_it = $( "#f-it" ).val();


			$.ajax( {
				type: "POST",
				url: "../control/c-traduci-from-eng.php",
				data: "f_eng=" + f_eng + "&f_it=" + f_it,
				dataType: "html",
				success: function ( risposta ) {

					$( "#risposta" ).html( risposta );
				},
				error: function () {
					alert( "Chiamata fallita!!!" );
				}
			} );
			return false;
		} );
		
	} );
</script>
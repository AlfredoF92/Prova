<?php

include_once( "../../control/header.php" );
include_once( "../../control/core/manager/VocabolarioManager.php" );

$vocabolario_manager = new VocabolarioManager();
$playlist = $vocabolario_manager->getPlaylistByLingua( "English", "Italiano" );

//$inglese = $frase_vocabolario->getInglese();
//$italiano = $frase_vocabolario->getItaliano();

?>



<div class="container p-5">
	<?php
		foreach ( $playlist as $indice => $elemento ) {

		$nome = $playlist[ $indice ]->nome;
		?>
	<div class="row border p-5">

		<h1>
			<?php echo $nome;  ?>
		</h1>
		<button onclick="location.href='traduci-from-eng.php?id=<?php echo $playlist[ $indice ]->id ?>'" type="button" id="<?php echo $playlist[ $indice ]->id?> "class="btn btn-secondary">Start</button>

	</div>


	<?php
	}
	?>
</div>
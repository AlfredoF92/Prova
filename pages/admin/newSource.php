<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	<?php include_once("headerlink.php"); ?>
	<?php include_once("include_core.php"); ?>
	
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
?>
<body>

	<div id="wrapper">

		<?php include_once("nav-admin.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Nuova fonte</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->


			<div class="row">
				<div class="col-lg-8">

							<div class="panel-body">
							
								<!--
									MODAL TO MODIFY	
									
								-->
								<div id="bodyModalGoalToModify">
									<form>
										<div class="form-group">
											<label for="usr">Nome Principale</label>
											<input type="text" class="form-control" id="s_np_1" value="">
										</div>
										<div class="form-group">
											<label for="usr">Nome secondario</label>
											<input type="text" class="form-control" id="s_ns_2" value="">
										</div>
										<div class="form-group">
											<label for="usr">Fondatori</label>
											<input type="text" class="form-control" id="s_f_3" value="">
										</div>
										<div class="form-group">
											<label for="usr">Email Principale</label>
											<input type="text" class="form-control" id="s_e_4" value="">
										</div>
										<div class="form-group">
											<label for="usr">Email secondaria</label>
											<input type="text" class="form-control" id="s_es_5" value="">
										</div>
										<div class="form-group">
											<label for="usr">Telefono</label>
											<input type="text" class="form-control" id="s_ts_6" value="">
										</div>
										<div class="form-group">
											<label for="usr">Url Blog</label>
											<input type="text" class="form-control" id="s_url_7" value="">
										</div>
										<div class="form-group">
										  <label for="comment">Comment:</label>
										  <textarea class="form-control" rows="5" id="s_c_8"></textarea>
										</div>
										<div class="form-group">
											<label>Logo: </label>
											<input type="file" class="form-control-file" name="file" id="s_img_9">
										</div>
									</form>
								</div>

							</div>
							<!-- BODY -->
							
							<div class="panel-footer text-right" >
								<button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
								<button id="newSource" class="btn btn-success" style="padding-left: 60px; padding-right: 60px">Crea</button>
							</div>
							<div id="answerHtml2"></div>
				</div>
				<!-- /.col-lg-12 -->
			</div>


		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	
		
<script>
	
	/*
		0 = label Goal
		1 = label New
		2 = label Edit
	*/
	var labelOperation = 0; 
	
	
	
	$( "#newSource" ).click( function () {
			

			var datiForm = new FormData();
		
			alert($("#s_np_1").val());
		
			datiForm.append( 'np1', $("#s_np_1").val() );
			datiForm.append( 'ns2', $("#s_ns_2").val() );
			datiForm.append( 'f3', $("#s_f_3").val() );
			datiForm.append( 'e4', $("#s_e_4").val() );
			datiForm.append( 'es5', $("#s_es_5").val() );
			datiForm.append( 'ts6', $("#s_ts_6").val() );
			datiForm.append( 'url7', $("#s_url_7").val() );
			datiForm.append( 'c8', $("#s_c_8").val() );
			datiForm.append( 'img9', $("#s_img_9")[ 0 ].files[ 0 ]  );
			
		
			$.ajax( {
						url: "../../core/control/c_newSource.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							
							$('#answerHtml2').html(risposta);
							
							// imposto un refresh di pagina dopo 60 secondi

							/*setTimeout( function () {
								window.location.reload()
							}, 1000 );
							*/
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
		 	  
		$('#oldLabel select').on('change', function() {
			  val = $(this).find(":selected").val();
			  id = val.substring(0, val.indexOf("_"));	 
			  color = val.substring(val.indexOf("_")+1);
			
			  text = $(this).find(":selected").text();
		      
			  $("#gm_NameEditLabel").val(text);
			  
			  selectorColor = '#divEditLabel option[value=' + color + ']';
			  $(selectorColor).attr('selected','selected');
			  
		});
	
</script>
	
<?php include_once("footerlinkscript.html")?>
	

</body>

</html>
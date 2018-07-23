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
					<h1 class="page-header">Nuovo articolo</h1>
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
										  <label for="sel1">Fonte</label>
										  <select class="form-control" id="a_f_1">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										  </select>
										</div>
										
										<div class="form-group">
										  <label for="sel1">Categoria</label>
										  <select class="form-control" id="a_c_2">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										  </select>
										</div>
										
										<div class="form-group">
											<label for="usr">Titolo</label>
											<input type="text" class="form-control" id="a_t_3" value="">
										</div>
										
										<div class="form-group">
											<label>Logo: </label>
											<input type="file" class="form-control-file" name="file" id="a_l_4">
										</div>
										
										<div class="form-group">
											<label for="comment">Data articolo</label>
											<input id="a_da_5" type="date"></input>
										</div>
										<div class="form-group">	
											<textarea id="a_d_6" style="width: 100%; height: 200px" name="comment" form="usrform"></textarea>
												<script>

													$('#p_description').trumbowyg({

														lang: 'it'
													});	
												</script>
										</div>	
										<div class="form-group">	
											<label>3 righe di anteprima</label>
											<textarea id="a_ant_7" style="width: 100%; height: 50px" name="comment" form="usrform"></textarea>
										</div>
										<div class="form-group">
											<label for="comment">Url</label>
											<textarea class="form-control" rows="1" id="a_url_8"></textarea>
										</div>
										
									</form>

									<div class="form-group">
										<div style="padding: 20px" class="text-center">
											<div class="row">
												<div class="col-lg-3">
													<span id="label_slider_Y">Yourself</span>
												</div>
												<div class="col-lg-9">
													<div class="slidecontainer">
														<input type="range" min="-10" max="10" value="0" class="slider" id="a_y_9">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-3">
													<span id="label_slider_C">Career</span>
												</div>
												<div class="col-lg-9">
													<div class="slidecontainer">
														<input type="range" min="-10" max="10" value="0" class="slider" id="a_c_10">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-3">
													<span id="label_slider_R">Relationship</span>
												</div>
												<div class="col-lg-9">
													<div class="slidecontainer">
														<input type="range" min="-10" max="10" value="0" class="slider" id="a_r_11">
													</div>
												</div>
											</div>
						

										</div>
									</div>
								</div>

							</div>
							<!-- BODY -->
							
							<div class="panel-footer text-right" >
								<button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
								<button id="newArticle" class="btn btn-success" style="padding-left: 60px; padding-right: 60px">Crea</button>
							</div>
							
							
							<!-- ADD GOAL -->
							<div class="row">
								<hr>
								<h3>AGGIUNGI OBIETTIVI ALL'ARTICOLO</h3>
							</div>
								
							<div class="row well-sm">
								
								<div class="col-lg-7">
									<div class="form-group">
									  <label for="sel1">Obiettivo 1</label>
									  <select class="form-control" id="obj1">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									  </select>
									</div>
									
									
									
									
									<button type="button" class="btn btn-default">SALVA</button>	
								</div>
							</div>	
							<div class="row well-sm">
								
								<div class="col-lg-7">
									<div class="form-group">
									  <label for="sel1">Obiettivo 2</label>
									  <select class="form-control" id="obj2">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									  </select>
									</div>
									
								
									
									<button type="button" class="btn btn-default">SALVA</button>	
								</div>
							</div>
							<div class="row well-sm">
								
								<div class="col-lg-7">
									<div class="form-group">
									  <label for="sel1">Obiettivo 3</label>
									  <select class="form-control" id="obj3">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									  </select>
									</div>
									
									
									
									
									<button type="button" class="btn btn-default">SALVA</button>	
								</div>
							</div>
							
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
	
		
	$( "#newArticle" ).click( function () {
			
			var datiForm = new FormData();
			
		
			datiForm.append( 'f1', $("#a_f_1").val() );
			datiForm.append( 'c2', $("#a_c_2").val() );
			
			datiForm.append( 't3', $("#a_t_3").val() );
			datiForm.append( 'l4', $("#a_l_4").val() );
			
			datiForm.append( 'da5', $("#a_da_5").val() );
			datiForm.append( 'd6', $("#a_d_6").val() );
			datiForm.append( 'ant7', $("#a_ant_7").val() );
			datiForm.append( 'url8', $("#a_url_8").val() );
			
			datiForm.append( 'y9', $("#a_y_9").val() );
			datiForm.append( 'c10', $("#a_c_10").val() );
			datiForm.append( 'r11', $("#a_r_11").val() );
				
			datiForm.append( 'obj1', $("#obj1").val() );
			datiForm.append( 'obj2', $("#obj2").val() );
			datiForm.append( 'obj3', $("#obj3").val() );
				
		
		    //idGoal = $( this ).attr( "id" );
			//$("#modalGoal .modal-title").html("Ciao");	
			$.ajax( {
						url: "../../core/control/c_newArticle.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							
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
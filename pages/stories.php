<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>I am brand | Articoli </title>

	<?php include_once("headerlink.php"); ?>
	<?php include_once("include_core.php"); ?>
	
	<style>
	
		.article img{
			width: 100%;
			height: 200px;
		} 
		
		.article .panel-body-articles{
			height: 140px;
			overflow: hidden;
		}
		
		.article .panel-heading{
			background-color: #020278;
			font-size: 12px;
			height: 24px;
		}
		
		.article a{
			color: #020278;
		}
		
		.article .panel-footer{
			padding: 5px 10px;
    		background-color: #f8f8f8;
			height: 115px;
		}
		
		.tab-content .row{
			padding-bottom: 20px;
		}
		
		.article ul {
			list-style-type: none;
			margin-left: -30px;
		}
		
		.article .panel-heading a {
			color: black;
		}
		.article:hover{
			cursor: pointer;
		}
		
		
		.article img{
			width: 100%;
			height: 250px;
		}
	</style>
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
	$array_stories = $manager->getStoriesByUser($idUser);
	
?>

<body>
	
	<script>
		$( ".modal-wide" ).on( "show.bs.modal", function () {
			var height = $( window ).height() - 200;
			$( this ).find( ".modal-body" ).css( "max-height", height );
		} );
	</script>

	<div id="wrapper">

		<?php include_once("nav.php"); ?>

		<div id="page-wrapper">
		
		
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header color-career">Le tue storie <button id="sendInvestitors" style="padding-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						Crea storia
					</button></h1>
					
				</div>
				<!-- /.col-lg-12 -->
			</div>
			
			<div class="content">
				
					<?php
				
						$my_stories = $manager->getStoriesByUser($idUser);	
						$max = sizeof( $my_stories );
						if(is_int($my_stories)){
							if($my_stories==-1) echo "<h5>Non c'è nessuna storia della community</h5>";
						}else
						for($i=0; $i<$max; $i++){  
					?>
				
					<div class="col-lg-4">
							
							<div id="<?php echo $my_stories[$i]->id ?>" class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">
										Scritte da te
									</a>
								</div>

								<img src="<?php echo '../image/' . $my_stories[$i]->urlPhoto; ?>" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4><?php echo $my_stories[$i]->title ?></h4>
									<p><?php echo $my_stories[$i]->description ?></p>
									
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-left">
									<ul>
										<li><strong>Completato:</strong> No</li>
										<li><strong>Solo lettura:</strong> Si</li>
										<li><strong>Visite:</strong> 4.324</li>
										<li><strong>Followers:</strong> 754</li>
										<li><strong>Valore:</strong> §2756,00</li>
									</ul>
								</div>
							</div>
						</div>
						
					 <?php
						}
				
					 ?>		
						
			 </div>
			
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header color-career">Le storie della community </h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			
			
			<div class="content">
				
					<?php
				
						$community_stories = $manager->getStoriesCommunity($idUser);	
						$max = sizeof( $community_stories );
						if(is_int($community_stories)){
							if($community_stories==-1) echo "<h5>Non hai scritto nessuna storia</h5>";
						}else {
						for($i=0; $i<$max; $i++){ 
							
					?>
				
					<div class="col-lg-4">
							
							<div id="<?php echo $community_stories[$i]->id ?>" class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">
										Scritte da <?php echo $community_stories[$i]->idUser; ?>
									</a>
								</div>

								<img src="<?php echo '../image/' . $community_stories[$i]->urlPhoto; ?>" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4><?php echo $community_stories[$i]->title ?></h4>
									<p><?php echo $community_stories[$i]->description ?></p>
									
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-left">
									<ul>
										<li><strong>Completato:</strong> No</li>
										<li><strong>Solo lettura:</strong> Si</li>
										<li><strong>Visite:</strong> 4.324</li>
										<li><strong>Followers:</strong> 754</li>
										<li><strong>Valore:</strong> §2756,00</li>
									</ul>
								</div>
							</div>
						</div>
						
					 <?php
						}
						}	
					 ?>				
			 </div>
			
			
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel"> </h3>

				</div>
				<div class="modal-body">
				
						
					  <div class="form-group">
						<label for="story_title" >Titolo</label> 
						<div>
						  <input id="story_title" name="story_title" placeholder="Titolo" type="text" class="form-control">
						</div>
					  </div>
					  <div class="form-group">
						<label for="story_description" class="control-label ">Descrizione</label> 
						<div >
						  <textarea id="story_description" name="story_description"  rows="3" class="form-control"></textarea>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="story_investitor" class="control-label">Permetti agli utenti di partecipare alla tua storia come investitori?</label> 
						<div>
						  <label class="radio-inline">
							<input type="radio" checked name="story_investitor" value="si">
								  si
						  </label>
						  <label class="radio-inline">
							<input type="radio" name="story_investitor" value="no">
								  no
						  </label>
						</div>
					  </div> 
					  
					  <div class="form-group">
						<label for="story_public" class="control-label">Pubblica o privata? </label> 
						<div>
						  <label class="radio-inline">
							<input type="radio" checked name="story_public" value="si">
								  si
						  </label>
						  <label class="radio-inline">
							<input type="radio" name="story_public" value="no">
								  no
						  </label>
						</div>
					  </div> 
					  
					 <div class="form-group">
						 <label for="exampleFormControlFile1"></label>
							<input type="file" class="form-control-file" name="file" id="story_urlImg">
					 </div> 						
											
				</div>
				
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
					<button id="saveStory" type="button" class="btn btn-primary">Salva nel database</button>
					<div id="risposta"></div>
				</div>

			</div>
		</div>
	</div>
		
	<script>
		$( ".panel" ).click( function () {

			$(this).attr("id");
			window.location.href = 'dashboard.php' + '?idStory=' + $(this).attr("id"); 
		} )
		
		$('input[type=radio][name=story_investitor]').change(function() {
			
			if (this.value == 'si') {
				//alert("Si!");
			}
			else if (this.value == 'no') {
				//alert("No!");
			}
			
		});
		
		$('input[type=radio][name=story_public]').change(function() {
			
			if (this.value == 'si') {
				//alert("Si!");
			}
			else if (this.value == 'no') {
				//alert("No!");
			}
			
		});
		
		$( document ).ready( function () {
			$( "#saveStory" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();
					
					datiForm.append( 'title', $( "#story_title" ).val() );
					datiForm.append( 'description', $( "#story_description" ).val() );
					
					datiForm.append( 'urlMedia', $( "#story_urlImg" )[ 0 ].files[ 0 ] );
					
					datiForm.append( 'investitorUser', $('input[type=radio][name=story_investitor]:checked').val()  );
					datiForm.append( 'publicStory', $('input[type=radio][name=story_public]:checked').val()  );
					//datiForm.append( 'type', $( "#p_type" ).val() );

					$.ajax( {
						url: "../core/control/newStory.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							alert(risposta);
							//$( "#risposta" ).html( risposta );
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

				} //function click
			);

		} );

		
	</script>
	<?php include_once("footerlinkscript.html")?>


</body>

</html>
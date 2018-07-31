	<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-clock-o fa-fw"></i> NEWS
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<ul class="timeline">

								
								<li class="timeline-inverted">
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel">

										<div class="timeline-heading">
											<span class="info"><span class="fa fa-info-circle"></span> Crea due post giornalieri ore 21-08</span>

											<h4 class="timeline-title" style="width: 100%; margin-top: 3px">NUOVA NEWS</h4>
											
											<input id="p_title" type="text" style="width: 100%; margin-top: 3px" placeholder="TITOLO" name="usrname">
											
											<input id="p_subTitle" type="text" style="width: 100%; margin-top: 10px" placeholder="SOTTOTITOLO" name="usrname">
											
											<br>
											<label for="exampleFormControlFile1"></label>
											<input type="file" class="form-control-file" name="file" id="p_urlMedia">
											
											<br>
										</div>

										<div class="timeline-body">

											<textarea id="p_description" style="width: 100%; height: 200px" name="comment" form="usrform"></textarea>
											<script>
												$( '#p_description' ).trumbowyg( {
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
											<div style="padding: 20px" class="text-center">

												<div class="row">
													<div class="col-lg-3">
														<span id="label_slider_Y">Yourself</span>
													</div>
													<div class="col-lg-9">
														<div class="slidecontainer">
															<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeYourself">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														<span id="label_slider_C">Career</span>
													</div>
													<div class="col-lg-9">
														<div class="slidecontainer">
															<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeCareer">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														<span id="label_slider_R">Relationship</span>
													</div>
													<div class="col-lg-9">
														<div class="slidecontainer">
															<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeRelationships">
														</div>
													</div>
												</div>



											</div>

										</div>

										<!-- Button trigger modal -->
										<button id="sendInvestitors" style="padding-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  PUBBLICA NOTIZIA
										</button>
									




									</div>
								</li>
								<!--										
									################################################
												     PRINT POSTS
									################################################
								-->
								<?php
								//include( "../core/manager/Manager.php" );
								//include( "../core/manager/MyLifeManager.php" );

								$array_post = $manager->getPosts( $idUser, $idStory );
								$max = sizeof( $array_post );
								
								if($hasPost==1) 								
								for ( $i = 0; $i < $max; $i++ ) {

									?>

								<li <?php if($i%2!=0) echo 'class="timeline-inverted"'; ?>>
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel news-print" id="<?php echo $array_post[$i]->id;	?>">
										<div class="timeline-heading">
											<p class="timeline-title text-left">
												<?php echo strtoupper($array_post[$i]->title);	?>
											</p>
											<p class="timeline-subTitle text-left">
												<?php echo strtoupper($array_post[$i]->subtitle);	?>
											</p>
											
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 
											<?php echo $array_post[$i]->datePost; ?></small>
											</p>

											<img src="<?php echo '../image/' . $array_post[$i]->idUser . '/diario/' .  $array_post[$i]->urlMedia; ?>" style="width: 100%; height: auto" alt=""/>
										</div>
										
										<div class="timeline-body" style="padding-top: 5px">

											<?php echo $array_post[$i]->description; ?>

										</div>
										<hr style="padding: 5px; margin: 5px">
										<?php
											$percentage = $array_post[$i]->percentage;
											$lifeCareer = $array_post[$i]->lifeCareer;
											$lifeRelationships = $array_post[$i]->lifeRelationships;
											$lifeYourself = $array_post[$i]->lifeYourself;
										?>
										
										<div class="row">
											<div class="col-lg-6">
												
												<!--
												<span class="color-relationships">	
												-3
												<span class="fa fa-heart"> 
												</span>
												</span>	
												+5
												<span class="fa fa-cogs"> 
												</span>
												</span>
												<span class="color-yourself">	
												+9
												<span class="fa fa-eye"> 
												</span>
												</span>
												-->
												
												<?php if($lifeRelationships!=0){		
												?>
													<span class="fa fa-heart color-relationships">
													<?php 
														if($lifeRelationships>0)
															echo "+";
											
															echo $lifeRelationships; 
													?>
													</span>
												<?php 
												}
												?>

												<?php if($lifeCareer!=0){				
												?>
												<span class="fa fa-cogs color-career"><?php
													
													if($lifeCareer>0)
													echo "+";
													echo $lifeCareer;
													
													?> </span>
												<?php 
												}
												?>

												<?php if($lifeYourself!=0){				
												?>
												<span class="fa fa-eye color-yourself"><?php
													
													if($lifeYourself > 0)
													echo "+";
													echo $lifeYourself; 
													
													?> </span>
												<?php 
												}
												?>
											</div>
											<div class="col-lg-6 text-right">
												<span style="font-size: 20px; font-weight: 700; padding-left: 20px">  
												<?php 
													if($percentage>0)
														echo "+" . $percentage . "%"; 
													else echo $percentage . "%"; 

												?></span>
											</div>	
										</div>
										
										
									</div>
								</li>

								<?php

								}

								?>

							</ul>

						</div>
						<!-- /.panel-body -->
					</div>
					
				 <!-- ----- BEGIN MODAL ----- -->
					<div id="modalNews" class="modal fade" role="dialog">

					</div>
				<!-- ----- END MODAL ----- -->
				
			
		<script>
	
	
		
		$( ".news-print" ).click( function () {
			
			
			var datiForm = new FormData();
			datiForm.append( 'idNews', $( this ).attr( "id" ) );
			
			//idGoal = $( this ).attr( "id" );
			//$("#modalGoal .modal-title").html("Ciao");
			
			$.ajax( {
						url: "../core/control/getModalNews.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							//alert(risposta);
							$( "#modalNews" ).html( risposta );
							$( "#modalNews" ).modal( 'show' );
							
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
				
					} );
			
		} );


</script>
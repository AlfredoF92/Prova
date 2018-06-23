<!DOCTYPE html>
<html lang="en">

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

	<!--										
		################################################

					  MODAL INVESTITORS

		################################################							
	-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" style="align-content: center; margin-left: 40%" id="exampleModalLabel">Investitori</h3>

				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="comment">Un commento per gli investitori</label>
						<textarea class="form-control" rows="1" id="p_commentUser"></textarea>
					</div>


					<div class="row">
						<div class="col-lg-2">
							<span>Come ti senti?</span>
						</div>

						<div class="col-lg-5">
							<div class="slidecontainer-mood">
								<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeMood">
							</div>
						</div>
						<div class="col-lg-5">
							<span id="answer-mood">Mi sento una merda. Ok?</span>

						</div>

					</div>
					<hr>
					<img class="center-block" src="../image/1/image/investitori.jpg" width="250" height="250" alt=""/>

					<div class="row">
						<div class="col-lg-4">
							<span>Valuta la tua giornata: %</span>
						</div>

						<div class="col-lg-8">
							<div class="slidecontainer-mood">
								<input type="range" min="-10" max="10" value="0" class="slider" id="p_percentage">
							</div>
						</div>

					</div>

					<div class="row" style="padding-top: 20px">

						<div class="col-lg-4">
							<span>"Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. "</span>
						</div>
						<div class="col-lg-4">
							<span>"Ut enim ad minim veniam! amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna"</span>
						</div>
						<div class="col-lg-4">
							<span>"Ut enim ad minim veniam! Ut enim ad minim veniam!"</span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
					<button id="save_in_database" type="button" class="btn btn-primary">Salva nel database</button>
					<div id="risposta"></div>
				</div>

			</div>
		</div>
	</div>
	<!-- MODAL INVESTITOR -->






	<div id="wrapper">

		<?php include_once("nav.php") ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<?php echo "Ciao, " . $nomeUtente;	?>
					</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<?php include_once("fourRectangle.php") ?>

			<!--								
				################################################
										
						      		GOAL
															
				################################################		
			-->


			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-tasks fa-fw"></i> Obiettivi
							<button class="btn btn-xs btn-default" >Crea obiettivo</button>
						</div>

						<?php include_once("goalModal.php"); ?>
					</div>
					<!-- .panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->


			<!--										
				################################################
										
						      CHART INVESTITORS
															
				################################################
									
			-->
			<div class="row">
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
							<div class="pull-right">
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
								
									<ul class="dropdown-menu pull-right" role="menu">
										<li><a href="#">Action</a>
										</li>
										<li><a href="#">Another action</a>
										</li>
										<li><a href="#">Something else here</a>
										</li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div id="myfirstchart" style="height: 250px;"></div>

							<?php include_once("graphicInvestitor.php"); ?>
						</div>
						<!-- /.panel-body -->
					</div>

					<!--										
						################################################

									  PANEL NEW POSTS

						################################################
					-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<ul class="timeline">

								<li class="timeline-inverted">
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">Titolo</h4>

											<input id="p_title" type="text" style="width: 100%" name="usrname"><br>
											<label for="exampleFormControlFile1"></label>
											<input type="file" class="form-control-file" name="file" id="p_urlMedia">
											<br>
										</div>

										<div class="timeline-body">

											<textarea id="p_description" style="width: 100%; height: 200px" name="comment" form="usrform"></textarea>

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
										<button style="padding-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  Invia agli investitori
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

								$array_post = $manager->getPosts( $idUser );
								$max = sizeof( $array_post );

								for ( $i = 0; $i < $max; $i++ ) {

									?>

								<li <?php if($i%2!=0) echo 'class="timeline-inverted"'; ?>>
									<!-- <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div> -->

									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title">
												<?php echo $array_post[$i]->title;	?>
											</h4>
											<p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
											</p>

											<img src="<?php echo '../image/' . $array_post[$i]->idUser . '/diario/' .  $array_post[$i]->urlMedia; ?>" style="width: 100%; height: auto" alt=""/>

										</div>
										<div class="timeline-body">
											<p>
												<?php echo $array_post[$i]->description; ?>
											</p>
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
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-8 -->
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bell fa-fw"></i> Notifications Panel
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="list-group">
								<a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
							



								<a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
							



								<a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
							



								<a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
							


								<a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
							






								<a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
							






								<a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
							






								<a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
							






								<a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
							






							</div>
							<!-- /.list-group -->
							<a href="#" class="btn btn-default btn-block">View All Alerts</a>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
						</div>
						<div class="panel-body">
							<div id="morris-donut-chart"></div>

							<script>
								Morris.Donut( {
									element: 'morris-donut-chart',
									data: [ {
										label: "Career",
										value: 25
									}, {
										label: "Yourself",
										value: 50
									}, {
										label: "Relationship",
										value: 25
									} ],
									backgroundColor: '#ccc',

									colors: [

										'#231ba8',
										'#28a91c',
										'#aa1d1d'
									]

								} );
							</script>

							<a href="#" class="btn btn-default btn-block">View Details</a>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
					<div class="chat-panel panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-comments fa-fw"></i> Chat
							<div class="btn-group pull-right">
								<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
							



								<ul class="dropdown-menu slidedown">
									<li>
										<a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
									



									</li>
									<li>
										<a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
									



									</li>
									<li>
										<a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
									



									</li>
									<li>
										<a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
									



									</li>
									<li class="divider"></li>
									<li>
										<a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
									



									</li>
								</ul>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<ul class="chat">
								<li class="left clearfix">
									<span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
								

									<div class="chat-body clearfix">
										<div class="header">
											<strong class="primary-font">Jack Sparrow</strong>
											<small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
										
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
										</p>
									</div>
								</li>
								<li class="right clearfix">
									<span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
								

									<div class="chat-body clearfix">
										<div class="header">
											<small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
										

											<strong class="pull-right primary-font">Bhaumik Patel</strong>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
										</p>
									</div>
								</li>
								<li class="left clearfix">
									<span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
								


									<div class="chat-body clearfix">
										<div class="header">
											<strong class="primary-font">Jack Sparrow</strong>
											<small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
										


										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
										</p>
									</div>
								</li>
								<li class="right clearfix">
									<span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
								

									<div class="chat-body clearfix">
										<div class="header">
											<small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
										

											<strong class="pull-right primary-font">Bhaumik Patel</strong>
										</div>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
										</p>
									</div>
								</li>
							</ul>
						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
							<div class="input-group">
								<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..."/>
								<span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
							
							</div>
						</div>
						<!-- /.panel-footer -->
					</div>
					<!-- /.panel .chat-panel -->
				</div>
				<!-- /.col-lg-4 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php include_once("footerlinkscript.html")?>
	
	<!-- CARICA IMAGIEN-->
	<script>
		$( function () {
			$( "#select" ).click(
				function () {
					$( "#file" ).get( 0 ).click();
					return false;
				}
			);

		} );

		//$('#gm_idlabel').change(function() { alert($(this).val()); });
		
		$( document ).ready( function () {
			$( "#save_in_database" ).click(
				function () {
					//Creazione di un oggetto FormData…
					var datiForm = new FormData();

					datiForm.append( 'title', $( "#p_title" ).val() );
					//datiForm.append( 'subtitle', $( "#p_subtitle" ).val() );
					datiForm.append( 'description', $( "#p_description" ).val() );
					datiForm.append( 'urlMedia', $( "#p_urlMedia" )[ 0 ].files[ 0 ] );
					datiForm.append( 'commentUser', $( "#p_commentUser" ).val() );
					//datiForm.append( 'commentInvestitors', $( "#p_commentInvestitors" ).val() );
					datiForm.append( 'percentage', $( "#p_percentage" ).val() );
					datiForm.append( 'lifeMood', $( "#p_lifeMood" ).val() );
					datiForm.append( 'lifeCareer', $( "#p_lifeCareer" ).val() );
					datiForm.append( 'lifeRelationships', $( "#p_lifeRelationships" ).val() );
					datiForm.append( 'lifeYourself', $( "#p_lifeYourself" ).val() );
					//datiForm.append( 'type', $( "#p_type" ).val() );

					$.ajax( {
						url: "../core/control/addDay.php",
						type: 'POST', //Le info testuali saranno passate in POST
						data: datiForm, //I dati, forniti sotto forma di oggetto FormData
						cache: false,
						processData: false, //Serve per NON far convertire l’oggetto
						//FormData in una stringa, preservando il file
						contentType: false, //Serve per NON far inserire automaticamente
						//un content type errato
						success: function ( risposta ) {
							$( "#risposta" ).html( risposta );
							// imposto un refresh di pagina dopo 60 secondi

							
							/*setTimeout( function () {
								window.location.reload()
							}, 1000 );*/
							
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					} );

				} //function click
			);
		
		});

		
	</script>



</body>

</html>
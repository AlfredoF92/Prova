<!--										
		################################################
					  MODAL INVESTITORS
		################################################							
	-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">La notizia è su tutti i giornali! Gli investitori valuteranno la tua notizia a breve.</h3>

				</div>
				<div class="modal-body">

									
					<div id="imgInvestitor">
						<span class="newsTitle">Ciao</span>
						<span class="title">Ciao</span>
						<span class="description">Ciao</span>
						<div id="commentsInvestitors" class="row" >
							<div>
								<span id="comment1">"Sei un buon annulla!"</span>
							</div>
							<div>
								<span id="comment2">"Vaffanculo! Non investirò mai più su di te. "</span>
							</div>
							<div >
								<span id="comment3">"Ottimo amico. Vai avanti così."</span>
							</div>
						</div>
						
						<img class="center-block" src="../image/demo/Fumetto_Investitore_05.jpg" width="100%" height="auto" alt=""/>
						
					</div>

					<hr>	
					<div class="row">
					
						<div class="col-lg-4">	
						<div class="form-group">
							<textarea class="form-control" rows="1" style="height:80px" id="p_commentUser" placeholder="Lascia un commento per gli investitori"></textarea>
						</div>

						
							
						<div class="row" style="display: none">
							<div class="col-lg-2">
								<span>Umore</span>
							</div>

							<div class="col-lg-5">
								<div class="slidecontainer-mood">
									<input type="range" min="-10" max="10" value="0" class="slider" id="p_lifeMood">
								</div>
							</div>
							<div class="col-lg-5">
								<span id="answer-mood">0</span>

							</div>

						</div>
						</div>
					
					
					
						<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<span>Aumenta/diminuisci il tuo valore societario: %</span>
							</div>

							<div class="col-lg-12">
								<div class="slidecontainer-mood">
									<input type="range" min="-12" max="12" value="0" class="slider" id="p_percentage">
								</div>
							</div>
							<div class="col-lg-12 text-right">
								<span id="dayPercentageSpan" style="font-size: 50px">0%</span>
							</div>
						</div>

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
	
	<script>

		$("#p_percentage").change(function(){
		
			$("#dayPercentageSpan").text($("#p_percentage").val() + "%");
		})
	
	</script>
	
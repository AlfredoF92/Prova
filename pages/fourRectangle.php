<?php 
				
				

				$cdate = mktime(0, 0, 0, 12, 31, 2018);
				$today = time();
				$difference = $cdate - $today;
				if ($difference < 0) { $difference = 0; }
				/*echo "There are ". floor($difference/60/60/24)." days remaining" . "<br>";
				echo "There are ". floor($difference/60/60/24/7)." weeks remaining" . "<br>";
				echo "There are ". floor($difference/60/60/24/7/4)." mounths remaining" . "<br><br>";
				*/
				$weeks = floor($difference/60/60/24/7);
				$mounths = floor($difference/60/60/24/7/4);
				$days = floor($difference/60/60/24);
			?>
			
			<script>
				function nextDate( dayIndex ) {
					var today = new Date();
					today.setDate( today.getDate() + ( dayIndex - 1 - today.getDay() + 7 ) % 7 + 1 );
					return today;
				}
				var currentdate = new Date();	
				
				
			</script>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-rect-shadow panel-rect-1">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<!--<i class="fa fa-comments fa-5x"></i>-->
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">4</div>
									<div>Obiettivi in corso</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-rect-shadow panel-rect-2">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<!--<i class="fa fa-tasks fa-5x"></i>-->
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo "-" . $weeks; ?></div>
									<div>Settimane a fine anno.</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-rect-shadow panel-rect-3">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<!--<i class="fa fa-shopping-cart fa-5x"></i>-->
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">-7</div>
									<div>giorni per fine settimana</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-rect-shadow panel-rect-4">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
								<!--	<i class="fa fa-support fa-5x"></i>-->
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">-74</div>
									<div>Anni</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
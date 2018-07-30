<script>
	new Morris.Line( {
		// ID of the element in which to draw the chart.
		element: 'myfirstchart',
		// Chart data records -- each entry in this array corresponds to a point on
		// the chart.
		data: [

			<?php 
				
				$array_posts_ASC = $manager->getPercentage($idUser); 
				
				$value = 1000; 
				
				$max = sizeof($array_posts_ASC);
				
				for($i=0; $i<$max; $i++){
					
					$data = $array_posts_ASC[$i]->datePost;
					$percentage = $array_posts_ASC[$i]->percentage;
					$only_data = substr($data, 0, 10);
					$only_time = substr($data, 10, 18);
					
					$value = intval((($percentage/100) * $value)+$value); 
					$echodate = $only_data + $only_time; 
					
					if($i==$max-1){
						echo "{ year: '$only_data', value: $value } \n";
					}else 	echo "{ year: '$only_data', value: $value }, \n";
					
				} 
			
				/*
					echo "{ year: '2008-10-02', value: 100 },
					  { year: '2008-10-04', value: 110 },
					  { year: '2008-10-05', value: 150 },
					  { year: '2008-10-05', value: 142 },";
				*/
			?>
			
			/*
			######################
			
			FUNZIONE HOVERCALLBACK DA RIVEDERE, ERRORE ASSURDO
			
			######################
			hoverCallback: function ( index, options, content, row ) {

			var s = index;
			var cars = [
			*/
	<?php 
		/*
		//$posts = $myLife_manager->myLifeManager();

		for($i=0; $i<$max; $i++){

			//$data = $array_posts_ASC[$i]->data;


			$title = $array_posts_ASC[$i]->title;
			$percentage = $array_posts_ASC[$i]->percentage;


			if ($array_posts_ASC[$i]->urlMedia == ""){

			$url = ' ' ;

			}else $url = '<img src="../image/' . $idUser . "/diario/" .  $array_posts_ASC[$i]->urlMedia . "\"" . ' style="width: 50px; height: 50px" alt=""/>' ;

			$div = "'<a href=\" \">" . "<span>$title </span>" . "<br>" . $url . "<br>" . "<span> $percentage </span></a>'"  . ", \n\n";

			if($i==$max-1){

				echo substr($div, 0, strlen($div)-2);

			}else {

				echo $div;
			}
		} */
	  ?>
			/*	
			];



			return cars[ index ];
			######################
			
			FUNZIONE HOVERCALLBACK DA RIVEDERE, ERRORE ASSURDO
			
			######################
		}*/
			
		],

		// The name of the data record attribute that contains x-values.
		xkey: 'year',
		// A list of names of data record attributes that contain y-values.
		ykeys: [ 'value' ],
		// Labels for the ykeys -- will be displayed when you hover over the
		// chart.
		labels: [ 'Percentuale' ],
		parseTime: false,
		
	} );
</script>

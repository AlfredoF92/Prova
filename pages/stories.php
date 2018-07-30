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
					<h1 class="page-header color-career">Le tue storie </h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			
			
			<div class="content">
					<div class="col-lg-4">
							
							<div id="6" class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/2018-07-30-00-55-16.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
			</div>
			
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header color-career">Le storie della community </h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			
			
			<div class="content">
					<div class="row">
					
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/2018-07-30-00-55-16.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
						
						
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/18wcpista12.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
						
						
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/maxresdefault.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
					</div>
					<div class="row">
					
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/Catturaeeetrtttrt_MGZOOM.JPG"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/casal-2368560_640.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Scritta dall'utente ADMIN</a>
								</div>

								<img src="../image/stories/d9f5b54a-8515-4dbe-8b0d-1f6f75c708aa_large_p.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Obiettivo: laurea in Psicologia</h4>
									<p>Voglio condividere il mio obiettivo verso la laurea.Le mie giornate e i miei metodi di studio</p>
									
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
						
						
					</div>
			</div>
			
		


		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->


	<script>
		$( ".panel" ).click( function () {

			$(this).attr("id");
			window.location.href = 'stories_personal.php' + '?id=' + $(this).attr("id"); ;
		

		} )
	</script>
	<?php include_once("footerlinkscript.html")?>


</body>

</html>
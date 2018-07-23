<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <?php include_once("headerlink.php")?>
	<?php include_once("include_core.php")?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<?php
	session_start();
	session_destroy();
?>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <input id="email" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="login">Login</button>
                                <div id="risposta"></div>
                            </fieldset>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	
   
   	<?php include_once("footerlinkscript.html")?>

	<script>
		$( document ).ready( function () {
			$("#login").click(
				 function()
				 {	
					  //Creazione di un oggetto FormData…
					  var datiForm = new FormData();
					  //… aggiunta del nome…
					  datiForm.append('email',$("#email").val());
					 //… aggiunta del nome…
					  datiForm.append('password',$("#password").val());

					  $.ajax({
					   url: "../core/control/login.php",
					   type: 'POST', //Le info testuali saranno passate in POST
					   data: datiForm, //I dati, forniti sotto forma di oggetto FormData
					   cache: false,
					   processData: false, //Serve per NON far convertire l’oggetto
								//FormData in una stringa, preservando il file
					   contentType: false, //Serve per NON far inserire automaticamente
								//un content type errato
					   success: function ( risposta ) {
						   	
						   $( "#risposta" ).html(risposta);
						   
						    if(risposta==0){
								$( "#risposta" ).html("Username o password errati.");
							}
							else if(risposta==1){
								window.location.href = "http://localhost/iambrand/iambrand/pages/redirectLogin.php";

							}
						    // imposto un refresh di pagina dopo 60 secondi
							/*setTimeout(function() {
							  window.location.reload()
							}, 1000);*/
						},
						error: function () {
							alert( "Chiamata fallita!!!" );
						}
					  });

				 } //function click
			);	
		});
   	</script>
   	
</body>

</html>

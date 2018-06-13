/****************************************************************************************/
/*	html5upload.js																		*/
/*	Autore:		Max Kiusso - mc AT mkitec DOT it										*/
/*	Data:		2013 10 05																*/
/*																						*/
/* Copyright:	Questo codice Ã¨ protetto dai diritti d'autore come "opera d'ingegno"	*/
/*				in base alla legge n. 633/1941, legge n. 248/2000 e D.L. 68/2003		*/
/*				(direttiva europea 29/2001/CE).											*/
/*				E' vietato l'uso anche parziale di questo codice per qualsiasi motivo	*/
/*				se non preventivamente richiesto all'autore in forma scritta e ricevuto	*/
/*				consenso.																*/
/*				Ogni abuso verrÃ  perseguito a norma di legge.							*/
/****************************************************************************************/

$(function () {
	$("#select").click(
		function () {
			$("#file").get(0).click();
			return false;
		}
	);
	
	$("#file").change(
		function () {
			var files = $(this)[0].files;
			if ( ! files.length ) {
				$("#selected").html("Nessun file selezionato!");
			} else {
				var img = new Image();
				$( img ).load(
					function () {
						window.URL.revokeObjectURL( this.src );
						$("#selected").html( files[0].name + "<br />" + $(this)[0].naturalWidth + " x " + $(this)[0].naturalHeight + " @ " + Math.round( files[0].size / 1024 ) + " Kb" );
						$("#send").show();
						$("#select").addClass("mini");
					}
				).attr( "src" , window.URL.createObjectURL( files[0] ) );
				
				$("#thumb").html( img );
			}
		}
	);
	
	$("#send").click(
		function () {
			$(this).hide();
			$("#select").hide();
			$("#progressbar").show();
			
			var fd = new FormData();
			fd.append("file", $("#file")[0].files[0]);
			
			$.ajax({
				url: "../core/control/addDay.php"
				, type: "POST"
				, data: fd
				, dataType: "json"
				, processData: false
				, xhr: function () {
					var xhr = $.ajaxSettings.xhr();
					xhr.upload.addEventListener(
						"progress"
						, function ( evt ) {
							if ( evt.lengthComputable ) {
								$("#progressbar").attr({value: evt.loaded, max: evt.total});
							}
						}
						, false
					);
					
					return xhr;
				},
				
				success: function ( risposta ) {
					alert("Ciao");
					$( "#risposta" ).html( risposta );
					// imposto un refresh di pagina dopo 60 secondi
					/*setTimeout(function() {
					  window.location.reload()
					}, 1000);*/
				},
				error: function () {
					alert( "Chiamata fallita!!!" );
				}
				
			})
			.done(
				function( resp ) {
					$("#progressbar").hide();
					$("#selected").html( resp.status );
					$("#select").removeClass("mini").show();
					$("#progressbar").attr({value: "0", max: "100"});
				}
			);
		}
	);
});
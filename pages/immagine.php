
<!DOCTYPE html>
	<html>
		<head>
			<title>_ HTML5 Upload _ MK Internet Technology</title>
			<meta name='Author' content='Max Kiusso - mc AT mkitec DOT it' />
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<link rel='shortcut icon' href='http://mkitec.it/imgs/mk_logo.png' />
			<style type='text/css' >
			
			@font-face {
    font-family: 'MK';
    src: url('/inc/fonts/blairmditc-webfont.eot');
    src: url('/inc/fonts/blairmditc-webfont.eot?#iefix') format('embedded-opentype'),
         url('/inc/fonts/blairmditc-webfont.woff') format('woff'),
         url('/inc/fonts/blairmditc-webfont.ttf') format('truetype'),
         url('/inc/fonts/blairmditc-webfont.svg#BlairMdITCTTMedium') format('svg');
    font-weight: normal;
    font-style: normal;
    }
 
* {
    margin: 0;
    padding: 0;
    }
     
body {
    font: 10px MK;
    }
     
section#main {
    width: 270px;
    height: auto;
    margin: 100px auto;
    background: #ccc;
    border: 1px solid #000;
    position: relative;
    }
         
    div#thumb {
        margin: 10px;
        width: 250px;
        height: 250px;
        background: #fff;
        border: 1px solid #000;
        -webkit-box-shadow: 0px 0px 15px #444;
        box-shadow: 0px 0px 15px #444;
        position: relative;
        }
         
        div#thumb>img {
            max-width: 250px;
            max-height: 250px;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            }
         
    div#upload {
        text-align: center;
        margin: 10px;
        }
         
        progress#progressbar,
        button#send,
        form>input {
            display: none;
            }
         
        button#select {
            padding: 10px;
            font-size: 13px;
            font-family: MK;
            background: #2D8F00;
            color: #fff;
            border-radius: 10px;
            }
             
            button#select.mini {
                font-size: 10px;
                padding: 4px;
                border-radius: 6px;
                margin-top: 5px;
                }
             
        button#send {
            padding: 10px;
            font-size: 13px;
            font-family: MK;
            background: #CB6C00;
            color: #fff;
            border-radius: 10px;
            }
             
        div#selected {
            width: 100%;
            margin-bottom: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            }
			
			</style>
			<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
			<script type='text/javascript' src='../js/html5upload.js'></script>
		</head>
		<body>
			<section id='main'>
				<div id='thumb'></div>
				<div id='upload'>
					<form><input type='file' id='file' accept='image/*' /></form>
					<div id='selected'></div>
					<button id='send'>Invia immagine</button>
					<button id='select'>Seleziona immagine</button>
					<progress id='progressbar' max='100' value='0'></progress>
				</div>
			</section>
		</body>
	</html>
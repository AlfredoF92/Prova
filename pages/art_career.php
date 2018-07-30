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
			height: 180px;
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
    		background-color: #e7e7e7;
			height: 30px;
		}
		
		.tab-content .row{
			padding-bottom: 20px;
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

	<div id="tallModal" class="modal modal-wide fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">


					<div class="panel-footer-articles text-right">
						<!--<p class="fa fa-eye color-yourself"> +5 |</p>
						<p class="fa fa-cogs color-career"> +1 |</p>
						<p class="fa fa-heart color-relationships"> +2 </p>
						-->
						<button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 0px"> Chiudi </button>

					</div>

				</div>
				<div class="modal-body">
					<h1>Pensieri positivi: i 3 “vampiri” di cui devi liberarti per pensare positivo</h1>
					<p class="fonte">Da efficamente.com</p>
					<div class="post articolo_evidenza" id="post" style="position: relative;">

						<p>Possono i pensieri positivi aiutarci a vivere meglio e a raggiungere i nostri obiettivi? Ni…</p>
						<p><img class="alignnone size-full wp-image-20173 first" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi.jpeg" alt="pensieri positivi" width="240" height="240" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi.jpeg 355w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-240x240.jpeg 240w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-300x300.jpeg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-160x160.jpeg 160w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-260x260.jpeg 260w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-254x254.jpeg 254w" sizes="(max-width: 240px) 100vw, 240px" style="text-align-last: left">
						</p>
						<blockquote>
							<div class="bq_text">
								<p>“Non diventare mai un pessimista; un pessimista ha ragione più spesso di un ottimista, ma un ottimista si diverte di più, e nessuno dei due può fermare il corso degli eventi.”</p>
								<p style="text-align: right;">Robert Anson Heinlein.</p>
							</div>
							<div class="clearfix"></div>
						</blockquote>
						<p style="text-align: justify;">Io <em>odio</em> il <strong>Pensiero positivo</strong>.</p>
						<p style="text-align: justify;">Ammettilo, non te l’aspettavi questo <em>incipit</em> in un articolo dedicato ai <strong>pensieri positivi</strong> e al <strong>pensare positivo </strong>:-D</p>
						<p style="text-align: justify;">Il punto è che il <a href="https://it.wikipedia.org/wiki/Pensiero_positivo">Pensiero positivo</a> è una filosofia di vita, sviluppatasi agli inizi del ‘900, che invita i propri seguaci a cambiare la propria vita grazie a <em>pensieri positivi</em> e <em>affermazioni</em> da ripetere quotidianamente.</p>
						<p style="text-align: justify;">Peccato che ogni singolo studio che sia stato condotto su questa scuola di pensiero è giunto alla stessa conclusione: <em>il pensiero positivo è ‘na strunzata!</em>
						</p>
						<p style="text-align: justify;">Perché allora questo articolo su EfficaceMente?</p>
						<p style="text-align: justify;">Se<em> limitarsi</em> a pensare positivo e a ripetere come una cantilena delle affermazioni non serve ad una <em>cippa fritta</em>, questo non significa certo che dobbiamo avere un atteggiamento negativo o pensieri distruttivi per intraprendere il nostro percorso di crescita personale!</p>
						<p style="text-align: justify;">Per raggiungere i nostri obiettivi dobbiamo muovere le ciapet’ (agire).</p>
						<p style="text-align: justify;">Pensare positivo può stimolare l’<em>azione</em>. Al contrario, un atteggiamento negativo e pensieri distruttivi possono bloccarci.</p>
						<p style="text-align: justify;">Ecco perché in questo articolo ti parlerò dei <strong>3 “vampiri” mentali</strong> che stanno succhiando la tua energia e la tua positività e di come liberartene per mantenere i tuoi <em>pensieri positivi</em>.</p>
						<p style="text-align: justify;">Prima però una semplice domanda…</p>
						<p><span id="more-20104"></span>
						</p>
						<h2>Qual è la tua <em>tortura mentale</em> preferita?</h2>
						<p style="text-align: justify;"><a href="https://www.efficacemente.com/2015/04/antistress/">Stress</a>, frustrazione, tristezza, rabbia, <a href="https://www.efficacemente.com/2013/09/invidia/">invidia</a>, ansia, paura, gelosia, <a href="https://www.efficacemente.com/2014/06/come-aumentare-l-autostima/">autocommiserazione</a>…</p>
						<p style="text-align: justify;">Ognuno di noi ha la sua <em><strong>tortura mentale</strong></em>&nbsp;“preferita”.</p>
						<p style="text-align: justify;">Questi&nbsp;<em>schemi mentali ricorrenti</em>&nbsp;spesso dominano le nostre giornate e ci portano a vivere in un prolungato <strong>stato di sofferenza</strong>.</p>
						<p style="text-align: justify;">In questi periodi non c’è <strong><a href="https://www.efficacemente.com/2015/04/forza-di-volonta/">forza di volontà</a> </strong>o strategia di <strong>produttività</strong> che tenga.</p>
						<p style="text-align: justify;">Se vogliamo dunque tornare a lavorare sui nostri obiettivi con&nbsp;<em>positività</em> e <em>serenità </em>dobbiamo innanzitutto sbarazzarci di questi “<strong>tarli</strong>“<strong> mentali</strong>.</p>
						<p style="text-align: justify;">Sì, ma come?!</p>
						<p style="text-align: justify;">Andando alla radice delle numerose <em>torture mentali</em> che ci auto-infliggiamo scopriamo qualcosa di molto interessante: a farci soffrire sono 3 pensieri negativi dominanti, 3 veri e propri… “<strong>vampiri” mentali</strong>.</p>
						<p style="text-align: justify;"><em>Riconoscerli</em>, <em>conoscerli</em> e <em>neutralizzarli</em> è quello che faremo insieme nei prossimi minuti:</p>
						<h2>1. Il pensiero della <em>Privazione</em></h2>
						<p><img class="alignnone size-full wp-image-20180" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-privazione.jpeg" alt="pensieri-positivi-privazione" width="760" height="200" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-privazione.jpeg 760w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-privazione-300x79.jpeg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-privazione-390x103.jpeg 390w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-privazione-254x67.jpeg 254w" sizes="(max-width: 760px) 100vw, 760px">
						</p>
						<p style="text-align: justify;">Il pensiero della&nbsp;<em>Privazione</em> è il primo vampiro mentale di cui dobbiamo sbarazzarci se vogliamo tornare a <strong>pensare positivo</strong>.</p>
						<p style="text-align: justify;">Se focalizziamo infatti la nostra attenzione su ciò che abbiamo <em>perso </em>o che potremmo <em>perdere</em>, sarà per noi inevitabile soffrire.</p>
						<p style="text-align: justify;">Pensa ad esempio all’<em>amore</em>:</p>
						<ul style="text-align: justify;">
							<li>Se non fai altro che pensare ad un <strong>amore ormai perso</strong>, rischi di non essere mai pronto per vivere una nuova relazione.</li>
							<li>Se non fai altro che pensare di poter <strong>perdere il tuo amore</strong>, rischi di vivere in un perenne stato di gelosia che potrebbe portare alla fine della tua attuale relazione.</li>
						</ul>
						<p style="text-align: justify;">Che riguardi il passato o il futuro, il pensiero della <em>Privazione</em> è un subdolo bastardo. Ma non è il solo…</p>
						<h2>2. Il pensiero della <em>Sottrazione</em></h2>
						<p><img class="alignnone size-full wp-image-20181" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-sottrazione.jpg" alt="pensieri-positivi-sottrazione" width="760" height="200" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-sottrazione.jpg 760w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-sottrazione-300x79.jpg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-sottrazione-390x103.jpg 390w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-sottrazione-254x67.jpg 254w" sizes="(max-width: 760px) 100vw, 760px">
						</p>
						<p style="text-align: justify;">Il secondo “vampiro” mentale che in questo momento potrebbe farti soffrire o potrebbe bloccarti, è sicuramente il pensiero della <em>Sottrazione</em>.</p>
						<p style="text-align: justify;">Ovvero l’ossessione di aver <strong>meno</strong> degli altri o la paura che il futuro ti riservi <em>meno </em>opportunità, <em>meno</em> soldi, <em>meno</em> amore, <em>meno</em> gioia, <em>meno</em> successo, etc.</p>
						<p style="text-align: justify;"><strong>Invidia sociale</strong> e <strong>ansia per il nostro futuro</strong> sono i due sotto-prodotti più comuni del pensiero della <em>Sottrazione</em> e purtroppo la diffusione dei <em>social network</em> e delle <em>fake news</em> non fa altro che alimentare questo vampiro cerebrale.</p>
						<blockquote>
							<div class="bq_text">
								<p>“Quando butti m***a sul giardino degli altri lo fertilizzi. Cura il tuo.”</p>
								<p style="text-align: right;">Andrea Giuliodori.</p>
							</div>
							<div class="bq_share"><a href="https://twitter.com/share?url=https%3A%2F%2Fwww.efficacemente.com%2F2017%2F07%2Fpensieri-positivi%2F&amp;text=Quando+butti+m%2A%2A%2Aa+sul+giardino+degli+altri+lo+fertilizzi.+Cura+il+tuo.+Andrea+Giuliodori.+%40EfficaceMente" target="_blank" class="tweet"><span>Twittami</span></a><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.efficacemente.com%2F2017%2F07%2Fpensieri-positivi%2F&amp;quote=Quando+butti+m%2A%2A%2Aa+sul+giardino+degli+altri+lo+fertilizzi.+Cura+il+tuo.+-+Andrea+Giuliodori." target="_blank" class="fb_share"><span>Condividi</span></a>
							</div>
							<div class="clearfix"></div>
						</blockquote>
						<h2>3. Il pensiero della <em>Negazione</em></h2>
						<p><img class="alignnone size-full wp-image-20183" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-negazione.jpg" alt="pensieri-positivi-negazione" width="760" height="200" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-negazione.jpg 760w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-negazione-300x79.jpg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-negazione-390x103.jpg 390w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-negazione-254x67.jpg 254w" sizes="(max-width: 760px) 100vw, 760px">
						</p>
						<p style="text-align: justify;">Abbiamo infine il pensiero della <em>Negazione</em>.</p>
						<p style="text-align: justify;">Se siamo intimamente convinti che non potremo <strong>mai</strong> raggiungere un determinato obiettivo, o vivere una determinata esperienza, questo pensiero può letteralmente consumarci.</p>
						<p style="text-align: justify;">Se per esempio una <em>malattia</em>, una <em>disabilità</em> o un semplice <em>difetto fisico</em> ti hanno convinto che non potrai realizzare determinati traguardi, inevitabilmente questo ti porterà a soffrire.</p>
						<p style="text-align: center;">–</p>
						<p style="text-align: justify;">Scommetto che leggendo queste ultime righe si è accesa una lampadina nella tua testa e scommetto anche che tra i 3 vampiri mentali ce n’è uno che in questo momento ti sta succhiando via <em>serenità</em> e <em>positività</em>&nbsp;più degli altri.</p>
						<p style="text-align: justify;">Che a dominare i tuoi pensieri sia la <em>Privazione</em>, la <em>Sottrazione</em> o la <em>Negazione</em>, poco importa. Se non ti sbarazzi di questi schemi mentali ricorrenti, continuerai a soffrire.</p>
						<p style="text-align: justify;">Vediamo allora nell’ultima parte dell’articolo come tornare ad avere <strong>pensieri positivi</strong>.</p>
						<h2>Come tornare ad avere <em>pensieri positivi</em>: punto primo, ricorda che…</h2>
						<p style="text-align: justify;">Il <strong>pensiero</strong>, con cui spesso ci identifichiamo (e che genera in noi sofferenza), è in realtà un <em>prodotto automatico</em> della nostra attività cerebrale.</p>
						<p style="text-align: justify;">Come gran parte delle nostre attività fisiologiche, il pensiero si è sviluppato nel corso della nostra evoluzione per una specifica funzione: <em>ovvero aiutarci a risolvere problemi (problem-solving) per riuscire ad adattarci meglio all’ambiente circostante</em>.</p>
						<p style="text-align: justify;">Naturalmente, nel corso dei millenni l’attività cognitiva è diventata sempre più complessa, ma non voglio trasformare l’articolo in un trattato di neuroscienze.</p>
						<p style="text-align: justify;">Il messaggio che vorrei trasmetterti è che la <em>vocina</em> che ti senti ronzare in testa… in realtà non sei Tu, o meglio, è una <em>tua</em> funzione fisiologica, come può esserlo la <em>digestione</em>.</p>
						<p style="text-align: justify;">Ecco, imparare a <span style="text-decoration: underline;"><strong>NON identificarci</strong></span> con i nostri pensieri è il primo passo fondamentale per liberarci da quelli negativi.</p>
						<p style="text-align: justify;">Un ottimo strumento pratico per prendere consapevolezza della reale natura del nostro pensiero è la <strong>pratica meditativa</strong>.</p>
						<p style="text-align: justify;">Se ne hai sentito parlare, ma non hai mai ben capito di cosa si tratta o come funziona, ti consiglio di leggere questo articolo in cui spiego <strong><a href="https://www.efficacemente.com/2013/05/come-meditare/">come meditare</a></strong>.</p>
						<p style="text-align: justify;">Vediamo però ora il secondo passo per tornare ad avere <em>pensieri positivi</em>.</p>
						<h2>Cambia stazione radio!</h2>
						<p><img class="alignnone size-full wp-image-20185" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-radio.jpg" alt="pensieri-positivi-radio" width="760" height="200" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-radio.jpg 760w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-radio-300x79.jpg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-radio-390x103.jpg 390w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-radio-254x67.jpg 254w" sizes="(max-width: 760px) 100vw, 760px">
						</p>
						<p style="text-align: justify;">Se i nostri pensieri sono un <em>prodotto automatico</em> della nostra attività cerebrale, potremmo assimilarli a delle…&nbsp;<strong>trasmissioni radio</strong>.</p>
						<p style="text-align: justify;">Non siamo noi a decidere la <em>scaletta</em> di una trasmissione radio, ma possiamo sempre scegliere di… <em>cambiare stazione</em>!</p>
						<p style="text-align: justify;">Lo stesso vale per i nostri pensieri.</p>
						<p style="text-align: justify;">I pensieri della <em>Privazione</em>, della <em>Sottrazione</em> e della <em>Negazione</em> hanno la brutta abitudine di bussare al nostro cervello senza preavviso e di inondarlo per ore intere.</p>
						<p style="text-align: justify;">Ora che conosci i tuoi <strong>nemici</strong> e la loro <strong>natura</strong>, ti sarà molto più semplice individuarli sul nascere e spostare il tuo focus su pensieri diversi.</p>
						<p style="text-align: justify;">Tuttavia, “cambiare stazione” inizialmente ti richiederà uno <em>sforzo di&nbsp;volontà</em> non indifferente.</p>
						<p style="text-align: justify;">I pensieri negativi hanno infatti la stessa potenza del segnale di Radio Maria! :-D</p>
						<p style="text-align: justify;">Esiste però un “segnale” ancor più potente, ovvero una tipologia di <strong>pensieri positivi</strong> in grado di neutralizzare i pensieri di <em>Privazione</em>, <em>Sottrazione</em> e <em>Negazione</em> e di riportarci rapidamente ad uno stato privo di sofferenza…</p>
						<h2>Il potere dei pensieri di <em>gratitudine</em></h2>
						<p><img class="alignnone size-full wp-image-20188" src="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-gratitudine.jpg" alt="pensieri-positivi-gratitudine" width="760" height="200" srcset="https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-gratitudine.jpg 760w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-gratitudine-300x79.jpg 300w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-gratitudine-390x103.jpg 390w, https://www.efficacemente.com/wp-content/uploads/2017/07/pensieri-positivi-gratitudine-254x67.jpg 254w" sizes="(max-width: 760px) 100vw, 760px">
						</p>
						<p style="text-align: justify;"><em>Pensiero positivo, metafore sui segnali radio, gratitudine… OMMIODIO Andrea è stato posseduto da un guru Niu Eig!</em>
						</p>
						<p style="text-align: justify;">Ok, lo ammetto, se questo dovesse essere il tuo primo articolo letto su EfficaceMente, sarei un po’ preoccupato…</p>
						<p style="text-align: justify;">Sono anni però che porto avanti una <strong>filosofia di crescita personale</strong> molto concreta e basata sui più recenti studi di <em>neuroscienze</em>, <em>psicologia</em>, <em>scienze comportamental</em>i, etc. e questo articolo non fa eccezione.</p>
						<p style="text-align: justify;">Già <a href="https://www.efficacemente.com/2012/03/gratitudine/">in passato ti ho parlato del potere gratitudine</a>, fornendoti tutti i riferimenti scientifici necessari per approfondire questa affascinante tematica.</p>
						<p style="text-align: justify;">Ai fini di questo articolo, quello che ci basta sapere è che i <strong>pensieri di gratitudine</strong> hanno lo stesso effetto su quelli negativi dello zampirone sulle zanzare.</p>
						<p style="text-align: justify;">Non possiamo infatti essere <em>grati</em> e… <em>invidiosi</em>, <em>frustrati</em>, <em>stressati</em>, <em>tristi</em>, <em>insoddisfatti</em>, etc. allo stesso tempo.</p>
						<p style="text-align: justify;">È semplicemente impossibile.</p>
						<p style="text-align: justify;">Bene, ora che siamo arrivati fini qui, è tempo di ricapitolare e vedere insieme un <strong>esercizio pratico</strong> per sbarazzarci dei 3 vampiri mentali e tornare a pensare positivo.</p>
						<h2>Ricapitoliamo: come avere pensieri positivi e sbarazzarci di quelli negativi</h2>
						<ul>
							<li style="text-align: justify;">L’idea che basti <strong>pensare positivo</strong> per realizzare i nostri sogni è una di quelle leggende metropolitane dure a morire nel mondo della crescita personale.</li>
						</ul>
						<blockquote>
							<div class="bq_text">
								<p>“Le <em>azioni</em> battono le <em>visualizzazioni</em> ogni singolo giorno della settimana.”</p>
							</div>
							<div class="bq_share"><a href="https://twitter.com/share?url=https%3A%2F%2Fwww.efficacemente.com%2F2017%2F07%2Fpensieri-positivi%2F&amp;text=Le+azioni+battono+le+visualizzazioni+ogni+singolo+giorno+della+settimana.+%40EfficaceMente" target="_blank" class="tweet"><span>Twittami</span></a><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.efficacemente.com%2F2017%2F07%2Fpensieri-positivi%2F&amp;quote=Le+azioni+battono+le+visualizzazioni+ogni+singolo+giorno+della+settimana." target="_blank" class="fb_share"><span>Condividi</span></a>
							</div>
							<div class="clearfix"></div>
						</blockquote>
						<ul>
							<li style="text-align: justify;">Questo però non significa che dobbiamo pensare negativamente! I pensieri negativi sono infatti spesso alla base della nostra sofferenza. Nello specifico esistono <strong>3 vampiri mentali</strong> che succhiano le nostre energie:
								<ul>
									<li>Il pensiero della <em>Privazione</em>.</li>
									<li>Il pensiero della <em>Sottrazione</em>.</li>
									<li>Il pensiero della <em>Negazione</em>.</li>
								</ul>
							</li>
							<li style="text-align: justify;">Per neutralizzare questi schemi mentali negativi dobbiamo innanzitutto prendere consapevolezza del fatto che <strong>il pensiero non è altro che un prodotto “fisiologico” della nostra attività cerebrale</strong>. Nel momento in cui smettiamo di identificarci con esso, siamo liberi.</li>
							<li style="text-align: justify;">Se <strong>NON</strong> siamo i nostri pensieri, questo significa che possiamo vedere questa attività cognitiva come delle <strong>trasmissioni radio</strong>. Se le “canzoni” che stiamo ascoltando non ci piacciono, sta a noi <em>cambiare stazione</em>.</li>
							<li style="text-align: justify;">Il metodo più efficace per cambiare stazione e per sintonizzarci sui pensieri positivi, consiste nel far leva sul <strong>potere della gratitudine</strong>.</li>
						</ul>
						<p style="text-align: justify;">Eravamo arrivati qui.</p>
						<p style="text-align: justify;">Concludo con un semplice esercizio pratico che ti aiuterà a sfruttare il potere della gratitudine:</p>
						<ul style="text-align: justify;">
							<li>Prendi un <strong>bloc-notes</strong> o apri un nuovo file.</li>
							<li>Inizia a riportare alla mente e ad elencare i <strong>momenti più belli della tua vita</strong>, quelli di cui sei più <em>grato</em>. Possono essere momenti importanti e significativi, ma anche momenti quotidiani come una passeggiata in mezzo alla natura. Ciò che conta è che siano stati momenti in cui ti sei sentito<em> profondamente grato</em> di essere al mondo.</li>
							<li>Tra questi momenti, scegli quello di cui hai il <strong>ricordo più vivido</strong>.</li>
							<li>Ora prova a riportare alla mente <strong>ogni singolo dettaglio di quell’episodio</strong>: il vento sulla tua pelle, i suoni circostanti, la temperatura. Cerca di rivivere quel momento in tutte le sue sfumature.</li>
							<li>Ricordi perché ti eri sentito tanto grato in quel momento? Ma sopratutto, ricordi quella <strong>sensazione di gioia apparentemente ingiustificata</strong>? Cerca di riportarla a galla, aggrappati a quella sensazione, assaporala come assaporeresti un buon dolce.</li>
						</ul>
						<p style="text-align: justify;">Come è stato? Non male, vero?</p>
						<p style="text-align: justify;">E se facessi questo semplice esercizio ogni volta che ti accorgi che la tua mente si sta sintonizzando su <strong>Radio PdM </strong>(Pensieri di Merda)? Quanto migliorerebbe la tua vita?</p>
						<p style="text-align: justify;">Beh, non ti resta che provare.</p>
						<p style="text-align: justify;">Ti auguro una settimana… positiva! Andrea.</p>
						<div class="swp-content-locator"></div>
						<div class="clearfix"></div>
						<div id="paginazione_post">
						</div>
					</div>
					<hr>

					<div class="panel panel-default">
						<div class="panel-heading">
							OBIETTIVI CONSIGLIATI
						</div>
						<!-- .panel-heading -->
						<div class="panel-body">
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">Mezz'ora di meditazione al giorno</a>
                                        </h4>
									
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
										<div class="panel-body">
											<div class="row">

												<div class="col-lg-12">

													<h3>Obiettivo consigliato: mezz'ora di meditazione al giorno</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, ab placeat alias doloremque architecto porro deleniti cum, atque temporibus nulla doloribus suscipit consequuntur illum beatae inventore aspernatur magnam a? Impedit!</p>
													<div class="panel-body">

														<!--
									MODAL TO MODIFY	
								-->
														<div id="bodyModalGoalToModify">
															<form>
																<div class="form-group">
																	<label for="usr">Titolo</label>
																	<input type="text" class="form-control" id="gm_title" value="">
																</div>
																<div class="form-group">
																	<label for="comment">Descrizione</label>
																	<textarea class="form-control" rows="1" id="gm_description"></textarea>
																</div>
															</form>

															<!--
										MANAGER LABEL
									-->
															<?php

															$array_labels = $myLife_manager->getLabels( $idUser );
															$max_labels = sizeof( $array_labels );

															?>

															<div class="form-group">
																<label for="sel1"><span id="spanLabel">Etichetta</span> 
													
							<button id="buttonNewLabel" class="btn btn-info btn-xs">Crea nuova</button>
							<button id="buttonEditLabel" class="btn btn-warning btn-xs">Modifica</button>
							</label>

																<div id="divEditLabel" style="display: none" class="well well-sm">

																	<div class="row">

																		<div class="col-lg-8">

																			<input type="text" class="form-control" placeholder="Nome nuova etichetta" value="" id="gm_NameEditLabel">
																		</div>
																		<div class="col-lg-4">
																			<select class="form-control" id="gm_newEditColor">
																				<?php 
													$colors = $myLife_manager->getColors();
													for($k=0; $k<sizeof($colors); $k++){

														 echo '<option value="'. $colors[$k] . '">' . 					$colors[$k] . '</option>';
													}
												?>

																			</select>
																		</div>

																	</div>
																	<div class="row">
																		<div class="col-lg-12" style="padding-top: 5px; ">
																			<button id="cancelEditLabel" class="btn btn-info btn-xs">Annulla</button>
																		</div>
																	</div>
																</div>

																<div id="divNewLabel" style="display: none" class="well well-sm">

																	<div class="row">
																		<div class="col-lg-8">

																			<input type="text" class="form-control" placeholder="Nome nuova etichetta" id="gm_newLabel">
																		</div>
																		<div class="col-lg-4">
																			<select class="form-control" id="gm_newLabelColor">
																				<?php 
													$colors = $myLife_manager->getColors();
													for($k=0; $k<sizeof($colors); $k++){
														
														  echo '<option value="'. $colors[$k] . '">' . 					$colors[$k] . '</option>';
													}
												?>
																			</select>
																		</div>

																	</div>
																	<div class="row">
																		<div class="col-lg-12" style="padding-top: 5px; ">
																			<button id="cancelNewLabel" class="btn btn-info btn-xs">Annulla</button>
																		</div>
																	</div>
																</div>
																<div class="row" id="oldLabel">
																	<div class="col-lg-8">
																		<select class="form-control" id="gm_idlabel">
																			<?php 
											for($j=0; $j<$max_labels; $j++){
												
												
													$idLabel = $array_labels[$j]->id; 
													$color = $array_labels[$j]->color; 
													echo '<option value="'. $idLabel . "_" . $color .'">' . $array_labels[$j]->name . '</option>';
												
											}
										?>
																		</select>

																	</div>
																	<div class="col-lg-4">
																		<!-- EDIT COLOR
												<select class="form-control" id="gm_idlabelColor">
													<?php 
														/*
														$colors = $myLife_manager->getColors();
														for($k=0; $k<sizeof($colors); $k++){
															if($colors[$k] == $goal->color){
																echo '<option selected value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
															}else echo '<option value="'. $colors[$k] . '">' . $colors[$k] . '</option>';
														}*/
													?>
												</select>
												-->
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<label for="sel1">Data inizio</label>
															<input type="text" class="form-control" id="gm_dateBegin" placeholder="aaaa-mm-gg hh:mm" value="">

															<label for="sel1">Data fine</label>
															<input type="text" class="form-control" id="gm_dateFinal" placeholder="aaaa-mm-gg hh:mm" value="">
														</div>

														<div class="form-group">
															<div style="padding: 20px" class="text-center">
																<div class="row">
																	<div class="col-lg-3">
																		<span id="label_slider_Y">Yourself</span>
																	</div>
																	<div class="col-lg-9">
																		<div class="slidecontainer">
																			<input type="range" min="-10" max="10" value="0" class="slider" id="gm_lifeYourself">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-3">
																		<span id="label_slider_C">Career</span>
																	</div>
																	<div class="col-lg-9">
																		<div class="slidecontainer">
																			<input type="range" min="-10" max="10" value="0" class="slider" id="gm_lifeCareer">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-3">
																		<span id="label_slider_R">Relationship</span>
																	</div>
																	<div class="col-lg-9">
																		<div class="slidecontainer">
																			<input type="range" min="-10" max="10" value="0" class="slider" id="gm_lifeRelationships">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-3">
																		<span id="label_slider_R">Percentage</span>
																	</div>
																	<div class="col-lg-9">
																		<div class="slidecontainer">
																			<input type="range" min="-10" max="10" value="0" class="slider" id="gm_percentage">
																		</div>
																	</div>
																</div>

															</div>
														</div>


													</div>
													<!-- BODY -->

													<div class="panel-footer text-right">
														<button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
														<button id="newGoal" class="btn btn-success" style="padding-left: 60px; padding-right: 60px">Crea</button>
													</div>

												</div>
												<!-- /.col-lg-12 -->
											</div>

										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">Collapsible Group Item #2</a>
                                        </h4>
									
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
										<div class="panel-body">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">Collapsible Group Item #3</a>
                                        </h4>
									
									</div>
									<div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
										<div class="panel-body">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- .panel-body -->
					</div>





				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-warning" style="padding: 6px; ">
						<p class="fa fa-eye color-yourself"> +5 ,</p>
						<p class="fa fa-cogs color-career"> +1 ,</p>
						<p class="fa fa-heart color-relationships"> +2 ,</p>
						<p style="color: black; font-weight: 900">ARTICOLO LETTO</p>

					</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

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
					<h1 class="page-header color-career">Carriera </h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<ul class="nav nav-tabs color-yourself article" style="margin-bottom: 30px">
				<li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">Home</a>
				</li>
				<li class=""><a href="#mente" data-toggle="tab" aria-expanded="false">Mente</a>
				</li>
				
				</li>
				<li class=""><a href="#fitness" data-toggle="tab" aria-expanded="false">Fitness</a>
				</li>	
				<li class=""><a href="#dieta" data-toggle="tab" aria-expanded="false">Dieta</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="home">

					<div class="row">
					
					<div class="col-lg-4">	<div class="panel panel-default article">	<div class="panel-heading">		<a style="color: white" href="	https://efficacemente.com/2017/12/libri-da-leggere/">	Da efficacemente.com</a>	</div>	<img src="	https://www.efficacemente.com/wp-content/uploads/2017/11/libri-da-leggere-240x240.jpeg	"  alt=""/>		<div class="panel-body panel-body-articles">	<h4>	LIBRI DA LEGGERE: 10 libri consigliati per il nuovo anno	</h4>	<p>	Sei a corto di libri da leggere? Ecco la classifica dei 10 migliori libri che ho letto negli ultimi 12 mesi.	</p>	</div>	<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">	<p class="fa fa-eye color-yourself"> 2</p>	<p class="fa fa-cogs color-career">1</p>	<p class="fa fa-heart color-relationships">3</p>	</div>	</div>	</div>
<div class="col-lg-4">	<div class="panel panel-default article">	<div class="panel-heading">		<a style="color: white" href="	https://www.efficacemente.com/2017/01/non-riesco-a-studiare/">	Da efficacemente.com</a>	</div>	<img src="	https://www.efficacemente.com/wp-content/uploads/2017/01/non-riesco-a-studiare-240x240.jpg	"  alt=""/>		<div class="panel-body panel-body-articles">	<h4>	Non riesco a studiare: consigli pratici per farsi venire voglia di studiare	</h4>	<p>	Se nell’ultimo periodo c’è una vocina nella tua testa che continua a ripeterti “non riesco a studiare!”, prenditi 5 minuti e leggi questo articolo: potrebbe salvare la tua carriera universitaria ;-)	</p>	</div>	<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">	<p class="fa fa-eye color-yourself"> 1</p>	<p class="fa fa-cogs color-career">2</p>		</div>	</div>	</div>

					

						<div class="col-lg-4">
						
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/corso-di-inglese-gratis.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 tecniche per imparare l’inglese EfficaceMente</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">
									<p class="fa fa-eye color-yourself"> +5 ,</p>
									<p class="fa fa-cogs color-career"> +1 ,</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="../image/articles/02.PNG"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come ottenere di più dalla vita</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2010/02/5-azioni-pratiche-per-sviluppare-lautostima-di-un-supereroe/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2010/02/sviluppare-autostima-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 azioni pratiche per sviluppare l’autostima di un supereroe</h4>
									<p>Aumentare l’autostima e la fiducia in sé stessi non ci rende automaticamente dei supereroi, ma rappresenta il primo passo per affrontare al meglio le sfide di tutti i giorni e i nostri obiettivi più ambiziosi.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2015/02/perseveranza/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2015/02/perseveranza-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Perseveranza: le 4 lezioni di Emil Zatopek</h4>
									<p>Se sei a corto di perseveranza e ti arrendi quasi sempre alle prime difficoltà, sono certo che Emil Zatopek possa insegnarti un paio di cosine (anzi 4).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/11/mappe-concettuali/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/11/mappe-concettuali-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Mappe concettuali: come fare una mappa concettuale efficace</h4>
									<p>Creare mappe concettuali è una delle abilità chiave per gli studenti di ogni età (scuola primaria, scuola media, superiori e università). Scopriamo insieme cosa sono le mappe concettuali, come si fanno e i migliori programmi e strumenti per crearle (ce n’è uno che li batte tutti).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>

				</div>
					<div class="tab-pane fade active in" id="mente">

					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/corso-di-inglese-gratis.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 tecniche per imparare l’inglese EfficaceMente</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">
									<p class="fa fa-eye color-yourself"> +5 ,</p>
									<p class="fa fa-cogs color-career"> +1 ,</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="../image/articles/02.PNG"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come ottenere di più dalla vita</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2010/02/5-azioni-pratiche-per-sviluppare-lautostima-di-un-supereroe/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2010/02/sviluppare-autostima-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 azioni pratiche per sviluppare l’autostima di un supereroe</h4>
									<p>Aumentare l’autostima e la fiducia in sé stessi non ci rende automaticamente dei supereroi, ma rappresenta il primo passo per affrontare al meglio le sfide di tutti i giorni e i nostri obiettivi più ambiziosi.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2015/02/perseveranza/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2015/02/perseveranza-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Perseveranza: le 4 lezioni di Emil Zatopek</h4>
									<p>Se sei a corto di perseveranza e ti arrendi quasi sempre alle prime difficoltà, sono certo che Emil Zatopek possa insegnarti un paio di cosine (anzi 4).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/11/mappe-concettuali/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/11/mappe-concettuali-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Mappe concettuali: come fare una mappa concettuale efficace</h4>
									<p>Creare mappe concettuali è una delle abilità chiave per gli studenti di ogni età (scuola primaria, scuola media, superiori e università). Scopriamo insieme cosa sono le mappe concettuali, come si fanno e i migliori programmi e strumenti per crearle (ce n’è uno che li batte tutti).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				
					<div class="tab-pane fade active in" id="fitness">

					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/corso-di-inglese-gratis.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 tecniche per imparare l’inglese EfficaceMente</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">
									<p class="fa fa-eye color-yourself"> +5 ,</p>
									<p class="fa fa-cogs color-career"> +1 ,</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="../image/articles/02.PNG"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come ottenere di più dalla vita</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2010/02/5-azioni-pratiche-per-sviluppare-lautostima-di-un-supereroe/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2010/02/sviluppare-autostima-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 azioni pratiche per sviluppare l’autostima di un supereroe</h4>
									<p>Aumentare l’autostima e la fiducia in sé stessi non ci rende automaticamente dei supereroi, ma rappresenta il primo passo per affrontare al meglio le sfide di tutti i giorni e i nostri obiettivi più ambiziosi.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2015/02/perseveranza/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2015/02/perseveranza-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Perseveranza: le 4 lezioni di Emil Zatopek</h4>
									<p>Se sei a corto di perseveranza e ti arrendi quasi sempre alle prime difficoltà, sono certo che Emil Zatopek possa insegnarti un paio di cosine (anzi 4).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/11/mappe-concettuali/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/11/mappe-concettuali-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Mappe concettuali: come fare una mappa concettuale efficace</h4>
									<p>Creare mappe concettuali è una delle abilità chiave per gli studenti di ogni età (scuola primaria, scuola media, superiori e università). Scopriamo insieme cosa sono le mappe concettuali, come si fanno e i migliori programmi e strumenti per crearle (ce n’è uno che li batte tutti).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>

				</div>
				
				
				<div class="tab-pane fade active in" id="dieta">

					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/corso-di-inglese-gratis.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 tecniche per imparare l’inglese EfficaceMente</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles shadow-sm p-4 mb-4 text-right">
									<p class="fa fa-eye color-yourself"> +5 ,</p>
									<p class="fa fa-cogs color-career"> +1 ,</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="../image/articles/02.PNG"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come ottenere di più dalla vita</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg"  alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2009/02/come-memorizzare-un-libro-di-200-pagine-in-40-minuti/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/memorizzare-e1292318159710-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Come memorizzare velocemente: studiare un libro nel modo efficace</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2010/02/5-azioni-pratiche-per-sviluppare-lautostima-di-un-supereroe/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2010/02/sviluppare-autostima-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>5 azioni pratiche per sviluppare l’autostima di un supereroe</h4>
									<p>Aumentare l’autostima e la fiducia in sé stessi non ci rende automaticamente dei supereroi, ma rappresenta il primo passo per affrontare al meglio le sfide di tutti i giorni e i nostri obiettivi più ambiziosi.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://efficacemente.com/2015/02/perseveranza/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2015/02/perseveranza-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Perseveranza: le 4 lezioni di Emil Zatopek</h4>
									<p>Se sei a corto di perseveranza e ti arrendi quasi sempre alle prime difficoltà, sono certo che Emil Zatopek possa insegnarti un paio di cosine (anzi 4).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/11/mappe-concettuali/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/11/mappe-concettuali-240x240.jpg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>Mappe concettuali: come fare una mappa concettuale efficace</h4>
									<p>Creare mappe concettuali è una delle abilità chiave per gli studenti di ogni età (scuola primaria, scuola media, superiori e università). Scopriamo insieme cosa sono le mappe concettuali, come si fanno e i migliori programmi e strumenti per crearle (ce n’è uno che li batte tutti).</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="panel panel-default article">
								<div class="panel-heading">
									<a style="color: white" href="https://www.efficacemente.com/2017/03/determinazione/">Da www.efficacemente.com</a>
								</div>

								<img src="https://www.efficacemente.com/wp-content/uploads/2017/03/determinazione-240x240.jpeg" width="100%" height="250px" alt=""/>

								<div class="panel-body panel-body-articles">
									<h4>DETERMINAZIONE: 3 strategie per essere più determinati nella vita</h4>
									<p>La determinazione (o “tigna”, come amo chiamarla), tra le qualità umane è quella che più di ogni altra può incidere sui tuoi successi: ecco perché e come svilupparla se non ne hai abbastanza.</p>
								</div>
								<div class="panel-footer panel-footer-articles text-right">
									<p class="fa fa-eye color-yourself"> +5 |</p>
									<p class="fa fa-cogs color-career"> +1 |</p>
									<p class="fa fa-heart color-relationships"> +2 </p>
								</div>
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

			$( this ).css( 'cursor', 'pointer' );
			$( "#tallModal" ).modal( 'show' );

		} )

		$( '.panel' ).hover( function () {
			$( this ).css( 'cursor', 'pointer' );
		} );
	</script>
	<?php include_once("footerlinkscript.html")?>


</body>

</html>
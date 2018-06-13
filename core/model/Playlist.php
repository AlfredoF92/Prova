<?php



class Playlist {
    
    public $id;
    public $idUtente;
    public $nome;
    public $linguaParole;
    public $linguaTraduzione;
	public $valutazione;
	
    /**
     * Annuncio constructor.
     * @param $id
     * @param $inglese
     * @param $italiano
     * @param $inmind
     * @param $descrizione
     * @param $luogo
     * @param $stato
     * @param $retribuzione
     * @param $tipologia
     */
    public function __construct($id, $idUtente, $nome, $linguaParole, $linguaTraduzione, $valutazione)
    {
        $this->id = $id;
		$this->idUtente = $idUtente;
		$this->nome = $nome;
		$this->linguaParole = $linguaParole;
		$this->linguaTraduzione = $linguaTraduzione;
		$this->valutazione = $valutazione;
    }
	
	
	
	
	
}
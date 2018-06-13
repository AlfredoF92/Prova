<?php



class Day {
    
    public $id;
    public $titolo;
    public $sottotitolo;
    public $descrizione;
    public $data;
	public $idInvestitori;
	public $commento;
	public $percentuale;
	public $urlImage;
	public $idUtente;
    /**
     * Annuncio constructor.
     
     */
    public function __construct($id, $titolo, $sottotitolo, $descrizione, $data, $idInvestitori, $commento, $percentuale, $urlImage, $idUtente)
    {
        $this->id = $id;
		$this->titolo = $titolo;
		$this->sottotitolo = $sottotitolo;
		$this->descrizione = $descrizione;
		$this->data = $data;
		$this->idInvestitori = $idInvestitori;
		$this->commento = $commento;
		$this->percentuale = $percentuale;
		$this->urlImage = $urlImage;
		$this->idUtente = $idUtente;
		
    }
	
}
<?php



class FraseVocabolario {
    
    private $id;
    private $inglese;
    private $italiano;
    private $inmind;
    
	

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
    public function __construct($id, $inglese, $italiano, $inmind)
    {
        $this->id = $id;
        $this->inglese = $inglese;
        $this->italiano = $italiano;
        $this->inmind = $inmind;
        
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * @return mixed
     */
    public function getInglese()
    {
        return $this->inglese;
    }
    
	 /**
     * @return mixed
     */
    public function getItaliano()
    {
        return $this->italiano;
    }
}
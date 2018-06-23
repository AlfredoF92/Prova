<?php

class Goal {
    
    public $id;
	public $idUser;
	public $title;
	public $description;
	public $dateBegin;
	public $dateFinal;
	public $idLabel;
	public $name; //labelgoal table
	public $color; //labelgoal table
	public $idNameState;
	public $lifeYourself;
	public $lifeCareer;
	public $lifeRelationships;
	public $percentageInvestor;
	
    /**
     * 
     */
    public function __construct($id, $idUser, $title, $description, $dateBegin, $dateFinal, $idLabel, $name,  $color, $idNameState, $lifeYourself, $lifeCareer, $lifeRelationships, $percentageInvestor )
    {
		$this->id = $id; 
		$this->idUser = $idUser; 
		$this->title = $title; 
		$this->description = $description; 
		$this->dateBegin = $dateBegin; 
		$this->dateFinal = $dateFinal; 
		$this->idLabel = $idLabel;
		$this->name = $name;
		$this->color = $color;	
		$this->idNameState = $idNameState; 
		$this->lifeYourself = $lifeYourself; 
		$this->lifeCareer = $lifeCareer; 
		$this->lifeRelationships = $lifeRelationships; 
		$this->percentageInvestor = $percentageInvestor; 
    }
	
}
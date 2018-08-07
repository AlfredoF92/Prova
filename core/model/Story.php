<?php

class Story {
    
    public $id;
	public $title;
	public $description;
	public $urlPhoto;
	public $dateStory;
	public $idUser;
	public $idTypeStory;

	
    /**
     * 
     */
    public function __construct($id, $title, $description, $urlPhoto, $dateStory, $idUser, $idTypeStory )
    {
		
		$this->id = $id; 
		$this->title = $title; 
		$this->description = $description; 
		$this->urlPhoto = $urlPhoto; 
		$this->dateStory = $dateStory; 
		$this->idUser = $idUser; 
		$this->idTypeStory = $idTypeStory; 
		
    }
	
}
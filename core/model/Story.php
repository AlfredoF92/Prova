<?php

class Story {
    
    public $id;
	public $title;
	public $description;
	public $publicStory;
	public $investitorUser;
	public $urlPhoto;
	public $dateStory;

	
    /**
     * 
     */
    public function __construct($id, $title, $description, $publicStory, $investitorUser, $urlPhoto, $dateStory )
    {
		
		$this->id = $id; 
		$this->title = $title; 
		$this->description = $description; 
		$this->publicStory = $publicStory; 
		$this->investitorUser = $investitorUser; 
		$this->urlPhoto = $urlPhoto; 
		$this->dateStory = $dateStory; 
		
    }
	
}
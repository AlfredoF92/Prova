<?php

class Post {
   
    public $id;
    public $idUser;
    public $datePost;
	public $dateNewPost; //Data ultima modifica
    public $title;
    public $subtitle;
	public $description;
	public $urlMedia;
	public $commentUser;
	public $commentInvestitors;
	public $percentage;
	public $lifeMood;
	public $lifeCareer;
	public $lifeRelationships;
	public $lifeYourself;
	public $type;
	
	
    //$id, $idUser, $datePost, $dateNewPost, $title, $subtitle, $description, $urlMedia, $commentUser, $commentInvestitors, $percentage, $lifeMood, $lifeCareer, $lifeRelationships, $lifeYourself, $type
    public function __construct()
    {
		
		if(5 == func_num_args()){
			$this->id = func_get_arg(0);
			$this->datePost = func_get_arg(1);
			$this->title = func_get_arg(2);
			$this->urlMedia = func_get_arg(3);
			$this->percentage = func_get_arg(4);
		
			
		}else {
			$this->id = func_get_arg(0);
			$this->idUser = func_get_arg(1);
			$this->datePost = func_get_arg(2);
			$this->dateNewPost = func_get_arg(3);
			$this->title = func_get_arg(4);
			$this->subtitle = func_get_arg(5);
			$this->description = func_get_arg(6);
			$this->urlMedia = func_get_arg(7);
			$this->commentUser = func_get_arg(8);
			$this->commentInvestitors = func_get_arg(9);
			$this->percentage = func_get_arg(10);
			$this->lifeMood = func_get_arg(11);
			$this->lifeCareer = func_get_arg(12);
			$this->lifeRelationships = func_get_arg(13);
			$this->lifeYourself = func_get_arg(14);
			$this->type = func_get_arg(15);
		}
		
    }
	
	
	
}
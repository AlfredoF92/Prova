<?php

class Label {
    
    public $id;
	public $name;
	public $color; 
	
    /**
     * 
     */
    public function __construct($id, $name, $color)
    {
		$this->id = $id; 
		$this->name = $name;
		$this->color = $color;
    }
	
}
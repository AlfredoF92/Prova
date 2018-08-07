<?php


class Utente {
    
    public $id;
    public $nomeImg;
	
    
	
    public function __construct($id, $username, $email, $password, $role)
    {
        $this->id = $id;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		
    }
	
}

?>
<?php

class Users {

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}


    public function getUser($username){
		$statment = $this->pdo->prepare("SELECT * FROM users WHERE username = '$username' ");
        $statment->execute();
		return $statment->fetchAll();
	}	


	public function insertUser($username , $password, $email){
		$statment = $this->pdo->prepare(
			"INSERT INTO users (username, password, email) 
			VALUES (:username, :password, :email)"
		);
		$statment->execute([
			":username" => $username,
			":password" => $password,
			":email" => $email
		]);
	}

}    	
?> 
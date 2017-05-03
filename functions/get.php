<?php

class DataBase_blog {

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getAllFrom($table){
		$statement = $this->pdo->prepare("SELECT * FROM $table");
		$statement->execute();
		return $statement->fetchAll();
	}

	public function getById($table, $id){
		$statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
		$statement->execute();
		return $statement->fetchAll();
	}
}

?>
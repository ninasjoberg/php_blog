<?php

class Likes{

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

  public function insertLike($id){
		$statment = $this->pdo->prepare(
			"INSERT INTO votes (pid)
			VALUES (:pid)"
		);
		$statment->execute([
			":pid" => $id,
		]);
	}

  public function getAllLikes($table, $id){
    $statement = $this->pdo->prepare("SELECT Max(id) FROM $table WHERE pid = $id");
    $statement->execute();
    return $statement->fetchAll();
  }

}
  ?>

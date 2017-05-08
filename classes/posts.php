<?php

class Posts {

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getAllFrom($table){
		$statement = $this->pdo->prepare("SELECT * FROM $table ORDER BY created DESC");
		$statement->execute();
		return $statement->fetchAll();
	}


	public function getById($table, $id){
		$statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
		$statement->execute();
		return $statement->fetchAll();
	}


	public function insertPost($title, $body){
		$statment = $this->pdo->prepare(
			"INSERT INTO pages1 (title, body) 
			VALUES (:title, :body)"
		);
		$statment->execute([
			":title" => $title,
			":body" => $body
		]);
	}	

	public function updatePost($title, $body, $id){
		$statment = $this->pdo->prepare(
			"UPDATE pages1
			SET title=:title, body=:body, updated=:updated
			WHERE id=:id "
		);
		$statment->execute([
			":id" => $id,
			":title" => $title,
			":body" => $body,
			":updated" => date("Y-m-d h:i:sa")
    	]);
	}

	public function insertComment($text, $id){
		$statment = $this->pdo->prepare(
			"INSERT INTO comments (text, postId) 
			VALUES (:text, :postId)"
		);
		$statment->execute([
			":postId" => $id,
			":text" => $text
		]);
	}

	public function deletePost($id){
		$statment = $this->pdo->prepare(
		"DELETE FROM pages1 
		WHERE id=:id"
		);
		$statment->execute([
			":id" => $id
		]);
	}
}

?>


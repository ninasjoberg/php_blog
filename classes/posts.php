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


	public function getCategories($table){
		$statement = $this->pdo->prepare("SELECT * FROM $table");
		$statement->execute();
		return $statement->fetchAll();
	}


	public function getById($table, $id){
		$statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
		$statement->execute();
		return $statement->fetchAll();
	}


	public function deletePost($id){
		$statment = $this->pdo->prepare( "DELETE FROM posts WHERE id = $id");
		$statment->execute();
	}


	public function insertPost($title, $body, $author){
		$statment = $this->pdo->prepare(
			"INSERT INTO posts (title, body, author) 
			VALUES (:title, :body, :author)"
		);
		$statment->execute([
			":title" => $title,
			":body" => $body,
			":author" => $author 
		]);
		return $this->pdo->lastInsertId(); 
	}	


	public function updatePost($title, $body, $id){
		$statment = $this->pdo->prepare(
			"UPDATE posts
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
}

?>


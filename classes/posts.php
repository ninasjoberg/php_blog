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

	public function getOneCategorie($table, $text){
		$statement = $this->pdo->prepare("SELECT * FROM $table WHERE text = $text");
		$statement->execute();
		return $statement->fetchAll();
	}


	public function getById($table, $id){
		$statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
		$statement->execute();
		return $statement->fetchAll();
	}

	public function getUser($username){
		$statment = $this->pdo->prepare("SELECT * FROM users WHERE username = '$username' ");
        $statment->execute();
		return $statment->fetchAll();
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

	public function insertComment($text, $id, $name){
		$statment = $this->pdo->prepare(
			"INSERT INTO comments (text, postId, name) 
			VALUES (:text, :postId, :name)"
		);
		$statment->execute([
			":postId" => $id,
			":text" => $text,
			":name" => $name
		]);
	}

}

?>


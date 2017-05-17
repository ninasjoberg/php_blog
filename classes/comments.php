<?php

class Comments {

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
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
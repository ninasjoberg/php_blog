<?php

	class Likes{
		
		private $pdo;
		
		public function __construct($pdo){
			$this->pdo = $pdo;
		}


		public function insertLike($pid){
			$statment = $this->pdo->prepare(
				"INSERT INTO votes (pid, likes)
				VALUES (:pid, :likes)"
			);

			$statment->execute([
				":pid" => $pid,
				":likes" => 1
			]);
		}


		public function uppdateLike($id){
			$statment = $this->pdo->prepare(
				"UPDATE votes likes
				SET likes = likes + 1
				WHERE pid = :pid"
			);

			$statment->execute([
				":pid" => $id,
			]);
		}


		public function getLikesByPid($pid){
			$statement = $this->pdo->prepare("SELECT likes FROM votes WHERE pid = $pid");
			$statement->execute();
			return $statement->fetchAll();
		}
	}
?>

